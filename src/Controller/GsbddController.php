<?php

// src/Controller/GsbddController.php
namespace App\Controller;

use App\Entity\User;
use App\Entity\UserAcess;
use App\Entity\Gsbdd;
use App\Repository\GsbddRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GsbddController extends AbstractController
{
    #[Route('/gsbdd/manage', name: 'gsbdd_manage')]
    public function index(GsbddRepository $gsbddRepository): Response
    {
        // Récupère tous les Gsbdd à partir du repository
        $gsbdds = $gsbddRepository->findAll();

        // Affiche la liste dans la vue Twig
        return $this->render('admin/gsbdd/manage_gsbdd.html.twig', [
            'gsbdds' => $gsbdds,
        ]);
    }
    #[Route('/gsbdd/update', name: 'update_gsbdd', methods: ['POST'])]
    public function update(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            // Décodage des données JSON envoyées via la requête POST
            $data = json_decode($request->getContent(), true);
            $id = $data['id_gsbdd'];

            // Recherche du Gsbdd par son id
            $gsbdd = $entityManager->getRepository(Gsbdd::class)->find($id);


            // Mise à jour des champs du Gsbdd
            $gsbdd->setNomGsbdd($data['gsbdd_name']);
            $gsbdd->setIndicEcole($data['indic_ecole']);
            $gsbdd->setIndicHorsEcole($data['indic_hors_ecole']);
            $gsbdd->setIndicOpexUnite($data['indic_opex']);
            $gsbdd->setIndicOpexIsole($data['indic_opex_isole']);

            // Vérification si le Gsbdd existe
            if (!$gsbdd) {
                return new JsonResponse(['status' => 'Gsbdd not found'], 404);
            }

            // Enregistrement des modifications en base de données
            $entityManager->flush();

            // Retourne une réponse JSON pour indiquer le succès
            return new JsonResponse(['status' => 'Gsbdd updated successfully']);
        } catch (\Exception $e) {
            // En cas d'erreur, renvoie une réponse avec un message d'erreur
            return new JsonResponse(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }

    #[Route('/gsbdd/users/{id_gsbdd}', name: 'get_users_by_gsbdd', methods: ['GET'])]
    public function getUsersByGsbdd(int $id_gsbdd, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            // Récupère les user_access liés à cet id_gsbdd
            $userAccessList = $entityManager->getRepository(UserAcess::class)->findBy(['id_gsbdd' => $id_gsbdd]);

            if (!$userAccessList) {
                return new JsonResponse(['status' => 'No users found for this GSBdd'], 404);
            }

            // Prépare la réponse avec les données nécessaires
            $users = [];
            foreach ($userAccessList as $userAcess) {
                // Récupère l'utilisateur associé à cet id_user
                $user = $entityManager->getRepository(User::class)->find($userAcess->getIdUser());

                if ($user) {
                    $users[] = [
                        'id_user_acess' => $userAcess->getIdUserAcess(),
                        'id_user' => $userAcess->getIdUser(),
                        'user_session' => $user->getUserSession(), // Ajoute user_session depuis l'entité User
                        'current_acess' => $userAcess->getCurrentAcess()
                    ];
                }
            }

            return new JsonResponse(['status' => 'success', 'users' => $users], 200);
        } catch (\Exception $e) {
            return new JsonResponse(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }

    #[Route('/gsbdd/user_access/delete', name: 'delete_user_access', methods: ['POST'])]
    public function deleteUserAccess(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $userSession = $data['id_user_session'] ?? null;
        $gsbddId = $data['gsbdd_id'] ?? null;

        if (!$userSession || !$gsbddId) {
            return new JsonResponse(['message' => 'User session or GSBdd ID is missing.'], 400);
        }

        // Find the user by session in the User entity
        $user = $entityManager->getRepository(User::class)->findOneBy(['user_session' => $userSession]);
        if (!$user) {
            return new JsonResponse(['message' => 'User not found for this session.'], 404);
        }

        // Find the user access record by user ID and GSBdd ID
        $userAccess = $entityManager->getRepository(UserAcess::class)->findOneBy([
            'id_user' => $user->getId(),
            'id_gsbdd' => $gsbddId
        ]);

        if (!$userAccess) {
            return new JsonResponse(['message' => 'User access not found for this GSBdd.'], 404);
        }

        // Set current access to 0
        $userAccess->setCurrentAcess(0);

        // Persist the change
        $entityManager->persist($userAccess);
        $entityManager->flush();

        return new JsonResponse(['status' => 'User access has been removed successfully.']);
    }

    #[Route('/gsbdd/user_access/add', name: 'add_user_access', methods: ['POST'])]
    public function addUserAccess(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $userSession = $data['id_user_session'] ?? null;
        $gsbddId = $data['gsbdd_id'] ?? null;

        // Validate input
        if (!$userSession || !$gsbddId) {
            return new JsonResponse(['message' => 'User session or GSBdd ID is missing.'], 400);
        }

        // Find the user by session in the User entity
        $user = $entityManager->getRepository(User::class)->findOneBy(['user_session' => $userSession]);
        if (!$user) {
            return new JsonResponse(['message' => 'User not found for this session.'], 404);
        }

        // Check if user access record already exists
        $userAccess = $entityManager->getRepository(UserAcess::class)->findOneBy([
            'id_user' => $user->getId(),
            'id_gsbdd' => $gsbddId
        ]);

        if ($userAccess) {
            // If user access record exists, you can update it if needed
            $userAccess->setCurrentAcess(1); // Set current access to 1 (or another value based on your logic)

            // Persist the change
            $entityManager->persist($userAccess);
            $entityManager->flush();
            return new JsonResponse(['status' => 'User access updated successfully.']);
        } else {
            // Create a new user access record
            $newUserAccess = new UserAcess();
            $newUserAccess->setIdUser($user->getId());
            $newUserAccess->setIdGsbdd($gsbddId);
            $newUserAccess->setCurrentAcess(1); // Initialize with current access set to 1

            // Persist the new entry
            $entityManager->persist($newUserAccess);
            $entityManager->flush();
            return new JsonResponse(['status' => 'User access has been added successfully.']);
        }
    }


}


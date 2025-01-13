<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/manage', name: 'user_manage')]
    public function manage(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Create a new user
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        // Handle form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setAdminUser(0);
            $user->setActive(1);
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('user_manage');
        }

        // Retrieve all users from the database
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('admin/user/gerer.html.twig', [
            'form' => $form->createView(),
            'users' => $users,
        ]);
    }
    #[Route('/user/update', name: 'update_user', methods: ['POST'])] // Assurez-vous que la méthode est POST
    public function update(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);
            $id = $data['id_user'];


            $user = $entityManager->getRepository(User::class)->find($id);

            $user->setUserSession($data['user_session']);
            $user->setMailAdress($data['mail_adress']);
            $user->setActive($data['active']);

            if (!$user) {
                //$logger->error("User with ID $id not found.");
                return new JsonResponse(['status' => 'user not found'], 404);
            }


            $entityManager->flush();

            return new JsonResponse(['status' => 'user updated successfully']);
        } catch (\Exception $e) {
            //$logger->error('Error updating Gsbdd: ' . $e->getMessage());
            return new JsonResponse(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }
    #[Route('/user/delete', name: 'delete_user', methods: ['POST'])]
    public function delete(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
    try {
        $data = json_decode($request->getContent(), true);
        $id = $data['id_user'];

        // Récupérer l'utilisateur à partir de l'ID
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            return new JsonResponse(['status' => 'user not found'], 404);
        }

        // Mettre à jour le champ 'active' pour désactiver l'utilisateur
        $user->setActive(0);
        $entityManager->flush();

        return new JsonResponse(['status' => 'user deactivated successfully']);
        } catch (\Exception $e) {
            return new JsonResponse(['status' => 'Error', 'message' => $e->getMessage()], 500);
        }
    }
}

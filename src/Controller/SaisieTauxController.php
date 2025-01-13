<?php

// src/Controller/SaisieTauxController.php

namespace App\Controller;

use App\Entity\Armee;
use App\Entity\ArticleManquant;
use App\Entity\SaisieTaux;
use App\Entity\Gsbdd;
use App\Entity\UserAcess;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class SaisieTauxController extends AbstractController
{


    #[Route('saisie-taux-ecole', name: 'saisie-taux-ecole')]
    public function index(Request $request, EntityManagerInterface $em, SessionInterface $session): Response {

        // Récupérer l'utilisateur connecté
        $idUser = $session->get('id_user');

        // Récupérer tous les enregistrements de Gsbdd
        $gsbdds = $em->getRepository(Gsbdd::class)->findAll();

        // Récupérer la période et l'id_gsbdd depuis la requête
        $periode = $request->query->get('periode');
        $id_gsbdd = $request->query->get('gsbdd');

        // Récupérer les saisies de taux correspondant à la période et à l'id_gsbdd donné
        $saisiesTaux = $em->getRepository(SaisieTaux::class)->findBy([
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter le filtre pour id_gsbdd
            'type' => 'taux école'
        ]);


        return $this->render('/index/saisie_taux/manage_saisie_taux_ecole.html.twig', [
            'gsbdds' => $gsbdds,
            'saisiesTaux' => $saisiesTaux,
            'id_user' => $idUser,
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter cette ligne
        ]);
    }

    #[Route('saisie-taux-hors-ecole', name: 'saisie-taux-hors-ecole')]
    public function taux_hors_ecole(Request $request, EntityManagerInterface $em, SessionInterface $session): Response {
        // Récupérer l'utilisateur connecté
        $idUser = $session->get('id_user');

        // Récupérer tous les enregistrements de Gsbdd
        $gsbdds = $em->getRepository(Gsbdd::class)->findAll();

        // Récupérer la période et l'id_gsbdd depuis la requête
        $periode = $request->query->get('periode');
        $id_gsbdd = $request->query->get('gsbdd');

        // Récupérer les saisies de taux correspondant à la période et à l'id_gsbdd donné
        $saisiesTaux = $em->getRepository(SaisieTaux::class)->findBy([
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter le filtre pour id_gsbdd
            'type' => 'taux hors école'
        ]);

        return $this->render('/index/saisie_taux/manage_saisie_taux_hors_ecole.html.twig', [
            'gsbdds' => $gsbdds,
            'saisiesTaux' => $saisiesTaux,
            'id_user' => $idUser,
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter cette ligne
        ]);
    }

    #[Route('saisie-taux-opex-unite', name: 'saisie-opex-unite')]
    public function taux_opex_unite(Request $request, EntityManagerInterface $em, SessionInterface $session): Response {
        // Récupérer l'utilisateur connecté
        $idUser = $session->get('id_user');

        // Récupérer tous les enregistrements de Gsbdd
        $gsbdds = $em->getRepository(Gsbdd::class)->findAll();

        // Récupérer la période et l'id_gsbdd depuis la requête
        $periode = $request->query->get('periode');
        $id_gsbdd = $request->query->get('gsbdd');

        // Récupérer les saisies de taux correspondant à la période et à l'id_gsbdd donné
        $saisiesTaux = $em->getRepository(SaisieTaux::class)->findBy([
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter le filtre pour id_gsbdd
            'type' => 'taux opex unite'
        ]);

        return $this->render('/index/saisie_taux/manage_saisie_taux_opex.html.twig', [
            'gsbdds' => $gsbdds,
            'saisiesTaux' => $saisiesTaux,
            'id_user' => $idUser,
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter cette ligne
        ]);
    }

    #[Route('saisie-taux-opex-isole', name: 'saisie-opex-isole')]
    public function taux_opex_isole(Request $request, EntityManagerInterface $em, SessionInterface $session): Response {
        // Récupérer tous les enregistrements de Gsbdd
        $idUser = $session->get('id_user');

        // Récupérer tous les enregistrements de Gsbdd
        $gsbdds = $em->getRepository(Gsbdd::class)->findAll();

        // Récupérer la période et l'id_gsbdd depuis la requête
        $periode = $request->query->get('periode');
        $id_gsbdd = $request->query->get('gsbdd');

        $saisiesTaux = $em->getRepository(SaisieTaux::class)->findBy([
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter le filtre pour id_gsbdd
            'type' => 'taux opex isolesym'
        ]);
        return $this->render('/index/saisie_taux/manage_saisie_taux_opex_isole.html.twig', [
            'gsbdds' => $gsbdds,
            'saisiesTaux' => $saisiesTaux,
            'id_user' => $idUser,
            'periode' => $periode,
            'id_gsbdd' => $id_gsbdd, // Ajouter cette ligne
        ]);
    }

    #[Route('/saisie_taux/new', name: 'app_saisie_taux_new', methods: ['POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Créer une nouvelle instance de SaisieTaux
        $saisieTaux = new SaisieTaux();

        $idArmee = $request->request->getInt('id_armee');
        $armee = $entityManager->getRepository(Armee::class)->find($idArmee);
        $saisieTaux->setArmee($armee);

        // Remplir les champs avec les données de la requête
        $saisieTaux->setType($request->request->get('type', 'taux école'));
        $saisieTaux->setIdUserAcess($request->request->getInt('id_user_acess', 1));
        $saisieTaux->setDateEdit(new \DateTime());

        // Récupérer les autres champs facultatifs
        $saisieTaux->setSession($request->request->getInt('session'));
        $saisieTaux->setPeriode($request->request->get('periode'));
        $saisieTaux->setEffectifPrev($request->request->getInt('effectif_prev'));
        $saisieTaux->setEffectifInc($request->request->getInt('effectif_inc'));
        $saisieTaux->setEffectifEquip($request->request->getInt('effectif_equip'));
        $saisieTaux->setCommentaire($request->request->get('commentaire'));
        $saisieTaux->setNonConcerne($request->request->getInt('non_concerne'));
        $saisieTaux->SetIdgsbdd($request->request->getInt('id_gsbdd'));
        // Enregistrement de l'entité dans la base de données
        $entityManager->persist($saisieTaux);
        $entityManager->flush();

        // Retourner une réponse JSON de succès
        return new JsonResponse([
            'message' => 'SaisieTaux enregistré avec succès !',
            'data' => [
                'id' => $saisieTaux->getId(),
                'type' => $saisieTaux->getType(),
                'id_user_acess' => $saisieTaux->getIdUserAcess(),
                'date_edit' => $saisieTaux->getDateEdit()->format('Y-m-d H:i:s')
            ]
        ], Response::HTTP_CREATED);
    }

    #[Route('/saisie_taux/new_non_concerne', name: 'app_saisie_taux_new_non_concerne', methods: ['POST'])]
    public function new_non_concerne(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Créer une nouvelle instance de SaisieTaux
        $saisieTaux = new SaisieTaux();
        $saisieTaux->SetIdArmee(null);
        // Remplir les champs avec les données de la requête
        $saisieTaux->setType($request->request->get('type', 'taux école'));
        $saisieTaux->setIdUserAcess($request->request->getInt('id_user_acess'));
        $saisieTaux->setDateEdit(new \DateTime());

        // Récupérer les autres champs facultatifs
        $saisieTaux->setSession(null);
        $saisieTaux->setPeriode($request->request->get('periode'));
        $saisieTaux->setEffectifPrev(null);
        $saisieTaux->setEffectifInc(null);
        $saisieTaux->setEffectifEquip(null);
        $saisieTaux->setCommentaire(null);
        $saisieTaux->setNonConcerne(0);
        $saisieTaux->SetIdgsbdd($request->request->getInt('id_gsbdd'));
        // Enregistrement de l'entité dans la base de données
        $entityManager->persist($saisieTaux);
        $entityManager->flush();

        // Retourner une réponse JSON de succès
        return new JsonResponse([
            'message' => 'SaisieTaux enregistré avec succès !',
            'data' => [
                'id' => $saisieTaux->getId(),
                'type' => $saisieTaux->getType(),
                'id_user_acess' => $saisieTaux->getIdUserAcess(),
                'date_edit' => $saisieTaux->getDateEdit()->format('Y-m-d H:i:s')
            ]
        ], Response::HTTP_CREATED);
    }

    #[Route('/get-id-user-session', name: 'get_id_user_session', methods: ['POST'])]
    public function getIdUserSession(Request $request, EntityManagerInterface $em): JsonResponse
    {
        // Get data from POST request
        $data = json_decode($request->getContent(), true);
        $idUser = $data['id_user'] ?? null;
        $idGsbdd = $data['id_gsbdd'] ?? null;

        // Check if both parameters are provided
        if (!$idUser || !$idGsbdd) {
            return new JsonResponse(['message' => 'id_user or id_gsbdd is missing.'], 400);
        }

        // Find the UserAccess record using id_user and id_gsbdd
        $userAccess = $em->getRepository(UserAcess::class)->findOneBy([
            'id_user' => $idUser,
            'id_gsbdd' => $idGsbdd,
        ]);

        if (!$userAccess) {
            return new JsonResponse(['message' => 'User session not found.'], 404);
        }

        // Return the id_user_access
        return new JsonResponse(['id_user_access' => $userAccess->getIdUserAcess()]); // Correct method to get ID
    }

    #[Route('/update-saisie-taux-ecole', name: 'update_saisie', methods: ['POST'])]
    public function updateSaisie(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $saisieId = $data['saisie_id'];
        $id_armee = $data['id_armee'];
        $session = $data['session'];
        $effectifPrev = $data['effectif_prev'];
        $effectifInc = $data['effectif_inc'];
        $effectifEquip = $data['effectif_equip'];
        $commentaire = $data['commentaire'];

        // Find the record by ID
        $saisie = $entityManager->getRepository(SaisieTaux::class)->find($saisieId);

        if (!$saisie) {
            return new JsonResponse(['success' => false, 'message' => 'Enregistrement non trouvé']);
        }

        // Update the fields
        $saisie->setIdArmee($id_armee);

        $saisie->setSession($session);
        $saisie->setEffectifPrev($effectifPrev);
        $saisie->setEffectifInc($effectifInc);
        $saisie->setEffectifEquip($effectifEquip);
        $saisie->setCommentaire($commentaire);
        // Save the changes
        $entityManager->persist($saisie);
        $entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Enregistrement mis à jour avec succès']);
    }
    #[Route('/update-saisie', name: 'update_saisie', methods: ['POST'])]
    public function updateSaisie2(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $saisieId = $data['saisie_id'];
        $id_armee = $data['id_armee'];
        $effectifPrev = $data['effectif_prev'];
        $effectifInc = $data['effectif_inc'];
        $effectifEquip = $data['effectif_equip'];
        $commentaire = $data['commentaire'];

        // Find the record by ID
        $saisie = $entityManager->getRepository(SaisieTaux::class)->find($saisieId);

        if (!$saisie) {
            return new JsonResponse(['success' => false, 'message' => 'Enregistrement non trouvé']);
        }

        // Update the fields
        $saisie->setIdArmee($id_armee);

        $saisie->setEffectifPrev($effectifPrev);
        $saisie->setEffectifInc($effectifInc);
        $saisie->setEffectifEquip($effectifEquip);
        $saisie->setCommentaire($commentaire);
        // Save the changes
        $entityManager->persist($saisie);
        $entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Enregistrement mis à jour avec succès']);
    }
    #[Route('/get-saisie/{id}', name: 'get_saisie', methods: ['GET'])]
    public function getSaisie($id, EntityManagerInterface $entityManager): JsonResponse
    {
        $saisie = $entityManager->getRepository(SaisieTaux::class)->find($id);

        if (!$saisie) {
            return new JsonResponse(['success' => false, 'message' => 'Enregistrement non trouvé']);
        }

        return new JsonResponse([
            'success' => true,
            'saisie' => [
                'id_armee' => $saisie->getIdArmee(),
                'session' => $saisie->getSession(),
                'effectif_prev' => $saisie->getEffectifPrev(),
                'effectif_inc' => $saisie->getEffectifInc(),
                'effectif_equip' => $saisie->getEffectifEquip(),
                'commentaire' => $saisie->getCommentaire()
            ]
        ]);
    }
    #[Route('/delete-saisie/{id}', name: 'delete_saisie', methods: ['DELETE'])]
    public function deleteSaisie($id, EntityManagerInterface $entityManager): JsonResponse
    {
        $saisie = $entityManager->getRepository(SaisieTaux::class)->find($id);

        if (!$saisie) {
            return new JsonResponse(['success' => false, 'message' => 'Enregistrement non trouvé']);
        }

        $entityManager->remove($saisie);
        $entityManager->flush();

        return new JsonResponse(['success' => true]);
    }

    #[Route('/article/manquant2', name: 'get_articles_manquants', methods: ['GET'])]
    public function get_articles_manquants2(EntityManagerInterface $entityManager): JsonResponse
    {
        // Get the request parameter 'id_saisie'
        $idSaisie = "24"; //a changer

        if (!$idSaisie) {
            return new JsonResponse(['success' => false, 'message' => 'ID saisie non spécifié'], 400);
        }

        // Fetch missing articles for the given `id_saisie`
        $article_manquant = $entityManager->getRepository(ArticleManquant::class)->findBy([
            'saisie' => $idSaisie,
        ]);

        // Format the response
        $response = [];
        foreach ($article_manquant as $article) {
            $response[] = [
                'id' => $article->getId(),
                'nom_Article' => $article->getNomArticle(),
                'nb' => $article->getNbManquant(),
            ];
        }

        return new JsonResponse(['success' => true, 'articles' => $response]);
    }

    #[Route('/article/manquant_list', name: 'get_articles_manquants', methods: ['GET'])]
    public function get_articles_manquants(Request $request,EntityManagerInterface $entityManager): JsonResponse
    {
        $idSaisie = $request->query->get('id_saisie');


        if (!$idSaisie) {
            return new JsonResponse(['success' => false, 'message' => 'ID saisie non spécifié'], 400);
        }

        $article_manquant = $entityManager->getRepository(ArticleManquant::class)->findBy([
            'id_saisie' => $idSaisie,
        ]);

        $response = [];
        foreach ($article_manquant as $article) {
            $response[] = [
                'id' => $article->getId(),
                'nomArticle' => $article->getNomArticle(),
                'nb' => $article->getNb(),
            ];
        }

        return new JsonResponse(['success' => true, 'articles' => $response]);
    }

}


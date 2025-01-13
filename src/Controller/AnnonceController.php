<?php

namespace App\Controller;

use App\Entity\Annonce;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\AnnonceRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AnnonceController extends AbstractController
{
    #[Route('/annonce/manage', name: 'annonce_manage')]
    public function index(AnnonceRepository $annonceRepository): Response
    {
        // Récupère toutes les annonces à partir du repository
        $annonces = $annonceRepository->findAll();

        // Affiche la liste dans la vue Twig
        return $this->render('admin/annonce/manage_annonce.html.twig', [
            'annonces' => $annonces,
        ]);
    }
    #[Route('/annonce/details/{id}', name: 'annonce_details')]
    public function getAnnonceDetails(int $id, AnnonceRepository $annonceRepository): JsonResponse
    {
        $annonce = $annonceRepository->find($id);

        if (!$annonce) {
            return new JsonResponse(['error' => 'Annonce not found'], 404);
        }

        return new JsonResponse([
            'title_annonce' => $annonce->getTitleAnnonce(),
            'subtitle_annonce' => $annonce->getSubtitleAnnonce(),
            'text_annonce' => $annonce->getTextAnnonce(),
        ]);
    }
    #[Route('/annonce/add', name: 'add_annonce', methods: ['POST'])]
    public function addAnnonce(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer les données JSON envoyées par le client
        $data = json_decode($request->getContent(), true);

        // Vérifier si les données sont valides
        if (!isset($data['title_annonce'], $data['subtitle_annonce'], $data['text_annonce'])) {
            return new JsonResponse(['error' => 'Données manquantes'], 400);
        }

        // Créer une nouvelle instance de l'entité Annonce
        $annonce = new Annonce();
        $annonce->setTitleAnnonce($data['title_annonce']);
        $annonce->setSubtitleAnnonce($data['subtitle_annonce']);
        $annonce->setTextAnnonce($data['text_annonce']);
        $annonce->setDateAnnonce(new \DateTime()); // Vous pouvez définir la date d'ajout ici

        // Persister l'entité dans la base de données
        $entityManager->persist($annonce);
        $entityManager->flush();

        // Retourner une réponse JSON indiquant le succès
        return new JsonResponse(['message' => 'Annonce ajoutée avec succès'], 201);
    }
    #[Route('/annonce/delete/{id}', name: 'delete_annonce', methods: ['DELETE'])]
    public function deleteAnnonce(int $id, EntityManagerInterface $entityManager, AnnonceRepository $annonceRepository): JsonResponse
    {
        $annonce = $annonceRepository->find($id);

        if (!$annonce) {
            return new JsonResponse(['error' => 'Annonce non trouvée'], 404);
        }

        $entityManager->remove($annonce);
        $entityManager->flush();

        return new JsonResponse(['message' => 'Annonce supprimée avec succès'], 200);
    }
    #[Route('/annonce/edit/{id}', name: 'edit_annonce', methods: ['PUT'])]
    public function editAnnonce(int $id, Request $request, EntityManagerInterface $entityManager, AnnonceRepository $annonceRepository): JsonResponse
    {
        $annonce = $annonceRepository->find($id);

        if (!$annonce) {
            return new JsonResponse(['error' => 'Annonce non trouvée'], 404);
        }

        $data = json_decode($request->getContent(), true);
        $annonce->setTitleAnnonce($data['title_annonce']);
        $annonce->setSubtitleAnnonce($data['subtitle_annonce']);
        $annonce->setTextAnnonce($data['text_annonce']);

        $entityManager->flush();

        return new JsonResponse(['message' => 'Annonce modifiée avec succès'], 200);
    }
    // src/Controller/AnnonceController.php

    /*#[Route('/home_page', name: 'annonce_list')]
    public function list(AnnonceRepository $annonceRepository): Response
    {
        // Récupérer toutes les annonces
        $annonces = $annonceRepository->findAll();

        // Transmettre les annonces à la vue Twig
        return $this->render('index\home_page.html.twig', [
            'annonces' => $annonces,
        ]);
    }*/

}

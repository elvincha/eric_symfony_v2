<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Article; // Entité Article si nécessaire
use App\Repository\ArticleRepository; // Pour effectuer des recherches dans la base de données
use App\Repository\SaisieTauxRepository;
use Symfony\Component\HttpFoundation\JsonResponse; // Pour retourner une réponse JSON pour AJAX
use Symfony\Component\HttpFoundation\Request; // Pour gérer les requêtes HTTP (GET/POST)
use App\Entity\ArticleManquant;
use Doctrine\ORM\EntityManagerInterface;

class ArticleManquantController extends AbstractController
{
    #[Route('/article/manquant', name: 'app_article_manquant')]
    public function index(Request $request): Response
    {
        $idSaisie = $request->query->get('id_saisie');
        return $this->render('index/saisie_taux/article_manquant.html.twig', [
            'controller_name' => 'ArticleManquantController',
            'id_saisie' => $idSaisie,
        ]);
    }
    #[Route('/article/recherche', name: 'article_recherche', methods: ['GET'])]
    public function recherche(Request $request, ArticleRepository $articleRepository): JsonResponse
    {
        $query = $request->query->get('q', '');

        // Rechercher sur rag_article, rad_article et nom_article
        $articles = $articleRepository->createQueryBuilder('a')
            ->where('a.rag_article LIKE :query')  // Recherche sur rag_article
            ->orWhere('a.rad_article LIKE :query')  // Recherche sur rad_article
            ->orWhere('a.nom_article LIKE :query')  // Recherche sur nom_article
            ->setParameter('query', '%' . $query . '%')  // Applique le paramètre à chaque condition
            ->getQuery()
            ->getResult();

        // Transforme les articles en tableau JSON
        $results = array_map(function($article) {
            return [
                'rag_article' => $article->getRagArticle(),
                'nom_article' => $article->getNomArticle(),
                'rad_article' => $article->getRadArticle(),
            ];
        }, $articles);

        return new JsonResponse($results);
    }


    #[Route('/article/manquant/ajouter', name: 'article_manquant_ajouter', methods: ['POST'])]
    public function ajouter(Request $request, EntityManagerInterface $entityManager, SaisieTauxRepository $saisieRepository, ArticleRepository $articleRepository): JsonResponse
    {
        try {
            $data = json_decode($request->getContent(), true);

            $idSaisie = $data['id_saisie'] ?? null;
            $ragArticle = $data['rag_article'] ?? null;
            $nbArticle = $data['nb_article'] ?? null;
            $nom_article = $data['nom_article']?? null;

            if (!$idSaisie || !$ragArticle || !$nbArticle || !$nom_article) {
                return new JsonResponse(['error' => 'Données manquantes.'], 400);
            }

            // Vérifie que la saisie existe
            $saisie = $saisieRepository->find($idSaisie);
            if (!$saisie) {
                return new JsonResponse(['error' => 'Saisie introuvable.'], 404);
            }

            // Vérifie que l'article existe
            $article = $articleRepository->findOneBy(['rag_article' => $ragArticle]);
            if (!$article) {
                return new JsonResponse(['error' => 'Article introuvable.'], 404);
            }

            // Création d'un nouvel article manquant
            $articleManquant = new ArticleManquant();
            $articleManquant->setIdSaisie($idSaisie);  // Utilise directement l'id_saisie
            $articleManquant->setRag($ragArticle);
            $articleManquant->setNb($nbArticle);
            $articleManquant->setNomArticle($nom_article);
            // Persiste et enregistre dans la base de données
            $entityManager->persist($articleManquant);
            $entityManager->flush();

            return new JsonResponse(['message' => 'Article manquant ajouté avec succès.']);
        } catch (\Exception $e) {
            return new JsonResponse(['error' => 'Erreur serveur : ' . $e->getMessage()], 500);
        }
    }

    #[Route('/article/manquant/supprimer',name: 'article_manquant_supprimer', methods: ['DELETE'])]
    public function deleteArticleManquant(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupère l'id de l'article depuis la requête
        $articleId = $request->query->get('id');

        if (!$articleId) {
            return new JsonResponse(['success' => false, 'message' => 'ID de l\'article non spécifié'], 400);
        }

        // Recherche l'article manquant dans la base de données
        $articleManquant = $entityManager->getRepository(ArticleManquant::class)->find($articleId);

        if (!$articleManquant) {
            return new JsonResponse(['success' => false, 'message' => 'Article manquant non trouvé'], 404);
        }

        // Supprimer l'article de la base de données
        $entityManager->remove($articleManquant);
        $entityManager->flush();

        return new JsonResponse(['success' => true, 'message' => 'Article manquant supprimé avec succès']);
    }




}

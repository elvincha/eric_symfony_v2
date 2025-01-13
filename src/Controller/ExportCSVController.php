<?php

namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SaisieTauxRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\SaisieTaux;
use Doctrine\ORM\EntityManagerInterface;

class ExportCSVController extends AbstractController
{
    #[Route('/export/csv', name: 'app_export_csv')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $saisieRepository = $entityManager->getRepository(SaisieTaux::class);
        $saisies = $saisieRepository->findAll();

        return $this->render('admin/Export_csv/Export_csv.html.twig', [
            'saisies_taux' => $saisies,
        ]);
    }

    #[Route('/export/csv/filter', name: 'app_export_csv_filter', methods: ['GET'])]
    public function filter(Request $request, EntityManagerInterface $entityManager): Response
    {
        $type = $request->query->get('type');

        // Logique pour récupérer les saisies par type
        $saisieRepository = $entityManager->getRepository(SaisieTaux::class);
        $saisies = $saisieRepository->findBy(['type' => $type]);

        // Générer le tableau HTML
        return $this->render('admin/Export_csv/Export_csv.html.twig', [
            'saisies_taux' => $saisies,
        ]);

    }

    #[Route('/export/csv/filterByDate', name: 'filter_by_date')]
    public function filterByDate(Request $request, EntityManagerInterface $entityManager): Response
    {
        $startDate = $request->query->get('start'); // Format attendu : yyyy-mm
        $endDate = $request->query->get('end');     // Format attendu : yyyy-mm
        $type = $request->query->get('type');       // Type de taux sélectionné

        // Valider les dates
        if (!$startDate || !$endDate || !preg_match('/^\d{4}-\d{2}$/', $startDate) || !preg_match('/^\d{4}-\d{2}$/', $endDate)) {
            return $this->render('admin/Export_csv/Export_csv.html.twig', [
                'error' => 'Veuillez fournir une plage de dates valide au format yyyy-mm.',
                'saisies_taux' => [],
            ]);
        }

        // Préparer la requête avec les filtres par date et type
        $queryBuilder = $entityManager->getRepository(SaisieTaux::class)->createQueryBuilder('s')
            ->where('s.periode >= :start')
            ->andWhere('s.periode <= :end')
            ->setParameter('start', $startDate)
            ->setParameter('end', $endDate);

        // Ajouter le filtre par type si présent
        if ($type != "default") {
            $queryBuilder->andWhere('s.type = :type')
                ->setParameter('type', $type);
        }

        // Exécuter la requête et récupérer les résultats
        $saisies = $queryBuilder->getQuery()->getResult();

        // Rendre le tableau HTML
        return $this->render('admin/Export_csv/Export_csv.html.twig', [
            'saisies_taux' => $saisies,
        ]);
    }

}

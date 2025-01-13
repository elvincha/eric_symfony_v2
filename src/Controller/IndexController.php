<?php
// src/Controller/IndexController.php
namespace App\Controller;

use App\Entity\User;
use App\Repository\AnnonceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;


class IndexController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/', name: 'login')]
    public function index(): Response
    {
        return $this->render('index/login.html.twig');
    }
    #[Route('/admin', name: 'admin_home', methods: ['GET'])]

    public function admin_home(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
    #[Route('/home_page', name: 'index')]
    public function user_home(SessionInterface $session,AnnonceRepository $annonceRepository): Response
    {
        // Récupérer toutes les annonces
        $annonces = $annonceRepository->findAll();
        $idUser = $session->get('id_user');

        // Transmettre les annonces à la vue Twig
        return $this->render('index\home_page.html.twig', [
            'annonces' => $annonces,
            'id_user' => $idUser,
        ]);
    }


// Controller method for login
    #[Route('/login', name: 'app_login')]
    public function login(Request $request, SessionInterface $session): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $userSession = $data['user_session'] ?? null;

        if (!$userSession) {
            return new JsonResponse(['message' => 'User session is missing.'], 400);
        }

        $user = $this->entityManager->getRepository(User::class)->findOneBy(['user_session' => $userSession]);

        if (!$user) {
            return new JsonResponse(['message' => 'User not found for this session.'], 404);
        }

        // Store id_user in session
        $session->set('id_user', $user->getId());

        return new JsonResponse([
            'message' => 'Login successful!',
            'redirect' => $this->generateUrl('index')
        ]);
    }




}

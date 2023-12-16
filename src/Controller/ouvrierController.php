<?php

// Exemple avec le contrôleur AgriculteurController

namespace App\Controller;

use App\Entity\Activite;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ouvrierController extends AbstractController
{
    #[Route('/ouvrier', name: 'app_ouvrier_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $entityManager->getRepository(Activite::class)->createQueryBuilder('a')->getQuery();

        $activites = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10
        );

        return $this->render('ouvrier/dashboard.html.twig', [
            'activites' => $activites,
        ]);
    }

    public function autrePage(): Response
    {
        $user = $this->getUser();

        return $this->render('base.html.twig', [
            'user' => $user,
        ]);
    }
}

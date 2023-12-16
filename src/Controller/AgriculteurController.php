<?php

// Exemple avec le contrôleur AgriculteurController

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgriculteurController extends AbstractController
{
    #[Route('/agriculteur/dashboard', name: 'agriculteur_dashboard')]
    public function dashboard(): Response
    {
        $user = $this->getUser();

        return $this->render('agriculteur/dashboard.html.twig', [
            'user' => $user,
            // Ajoutez d'autres informations spécifiques à l'agriculteur si nécessaire
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

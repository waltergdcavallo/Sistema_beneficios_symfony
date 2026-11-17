<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BeneficioController extends AbstractController
{
    #[Route('/beneficio', name: 'app_beneficio')]
    public function index(): Response
    {
        return $this->render('beneficio/index.html.twig', [
            'controller_name' => 'BeneficioController',
        ]);
    }
}

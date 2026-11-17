<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class VentaController extends AbstractController
{
    #[Route('/venta', name: 'app_venta')]
    public function index(): Response
    {
        return $this->render('venta/index.html.twig', [
            'controller_name' => 'VentaController',
        ]);
    }
}

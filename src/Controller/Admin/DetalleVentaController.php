<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminDetalleVentaController extends AbstractBaseController
{
    #[Route('/detalle/venta', name: 'app_detalle_venta')]
    public function index(): Response
    {
        return $this->render('detalle_venta/index.html.twig', [
            'controller_name' => 'DetalleVentaController',
        ]);
    }
}

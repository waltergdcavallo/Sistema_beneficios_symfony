<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminProductoController extends AbstractBaseController
{
    #[Route('/producto', name: 'app_producto')]
    public function index(): Response
    {
        return $this->render('producto/index.html.twig', [
            'controller_name' => 'ProductoController',
        ]);
    }
}

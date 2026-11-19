<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Controller\AbstractBaseController;

final class ProductoController extends AbstractController
{
    #[Route('/producto', name: 'app_producto')]
    public function index(): Response
    {
        return $this->render('producto/lista.html.twig', [
            'controller_name' => 'ProductoController',
        ]);
    }
}

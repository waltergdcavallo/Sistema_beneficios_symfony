<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\FrameworkBundle\Controller\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Controller\AbstractBaseController;

final class BeneficioController extends AbstractController
{
    #[Route('/beneficio/lista', name: 'app_beneficio')]
    public function lista(
        EntityManagerInterface $e,
    ): Response
    {
        $beneficios=$this->$e->findBy('nombreyapellido');

        return $this->render('beneficio/lista.html.twig', [
            'controller_name' => 'BeneficioController',
            $beneficios => 'Beneficios',
        ]);
    }
}

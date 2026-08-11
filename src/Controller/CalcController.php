<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CalcController extends AbstractController
{
    #[Route('/', name: 'app_calc')]
    public function index(): Response
    {
        return $this->render('calc/index.html.twig', [
            'controller_name' => 'CalcController',
        ]);
    }
}

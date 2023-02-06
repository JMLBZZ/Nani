<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontInfosController extends AbstractController
{
    #[Route('/infos', name: 'app_front_infos')]
    public function index(): Response
    {
        return $this->render('front_infos/index.html.twig', [
            'controller_name' => 'FrontInfosController',
        ]);
    }
}

<?php

namespace App\Controller;

use App\Repository\CgvRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontCgvController extends AbstractController
{
    #[Route('/cgv', name: 'app_front_cgv')]
    public function index(CgvRepository $cgvRepository): Response
    {
        $content = $cgvRepository->findOneBy(["isActive" => true]);
        return $this->render('front_cgv/index.html.twig', [
            'content' => $content,
        ]);
    }
}

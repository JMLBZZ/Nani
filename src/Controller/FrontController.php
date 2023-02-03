<?php

namespace App\Controller;

use App\Repository\CardRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController
{
    // #[Route('/front', name: 'app_front')]
    public function cardinfo(CardRepository $cardRepository): Response
    {
        $cardinfo = $cardRepository -> findBy(["tag" => "info"]);
        
        return $this->render('front/cardinfo.html.twig', [
            'cardinfo' => $cardinfo,
        ]);
    }
}

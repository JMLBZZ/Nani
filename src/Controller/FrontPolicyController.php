<?php

namespace App\Controller;

use App\Repository\PolicyRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontPolicyController extends AbstractController
{
    #[Route('/front/policy', name: 'app_front_policy')]
    public function index(PolicyRepository $policyRepository): Response
    {
        $content = $policyRepository->findOneBy(["isActive" => true]);

        //$content = $policyRepository->findOneBy(["isActive" => true]);
        return $this->render('front_policy/index.html.twig', [
            'content' => $content,
        ]);
    }
}

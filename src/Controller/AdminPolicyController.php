<?php

namespace App\Controller;

use App\Entity\Policy;
use App\Form\PolicyType;
use App\Repository\PolicyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/policy')]
class AdminPolicyController extends AbstractController
{
    #[Route('/', name: 'app_admin_policy_index', methods: ['GET'])]
    public function index(PolicyRepository $policyRepository): Response
    {
        return $this->render('admin_policy/index.html.twig', [
            'policies' => $policyRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_policy_new', methods: ['GET', 'POST'])]
    public function new(Request $request, PolicyRepository $policyRepository): Response
    {
        $policy = new Policy();
        $form = $this->createForm(PolicyType::class, $policy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $policyRepository->save($policy, true);

            return $this->redirectToRoute('app_admin_policy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_policy/new.html.twig', [
            'policy' => $policy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_policy_show', methods: ['GET'])]
    public function show(Policy $policy): Response
    {
        return $this->render('admin_policy/show.html.twig', [
            'policy' => $policy,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_policy_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Policy $policy, PolicyRepository $policyRepository): Response
    {
        $form = $this->createForm(PolicyType::class, $policy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $policyRepository->save($policy, true);

            return $this->redirectToRoute('app_admin_policy_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_policy/edit.html.twig', [
            'policy' => $policy,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_policy_delete', methods: ['POST'])]
    public function delete(Request $request, Policy $policy, PolicyRepository $policyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$policy->getId(), $request->request->get('_token'))) {
            $policyRepository->remove($policy, true);
        }

        return $this->redirectToRoute('app_admin_policy_index', [], Response::HTTP_SEE_OTHER);
    }
}

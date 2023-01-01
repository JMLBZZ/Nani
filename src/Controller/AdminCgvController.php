<?php

namespace App\Controller;

use App\Entity\Cgv;
use App\Form\CgvType;
use App\Repository\CgvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/admin/cgv')]
class AdminCgvController extends AbstractController
{
    #[Route('/', name: 'app_admin_cgv_index', methods: ['GET'])]
    public function index(CgvRepository $cgvRepository): Response
    {
        return $this->render('admin_cgv/index.html.twig', [
            'cgvs' => $cgvRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_admin_cgv_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CgvRepository $cgvRepository): Response
    {
        $cgv = new Cgv();
        $form = $this->createForm(CgvType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cgvRepository->save($cgv, true);

            return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cgv/new.html.twig', [
            'cgv' => $cgv,
            'form' => $form,
        ]);
    }

    #[Route('/edit', name: 'app_admin_cgv_edit2', methods: ['GET', 'POST'])]
    public function edit2(Request $request, CgvRepository $cgvRepository): Response
    {
        $cgv = $cgvRepository -> findOneBy(["isActive" => true]);

        $form = $this->createForm(CgvType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cgvRepository->save($cgv, true);

            return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cgv/edit.html.twig', [
            'cgv' => $cgv,
            'form' => $form,
        ]);
    }






    
    #[Route('/{id}', name: 'app_admin_cgv_show', methods: ['GET'])]
    public function show(Cgv $cgv): Response
    {
        return $this->render('admin_cgv/show.html.twig', [
            'cgv' => $cgv,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_cgv_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cgv $cgv, CgvRepository $cgvRepository): Response
    {
        $form = $this->createForm(CgvType::class, $cgv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cgvRepository->save($cgv, true);

            return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_cgv/edit.html.twig', [
            'cgv' => $cgv,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_cgv_delete', methods: ['POST'])]
    public function delete(Request $request, Cgv $cgv, CgvRepository $cgvRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cgv->getId(), $request->request->get('_token'))) {
            $cgvRepository->remove($cgv, true);
        }

        return $this->redirectToRoute('app_admin_cgv_index', [], Response::HTTP_SEE_OTHER);
    }
}

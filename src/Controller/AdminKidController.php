<?php

namespace App\Controller;

use App\Entity\Kid;
use App\Form\KidType;
use App\Repository\KidRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/kid')]
class AdminKidController extends AbstractController
{
    #[Route('/', name: 'app_admin_kid_index', methods: ['GET'])]
    public function index(KidRepository $kidRepository, PaginatorInterface $paginator, Request $request): Response
    {
        $query = $kidRepository->findBy([], ["name"=>"ASC"]);

        usort($query, function ($item1, $item2) {
            return $item1->getName() <=> $item2->getName();
        });
        
        $kids = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );

        return $this->render('admin_kid/index.html.twig', [
            'kids' => $kids,
        ]);
    }

    #[Route('/new', name: 'app_admin_kid_new', methods: ['GET', 'POST'])]
    public function new(Request $request, KidRepository $kidRepository): Response
    {
        $kid = new Kid();
        $form = $this->createForm(KidType::class, $kid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kidRepository->save($kid, true);

            return $this->redirectToRoute('app_admin_kid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_kid/new.html.twig', [
            'kid' => $kid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_kid_show', methods: ['GET'])]
    public function show(Kid $kid): Response
    {
        return $this->render('admin_kid/show.html.twig', [
            'kid' => $kid,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_kid_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Kid $kid, KidRepository $kidRepository): Response
    {
        $form = $this->createForm(KidType::class, $kid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $kidRepository->save($kid, true);

            return $this->redirectToRoute('app_admin_kid_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_kid/edit.html.twig', [
            'kid' => $kid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_kid_delete', methods: ['POST'])]
    public function delete(Request $request, Kid $kid, KidRepository $kidRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$kid->getId(), $request->request->get('_token'))) {
            $kidRepository->remove($kid, true);
        }

        return $this->redirectToRoute('app_admin_kid_index', [], Response::HTTP_SEE_OTHER);
    }
}

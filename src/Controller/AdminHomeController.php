<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/home')]
class AdminHomeController extends AbstractController
{
    #[Route('/', name: 'app_admin_home_index', methods: ['GET', 'POST'])]
    public function index(HomeRepository $homeRepository, PaginatorInterface $paginator, Request $request): Response
    {
        if (!is_null($request->request->get("search"))){
            $query = $homeRepository->search($request->request->get("search"));
        }else{
            $query = $homeRepository->findBy([], ["title"=>"ASC"]);
        }

        $homes = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );

        return $this->render('admin_home/index.html.twig', [
            'homes' => $homes,
        ]);
    }

    #[Route('/new', name: 'app_admin_home_new', methods: ['GET', 'POST'])]
    public function new(Request $request, HomeRepository $homeRepository): Response
    {
        $home = new Home();
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $homeRepository->save($home, true);

            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_home/new.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_show', methods: ['GET'])]
    public function show(Home $home): Response
    {
        return $this->render('admin_home/show.html.twig', [
            'home' => $home,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_home_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Home $home, HomeRepository $homeRepository): Response
    {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $homeRepository->save($home, true);

            return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_home/edit.html.twig', [
            'home' => $home,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_home_delete', methods: ['POST'])]
    public function delete(Request $request, Home $home, HomeRepository $homeRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$home->getId(), $request->request->get('_token'))) {
            $homeRepository->remove($home, true);
        }

        return $this->redirectToRoute('app_admin_home_index', [], Response::HTTP_SEE_OTHER);
    }
}

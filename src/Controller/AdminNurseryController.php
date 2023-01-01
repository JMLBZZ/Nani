<?php

namespace App\Controller;

use App\Entity\Nursery;
use App\Form\NurseryType;
use App\Repository\NurseryRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin/nursery')]
class AdminNurseryController extends AbstractController
{
    #[Route('/', name: 'app_admin_nursery_index', methods: ['GET', 'POST'])]
    public function index(NurseryRepository $nurseryRepository, PaginatorInterface $paginator, Request $request): Response
    {
        if (!is_null($request->request->get("search"))){
            $search = strtolower($request->request->get("search"));
            $allNurseries = $nurseryRepository->findAll();
            $query=[];
            foreach ($allNurseries as $nursery) {
                if (str_contains(strtolower($nursery->getName()), $search) 
                    || str_contains(strtolower($nursery->getStreet()), $search)
                    || str_contains(strtolower($nursery->getComplement()), $search)
                    || str_contains(strtolower($nursery->getCp()), $search)
                    || str_contains(strtolower($nursery->getCity()), $search)
                    || str_contains(strtolower($nursery->getTel()), $search)
                    || str_contains(strtolower($nursery->getSlug()), $search)
                ){
                    array_push($query, $nursery);
                }
            }
        }else{
            $query = $nurseryRepository->findBy([], ["name"=>"ASC"]);
            usort($query, function ($item1, $item2) {
                return $item1->getName() <=> $item2->getName();
            });
        }

        $nurseries = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );
        return $this->render('admin_nursery/index.html.twig', [
            'nurseries' => $nurseries,
        ]);
    }

    #[Route('/new', name: 'app_admin_nursery_new', methods: ['GET', 'POST'])]
    public function new(Request $request, NurseryRepository $nurseryRepository): Response
    {
        $nursery = new Nursery();
        $form = $this->createForm(NurseryType::class, $nursery);
        $form->handleRequest($request);
        // dd($form->getData());
        if ($form->isSubmitted() && $form->isValid()) {
            //$nursery->setRoles(["ROLE_NURSERY"]);
            $nurseryRepository->save($nursery, true);

            return $this->redirectToRoute('app_admin_nursery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_nursery/new.html.twig', [
            'nursery' => $nursery,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_nursery_show', methods: ['GET'])]
    public function show(Nursery $nursery): Response
    {
        return $this->render('admin_nursery/show.html.twig', [
            'nursery' => $nursery,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_admin_nursery_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Nursery $nursery, NurseryRepository $nurseryRepository): Response
    {
        $form = $this->createForm(NurseryType::class, $nursery, ["imageRequired"=>false]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nurseryRepository->save($nursery, true);

            return $this->redirectToRoute('app_admin_nursery_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin_nursery/edit.html.twig', [
            'nursery' => $nursery,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_admin_nursery_delete', methods: ['POST'])]
    public function delete(Request $request, Nursery $nursery, NurseryRepository $nurseryRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nursery->getId(), $request->request->get('_token'))) {
            $nurseryRepository->remove($nursery, true);
        }

        return $this->redirectToRoute('app_admin_nursery_index', [], Response::HTTP_SEE_OTHER);
    }
}

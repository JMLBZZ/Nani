<?php
#[Route('/', name: 'app_admin_author_index', methods: ['GET', 'POST'])]
    public function index(AuthorRepository $authorRepository, PaginatorInterface $paginator, Request $request): Response
    {
        if (!is_null($request->request->get("search"))){
                $query = $authorRepository->search($request->request->get("search"));
            }else{
                $query = $authorRepository->findBy([], ["id"=>"DESC"]);
            }
        $authors = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 /*limit per page*/
        );

        return $this->render('admin_author/index.html.twig', [
            'authors' => $authors,
        ]);
    }








    // ##################################################################### //
// ############## METHODE ORIGINALE À RÉCUPÉRER AU CAS OÙ ############## //
// ##################################################################### //
public function search($value): array
{
    return $this->createQueryBuilder('u')// "u" est l'allias de table qui correspond à la première lettre de l'entité (user => u)
        ->where("u.name LIKE :val")//je demande les noms qui ressemble à ce qui est recherché
        ->orWhere('u.firstname LIKE :val')
        ->orWhere('u.street LIKE :val')
        ->orWhere('u.complement LIKE :val')
        ->orWhere('u.cp LIKE :val')
        ->orWhere('u.city LIKE :val')
        ->orWhere('u.tel LIKE :val')
        ->orWhere('u.email LIKE :val')
        ->setParameter('val', '%'.$value.'%')//% => peut importe la chaine de caractère (avant et/ou après)
        ->orderBy('u.name', 'ASC')
        // ->setMaxResults(10)
        ->getQuery()
        ->getResult()
    ;
}

// ##################################################################### //
// ######################### FIN DE LA MÉTHODE ######################### //
// ##################################################################### //
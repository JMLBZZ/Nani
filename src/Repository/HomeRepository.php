<?php

namespace App\Repository;

use App\Entity\Home;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Home>
 *
 * @method Home|null find($id, $lockMode = null, $lockVersion = null)
 * @method Home|null findOneBy(array $criteria, array $orderBy = null)
 * @method Home[]    findAll()
 * @method Home[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Home::class);
    }

    public function save(Home $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Home $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function search($value): array
    {
        return $this->createQueryBuilder('h')// "a" est l'allias de table qui correspond à la première lettre de l'entité (home => h)
            ->where("h.title LIKE :val")//je demande les titres qui ressemble à ce qui est recherché
            ->orWhere('h.text LIKE :val')
            ->setParameter('val', '%'.$value.'%')//% => peut importe la chaine de caractère (avant et/ou après)
            ->orderBy('h.title', 'ASC')
            // ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

//    /**
//     * @return Home[] Returns an array of Home objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('h.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Home
//    {
//        return $this->createQueryBuilder('h')
//            ->andWhere('h.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

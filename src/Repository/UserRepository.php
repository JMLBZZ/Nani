<?php

namespace App\Repository;

use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * @extends ServiceEntityRepository<User>
 *
 * @method User|null find($id, $lockMode = null, $lockVersion = null)
 * @method User|null findOneBy(array $criteria, array $orderBy = null)
 * @method User[]    findAll()
 * @method User[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function save(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(User $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(PasswordAuthenticatedUserInterface $user, string $newHashedPassword): void
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newHashedPassword);

        $this->save($user, true);
    }




    public function findUserOnly(): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.roles LIKE :val') // à la propriété "roles" on lui introduit le paramètre "val"
            ->andWhere('u.roles NOT LIKE :val2') // à la propriété "roles" on lui rejète le paramètre "val2"
            ->andWhere('u.roles NOT LIKE :val3') // à la propriété "roles" on lui rejète le paramètre "val3"
            ->setParameter('val', '%ROLE_USER%') // on définit le paramètre "val" qui correspond au role utilisateur
            ->setParameter('val2', '%ROLE_ADMIN%') // on définit le paramètre "val2" qui correspond au role administrateur
            ->setParameter('val3', '%ROLE_NURSERY%') // on définit le paramètre "val2" qui correspond au role "nursery"

            ->orderBy('u.name', 'ASC') // ordre ascendant par Nom
            ->getQuery()
            ->getResult();
    }


// ##################################################################### //
// ############## METHODE ORIGINALE À RÉCUPÉRER AU CAS OÙ ############## //
// ##################################################################### //
    // public function search($value): array
    // {
    //     return $this->createQueryBuilder('u')// "u" est l'allias de table qui correspond à la première lettre de l'entité (user => u)
    //         ->where("u.name LIKE :val")//je demande les noms qui ressemble à ce qui est recherché
    //         ->orWhere('u.firstname LIKE :val')
    //         ->setParameter('val', '%'.$value.'%')//% => peut importe la chaine de caractère (avant et/ou après)
    //         ->orderBy('u.name', 'ASC')
    //         // ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }

// ##################################################################### //
// ######################### FIN DE LA MÉTHODE ######################### //
// ##################################################################### //



//    /**
//     * @return User[] Returns an array of User objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?User
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

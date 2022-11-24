<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture implements FixtureGroupInterface
{
    private $encoder;

    public function __construct(UserPasswordHasherInterface $encoder){
        $this->encoder=$encoder;
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
            $user->setEmail("admin@admin.com");
            $user->setName("admin");
            $user->setRoles(["ROLE_USER", "ROLE_ADMIN"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("nursery@nursery.com");
            $user->setRoles(["ROLE_NURSERY"]);
            $encodePassword = $this->encoder->hashPassword($user, "pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("test1@test.com");
            $user->setName("Dupont");

            $user->setFirstname("Jean");
            $user->setStreet("1 rue de Paris");
            $user->setComplement("1er étage au fond du couloir");
            $user->setCp("75001");
            $user->setCity("Paris");
            $user->setTel("0143223344");
            $user->setslug("dupont-jean");

            $user->setRoles(["ROLE_USER"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("test2@test.com");
            $user->setName("Martin");

            $user->setFirstname("Brigitte");
            $user->setStreet("5 rue de Marseille");
            $user->setComplement("");
            $user->setCp("83041");
            $user->setCity("Aix");
            $user->setTel("0443223344");
            $user->setslug("martin-brigitte");

            $user->setRoles(["ROLE_USER"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("test3@test.com");
            $user->setName("Tibout");

            $user->setFirstname("Abby");
            $user->setStreet("145 avenue de Montreuil");
            $user->setComplement("");
            $user->setCp("93100");
            $user->setCity("Montreuil");
            $user->setTel("0143223355");
            $user->setslug("tibout-abby");

            $user->setRoles(["ROLE_USER"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("test4@test.com");
            $user->setName("Franc");

            $user->setFirstname("Maçon");
            $user->setStreet("1 rue du Louvres");
            $user->setComplement("");
            $user->setCp("75001");
            $user->setCity("Paris");
            $user->setTel("0143223666");
            $user->setslug("franc-maçon");

            $user->setRoles(["ROLE_USER"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("test5@test.com");
            $user->setName("Zu");

            $user->setFirstname("Neisha");
            $user->setStreet("10 rue de Tokyo");
            $user->setComplement("");
            $user->setCp("27110");
            $user->setCity("Évreux");
            $user->setTel("0243223377");
            $user->setslug("zu-neisha");

            $user->setRoles(["ROLE_USER"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $user = new User();
            $user->setEmail("test6@test.com");
            $user->setName("Abitbol");

            $user->setFirstname("Martine");
            $user->setStreet("10 boulevard du Maréchal Bidule");
            $user->setComplement("CEDEX");
            $user->setCp("56034");
            $user->setCity("Vanne");
            $user->setTel("0343223388");
            $user->setslug("abitbol-martine");

            $user->setRoles(["ROLE_USER"]);
            $encodePassword=$this->encoder->hashPassword($user,"pass");
            $user->setPassword($encodePassword);
            $user->setIsVerified(true);
        $manager->persist($user);

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}

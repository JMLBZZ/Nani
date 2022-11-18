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
            $user->setEmail("test@test.com");
            $user->setRoles(["ROLE_USER"]);
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

        $manager->flush();
    }

    public static function getGroups(): array
    {
        return ['group1'];
    }
}

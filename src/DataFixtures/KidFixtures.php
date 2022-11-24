<?php

namespace App\DataFixtures;

use App\Entity\Kid;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class KidFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $kid = new Kid();
            $kid->setName("Toto");
            $kid->setFirstname("Tutu");
        $manager->persist($kid);

        $manager->flush();
    }
}

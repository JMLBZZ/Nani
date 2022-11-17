<?php

namespace App\DataFixtures;

use App\Entity\Home;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class HomeFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $home = new Home();
        $home->setTitle ("bienvenue");
        $home->setText("<p>blablatext</p>");
        $home->setIsActive(true);
        $manager->persist($home);

        $manager->flush();
    }
}

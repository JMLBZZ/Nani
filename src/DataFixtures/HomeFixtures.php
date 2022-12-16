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
        $home->setTitle ("Bienvenue");
        $home->setText("<p>Texte présent en page d'accueil</p>");
        $home->setIsActive(true);
        $manager->persist($home);

        $manager->flush();
    }
}

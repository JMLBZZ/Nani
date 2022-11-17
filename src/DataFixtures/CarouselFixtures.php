<?php

namespace App\DataFixtures;

use App\Entity\Carousel;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarouselFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('creche1.jpg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('creche2.jpg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('creche3.jpg');
        $manager->persist($carousel);

        $carousel = new Carousel();
        $carousel->setTag('home');
        $carousel->setImageName('creche4.jpg');
        $manager->persist($carousel);

        $manager->flush();
    }
}

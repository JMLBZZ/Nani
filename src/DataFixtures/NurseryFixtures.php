<?php

namespace App\DataFixtures;

use App\Entity\Nursery;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

class NurseryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche2.png');
            $nursery->setIsActive(true);
            $nursery->setName("ALes choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche3.png');
            $nursery->setIsActive(true);
            $nursery->setName("MLes choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("Les choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
        $manager->persist($nursery);


        $manager->flush();
    }

}

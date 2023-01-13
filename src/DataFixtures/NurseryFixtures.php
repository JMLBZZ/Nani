<?php

namespace App\DataFixtures;

use App\Entity\Nursery;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class NurseryFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("ZLes choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la République");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER1));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER2));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER3));
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("FLes choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER4));
        $manager->persist($nursery);

        $nursery = new Nursery();
            $nursery->setImageName('creche1.png');
            $nursery->setIsActive(true);
            $nursery->setName("CLes choupinous");
            $nursery->setSlug("les-choupinous");
            $nursery->setSiret("11223344556677");
            $nursery->setStreet("1 Place de la Nation");
            $nursery->setComplement("");
            $nursery->setCp("75011");
            $nursery->setCity("Paris");
            $nursery->setTel("0122334455");
            $nursery->setCapacity("50");
            $nursery->setCapacityresa("8");
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER5));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER6));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER7));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER8));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER9));
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
            $nursery->setUser($this->getReference(UserFixtures::NURSERYUSER10));
        $manager->persist($nursery);


        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UserFixtures::class
        ];
    }

}

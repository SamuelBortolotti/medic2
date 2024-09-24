<?php

namespace App\DataFixtures;

use App\Entity\Praticien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PraticienFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $Praticien = new Praticien();
            $Praticien->setNom('Nom ' . $i);
            $Praticien->setPrenom('Prénom ' . $i);
            $Praticien->setAdresse('Adresse ' . $i);
            $Praticien->setTelephone('Télephone ' . $i);
            $Praticien->setNumeroCabinet($faker->numberBetween(1, 10));
            $Praticien->setSpecialite('Specialité ' . $i);

        }

        $manager->flush();
    }
}

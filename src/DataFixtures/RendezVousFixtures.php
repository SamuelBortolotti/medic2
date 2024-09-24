<?php

namespace App\DataFixtures;

use App\Entity\Praticien;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class RendezVousFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {

            $RendezVous = new RendezVous();
            $RendezVous->setLieu('Lieu ' . $i);
            $RendezVous->setHoraire('Horaire ' . $i);
            $RendezVous->setRaison('Raison ' . $i);
            $RendezVous->setUrgence('Urgence ' . $i);
            $RendezVous->setSpecificite('Specificité ' . $i);
            $RendezVous->setPraticien_id('Nom du praticien ' . $i);

            $manager->flush();
        }
    }
}

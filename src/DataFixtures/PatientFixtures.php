<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Patient;
use Faker\Factory;

class PatientFixtures extends Fixture
{
    public function load(ObjectManager $manager): void

    {
        $faker = Factory::create();
        // $product = new Product();
        // $manager->persist($product);
        for ($i = 0; $i < 20; $i++) {
            $Patient = new Patient;
            $Patient->setNom('Nom ' . $i);
            $Patient->setPrenom('Prenom : ' . $i);
            $Patient->setAge($faker->numberBetween(18, 80));
            $Patient->setGenre('Genre : ' . $i);
            $Patient->setAdresse('Adresse : ' . $i);
            $Patient->setTelephone('Telephone : ' . $i);
            $Patient->setPortable('Portable : ' . $i);
            $Patient->setEmail('Email : ' . $i);
            $Patient->setDateNaissance($faker->dateTimeBetween('-80 years', '-18 years'));
            $Patient->setAntecedentMedicaux('Antecedants médicaux : ' . $i);
            $Patient->setNumeroSecu('Numéro de sécurité sociale : ' . $i);
            $Patient->setMedecinTraitant('Médecin traitant : ' . $i);
            $manager->persist($Patient);
        }


        $manager->flush();
    }
}

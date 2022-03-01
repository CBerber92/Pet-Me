<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\ListeAnimaux;

class AnimauxFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $animal = new ListeAnimaux();
        $animal->setEspece("Chien")
            ->setRace("Bouledogue Français")
            ->setNom("Lucas")
            ->setSex("H")
            ->setLocalisation("Le Mans")
            ->setAge(8)
            ->setCreatedAt(new \DateTimeImmutable())
            ->setDescription("Super toutou agréable et gentil, affectueux");

        $manager->flush();
    }
}

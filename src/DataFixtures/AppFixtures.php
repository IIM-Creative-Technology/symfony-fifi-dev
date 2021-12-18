<?php

namespace App\DataFixtures;

use App\Entity\Mission;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i=0; $i<5; $i++) {
            $mission = new Mission();
            $mission->setName('Mission n°'. $i);
            $mission->setDescription('Blablabla');
            $mission->setPriority('low');
            $mission->setExecuteDate(new \DateTime('now'));
            $mission->setStatus('to-do');
            $manager->persist($mission);
        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}

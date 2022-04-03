<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $date = new \DateTime();
        for($i = 1; $i < 11; $i++) {
            $product = (new Product())
                ->setName(sprintf('product-%d', $i))
                ->setPrice($i)
                ->setCreatedAt(clone $date->modify(sprintf('- %d day', $i)))
            ;
            $manager->persist($product);
        }

        $manager->flush();
    }
}

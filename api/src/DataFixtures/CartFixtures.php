<?php

namespace App\DataFixtures;

use App\Entity\Cart;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class CartFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $products = $manager->getRepository(Product::class)->findAll();


        for ($i=0; $i < 10; $i++) { 
            $cart = (new Cart())
                ->setQuantity($faker->numberBetween(0,10))
                ->setProduct($products[$faker->numberBetween(0,19)]);

            $manager->persist($cart);
        }
        

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductFixtures::class
        ];
    }
}

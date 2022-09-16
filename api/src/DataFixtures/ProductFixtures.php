<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class ProductFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $categories = $manager->getRepository(Category::class)->findAll();

        for ($i=0; $i < 20; $i++) { 
            $product = (new Product)
            ->setName($faker->colorName)
            ->setDescription($faker->paragraph)
            ->setPrice($faker->numberBetween(2,99))
            ->setNutriscore($faker->randomElement(['A','B','C','D','E']))
            ->setStock($faker->numberBetween(0,10));

            $product->addCategory($categories[$faker->numberBetween(0,4)]);

            $manager->persist($product);
        }
        
        $manager->flush();
    }

    
    public function getDependencies()
    {
        return [
            CategoryFixtures::class
        ];
    }
}

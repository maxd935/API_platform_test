<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Order;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OrderFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        $product = (new Order())
            ->setDate(new DateTime($faker->date()))
            ->setTotal($faker->numberBetween(0,100))
            ->setDiscount($faker->numberBetween(0,100));

        $manager->persist($product);

        $manager->flush();
    }
}

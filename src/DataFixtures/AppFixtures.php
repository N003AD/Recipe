<?php

namespace App\DataFixtures;

use Faker\Factory;
use Faker\Generator;
use App\Entity\Ingredient;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
       /**
         * @var Generator
         */
        private Generator $faker;
      
        public function __construct()
        {
            $this->faker = Factory::create('fr_FR');
        }

    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
       
        for ($i=0; $i <= 50 ; $i++) { 
            # code...
            $ingredient = new Ingredient;
            // $ingredient -> setName('Ingredient 1' . $i)
            $ingredient -> setName($this->faker->word())
                        ->setPrice(rand(1,100));
            $manager->persist($ingredient);
            $manager->flush();
        }
    }
}

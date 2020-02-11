<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;
use App\Entity\Resume;

class ResumeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 50; $i++) {
            $resume = new Resume();
            $resume->setFirstName($faker->firstName);
            $resume->setLastName($faker->lastName);
            $resume->setPosition($faker->titleMale);
            $manager->persist($resume);
        }
        $manager->flush();
    }
}

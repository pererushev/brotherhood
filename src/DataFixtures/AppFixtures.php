<?php

namespace App\DataFixtures;

use App\Entity\Developer;
use App\Entity\Project;
use App\Enums\PositionEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $generator = Factory::create("ru_RU");
        $positions = PositionEnum::cases();

        for ($i = 0; $i < 20; $i++) {
            $project = new Project();
            $project->setName($generator->words(asText: true));
            $project->setCustomer($generator->firstName() . ' ' . $generator->lastName());
            $manager->persist($project);
        }

        $manager->flush();

        for ($i = 0; $i < 20; $i++) {
            $developer = new Developer();
            $developer->setName($generator->firstName() . ' ' . $generator->lastName());
            $developer->setEmail($generator->email());
            $developer->setPhone($generator->phoneNumber());
            $developer->setPosition($positions[array_rand($positions)]);
            $manager->persist($developer);
        }

        $manager->flush();
    }
}

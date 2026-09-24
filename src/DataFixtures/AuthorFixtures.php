<?php

namespace App\DataFixtures;

use App\DataFixtures\CountryFixtures;
use App\Entity\Author;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class AuthorFixtures extends Fixture implements DependentFixtureInterface
{

    public const VICTOR_HUGO_AUTHOR_REFERENCE = 'victor-hugo-author';
    public const HERMAN_MELVIL_AUTHOR_REFERENCE = 'hermanmelvin-author';


    public function load(ObjectManager $manager): void
    {
        $victorHugo = new Author();
        $victorHugo->setFirstname("Victor");
        $victorHugo->setName("HUGO");
        $victorHugo->setCountry($this->getReference(CountryFixtures::FR_COUNTRY_REFERENCE, Country::class));
        $manager->persist($victorHugo);

        $hermanMelvin = new Author();
        $hermanMelvin->setFirstname("Herman");
        $hermanMelvin->setName("MELVIN");
        $hermanMelvin->setCountry($this->getReference(CountryFixtures::US_COUNTRY_REFERENCE, Country::class));
        $manager->persist($hermanMelvin);

        $manager->flush();

        $this->addReference(self::VICTOR_HUGO_AUTHOR_REFERENCE, $victorHugo);
        $this->addReference(self::HERMAN_MELVIL_AUTHOR_REFERENCE, $hermanMelvin);
    }

    public function getDependencies(): array
    {
        return [
            CountryFixtures::class,
        ];
    }

}

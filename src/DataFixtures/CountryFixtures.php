<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CountryFixtures extends Fixture
{

    public const FR_COUNTRY_REFERENCE = 'fr-country';
    public const US_COUNTRY_REFERENCE = 'us-country';

    public function load(ObjectManager $manager): void
    {
        $frCountry = new Country();
        $frCountry->setName("France");
        $manager->persist($frCountry);

        $usCountry = new Country();
        $usCountry->setName("United States");
        $manager->persist($usCountry);

        $manager->flush();

        $this->addReference(self::FR_COUNTRY_REFERENCE, $frCountry);
        $this->addReference(self::US_COUNTRY_REFERENCE, $usCountry);
    }
}

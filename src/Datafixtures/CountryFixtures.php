<?php

namespace App\DataFixtures;

use App\Entity\Country;
use App\Repository\CountryRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CountryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default country
         */
        $tabcountry = [];
        $tabcountry = [
            "Suède",
            "Autriche", 
            "France", 
            "Allemagne", 
            "Italie", 
            "Chine", 
            "Finlande", 
            "Estonie", 
            "Norvège", 
            "Russie", 
            "Ukraine", 
            "Slovènie", 
        ];
        
        foreach ($tabcountry as &$value)
        {
            $country = new Country();
            $country->setName($value);
            $manager->persist($country);
            $this->addReference($country->getName(), $country);
        }
        unset($value, $tabcountry, $country);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}

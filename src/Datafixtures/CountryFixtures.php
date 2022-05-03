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
            ["Suède", "assets/images/flag/Sweden.svg.png"],
            ["Autriche", "assets/images/flag/Austria.svg.png"],
            ["France", "assets/images/flag/France.svg.png"],
            ["Allemagne", "assets/images/flag/Germany.svg.png"],
            ["Italie", "assets/images/flag/Italy.svg.png"],
            ["Chine", "assets/images/flag/China.svg.png"],
            ["Finlande", "assets/images/flag/Finland.svg.png"],
            ["Estonie", "assets/images/flag/Estonia.svg.png"],
            ["Norvège", "assets/images/flag/Norway.svg.png"],
            ["Russie", "assets/images/flag/Russia.svg.png"],
            ["Ukraine", "assets/images/flag/Ukraine.svg.png"],
            ["Slovènie", "assets/images/flag/Slovenia.svg.png"],
        ];

        foreach ($tabcountry as list($a, $b)) {
            $country = new Country();
            $country->setName($a);
            $country->setFlag($b);
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

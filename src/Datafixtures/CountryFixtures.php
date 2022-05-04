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
            ["Russie", "assets/images/flag/Russie.svg.png"],
            ["Ukraine", "assets/images/flag/Ukraine.svg.png"],
            ["Slovènie", "assets/images/flag/Slovenia.svg.png"],
            ["Bélarus", "assets/images/flag/Belarus.svg.png"],
            ["Tchéquie", "assets/images/flag/Tchequie.svg.png"],
            ["Slovaquie", "assets/images/flag/Slovaquie.svg.png"],
            ["Belgique", "assets/images/flag/Belgique.svg.png"],
            ["Suisse", "assets/images/flag/Suisse.svg.png"],
            ["Moldavie", "assets/images/flag/Moldavie.svg.png"],
            ["Pologne", "assets/images/flag/Pologne.svg.png"],
            ["Lettonie", "assets/images/flag/Lettonie.svg.png"],
            ["USA", "assets/images/flag/USA.svg.png"],
            ["Bulgarie", "assets/images/flag/Bulgarie.svg.png"],
            ["Japon", "assets/images/flag/Japon.svg.png"],
            ["Canada", "assets/images/flag/Canada.svg.png"],
            ["Kazakhstan", "assets/images/flag/Kazakhstan.svg.png"],
            ["Roumanie", "assets/images/flag/Roumanie.svg.png"],
            ["Corée du Sud", "assets/images/flag/SCoree.svg.png"],
            ["Lituanie", "assets/images/flag/Lituanie.svg.png"],
            ["Grande-Bretagne", "assets/images/flag/Grande-Bretagne.svg.png"],
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

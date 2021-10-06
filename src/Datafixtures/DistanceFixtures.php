<?php

namespace App\DataFixtures;

use App\Entity\Distance;
use App\Repository\DistanceRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class DistanceFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default distance
         */
        $tabdistance = [];
        $tabdistance = [
            "15 Km",
            "20 Km", 
            "7.5 Km", 
            "10 Km",
            "4 X 7.5 Km",
            "4 x 6 Km",
            "12.5 Km",
            "Simple",
        ];
        
        foreach ($tabdistance as &$value)
        {
            $distance = new Distance();
            $distance->setName($value);
            $manager->persist($distance);
            $this->addReference($distance->getName(), $distance);
        }
        unset($value, $tabdistance, $distance);

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}

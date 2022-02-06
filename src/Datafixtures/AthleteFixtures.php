<?php

namespace App\DataFixtures;

use App\Entity\Athlete;
use App\Repository\AthleteRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class AthleteFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $tabathlete = [];
        $tabathlete = [
            ["Matt", "Co", "Homme", "France"],
            ["Franz", "Kuchen", "Homme", "Allemagne"],
            ["Krikri", "Rauf", "Femme", "France"],
            ["Francesca", "Porti", "Femme", "Italie"],
        ];
        
        foreach ($tabathlete as list($firstName, $lastName, $gender, $country)) {
            $athlete = new Athlete();
            $athlete
                ->setFirstName($firstName)
                ->setLastName($lastName)
                ->setGender($this->getReference($gender))
                ->setCountry($this->getReference($country));
            $manager->persist($athlete);
        }
        unset($tabathlete, $firstName, $lastName, $gender, $country, $athlete);

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}

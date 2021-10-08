<?php

namespace App\DataFixtures;

use App\Entity\Competition;
use App\Repository\CompetitionRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class CompetitionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default competition
         */
        $tabcompetition = [];
        $tabcompetition = [
            ["Femme", "15 Km", "Individuel"],
            ["Femme", "7.5 Km", "Sprint"],
            ["Femme", "10 Km", "Poursuite"],
            ["Femme", "4 x 6 Km", "Relais"],
            ["Femme", "12.5 Km", "Mass Start"],
            ["Homme", "20 Km", "Individuel", 4, 5, ],
            ["Homme", "10 Km", "Sprint"],
            ["Homme", "12.5 Km", "Poursuite"],
            ["Homme", "4 X 7.5 Km", "Relais"],
            ["Homme", "15 Km", "Mass Start"],
            ["Mixte", "4 X 7.5 Km", "Relais"],
            ["Mixte", "Simple", "Relais"],
        ];
        $i = 1;
        
        foreach ($tabcompetition as list($gender, $distance, $style)) {
            $competition = new Competition();
            $competition
                ->setGender($this->getReference($gender))
                ->setDistance($this->getReference($distance))
                ->setStyle($this->getReference($style));
            $manager->persist($competition);
            $this->addReference("Competition" . $i, $competition);
            $i++;
        }
        unset($tabcompetition, $competition, $gender, $distance, $style, $i);

        $manager->flush();
    }

    public function getOrder()
    {
        return 6;
    }
}

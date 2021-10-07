<?php

namespace App\DataFixtures;

use App\Entity\StageCompetition;
use App\Repository\StageCompetitionRepository;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;

class StageCompetitionFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        /**
         * Default run
         * 
         * Competition1 :  ["Femme", "15 Km", "Individuel"]
         * Competition2 :  ["Femme", "7.5 Km", "Sprint"]
         * Competition3 :  ["Femme", "10 Km", "Poursuite"]
         * Competition4 :  ["Femme", "4 x 6 Km", "Relais"]
         * Competition5 :  ["Femme", "12.5 Km", "Mass Start"]
         * Competition6 :  ["Homme", "20 Km", "Individuel"]
         * Competition7 :  ["Homme", "10 Km", "Sprint"]
         * Competition8 :  ["Homme", "12.5 Km", "Poursuite"]
         * Competition9 :  ["Homme", "4 X 7.5 Km", "Relais"]
         * Competition10 : ["Homme", "15 Km", "Mass Start"]
         * Competition11 : ["Mixte", "4 X 7.5 Km", "Relais"]
         * Competition12 : ["Mixte", "Simple", "Relais"]
         */

        $tabrun = [];
        $tabrun = [
            ["Oestersund", "Competition1", "21-11-27"],
            ["Oestersund", "Competition6", "21-11-27"],
            ["Oestersund", "Competition2", "21-11-28"],
            ["Oestersund", "Competition7", "21-11-28"],
        ];
        $i = 1;
        
        foreach ($tabrun as list($stage, $competition, $dateRun)) {
            $run = new StageCompetition();
            $run
                ->setStage($this->getReference($stage))
                ->setCompetition($this->getReference($competition))
                ->setDateRun(new \DateTime($dateRun));
            $manager->persist($run);
        }
        unset($tabrun, $stage, $competition, $dateRun, $run);

        $manager->flush();
    }

    public function getOrder()
    {
        return 7;
    }
}

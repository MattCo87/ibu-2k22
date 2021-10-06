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

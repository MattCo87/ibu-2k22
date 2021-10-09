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

            ["Oestersund", "Competition2", "21-12-02"],
            ["Oestersund", "Competition7", "21-12-02"],
            ["Oestersund", "Competition3", "21-12-04"],
            //["Oestersund", "Competition9", "21-12-04"],
            //["Oestersund", "Competition4", "21-12-05"],
            ["Oestersund", "Competition8", "21-12-05"],

            ["Hochfilzen", "Competition7", "21-12-10"],
            ["Hochfilzen", "Competition2", "21-12-10"],
            ["Hochfilzen", "Competition8", "21-12-11"],
            //["Hochfilzen", "Competition4", "21-12-11"],
            //["Hochfilzen", "Competition9", "21-12-12"],
            ["Hochfilzen", "Competition3", "21-12-12"],            

            ["Annecy-Le Grand Bornand", "Competition2", "21-12-16"],
            ["Annecy-Le Grand Bornand", "Competition7", "21-12-17"],
            ["Annecy-Le Grand Bornand", "Competition3", "21-12-18"],
            ["Annecy-Le Grand Bornand", "Competition8", "21-12-18"],
            ["Annecy-Le Grand Bornand", "Competition5", "21-12-19"],
            ["Annecy-Le Grand Bornand", "Competition10", "21-12-19"],  

            ["Oberhof", "Competition7", "22-01-06"],
            ["Oberhof", "Competition2", "22-01-07"],
            //["Oberhof", "Competition11", "22-01-08"],
            //["Oberhof", "Competition12", "22-01-08"],
            ["Oberhof", "Competition8", "22-01-09"],
            ["Oberhof", "Competition3", "22-01-09"],  

            ["Ruhpolding", "Competition2", "22-01-12"],
            ["Ruhpolding", "Competition7", "22-01-13"],
            //["Ruhpolding", "Competition4", "22-01-14"],
            //["Ruhpolding", "Competition9", "22-01-15"],
            ["Ruhpolding", "Competition3", "22-01-16"],
            ["Ruhpolding", "Competition8", "22-01-16"],  

            ["Antholz-Anterselva", "Competition6", "22-01-20"],
            ["Antholz-Anterselva", "Competition1", "22-01-21"],
            ["Antholz-Anterselva", "Competition10", "22-01-22"],
            //["Antholz-Anterselva", "Competition4", "22-01-22"],
            //["Antholz-Anterselva", "Competition9", "22-01-23"],
            ["Antholz-Anterselva", "Competition5", "22-01-23"],  

            //["Kontiolahti", "Competition4", "22-03-03"],
            //["Kontiolahti", "Competition9", "22-03-04"],
            ["Kontiolahti", "Competition2", "22-03-05"],
            ["Kontiolahti", "Competition7", "22-03-05"],
            ["Kontiolahti", "Competition3", "22-03-06"],
            ["Kontiolahti", "Competition8", "22-03-06"], 

            ["Otepaeae", "Competition7", "22-03-10"],
            ["Otepaeae", "Competition2", "22-03-11"],
            ["Otepaeae", "Competition10", "22-03-12"],
            ["Otepaeae", "Competition5", "22-03-12"],
            //["Otepaeae", "Competition11", "22-03-13"],
            //["Otepaeae", "Competition12", "22-03-13"],

            ["Oslo Holmenkollen", "Competition2", "22-03-17"],
            ["Oslo Holmenkollen", "Competition7", "22-03-18"],
            ["Oslo Holmenkollen", "Competition3", "22-03-19"],
            ["Oslo Holmenkollen", "Competition8", "22-03-19"],
            ["Oslo Holmenkollen", "Competition5", "22-03-20"],
            ["Oslo Holmenkollen", "Competition10", "22-03-20"],
        ];
        
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

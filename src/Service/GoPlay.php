<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Run;
use App\Repository\ShotRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;

class GoPlay extends ServiceEntityRepository
{
    private $ems;

    function __construct(?ShotRepository $ems)
    {
        $this->ems = $ems;
    }


    public function GoGame(Run $run, User $user)
    {
        // On récupére le biathlète
        $athlete = $user->getAthlete();

        // On récupére la compétition
        $competition = $run->getCompetition();

        // On récupére les types de tir
        $shots = $this->ems->findAll();

        if ($competition->getId() == 6) {

            $g = 1;
            echo "Zone " . $g . " : " . $competition->getStepDistance() . " km<br>";
            for ($i = 1; $i <= 2; $i++) {
                for ($j = 0; $j <= 1; $j++) {
                    echo "Tir " . $g . ": " . $shots[$j]->getName() . "<br>";
                    $g++;
                    echo "Zone " . $g . ": " . $competition->getStepDistance() . " km<br>";
                }
            }

        }


        return 'Run: ' . $run->getId() . ' Athlete: ' . $user->getAthlete()->getId();
    }
}

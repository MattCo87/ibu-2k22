<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Run;
use App\Repository\ShotRepository;
use App\Repository\ZoneRepository;
use App\Repository\RunRepository;
use App\Repository\AthleteRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class GoPlay extends ServiceEntityRepository
{
    private $ems;
    private $emz;
    private $emr;
    private $ema;
    private $manager;

    function __construct(?AthleteRepository $ema, ?ShotRepository $ems, ?ZoneRepository $emz, ?RunRepository $emr, EntityManagerInterface $manager)
    {
        $this->ems = $ems;
        $this->emz = $emz;
        $this->emr = $emr;
        $this->ema = $ema;
        $this->manager = $manager;
    }


    public function GoGame(Run $run, User $user)
    {

        // On récupére la compétition
        $competition = $run->getCompetition();

        // On récupére toutes les femmes
        $women = $this->ema->findby(['gender' => $competition->getGender()]);

        foreach ($women as $athlete) {
            // On test l'individuel 20km homme ou l'individuel 15km femme

            if (($competition->getId() == 6) || ($competition->getId() == 1)) {

                // On récupére les types de tir
                $shots = $this->ems->findAll();

                // Temps total du run
                $tempsCumul = 0;

                // Nombre de pénalité total
                $stepPenalty = 0;

                // g représente le tour actuel du tir et du ski
                $g = 1;

                $shotsuccess = [0, 0];
                $shottotal = [0, 0];
                $timeski = 0;
                $timeshot = 0;
                $timepenalite = 0;


                /************************************************************************************************************** 
                 *                              ZONE 1
                 ***************************************************************************************************************/

                // On définit une vitesse au hasard entre 40 et 48km/h
                $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

                // On définit la vitesse de la zone en seconde
                $vitesseZone = number_format((((intval($competition->getStepDistance())) * 60) / $aleaVitesse), 3);
                $tempsZone = $vitesseZone * 60;

                // On instancie un run 
                if (intval($athlete->getId()) == intval($user->getAthlete()->getId())) {
                    $shots = null;
                    $temp_Run = $this->emr->addRun($this->emz->find($g), $tempsZone, $run->getDateRun(), $athlete, $run->getCompetition(), $run->getHourRun(), $run->getStage(), $g, $shots);
                    $this->manager->persist($temp_Run);
                }

                // On récupére les types de tir
                $shots = $this->ems->findAll();

                // Un peu d'affichage pour le beau
                $timeski = $timeski + $tempsZone;
                $tempsCumul = $tempsZone;
                //echo "<hr><hr>Zone " . $temp_Run->getStepRun() . " : " . $competition->getStepDistance() . " km  //  Temps : " . $vitesseZone . "  //  Moyenne : " . $aleaVitesse . " km/h<hr>";
                //echo "Temps Zone : " . $temp_Run->getResultRun() . " secondes<br>";
                //echo "Temps Cumul : " . $tempsCumul . " secondes<hr><hr><br><br><br>";

                /******************************************************************************************************************* */

                for ($i = 1; $i <= 2; $i++) {
                    for ($j = 0; $j <= 1; $j++) {

                        /********************************************************************************************************** */
                        /*********************************************************************************************************** 
                         *                              ZONE TIR
                         ***********************************************************************************************************/
                        // On récupére les types de tir
                        $shots = $this->ems->findAll();

                        $aleaShot = rand(3, 5);
                        //echo "<hr><hr>Tir " . $g . ": " . $shots[$j]->getName() . " // Résultat : " . $aleaShot . "/5<hr>";
                        $shotsuccess[$j] = $shotsuccess[$j] + $aleaShot;
                        $shottotal[$j] = $shottotal[$j] + 5;

                        $z = 1;
                        $tempsPenalite = 0;
                        for ($h = $aleaShot; $h < 5; $h++) {
                            $stepPenalty++;

                            // On définit la vitesse de la pénalité
                            $vitessePenalite = 60;
                            //echo "Tour pénalité N° " . $z . "  //  Temps : " . $vitessePenalite . "<br>";
                            $z++;
                            $tempsPenalite = $tempsPenalite + $vitessePenalite;
                        }

                        if ($aleaShot == 5) {
                            //echo "NICE !!!";
                        }
                        // On ajoute 30 sec sur le pas de tir
                        $tempsCumul = $tempsCumul + $tempsPenalite + 30;
                        $tempsZone = $tempsPenalite + 30;
                        $timeshot = $timeshot + 30;
                        $timepenalite = $timepenalite + $tempsPenalite;
                        // On instancie un run 
                        if (intval($athlete->getId()) == intval($user->getAthlete()->getId())) {
                            $zone = null;
                            $temp_Run = $this->emr->addRun($zone, $tempsZone, $run->getDateRun(), $athlete, $run->getCompetition(), $run->getHourRun(), $run->getStage(), $g, $shots[$j]);
                            $this->manager->persist($temp_Run);
                        }

                        //echo "<hr>";
                        //echo "Temps Zone :  " . $temp_Run->getResultRun() . " secondes<br>";
                        //echo "Temps Cumul : " . $tempsCumul . " secondes<hr><hr><br><br><br>";
                        /********************************************************************************************************** */
                        /*********************************************************************************************************** 
                         */

                        $g++;
                        /*********************************************************************************************************** 
                         *                              ZONE SKI
                         ***********************************************************************************************************/

                        // On définit une vitesse au hasard entre 40 et 48km/h
                        $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

                        // On définit la vitesse de la zone en seconde
                        $vitesseZone = number_format((((intval($competition->getStepDistance())) * 60) / $aleaVitesse), 3);
                        $tempsZone = $vitesseZone * 60;

                        // On instancie un run 
                        if (intval($athlete->getId()) == intval($user->getAthlete()->getId())) {
                            $shots = null;
                            $temp_Run = $this->emr->addRun($this->emz->find($g), $tempsZone, $run->getDateRun(), $athlete, $run->getCompetition(), $run->getHourRun(), $run->getStage(), $g, $shots);
                            //dd($temp_Run);
                            $this->manager->persist($temp_Run);
                        }

                        // Un peu d'affichage pour le beau
                        $timeski = $timeski + $tempsZone;
                        $tempsCumul = $tempsCumul + $tempsZone;
                        //echo "<hr><hr>Zone " . $temp_Run->getStepRun() . " : " . $competition->getStepDistance() . " km  //  Temps : " . $vitesseZone . "  //  Moyenne : " . $aleaVitesse . " km/h<hr>";
                        //echo "Temps Zone : " . $temp_Run->getResultRun() . " secondes<br>";
                        //echo "Temps Cumul : " . $tempsCumul . " secondes<hr><hr><br><br><br>";

                        /***************************************************************************************************************************** */
                        /******************************************************************************************************************************
                    /***************************************************************************************************************************** */
                    }
                }
            }

            $this->manager->flush();
            $timerun = $tempsCumul;

            $finalRuns[] = [
                'timerun' => $timerun,
                'run' => $run,
                'athlete' => $athlete,
                'penalite' => $stepPenalty,
                'timepenalite' => $timepenalite,
                'shotsuccessc' => $shotsuccess[0],
                'shotsuccessd' => $shotsuccess[1],
                'shottotalc' => $shottotal[0],
                'shottotald' => $shottotal[1],
                'timeshot' => $timeshot,
                'timeski' => $timeski,
            ];

            /*
            if (intval($athlete->getId()) == intval($user->getAthlete()->getId())) {
                echo '<h2> Run: ' . $finalRuns[$e]['id'] . ' Athlete: ' . $athlete->getId() . ' Pénalité: ' . $stepPenalty . ' Temps (sec) : ' . $timerun . ' Temps (min) : ' . $mintimerun . "</h2><br>";
            } else {
                echo 'Run: ' . $run->getId() . ' Athlete: ' . $athlete->getId() . ' Pénalité: ' . $stepPenalty . ' Temps (sec) : ' . $timerun . ' Temps (min) : ' . $mintimerun . "<br>";
            }
            */
        }

        asort($finalRuns);
        return $finalRuns;
        //dd($finalRuns);
        /*
        foreach ($finalRuns as $finalRun) {
            if (intval($finalRun['athlete']) == intval($user->getAthlete()->getId())) {
                echo '<h2>';
            }

            echo 'Run: ' . $finalRun['id'] . ' Athlete: ' . $finalRun['athlete'] . ' Tir: ' . $finalRun['shotsuccess'] . "/" . $finalRun['shottotal'] . ' Pénalité: ' . $finalRun['penalite']. ' temps Pénalité: ' . $finalRun['timepenalite'] . ' Temps tir: ' . $finalRun['timeshot'] . ' Ski : ' . $finalRun['timeski'] . ' Total : ' . $finalRun['timerun'] .  "<br>";

            if (intval($finalRun['athlete']) == intval($user->getAthlete()->getId())) {
                echo '</h2>';
            }
        }
        */
    }
}

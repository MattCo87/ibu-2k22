<?php

namespace App\Service;

use App\Entity\User;
use App\Entity\Run;
use App\Repository\ShotRepository;
use App\Repository\ZoneRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class GoPlay extends ServiceEntityRepository
{
    private $ems;
    private $emz;
    private $manager;

    function __construct(?ShotRepository $ems, ?ZoneRepository $emz, EntityManagerInterface $manager)
    {
        $this->ems = $ems;
        $this->emz = $emz;
        $this->manager = $manager;
    }


    public function GoGame(Run $run, User $user)
    {
        // On récupére le biathlète
        $athlete = $user->getAthlete();

        // On récupére la compétition
        $competition = $run->getCompetition();

        // On récupére les types de tir
        $shots = $this->ems->findAll();

        // On test le sprint 20km messieurs
        if ($competition->getId() == 6) {

            // g représente le tour actuel du tir et du ski
            $g = 1;

            // Nombre de pénalité total
            $stepPenalty = 0;

            // Temps total du run
            $tempsCumul = 0;


            /************************************************************************************************************** 
             *                              ZONE 1
             ***************************************************************************************************************/

            // On définit une vitesse au hasard entre 40 et 48km/h
            $aleaVitesse = rand(40 * 100, 48 * 100) / 100;

            // On définit la vitesse de la zone en seconde
            $vitesseZone = number_format((((intval($competition->getStepDistance())) * 60) / $aleaVitesse), 3);
            $tempsZone = $vitesseZone * 60;

            // On instancie un run 
            $temp_Run = new Run;
            $temp_Run->setDateRun($run->getDateRun());
            $temp_Run->setAthlete($athlete);
            $temp_Run->setCompetition($run->getCompetition());
            $temp_Run->setHourRun($run->getHourRun());
            $temp_Run->setStage($run->getStage());
            $temp_Run->setZone($this->emz->find($g));
            $temp_Run->setResultRun($tempsZone);
            $temp_Run->setStepRun($g);
            $this->manager->persist($temp_Run);
    

            //dd($temp_Run);
            // Un peu d'affichage pour le beau
            $tempsCumul = $tempsZone;
            echo "<hr><hr>Zone " . $temp_Run->getStepRun() . " : " . $competition->getStepDistance() . " km  //  Temps : " . $vitesseZone . "  //  Moyenne : " . $aleaVitesse . " km/h<hr>";
            echo "Temps Zone : " . $temp_Run->getResultRun() . " secondes<br>";
            echo "Temps Cumul : " . $tempsCumul . " secondes<hr><hr><br><br><br>";

            /******************************************************************************************************************* */

            for ($i = 1; $i <= 2; $i++) {
                for ($j = 0; $j <= 1; $j++) {



                    /********************************************************************************************************** */
                    /*********************************************************************************************************** 
                     *                              ZONE TIR
                     ***********************************************************************************************************/

                    $aleaShot = rand(3, 5);
                    echo "<hr><hr>Tir " . $g . ": " . $shots[$j]->getName() . " // Résultat : " . $aleaShot . "/5<hr>";
                    $z = 1;
                    $tempsPenalite = 0;
                    for ($h = $aleaShot; $h < 5; $h++) {
                        $stepPenalty++;

                        // On définit la vitesse de la pénalité
                        $aleaVitesse = rand(40 * 100, 48 * 100) / 100;
                        $vitessePenalite = number_format((((0.150 * 60) / $aleaVitesse) * 100), 2);
                        echo "Tour pénalité N° " . $z . "  //  Temps : " . $vitessePenalite . "  //  Moyenne : " . $aleaVitesse . " km/h<br>";
                        $z++;
                        $tempsPenalite = $tempsPenalite + $vitessePenalite;
                    }

                    if($aleaShot == 5){
                        echo "NICE !!!";
                    }
                    // On ajoute 30 sec sur le pas de tir
                    $tempsCumul = $tempsCumul + $tempsPenalite + 30;
                    $totalPDT = $tempsPenalite + 30;

                    // On instancie un run 
                    $temp_Run = new Run;
                    $temp_Run->setDateRun($run->getDateRun());
                    $temp_Run->setAthlete($athlete);
                    $temp_Run->setCompetition($run->getCompetition());
                    $temp_Run->setHourRun($run->getHourRun());
                    $temp_Run->setStage($run->getStage());
                    $temp_Run->setResultRun($totalPDT);
                    $temp_Run->setStepRun($g);
                    $temp_Run->setShot($shots[$j]);
                    $this->manager->persist($temp_Run);
                
                    //dd($temp_Run);
                    echo "<hr>";
                    echo "Temps Zone :  " . $temp_Run->getResultRun() . " secondes<br>";
                    echo "Temps Cumul : " . $tempsCumul . " secondes<hr><hr><br><br><br>";
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
                    $temp_Run = new Run;
                    $temp_Run->setDateRun($run->getDateRun());
                    $temp_Run->setAthlete($athlete);
                    $temp_Run->setCompetition($run->getCompetition());
                    $temp_Run->setHourRun($run->getHourRun());
                    $temp_Run->setStage($run->getStage());
                    $temp_Run->setZone($this->emz->find($g));
                    $temp_Run->setResultRun($tempsZone);
                    $temp_Run->setStepRun($g);
                    $this->manager->persist($temp_Run);
                    

                    //dd($temp_Run);
                    // Un peu d'affichage pour le beau
                    $tempsCumul = $tempsCumul + $tempsZone;
                    echo "<hr><hr>Zone " . $temp_Run->getStepRun() . " : " . $competition->getStepDistance() . " km  //  Temps : " . $vitesseZone . "  //  Moyenne : " . $aleaVitesse . " km/h<hr>";
                    echo "Temps Zone : " . $temp_Run->getResultRun() . " secondes<br>";
                    echo "Temps Cumul : " . $tempsCumul . " secondes<hr><hr><br><br><br>";

                    /***************************************************************************************************************************** */
                    /******************************************************************************************************************************
                    /***************************************************************************************************************************** */
                }
            }
        }
        $this->manager->flush();
        $timerun = $tempsCumul;
        $mintimerun = $timerun / 60;

        return 'Run: ' . $run->getId() . ' Athlete: ' . $user->getAthlete()->getId() . ' Pénalité: ' . $stepPenalty . ' Temps (sec) : ' . $timerun . ' Temps (min) : ' . $mintimerun;
    }
}

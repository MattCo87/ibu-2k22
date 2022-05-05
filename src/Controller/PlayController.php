<?php

namespace App\Controller;

use App\Repository\RunRepository;
use App\Entity\Run;
use App\Entity\User;
use App\Repository\ShotRepository;
use App\Service;
use App\Service\GoPlay;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class PlayController extends AbstractController
{
    private $security;
    private $emr;
    private $ems;

    public function __construct(Security $security, RunRepository $emr, ShotRepository $ems)
    {
        $this->security = $security;
        $this->emr = $emr;
        $this->ems = $ems;
    }

    /**
     * @Route("/play/{id}", name="app_play")
     */

    public function consult(Run $run): Response
    {
        $run = $this->emr->find($run->getId());
        $shotNumber = intval($run->getCompetition()->getShotNumber());

        return $this->render('play/index.html.twig', [
            'run' => $run,
            'shotNumber' => $shotNumber,
            'user' => $this->security->getUser(),
        ]);
    }

    /**
     * @Route("/game/{id}", name="app_play_game")
     */

    public function PlayGame(Run $run): Response
    {
        $play = new GoPlay($this->ems);
        $run = $this->emr->find($run->getId());

        $result=$play->GoGame($run, $this->security->getUser());

        return $this->render('play/game.html.twig', [
            'result' => $result,
            'run' => $run,
            'user' => $this->security->getUser(),
        ]);       
    }
}

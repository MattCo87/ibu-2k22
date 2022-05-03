<?php

namespace App\Controller;

use App\Repository\RunRepository;
use App\Entity\Run;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class PlayController extends AbstractController
{
    private $security;
    private $emr;

    public function __construct(Security $security, RunRepository $emr)
    {
        $this->security = $security;
        $this->emr = $emr;
    }

    /**
     * @Route("/play/{id}", name="app_play")
     */

    public function consult(Run $run): Response
    {
        $run = $this->emr->find($run->getId());
$shotNumber = intval($run->getCompetition()->getShotNumber());
        //dd($run);
        return $this->render('play/index.html.twig', [
            'run' => $run,
            'shotNumber' => $shotNumber,
        ]);
    }
}

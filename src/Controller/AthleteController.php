<?php

namespace App\Controller;

use App\Repository\AthleteRepository;
use App\Entity\Athlete;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AthleteController extends AbstractController
{
    private $security;
    private $ema;

    public function __construct(Security $security, AthleteRepository $ema)
    {
        $this->security = $security;
        $this->ema = $ema;
    }

    /**
     * @Route("/athlete/profil/{id}", name="app_athlete_profil")
     */
    public function AthleteProfil(): Response
    {
        return $this->render('athlete/profil.html.twig', [
            'controller_name' => 'AthleteProfil',
        ]);
    }

    /**
     * @Route("/athlete/list", name="app_athlete_choose")
     */
    public function ListProfil(): Response
    {
        $athletes = $this->ema->findAll();
        return $this->render('athlete/list.html.twig', [
            'athletes' => $athletes,
        ]);
    }

}

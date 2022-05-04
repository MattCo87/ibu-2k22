<?php

namespace App\Controller;

use App\Repository\AthleteRepository;
use App\Repository\UserRepository;
use App\Entity\Athlete;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

class AthleteController extends AbstractController
{
    private $security;
    private $ema;
    private $emu;

    public function __construct(Security $security, AthleteRepository $ema, UserRepository $emu)
    {
        $this->security = $security;
        $this->ema = $ema;
        $this->emu = $emu;
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

    /**
     * @Route("/athlete/select/{id}", name="app_athlete_select")
     */
    public function SelectProfil(Athlete $athlete): Response
    {
        $user = $this->security->getUser()->getId();
        $this->emu->addAthlete($user, $athlete);
     
        return $this->render('home/index.html.twig', [
    
        ]);
    }
}

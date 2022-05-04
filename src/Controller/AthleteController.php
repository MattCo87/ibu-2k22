<?php

namespace App\Controller;

use App\Repository\AthleteRepository;
use App\Repository\UserRepository;
use App\Entity\Athlete;
use App\Form\AthleteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\Request;

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
    public function AthleteProfil(Athlete $athlete): Response
    {
        $var_athlete = $this->ema->findOneBy(['id' => $athlete]);

        return $this->render('athlete/profil.html.twig', [
            'athlete' => $var_athlete,
        ]);
    }

    /**
     * @Route("/athlete/list", name="app_athlete_choose")
     */
    public function ListProfil(Request $request): Response
    {
        $athletes = $this->ema->findAll();
        $var_athlete = new Athlete();
        $form = $this->createForm(AthleteType::class, $var_athlete);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->getData()->getGender()->getId() != 3 && $form->getData()->getCountry()->getId() != 1) {
                $athletes = $this->ema->findBy(['gender' => $form->getData()->getGender(), 'country' => $form->getData()->getCountry()]);

                //dd($form->getData());
            } 
            
        }

        return $this->render('athlete/list.html.twig', [
            'athletes' => $athletes,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/athlete/select/{id}", name="app_athlete_select")
     */
    public function SelectProfil(Athlete $athlete): Response
    {
        $user = $this->security->getUser()->getId();
        $this->emu->addAthlete($user, $athlete);

        return $this->render('home/index.html.twig', []);
    }
}

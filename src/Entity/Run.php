<?php

namespace App\Entity;

use App\Repository\RunRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RunRepository::class)
 */
class Run
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateRun;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stepRun;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $resultRun;

    /**
     * @ORM\ManyToOne(targetEntity=Stage::class, inversedBy="runs")
     */
    private $stage;

    /**
     * @ORM\ManyToOne(targetEntity=Athlete::class, inversedBy="runs")
     */
    private $athlete;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="runs")
     */
    private $competition;

    /**
     * @ORM\ManyToOne(targetEntity=Shot::class, inversedBy="runs")
     */
    private $shot;

    /**
     * @ORM\ManyToOne(targetEntity=Zone::class, inversedBy="runs")
     */
    private $zone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hourRun;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateRun(): ?\DateTimeInterface
    {
        return $this->dateRun;
    }

    public function setDateRun(?\DateTimeInterface $dateRun): self
    {
        $this->dateRun = $dateRun;

        return $this;
    }

    public function getStepRun(): ?int
    {
        return $this->stepRun;
    }

    public function setStepRun(int $stepRun): self
    {
        $this->stepRun = $stepRun;

        return $this;
    }

    public function getResultRun(): ?int
    {
        return $this->resultRun;
    }

    public function setResultRun(?int $resultRun): self
    {
        $this->resultRun = $resultRun;

        return $this;
    }

    public function getStage(): ?Stage
    {
        return $this->stage;
    }

    public function setStage(?Stage $stage): self
    {
        $this->stage = $stage;

        return $this;
    }

    public function getAthlete(): ?Athlete
    {
        return $this->athlete;
    }

    public function setAthlete(?Athlete $athlete): self
    {
        $this->athlete = $athlete;

        return $this;
    }

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getShot(): ?Shot
    {
        return $this->shot;
    }

    public function setShot(?Shot $shot): self
    {
        $this->shot = $shot;

        return $this;
    }

    public function getZone(): ?Zone
    {
        return $this->zone;
    }

    public function setZone(?Zone $zone): self
    {
        $this->zone = $zone;

        return $this;
    }

    public function getHourRun(): ?string
    {
        return $this->hourRun;
    }

    public function setHourRun(?string $hourRun): self
    {
        $this->hourRun = $hourRun;

        return $this;
    }
}

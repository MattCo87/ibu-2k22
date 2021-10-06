<?php

namespace App\Entity;

use App\Repository\StageCompetitionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageCompetitionRepository::class)
 */
class StageCompetition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Stage::class, inversedBy="stageCompetitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stage;

    /**
     * @ORM\ManyToOne(targetEntity=Competition::class, inversedBy="stageCompetitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $competition;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRun;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getCompetition(): ?Competition
    {
        return $this->competition;
    }

    public function setCompetition(?Competition $competition): self
    {
        $this->competition = $competition;

        return $this;
    }

    public function getDateRun(): ?\DateTimeInterface
    {
        return $this->dateRun;
    }

    public function setDateRun(\DateTimeInterface $dateRun): self
    {
        $this->dateRun = $dateRun;

        return $this;
    }
}

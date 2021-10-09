<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CompetitionRepository::class)
 */
class Competition
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Style::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=Distance::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $distance;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    /**
     * @ORM\OneToMany(targetEntity=StageCompetition::class, mappedBy="competition")
     */
    private $stageCompetitions;

    /**
     * @ORM\Column(type="float")
     */
    private $stepDistance;

    /**
     * @ORM\Column(type="integer")
     */
    private $stepNumber;

    /**
     * @ORM\Column(type="integer")
     */
    private $shotNumber;


    public function __construct()
    {
        $this->stageCompetitions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style;

        return $this;
    }

    public function getDistance(): ?Distance
    {
        return $this->distance;
    }

    public function setDistance(?Distance $distance): self
    {
        $this->distance = $distance;

        return $this;
    }

    public function getGender(): ?Gender
    {
        return $this->gender;
    }

    public function setGender(?Gender $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * @return Collection|StageCompetition[]
     */
    public function getStageCompetitions(): Collection
    {
        return $this->stageCompetitions;
    }

    public function addStageCompetition(StageCompetition $stageCompetition): self
    {
        if (!$this->stageCompetitions->contains($stageCompetition)) {
            $this->stageCompetitions[] = $stageCompetition;
            $stageCompetition->setCompetition($this);
        }

        return $this;
    }

    public function removeStageCompetition(StageCompetition $stageCompetition): self
    {
        if ($this->stageCompetitions->removeElement($stageCompetition)) {
            // set the owning side to null (unless already changed)
            if ($stageCompetition->getCompetition() === $this) {
                $stageCompetition->setCompetition(null);
            }
        }

        return $this;
    }

    public function getStepDistance(): ?float
    {
        return $this->stepDistance;
    }

    public function setStepDistance(float $stepDistance): self
    {
        $this->stepDistance = $stepDistance;

        return $this;
    }

    public function getStepNumber(): ?int
    {
        return $this->stepNumber;
    }

    public function setStepNumber(int $stepNumber): self
    {
        $this->stepNumber = $stepNumber;

        return $this;
    }

    public function getShotNumber(): ?int
    {
        return $this->shotNumber;
    }

    public function setShotNumber(int $shotNumber): self
    {
        $this->shotNumber = $shotNumber;

        return $this;
    }
}
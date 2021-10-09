<?php

namespace App\Entity;

use App\Repository\CompetitionRepository;
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
     * @ORM\Column(type="string", length=255)
     */
    private $name;

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

    /**
     * @ORM\ManyToOne(targetEntity=Style::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $style;

    /**
     * @ORM\ManyToOne(targetEntity=Gender::class, inversedBy="competitions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $gender;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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

    public function getStyle(): ?Style
    {
        return $this->style;
    }

    public function setStyle(?Style $style): self
    {
        $this->style = $style;

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
}

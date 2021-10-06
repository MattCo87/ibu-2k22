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
}

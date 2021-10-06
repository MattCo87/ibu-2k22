<?php

namespace App\Entity;

use App\Repository\StageRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StageRepository::class)
 */
class Stage
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
     * @ORM\ManyToOne(targetEntity=Country::class, inversedBy="stages")
     * @ORM\JoinColumn(nullable=false)
     */
    private $country;

    /**
     * @ORM\OneToMany(targetEntity=StageCompetition::class, mappedBy="stage")
     */
    private $stageCompetitions;

    public function __construct()
    {
        $this->stageCompetitions = new ArrayCollection();
    }

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

    public function getCountry(): ?Country
    {
        return $this->country;
    }

    public function setCountry(?Country $country): self
    {
        $this->country = $country;

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
            $stageCompetition->setStage($this);
        }

        return $this;
    }

    public function removeStageCompetition(StageCompetition $stageCompetition): self
    {
        if ($this->stageCompetitions->removeElement($stageCompetition)) {
            // set the owning side to null (unless already changed)
            if ($stageCompetition->getStage() === $this) {
                $stageCompetition->setStage(null);
            }
        }

        return $this;
    }
}

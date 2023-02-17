<?php

namespace App\Entity;

use App\Repository\RacialAbilityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RacialAbilityRepository::class)
 */
class RacialAbility
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="json")
     */
    private $bonus = [];

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $traits = [];

    /**
     * @ORM\OneToMany(targetEntity=Sheet::class, mappedBy="racial_ability")
     */
    private $sheets;

    /**
     * @ORM\ManyToMany(targetEntity=Race::class, mappedBy="racial_abilities")
     */
    private $races;

    public function __construct()
    {
        $this->sheets = new ArrayCollection();
        $this->races = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getBonus(): ?array
    {
        return $this->bonus;
    }

    public function setBonus(array $bonus): self
    {
        $this->bonus = $bonus;

        return $this;
    }

    public function getTraits(): ?array
    {
        return $this->traits;
    }

    public function setTraits(?array $traits): self
    {
        $this->traits = $traits;

        return $this;
    }

    /**
     * @return Collection<int, Sheet>
     */
    public function getSheets(): Collection
    {
        return $this->sheets;
    }

    public function addSheet(Sheet $sheet): self
    {
        if (!$this->sheets->contains($sheet)) {
            $this->sheets[] = $sheet;
            $sheet->setRacialAbility($this);
        }

        return $this;
    }

    public function removeSheet(Sheet $sheet): self
    {
        if ($this->sheets->removeElement($sheet)) {
            // set the owning side to null (unless already changed)
            if ($sheet->getRacialAbility() === $this) {
                $sheet->setRacialAbility(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Race>
     */
    public function getRaces(): Collection
    {
        return $this->races;
    }

    public function addRace(Race $race): self
    {
        if (!$this->races->contains($race)) {
            $this->races[] = $race;
            $race->addRacialAbility($this);
        }

        return $this;
    }

    public function removeRace(Race $race): self
    {
        if ($this->races->removeElement($race)) {
            $race->removeRacialAbility($this);
        }

        return $this;
    }
}

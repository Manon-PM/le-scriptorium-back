<?php

namespace App\Entity;

use App\Repository\SheetRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SheetRepository::class)
 */
class Sheet
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
    private $character_name;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $race_name;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $religion_name;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $height;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $hair;

    /**
     * @ORM\Column(type="json")
     */
    private $stats = [];

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sheets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Classe::class, inversedBy="sheets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classe;

    /**
     * @ORM\ManyToMany(targetEntity=WayAbility::class, inversedBy="sheets")
     */
    private $way_abilities;

    /**
     * @ORM\ManyToOne(targetEntity=RacialAbility::class, inversedBy="sheets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $racial_ability;

    public function __construct()
    {
        $this->way_abilities = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCharacterName(): ?string
    {
        return $this->character_name;
    }

    public function setCharacterName(string $character_name): self
    {
        $this->character_name = $character_name;

        return $this;
    }

    public function getRaceName(): ?string
    {
        return $this->race_name;
    }

    public function setRaceName(string $race_name): self
    {
        $this->race_name = $race_name;

        return $this;
    }

    public function getReligionName(): ?string
    {
        return $this->religion_name;
    }

    public function setReligionName(?string $religion_name): self
    {
        $this->religion_name = $religion_name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->height;
    }

    public function setHeight(?int $height): self
    {
        $this->height = $height;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getHair(): ?string
    {
        return $this->hair;
    }

    public function setHair(?string $hair): self
    {
        $this->hair = $hair;

        return $this;
    }

    public function getStats(): ?array
    {
        return $this->stats;
    }

    public function setStats(array $stats): self
    {
        $this->stats = $stats;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getClasse(): ?Classe
    {
        return $this->classe;
    }

    public function setClasse(?Classe $classe): self
    {
        $this->classe = $classe;

        return $this;
    }

    /**
     * @return Collection<int, WayAbility>
     */
    public function getWayAbilities(): Collection
    {
        return $this->way_abilities;
    }

    public function addWayAbility(WayAbility $wayAbility): self
    {
        if (!$this->way_abilities->contains($wayAbility)) {
            $this->way_abilities[] = $wayAbility;
        }

        return $this;
    }

    public function removeWayAbility(WayAbility $wayAbility): self
    {
        $this->way_abilities->removeElement($wayAbility);

        return $this;
    }

    public function getRacialAbility(): ?RacialAbility
    {
        return $this->racial_ability;
    }

    public function setRacialAbility(?RacialAbility $racial_ability): self
    {
        $this->racial_ability = $racial_ability;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\StatRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatRepository::class)
 */
class Stat
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity=Classe::class, mappedBy="stats")
     */
    private $classes;

    /**
     * @ORM\OneToMany(targetEntity=ClasseStat::class, mappedBy="stat")
     */
    private $classeStats;

    public function __construct()
    {
        $this->classes = new ArrayCollection();
        $this->classeStats = new ArrayCollection();
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

    /**
     * @return Collection<int, Classe>
     */
    public function getClasses(): Collection
    {
        return $this->classes;
    }

    public function addClass(Classe $class): self
    {
        if (!$this->classes->contains($class)) {
            $this->classes[] = $class;
            $class->addStat($this);
        }

        return $this;
    }

    public function removeClass(Classe $class): self
    {
        if ($this->classes->removeElement($class)) {
            $class->removeStat($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, ClasseStat>
     */
    public function getClasseStats(): Collection
    {
        return $this->classeStats;
    }

    public function addClasseStat(ClasseStat $classeStat): self
    {
        if (!$this->classeStats->contains($classeStat)) {
            $this->classeStats[] = $classeStat;
            $classeStat->setStat($this);
        }

        return $this;
    }

    public function removeClasseStat(ClasseStat $classeStat): self
    {
        if ($this->classeStats->removeElement($classeStat)) {
            // set the owning side to null (unless already changed)
            if ($classeStat->getStat() === $this) {
                $classeStat->setStat(null);
            }
        }

        return $this;
    }
}

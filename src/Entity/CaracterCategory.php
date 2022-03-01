<?php

namespace App\Entity;

use App\Repository\CaracterCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CaracterCategoryRepository::class)
 */
class CaracterCategory
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
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=ListeAnimaux::class, inversedBy="caracterCategories")
     */
    private $animal;

    public function __construct()
    {
        $this->animal = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|ListeAnimaux[]
     */
    public function getAnimal(): Collection
    {
        return $this->animal;
    }

    public function addAnimal(ListeAnimaux $animal): self
    {
        if (!$this->animal->contains($animal)) {
            $this->animal[] = $animal;
        }

        return $this;
    }

    public function removeAnimal(ListeAnimaux $animal): self
    {
        $this->animal->removeElement($animal);

        return $this;
    }
}

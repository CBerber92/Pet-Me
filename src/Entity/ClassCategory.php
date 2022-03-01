<?php

namespace App\Entity;

use App\Repository\ClassCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClassCategoryRepository::class)
 */
class ClassCategory
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=ListeAnimaux::class, mappedBy="classCategory")
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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

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
            $animal->setClassCategory($this);
        }

        return $this;
    }

    public function removeAnimal(ListeAnimaux $animal): self
    {
        if ($this->animal->removeElement($animal)) {
            // set the owning side to null (unless already changed)
            if ($animal->getClassCategory() === $this) {
                $animal->setClassCategory(null);
            }
        }

        return $this;
    }
}

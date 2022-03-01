<?php

namespace App\Entity;

use App\Repository\ListeAnimauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ListeAnimauxRepository::class)
 */
class ListeAnimaux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,max=255)
     */
    private $Espece;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,max=255)
     */
    private $Race;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=2,max=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=10)
     * @Assert\Length(min=1,max=1)
     */
    private $Sex;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5,max=255)
     */
    private $Localisation;

    /**
     * @ORM\Column(type="smallint")
     * @Assert\PositiveOrZero(message="Chosissez un age egal ou superieur a 0")
     */
    private $Age;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $CreatedAt;
    

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Url()
     */
    private $Photo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=10,max=255)
     */
    private $Description;

    /**
     * @ORM\ManyToOne(targetEntity=ClassCategory::class, inversedBy="animal")
     * @ORM\JoinColumn(nullable=false)
     */
    private $classCategory;

    /**
     * @ORM\ManyToMany(targetEntity=CaracterCategory::class, mappedBy="animal")
     */
    private $caracterCategories;

    public function __construct()
    {
        $this->caracterCategories = new ArrayCollection();
    }




    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEspece(): ?string
    {
        return $this->Espece;
    }

    public function setEspece(string $Espece): self
    {
        $this->Espece = $Espece;

        return $this;
    }

    public function getRace(): ?string
    {
        return $this->Race;
    }

    public function setRace(string $Race): self
    {
        $this->Race = $Race;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getSex(): ?string
    {
        return $this->Sex;
    }

    public function setSex(string $Sex): self
    {
        $this->Sex = $Sex;

        return $this;
    }

    public function getLocalisation(): ?string
    {
        return $this->Localisation;
    }

    public function setLocalisation(string $Localisation): self
    {
        $this->Localisation = $Localisation;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->Age;
    }

    public function setAge(int $Age): self
    {
        $this->Age = $Age;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(\DateTimeImmutable $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->Photo;
    }

    public function setPhoto(string $Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getClassCategory(): ?ClassCategory
    {
        return $this->classCategory;
    }

    public function setClassCategory(?ClassCategory $classCategory): self
    {
        $this->classCategory = $classCategory;

        return $this;
    }

    /**
     * @return Collection|CaracterCategory[]
     */
    public function getCaracterCategories(): Collection
    {
        return $this->caracterCategories;
    }

    public function addCaracterCategory(CaracterCategory $caracterCategory): self
    {
        if (!$this->caracterCategories->contains($caracterCategory)) {
            $this->caracterCategories[] = $caracterCategory;
            $caracterCategory->addAnimal($this);
        }

        return $this;
    }

    public function removeCaracterCategory(CaracterCategory $caracterCategory): self
    {
        if ($this->caracterCategories->removeElement($caracterCategory)) {
            $caracterCategory->removeAnimal($this);
        }

        return $this;
    }

}

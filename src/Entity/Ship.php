<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShipRepository")
 */
class Ship
{
    /**
     * Hook timestampable behavior
     * updates createdAt, updatedAt fields
     */
    use TimestampableEntity;

    /**
     * Hook SoftDeleteable behavior
     * updates deletedAt field
     */
    use SoftDeleteableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ShipAttribute")
     */
    private $ShipAttributes;

    public function __construct()
    {
        $this->ShipAttributes = new ArrayCollection();
    }

    public function getId()
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

    /**
     * @return Collection|ShipAttribute[]
     */
    public function getShipAttributes(): Collection
    {
        return $this->ShipAttributes;
    }

    public function addShipAttribute(ShipAttribute $shipAttribute): self
    {
        if (!$this->ShipAttributes->contains($shipAttribute)) {
            $this->ShipAttributes[] = $shipAttribute;
        }

        return $this;
    }

    public function removeShipAttribute(ShipAttribute $shipAttribute): self
    {
        if ($this->ShipAttributes->contains($shipAttribute)) {
            $this->ShipAttributes->removeElement($shipAttribute);
        }

        return $this;
    }
}

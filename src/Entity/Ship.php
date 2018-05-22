<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
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
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ShipAttribute")
     */
    private $ShipAttribute;

    public function __construct()
    {
        $this->ShipAttribute = new ArrayCollection();
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
    public function getShipAttribute(): Collection
    {
        return $this->ShipAttribute;
    }

    public function addShipAttribute(ShipAttribute $shipAttribute): self
    {
        if (!$this->ShipAttribute->contains($shipAttribute)) {
            $this->ShipAttribute[] = $shipAttribute;
        }

        return $this;
    }

    public function removeShipAttribute(ShipAttribute $shipAttribute): self
    {
        if ($this->ShipAttribute->contains($shipAttribute)) {
            $this->ShipAttribute->removeElement($shipAttribute);
        }

        return $this;
    }
}

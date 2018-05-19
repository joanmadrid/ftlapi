<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShipAttributeRepository")
 */
class ShipAttribute
{
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
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ShipAttributeType")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ShipAttributeType;

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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getShipAttributeType(): ?ShipAttributeType
    {
        return $this->ShipAttributeType;
    }

    public function setShipAttributeType(?ShipAttributeType $ShipAttributeType): self
    {
        $this->ShipAttributeType = $ShipAttributeType;

        return $this;
    }
}

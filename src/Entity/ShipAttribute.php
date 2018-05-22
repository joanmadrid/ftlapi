<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShipAttributeRepository")
 */
class ShipAttribute
{
    const LEVEL = 'level';
    const TYPE  = 'type';

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

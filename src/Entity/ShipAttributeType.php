<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ShipAttributeTypeRepository")
 */
class ShipAttributeType
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

    //Properties
    const PROPERTY_NAVEGATION_ID       = 1;
    const PROPERTY_NAVEGATION_NAME     = 'navigation';
    const PROPERTY_WEAPON_ID           = 2;
    const PROPERTY_WEAPON_NAME         = 'weapon';
    const PROPERTY_SHIELD_ID           = 3;
    const PROPERTY_SHIELD_NAME         = 'shield';
    const PROPERTY_HULL_ID             = 4;
    const PROPERTY_HULL_NAME           = 'hull';

    const ALL_PROPERTIES = [
        self::PROPERTY_NAVEGATION_ID => self::PROPERTY_NAVEGATION_NAME
    ];

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
     * @ORM\Column(type="text")
     */
    private $description;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}

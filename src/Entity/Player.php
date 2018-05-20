<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\SoftDeleteable\Traits\SoftDeleteableEntity;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
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
     * @ORM\ManyToOne(targetEntity="Universe", inversedBy="players")
     * @ORM\JoinColumn(name="universe_id", referencedColumnName="id", onDelete="CASCADE")
     */
    protected $universe;

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getUniverse()
    {
        return $this->universe;
    }

    /**
     * @param mixed $universe
     */
    public function setUniverse($universe): void
    {
        $this->universe = $universe;
    }
}

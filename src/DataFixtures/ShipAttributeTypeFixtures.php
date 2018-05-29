<?php

namespace App\DataFixtures;

use App\Entity\ShipAttributeType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ShipAttributeTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $initialShipAttributeType = [
            ['navegation', 'Speed of the ship'],
            ['weapon', 'Power attack'],
            ['shield', 'Shields power'],
            ['hull', 'Damage the ship can take with out explode']
        ];

        foreach ($initialShipAttributeType as $type) {
            $attributeType = new ShipAttributeType();
            $attributeType->setName($type[0]);
            $attributeType->setDescription($type[1]);
            $manager->persist($attributeType);
        }
        $manager->flush();
    }
}

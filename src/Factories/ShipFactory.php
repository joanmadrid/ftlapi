<?php
/**
 * Created by Noé Andrés Marcos.
 * Mail: nandrmarc@gmail.com
 * Date: 20/05/2018
 * Time: 11:48
 */

namespace App\Factories;


use App\Entity\Ship;
use App\Entity\ShipAttribute;
use App\Entity\ShipAttributeType;

class ShipFactory
{
    public function create($shipProperties)
    {
        $ship = new Ship();
        $ship->setName($shipProperties[Ship::SHIP_NAME]);
        foreach (ShipAttributeType::ALL_PROPERTIES as $property) {
            $shipAttribute = new ShipAttribute();
            $shipAttribute->setLevel($property[ShipAttribute::LEVEL]);
            //todo: add attribute type
//            $shipAttributeType = $shipAttributeTypeService->find(['name' => $shipProperties[Ship::ATTRIBUTE][$property]]);
//            $shipAttribute->setShipAttributeType($shipAttributeType);
            
            ;
        }
    }
}
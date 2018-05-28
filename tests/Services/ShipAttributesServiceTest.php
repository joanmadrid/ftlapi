<?php

namespace App\Tests;


use App\Entity\Ship;
use App\Entity\ShipAttribute;
use App\Entity\ShipAttributeType;
use App\Kernel;
use App\Services\ShipAttributeService;
use App\Services\ShipAttributeTypeService;
use App\Services\ShipService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShipAttributesServiceTest extends AppKernelTest
{
    /**
     * @param ShipService $shipService
     * @throws \Exception
     * @covers \App\Services\ShipAttributeService::addAttributes()
     */
    public function testCreateSuccess()
    {
        /** @var ShipAttributeTypeService $shipAttributeTypeService */
        $shipAttributeTypeService = $this->container->get(ShipAttributeTypeService::class);
        $allTypes = $shipAttributeTypeService->getRepository()->findAll();
        $shipAttributesArray = [];

        /** @var ShipAttributeType $type */
        foreach ($allTypes as $type) {
            $shipAttributesArray[$type->getId()] = [
                'name' => $type->getName(),
                'level' => 0
            ];
        }

        /** @var Ship $ship */
        $ship = new Ship();
        /** @var ShipAttributeService $shipAttributeService */
        $shipAttributeService = $this->container->get(ShipAttributeService::class);
        $shipAttributeService->addAttributes($ship, $shipAttributesArray);
    }
}

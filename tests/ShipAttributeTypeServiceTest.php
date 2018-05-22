<?php

namespace App\Tests;

use App\Entity\ShipAttributeType;
use App\Service\ShipAttributeTypeService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShipAttributeTypeServiceTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    /**
     * {@inheritDoc}
     */
    protected function setUp()
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /** @var ShipAttributeTypeService */
    private $shipAttributeTypeService;

    /**
     * @required
     * @param ShipAttributeTypeService $shipAttributeTypeService
     */
    public function setShipAttributeTypeService(ShipAttributeTypeService $shipAttributeTypeService)
    {
        $this->shipAttributeTypeService = $shipAttributeTypeService;
    }

    public function testFind()
    {
        $types = $this->shipAttributeTypeService->getAll();
        foreach ($types as $type) {
            $this->assertEquals(ShipAttributeType::class, get_class($type));
        }
    }
}

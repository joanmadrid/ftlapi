<?php

namespace App\Tests;


use App\Entity\Ship;
use App\Entity\ShipAttribute;
use App\Kernel;
use App\Services\ShipAttributeTypeService;
use App\Services\ShipService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShipAttributesServiceTest extends AppKernelTest
{
    /**
     * @param ShipService $shipService
     * @throws \Exception
     * @covers \App\Services\ShipService::create()
     */
    public function testCreateSuccess()
    {
        
    }
}

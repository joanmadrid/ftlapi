<?php

namespace App\Tests;


use App\Entity\Ship;
use App\Kernel;
use App\Service\ShipService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShipServiceTest extends AppKernelTest
{
    /**
     * @param ShipService $shipService
     * @throws \Exception
     * @covers \App\Service\ShipService::create()
     */
    public function testCreateSuccess()
    {
        /** @var ShipService $shipService */
        $shipService = $this->container->get(ShipService::class);
        $shipParameters = [
            'name' => 'Serenity'
        ];

        $serenity = $shipService->create($shipParameters['name']);




        $this->assertTrue(true);
    }
}

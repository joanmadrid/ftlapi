<?php

namespace App\Tests;


use App\Entity\Ship;
use App\Services\ShipService;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

class ShipServiceTest extends AppKernelTest
{
    /**
     * @throws \Exception
     * @covers \App\Services\ShipService::create()
     */
    public function testCreateSuccess()
    {
        /** @var ShipService $shipService */
        $shipService = $this->container->get(ShipService::class);
        $shipParameters = [
            'name' => 'Serenity'
        ];

        $serenity = $shipService->create($shipParameters);
        $this->assertEquals(get_class($serenity), Ship::class);
        $this->assertEquals($serenity->getName(), 'Serenity');
    }
    /**
     * @throws \Exception
     * @covers \App\Services\ShipService::create()
     */
    public function testCreateException()
    {
        $this->expectException(ParameterNotFoundException::class);
        /** @var ShipService $shipService */
        $shipService = $this->container->get(ShipService::class);
        $shipParameters = [
            'wrongParamenter' => 'wrongValue'
        ];

        $serenity = $shipService->create($shipParameters);
        $this->assertEquals(get_class($serenity), Ship::class);
    }
}

<?php

namespace App\Tests;


use App\Service\ShipService;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShipServiceTest extends KernelTestCase
{
    /**
     * @param ShipService $shipService
     */
    public function testCreate(ShipService $shipService)
    {
        $shipParameters = [
            'name' => 'Serenity'
        ];

        $serenity = $shipService->create($shipParameters['name']);




        $this->assertTrue(true);
    }
}

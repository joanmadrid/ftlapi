<?php

namespace App\Tests;

use App\Entity\Sector;
use App\Entity\Universe;
use App\Services\SectorService;
use PHPUnit\Framework\TestCase;

class SectorServiceTest extends TestCase
{
    /**
     * @covers \App\Services\SectorService::generate()
     * @throws \Exception
     */
    public function testGenerateSuccess()
    {
        $sectorService = new SectorService();

        /** @var Universe $universe */
        $universe = new Universe();
        $universe->setName('test-universe');

        $root = $sectorService->generate($universe);

        $expectedRoot = new Sector();
        $expectedRoot->setUniverse($universe);

        $this->assertEquals($root, $expectedRoot);
    }
}

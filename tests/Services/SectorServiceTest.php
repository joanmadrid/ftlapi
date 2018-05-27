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

        $root = $sectorService->generate($universe, 1);

        $expectedRoot = new Sector();
        $expectedRoot->setUniverse($universe);

        $child = new Sector();
        $child->setUniverse($universe);
        $child->setParent($expectedRoot);
        $expectedRoot->setChildren([$child]);

        $this->assertEquals($root, $expectedRoot);
    }

    /**
     * @covers \App\Services\SectorService::generate()
     * @throws \Exception
     */
    public function testGenerateFail()
    {
        $sectorService = new SectorService();

        /** @var Universe $universe */
        $universe = new Universe();
        $universe->setName('test-universe');

        $root = $sectorService->generate($universe, 1);

        $expectedRoot = new Sector();
        $expectedRoot->setUniverse($universe);

        $this->assertNotEquals($root, $expectedRoot);
    }
}

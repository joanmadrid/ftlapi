<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 20/05/2018
 * Time: 11:09
 */

namespace App\DataFixtures;

use App\Entity\Universe;
use App\Services\SectorService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class SectorFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * @var SectorService
     */
    protected $sectorService;

    /**
     * SectorFixtures constructor.
     * @param SectorService $sectorService
     */
    public function __construct(SectorService $sectorService)
    {
        $this->sectorService = $sectorService;
    }

    public function load(ObjectManager $manager)
    {
        /** @var Universe $universe */
        $universe = $this->getReference(UniverseFixtures::REF_NAME.'-1');
        $rootSector = $this->sectorService->generate($universe, 3, 1, 5);
        $manager->persist($rootSector);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            UniverseFixtures::class
        ];
    }
}
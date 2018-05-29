<?php

namespace App\DataFixtures;

use App\Entity\Ship;
use App\Services\ShipService;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class ShipFixtures extends Fixture
{
    /** @var ShipService */
    protected $shipService;

    /**
     * ShipFixtures constructor.
     * @param ShipService $shipService
     */
    public function __construct(ShipService $shipService)
    {
        $this->shipService = $shipService;
    }

    public function load(ObjectManager $manager)
    {
        $ships = [
            [ShipService::PARAMETER_NAME => 'Serenity'],
            [ShipService::PARAMETER_NAME => 'Millenium Falcon']
        ];

        foreach ($ships as $shipProperties) {
            $newShip = new Ship();
            $this->shipService->update($newShip, $shipProperties);
            $manager->persist($newShip);
        }

        $manager->flush();
    }
}

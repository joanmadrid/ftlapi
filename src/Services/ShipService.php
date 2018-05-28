<?php
/**
 * Created by Noé Andrés Marcos.
 * Mail: nandrmarc@gmail.com
 * Date: 20/05/2018
 * Time: 11:28
 */

namespace App\Services;


use App\Entity\Ship;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;

class ShipService
{
    const PARAMETER_NAME = 'name';

    /**
     * Create a new ship
     *
     * @param array $shipParameters
     *
     * @return Ship
     */
    public function create(array $shipParameters)
    {
        $this->checkParameters($shipParameters);
        $newShip = new Ship();
        $newShip->setName($shipParameters[ShipService::PARAMETER_NAME]);
        return new Ship();
    }

    private function checkParameters($shipParameters)
    {
        foreach ($this->getMandatoryParameters() as $parameter) {
            if (!array_key_exists($parameter, $shipParameters)) {
                throw new ParameterNotFoundException("Parameter: $parameter is missing");
            }
        }
    }

    private function getMandatoryParameters()
    {
        return [
            self::PARAMETER_NAME
        ];
    }
}
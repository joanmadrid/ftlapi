<?php
/**
 * Created by Noé Andrés Marcos.
 * Mail: nandrmarc@gmail.com
 * Date: 20/05/2018
 * Time: 11:28
 */

namespace App\Services;


use App\Entity\Ship;

class ShipService extends EntityService
{
    const PARAMETER_NAME = 'name';

    /**
     * Create a new ship
     *
     * @param array $shipParameters
     * @return Ship|mixed
     * @throws \Exception
     */
    public function create(array $shipParameters)
    {
        $newShip = new Ship();
        return $this->update($newShip, $shipParameters);
    }
}
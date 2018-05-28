<?php
/**
 * Created by Noé Andrés Marcos.
 * Mail: nandrmarc@gmail.com
 * Date: 20/05/2018
 * Time: 11:28
 */

namespace App\Service;


use App\Entity\Ship;

class ShipService
{
    public function create($shipParameters)
    {
        return new Ship();
    }
}
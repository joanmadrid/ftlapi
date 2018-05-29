<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 20/05/2018
 * Time: 11:17
 */

namespace App\Services;

use App\Entity\Sector;
use App\Entity\Universe;

/**
 * Class SectorService
 * @package App\Services
 */
class SectorService extends EntityService
{
    /**
     * Generate sectors in the universe
     *
     * @param Universe $universe
     * @return Sector               Return the root sector of the universe
     */
    public function generateRoot(Universe $universe)
    {
        $root = new Sector();
        $root->setUniverse($universe);
        return $root;
    }
}
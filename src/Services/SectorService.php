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
     * @param int $depth            Depth of the sector tree
     * @param int $minSiblings
     * @param int $maxSiblings
     * @return Sector               Return the root sector of the universe
     */
    public function generate(Universe $universe, $depth = 0, $minSiblings = 1, $maxSiblings = 1)
    {
        $root = new Sector();
        $root->setUniverse($universe);
        $parent = $root;

        for ($i = 0; $i < $depth; $i++) {
            $sector = new Sector();
            $sector->setUniverse($universe);
            $sector->setParent($parent);
            $parent->setChildren([$sector]);
            $parent = $sector;
        }
        return $root;
    }
}
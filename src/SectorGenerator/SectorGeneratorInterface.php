<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 29/05/2018
 * Time: 19:16
 */

namespace App\SectorGenerator;

use App\Entity\Sector;

/**
 * Interface SectorGeneratorInterface
 * @package App\SectorGenerator
 */
interface SectorGeneratorInterface
{
    /**
     * @param string $key
     * @param string $value
     */
    public function setting($key, $value);

    /**
     * @param Sector $root
     * @return Sector
     */
    public function generate(Sector $root);
}
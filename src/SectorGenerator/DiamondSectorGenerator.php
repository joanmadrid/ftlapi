<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 29/05/2018
 * Time: 19:15
 */

namespace App\SectorGenerator;

use App\Entity\Sector;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * Class DiamondSectorGenerator
 * @package App\SectorGenerator
 */
class DiamondSectorGenerator implements SectorGeneratorInterface
{
    /**
     * @var ParameterBag
     */
    protected $settings;

    /**
     * DiamondSectorGenerator constructor.
     */
    public function __construct()
    {
        $this->settings = new ParameterBag();
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function setting($key, $value)
    {
        $this->settings->add([$key => $value]);
    }

    /**
     * @return bool
     */
    protected function validate()
    {
        foreach ($this->getMandatorySettings() as $settingName)
        {
            if (!$this->settings->has($settingName)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return array
     */
    protected function getMandatorySettings()
    {
        return [
            'maxWidth'
        ];
    }

    /**
     * @param Sector $root
     * @return Sector
     * @throws \Exception
     */
    public function generate(Sector $root)
    {
        if ($this->validate()) {
            $maxWidth = $this->settings->get('maxWidth');
            $depth = ($maxWidth - 1)*2;
            $parents = [$root];
            for ($i=1; $i<=$depth; $i++) {
                if ($i < $maxWidth) {
                    $childNum = $i + 1;
                } else {
                    $childNum = $depth + 1 - $i;
                }
                for ($j=0; $j<$childNum; $j++) {
                    $childSector = new Sector();
                    $childSector->setUniverse($root->getUniverse());
                    //@todo: set parents
                }
            }
            return $root;
        } else {
            throw new \Exception('Invalid settings for generate sectors');
        }
    }
}
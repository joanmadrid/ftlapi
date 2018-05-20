<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 20/05/2018
 * Time: 11:03
 */

namespace App\DataFixtures;

use App\Entity\Universe;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class UniverseFixtures extends Fixture
{
    const REF_NAME = 'universe';

    public function load(ObjectManager $manager)
    {
        $data = ['Milky Way', 'Andromeda', 'NGC 1300'];

        foreach ($data as $key => $value) {
            $entity = new Universe();
            $entity->setName($value);
            $manager->persist($entity);
            $this->setReference(self::REF_NAME.'-'.$key, $entity);
        }
        $manager->flush();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 23/05/2018
 * Time: 18:58
 */

namespace App\Services;

use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class EntityService
 * @package App\Services
 * @codeCoverageIgnore
 */
abstract class EntityService
{
    /**
     * @var ManagerRegistry
     */
    protected $manager;

    /**
     * @var string
     */
    protected $entityClass;

    /**
     * EntityService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $classParts = explode('\\', get_class($this));
        $this->entityClass = str_replace(
            'Service',
            '',
            array_pop($classParts)
        );
        if (!class_exists('App\\Entity\\'.$this->entityClass)) {
            throw new \Exception($this->entityClass.' class does not exist');
        }

    }

    /**
     * @param ManagerRegistry $manager
     * @required
     */
    public function setManager(ManagerRegistry $manager): void
    {
        $this->manager = $manager;
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectManager|null|object
     */
    public function getManager()
    {
        return $this->manager->getManagerForClass($this->entityClass);
    }

    /**
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
       return $this->getManager()->getRepository($this->entityClass);
    }
}
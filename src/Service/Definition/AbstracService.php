<?php
/**
 * Created by PhpStorm.
 * User: sesghar
 * Date: 17/05/2018
 * Time: 21:30
 */

namespace App\Service\Definition;

use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

abstract class AbstracService
{
    const ENTITY_CLASS = '';

    /**
     * @var ManagerRegistry;
     */
    protected $managerRegistry;

    /**
     * @required
     * @param ManagerRegistry $managerRegistry
     * @return $this
     */
    public function setManagerRegistry(ManagerRegistry $managerRegistry)
    {
        $this->managerRegistry = $managerRegistry;
        return $this;
    }

    /**
     * Get all
     *
     * @param array $criteria
     *
     * @return array
     */
    public function getAll()
    {
        return $this->findBy([]);
    }

    /**
     * Get by criteria
     *
     * @param array $criteria
     *
     * @return array
     */
    public function findBy($criteria = [])
    {
        /** @var EntityManager $manager */
        $manager = $this->managerRegistry->getManagerForClass($this::ENTITY_CLASS);

        /** @var EntityRepository $repository */
        $repository = $manager->getRepository($this::ENTITY_CLASS);

        return $repository->findBy($criteria);
    }

    /**
     * Find one by id to the actual repo.
     *
     * @param $id
     *
     * @return null|object
     */
    public function find($id)
    {
        if (is_int($id)) {
            $entity = $this->getRepository()->find($id);
            if($entity === null || $entity->getId() != $id) {
                throw new BadRequestHttpException("There is no valid " . $this::ENTITY_CLASS . " with id = " . $id);
            }
        } else {
            throw new BadRequestHttpException($this::ENTITY_CLASS . " - Value for [id] parameter is not valid");
        }
        return $entity;
    }

    /**
     * Remove the entity
     *
     * @param $entity
     */
    public function delete($entity)
    {
        $this->getManager()->remove($entity);
    }

    /**
     * Flush the entity manager.
     */
    public function flush()
    {
        $this->getManager()->flush();
    }

    /**
     * Persist the selected entity.
     *
     * @param $entity
     */
    public function persist($entity)
    {
        $this->getManager()->persist($entity);
    }

    /**
     * Get entity manager
     *
     * @return \Doctrine\Common\Persistence\ObjectManager|null
     */
    public function getManager()
    {
        return $this->managerRegistry->getManagerForClass($this::ENTITY_CLASS);
    }

    /**
     * Get ObjectRepository en the entityClass.
     *
     * @return \Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
        return $this->getManager()->getRepository($this::ENTITY_CLASS);
    }
}
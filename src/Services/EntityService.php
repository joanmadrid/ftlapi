<?php
/**
 * Created by PhpStorm.
 * User: jmadrid
 * Date: 23/05/2018
 * Time: 18:58
 */

namespace App\Services;

use Doctrine\Common\Persistence\ManagerRegistry;
use Symfony\Component\DependencyInjection\Exception\ParameterNotFoundException;
use Symfony\Component\Form\FormFactoryInterface;

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
     * @var string
     */
    protected $formClass;

    /** @var FormFactoryInterface $formFactory */
    protected $formFactory;

    /**
     * EntityService constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $classParts = explode('\\', get_class($this));
        $entityName = str_replace(
            'Service',
            '',
            array_pop($classParts));

        $this->entityClass = 'App\\Entity\\'.$entityName;
        $this->formClass = 'App\\Form\\'.$entityName.'Type';

        if (!class_exists($this->entityClass)) {
            throw new \Exception($this->entityClass.' class does not exist');
        }

    }

    /**
     * @required
     * @param FormFactoryInterface $formFactory
     */
    public function setFormFactory(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
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

    /**
     * Update the entity with the parameters
     *
     * @param $entity
     * @param array $parameters
     *
     * @return mixed
     */
    public function update($entity, array $parameters)
    {
        $form = $this->formFactory->create($this->formClass, $entity);
        $form->submit($parameters);

        if ($form->isValid()) {
            return $form->getData();
        } else {
            throw new ParameterNotFoundException($form->getErrors()->current()->getMessage());
        }
    }
}
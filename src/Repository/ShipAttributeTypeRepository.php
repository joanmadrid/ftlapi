<?php

namespace App\Repository;

use App\Entity\ShipAttributeType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShipAttributeType|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShipAttributeType|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShipAttributeType[]    findAll()
 * @method ShipAttributeType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShipAttributeTypeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShipAttributeType::class);
    }

//    /**
//     * @return ShipAttributeType[] Returns an array of ShipAttributeType objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ShipAttributeType
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

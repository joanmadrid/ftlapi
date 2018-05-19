<?php

namespace App\Repository;

use App\Entity\ShipAttribute;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ShipAttribute|null find($id, $lockMode = null, $lockVersion = null)
 * @method ShipAttribute|null findOneBy(array $criteria, array $orderBy = null)
 * @method ShipAttribute[]    findAll()
 * @method ShipAttribute[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ShipAttributeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ShipAttribute::class);
    }

//    /**
//     * @return ShipAttribute[] Returns an array of ShipAttribute objects
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
    public function findOneBySomeField($value): ?ShipAttribute
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

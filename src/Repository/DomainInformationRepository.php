<?php

namespace App\Repository;

use App\Entity\DomainInformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DomainInformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method DomainInformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method DomainInformation[]    findAll()
 * @method DomainInformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DomainInformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DomainInformation::class);
    }

    // /**
    //  * @return DomainInformation[] Returns an array of DomainInformation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DomainInformation
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\WidgetPage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WidgetPage|null find($id, $lockMode = null, $lockVersion = null)
 * @method WidgetPage|null findOneBy(array $criteria, array $orderBy = null)
 * @method WidgetPage[]    findAll()
 * @method WidgetPage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WidgetPageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WidgetPage::class);
    }

    // /**
    //  * @return WidgetPage[] Returns an array of WidgetPage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WidgetPage
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

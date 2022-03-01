<?php

namespace App\Repository;

use App\Entity\ClassCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ClassCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClassCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClassCategory[]    findAll()
 * @method ClassCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClassCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClassCategory::class);
    }

    // /**
    //  * @return ClassCategory[] Returns an array of ClassCategory objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClassCategory
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

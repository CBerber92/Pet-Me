<?php

namespace App\Repository;

use App\Entity\ListeAnimaux;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ListeAnimaux|null find($id, $lockMode = null, $lockVersion = null)
 * @method ListeAnimaux|null findOneBy(array $criteria, array $orderBy = null)
 * @method ListeAnimaux[]    findAll()
 * @method ListeAnimaux[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ListeAnimauxRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ListeAnimaux::class);
    }

    // /**
    //  * @return ListeAnimaux[] Returns an array of ListeAnimaux objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ListeAnimaux
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

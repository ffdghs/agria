<?php

namespace App\Repository;

use App\Entity\Trophy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Trophy|null find($id, $lockMode = null, $lockVersion = null)
 * @method Trophy|null findOneBy(array $criteria, array $orderBy = null)
 * @method Trophy[]    findAll()
 * @method Trophy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrophyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trophy::class);
    }

    // /**
    //  * @return Trophy[] Returns an array of Trophy objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Trophy
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

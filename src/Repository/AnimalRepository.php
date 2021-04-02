<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Animal|null find($id, $lockMode = null, $lockVersion = null)
 * @method Animal|null findOneBy(array $criteria, array $orderBy = null)
 * @method Animal[]    findAll()
 * @method Animal[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    // /**
    //  * @return Animal[] Returns an array of Animal objects
    //  */

    public function findAnimalByHabitat($name)
    {
        // $entityManager = $this->getEntityManager();

        // $query = $entityManager->createQuery(
        //     'SELECT p, c
        //     FROM App\Entity\Animal p
        //     INNER JOIN p.habitats c
        //     WHERE c.id = 1'
        // );

        // return $query->getResult();
        return $this->getEntityManager()->createQueryBuilder()
        ->select('a')
        ->from('App\Entity\Animal', 'a')
        ->innerJoin('a.habitats', 'h')
        ->where('h.name_habitat =:name')
        ->setParameter('name',$name)
        ->getQuery()
        ->getResult();
    }

    public function findAnimalByContinent($id)
    {
        return $this->getEntityManager()->createQueryBuilder()
        ->select('a')
        ->from('App\Entity\Animal', 'a')
        ->innerJoin('a.pins', 'p')
        ->innerJoin('p.id_region_pin', 'r')
        ->innerJoin('r.id_country_region', 'c')
        ->innerJoin('c.id_continent_country', 'd')
        ->where('d.id =:id')
        ->setParameter('id',$id)
        ->getQuery()
        ->getResult();
    }

    public function getContinentForAnimal($id) 
    {
        return $this->getEntityManager()->createQueryBuilder()
        ->select('a','p','r','c','d')
        ->from('App\Entity\Animal', 'a')
        ->innerJoin('a.pins', 'p')
        ->innerJoin('p.id_region_pin', 'r')
        ->innerJoin('r.id_country_region', 'c')
        ->innerJoin('c.id_continent_country', 'd')
        ->where('a.id =:id')
        ->setParameter('id',$id)
        ->getQuery()
        ->getResult();
    }
    
    // public function findFields()
    // {
    //     return $this->createQueryBuilder('a')
    //         ->andWhere('a.habitats.id = 1')
    //         ->setParameter('val', $value)
    //         ->orderBy('a.id', 'ASC')
    //         ->setMaxResults(10)
    //         ->getQuery()
    //         ->getResult()
    //     ;
    // }
 

    /*
    public function findOneBySomeField($value): ?Animal
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\StatusLote;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatusLote|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusLote|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusLote[]    findAll()
 * @method StatusLote[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusLoteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusLote::class);
    }

    // /**
    //  * @return StatusLote[] Returns an array of StatusLote objects
    //  */
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
    public function findOneBySomeField($value): ?StatusLote
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

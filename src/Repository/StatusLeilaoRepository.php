<?php

namespace App\Repository;

use App\Entity\StatusLeilao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StatusLeilao|null find($id, $lockMode = null, $lockVersion = null)
 * @method StatusLeilao|null findOneBy(array $criteria, array $orderBy = null)
 * @method StatusLeilao[]    findAll()
 * @method StatusLeilao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatusLeilaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StatusLeilao::class);
    }

    // /**
    //  * @return StatusLeilao[] Returns an array of StatusLeilao objects
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
    public function findOneBySomeField($value): ?StatusLeilao
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

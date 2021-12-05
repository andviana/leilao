<?php

namespace App\Repository;

use App\Entity\TipoLeilao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoLeilao|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoLeilao|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoLeilao[]    findAll()
 * @method TipoLeilao[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoLeilaoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoLeilao::class);
    }

    // /**
    //  * @return TipoLeilao[] Returns an array of TipoLeilao objects
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
    public function findOneBySomeField($value): ?TipoLeilao
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

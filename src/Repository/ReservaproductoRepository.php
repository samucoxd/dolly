<?php

namespace App\Repository;

use App\Entity\Reservaproducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Reservaproducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Reservaproducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Reservaproducto[]    findAll()
 * @method Reservaproducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReservaproductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Reservaproducto::class);
    }

    // /**
    //  * @return Reservaproducto[] Returns an array of Reservaproducto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Reservaproducto
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

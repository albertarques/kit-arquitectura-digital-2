<?php

namespace App\Repository;

use App\Entity\ReceiptLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ReceiptLine>
 *
 * @method ReceiptLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method ReceiptLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method ReceiptLine[]    findAll()
 * @method ReceiptLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReceiptLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ReceiptLine::class);
    }

//    /**
//     * @return ReceiptLine[] Returns an array of ReceiptLine objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ReceiptLine
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

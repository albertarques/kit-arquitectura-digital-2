<?php

namespace App\Repository;

use App\Entity\TeacherAbsence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TeacherAbsence>
 *
 * @method TeacherAbsence|null find($id, $lockMode = null, $lockVersion = null)
 * @method TeacherAbsence|null findOneBy(array $criteria, array $orderBy = null)
 * @method TeacherAbsence[]    findAll()
 * @method TeacherAbsence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TeacherAbsenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TeacherAbsence::class);
    }

//    /**
//     * @return TeacherAbsence[] Returns an array of TeacherAbsence objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TeacherAbsence
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

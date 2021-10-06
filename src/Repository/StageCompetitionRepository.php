<?php

namespace App\Repository;

use App\Entity\StageCompetition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StageCompetition|null find($id, $lockMode = null, $lockVersion = null)
 * @method StageCompetition|null findOneBy(array $criteria, array $orderBy = null)
 * @method StageCompetition[]    findAll()
 * @method StageCompetition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StageCompetitionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StageCompetition::class);
    }

    // /**
    //  * @return StageCompetition[] Returns an array of StageCompetition objects
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
    public function findOneBySomeField($value): ?StageCompetition
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

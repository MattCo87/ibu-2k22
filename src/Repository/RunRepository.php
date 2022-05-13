<?php

namespace App\Repository;

use App\Entity\Run;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Run|null find($id, $lockMode = null, $lockVersion = null)
 * @method Run|null findOneBy(array $criteria, array $orderBy = null)
 * @method Run[]    findAll()
 * @method Run[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RunRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Run::class);
    }

    public function addRun($zone, $resultrun, $daterun, $athlete, $competition, $hourrun, $stage, $steprun, $setshot){
        $temp_Run = new Run;

        $temp_Run->setZone($zone);
        $temp_Run->setResultRun($resultrun);
        $temp_Run->setDateRun($daterun);
        $temp_Run->setAthlete($athlete);
        $temp_Run->setCompetition($competition);
        $temp_Run->setHourRun($hourrun);
        $temp_Run->setStage($stage);
        $temp_Run->setStepRun($steprun);
        $temp_Run->setShot($setshot);

        return $temp_Run;
    }




    // /**
    //  * @return Run[] Returns an array of Run objects
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
    public function findOneBySomeField($value): ?Run
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

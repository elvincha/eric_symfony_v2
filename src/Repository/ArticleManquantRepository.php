<?php

namespace App\Repository;

use App\Entity\ArticleManquant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ArticleManquant>
 */
class ArticleManquantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleManquant::class);
    }

    //    /**
    //     * @return ArticleManquant[] Returns an array of ArticleManquant objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }
    public function findArticlesBySaisieId(int $idSaisie): array
    {
        return $this->createQueryBuilder('am')
            ->select('am.nomArticle')
            ->where('am.idSaisie = :idSaisie')
            ->setParameter('idSaisie', $idSaisie)
            ->getQuery()
            ->getResult();
    }

    //    public function findOneBySomeField($value): ?ArticleManquant
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

<?php

namespace App\Repository;

use App\Entity\TipoPregunta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoPregunta>
 *
 * @method TipoPregunta|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoPregunta|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoPregunta[]    findAll()
 * @method TipoPregunta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoPreguntaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoPregunta::class);
    }

//    /**
//     * @return TipoPregunta[] Returns an array of TipoPregunta objects
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

//    public function findOneBySomeField($value): ?TipoPreguntas
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

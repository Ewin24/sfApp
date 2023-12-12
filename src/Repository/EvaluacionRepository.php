<?php

namespace App\Repository;

use App\Entity\Evaluacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\Expr\GroupBy;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @extends ServiceEntityRepository<Evaluacion>
 *
 * @method Evaluacion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evaluacion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evaluacion[]    findAll()
 * @method Evaluacion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvaluacionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evaluacion::class);
        
    }

    //    /**
    //     * @return Evaluacion[] Returns an array of Evaluacion objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('e.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Evaluacion
    //    {
    //        return $this->createQueryBuilder('e')
    //            ->andWhere('e.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
    public function obtenerCalificaciones()
    {
        $qb = $this->createQueryBuilder('ev')
            ->select('e.id AS estudiante_id', 'e.Nombre AS estudiante_nombre', 'e.Apellido AS estudiante_apellido', 'c.Nombre AS curso_nombre', 'ev.Asignatura AS evaluacion_asignatura', 'ev.Fecha AS evaluacion_fecha', 'ev.Calificacion AS evaluacion_calificacion')
            ->from('App\Entity\Estudiante', 'e')
            ->join('e.Fk_Cursos', 'c');

        // $pageNumber = $request->query->getInt('page', 1);

        // $itemsPerPage = 10;

        // $pagination = $this->paginator->paginate(
        //     $qb->getQuery(),
        //     $pageNumber,
        //     $itemsPerPage
        // );

        // return $pagination;
        return $qb->getQuery()->getResult();
    }
}

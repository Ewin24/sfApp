<?php

namespace App\Repository;

use App\Entity\Evaluacion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
        $qb = $this->createQueryBuilder('evaluacion')
            ->select('evaluacion.Asignatura AS Asignatura','evaluacion.Calificacion','c.Nombre AS nombre_cruso')
            ->join('evaluacion.Fk_Cursos', 'c');
            ->join('evaluacion.Fk_Cursos', 'c');

        echo $qb;
        echo $qb->getQuery()->getResult()[0]['Asignatura'];
        
        return $qb->getQuery()->getResult();

        // ->select('e.id AS estudiante_id', 'e.nombre AS estudiante_nombre', 'e.apellido AS estudiante_apellido', 'c.nombre AS curso_nombre', 'ev.asignatura AS evaluacion_asignatura', 'ev.fecha AS evaluacion_fecha', 'ev.calificacion AS evaluacion_calificacion')
        // ->join('re.estudiante', 'e')
        // ->join('re.curso', 'c')
        // ->join('re.evaluacion', 'ev')
        // ->join('ev.preguntas', 'p')
        // ->where('p.correcto = :correcto')
        // ->setParameter('correcto', 1);
    }
}

<?php

namespace App\Repository;

use App\Entity\Beneficio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @extends ServiceEntityRepository<Beneficio>
 */
class BeneficioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Beneficio::class);
    }

    public function findBeneficiosAlfabeticamente(): Query
    {
        return $this->createQueryBuilder('b')
        ->orderBy('b.nombre', 'ASC')
        ->getQuery();
    }

    public function findBeneficioByProducto(int $productoId): array
    {
        return $this->createQueryBuilder('b')
            ->innerJoin('b.productos', 'p')
            ->andWhere('p.id = :productoId')
            ->setParameter('productoId', $productoId)
            ->getQuery()
            ->getResult();
    }

    public function findBeneficioFromHistorial(?int $usuarioId = null): array
    {
        $qb = $this->createQueryBuilder('b')
            ->innerJoin('b.historiales', 'h')
            ->addSelect('h')
            ->orderBy('h.id', 'DESC');

        if ($usuarioId !== null) {
            $qb->andWhere('h.usuario = :usuarioId')
               ->setParameter('usuarioId', $usuarioId);
        }

        return $qb->getQuery()->getResult();
    }

    public function findBeneficioByEstado(string $estado): array
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.estado = :estado')
            ->setParameter('estado', $estado)
            ->orderBy('b.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findBeneficioByVenta(int $ventaId): array
    {
        return $this->createQueryBuilder('b')
            ->distinct()
            ->innerJoin('b.productos', 'p')
            ->innerJoin('p.detallesVenta', 'dv')
            ->andWhere('dv.venta = :ventaId')
            ->setParameter('ventaId', $ventaId)
            ->getQuery()
            ->getResult();
    }


//    /**
//     * @return Beneficio[] Returns an array of Beneficio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Beneficio
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

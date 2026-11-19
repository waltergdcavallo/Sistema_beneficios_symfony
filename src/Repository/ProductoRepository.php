<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @extends ServiceEntityRepository<Producto>
 */
class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }

    public function findProductosAlfabeticamente(): Query
    {
        return $this->createQueryBuilder('p')
        ->orderBy('p.nombre', 'ASC')
        ->getQuery();
    }

    public function findProductoByBeneficio(int $beneficioId): array
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.beneficio = :beneficioId')
            ->setParameter('beneficioId', $beneficioId)
            ->orderBy('p.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function findByVenta(int $ventaId): array
    {
        return $this->createQueryBuilder('p')
            ->distinct()
            ->innerJoin('p.detallesVenta', 'dv')
            ->andWhere('dv.venta = :ventaId')
            ->setParameter('ventaId', $ventaId)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Producto[] Returns an array of Producto objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Producto
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

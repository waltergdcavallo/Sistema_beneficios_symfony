<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query;

/**
 * @extends ServiceEntityRepository<Usuario>
 */
class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function findUsuariosAlfabeticamente(): Query
    {
        return $this->createQueryBuilder('u')
        ->orderBy('u.nombre', 'ASC')
        ->getQuery();
    }

    public function findUsuarioByTopVentas(?int $beneficioId = null, int $limit = 1): array
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u', 'COUNT(DISTINCT v.id) AS totalVentas')
            ->innerJoin('u.ventas', 'v')
            ->innerJoin('v.detallesVenta', 'dv')
            ->innerJoin('dv.producto', 'p')
            ->groupBy('u.id')
            ->orderBy('totalVentas', 'DESC')
            ->setMaxResults($limit);

        if ($beneficioId !== null) {
            $qb->andWhere('p.beneficio = :beneficioId')
               ->setParameter('beneficioId', $beneficioId);
        }

        return $qb->getQuery()->getResult();
    }

    public function findUsuarioByVenta(int $ventaId): ?Usuario
    {
        return $this->createQueryBuilder('u')
            ->innerJoin('u.ventas', 'v')
            ->andWhere('v.id = :ventaId')
            ->setParameter('ventaId', $ventaId)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findUsuarioByBeneficio(int $beneficioId): array
    {
        return $this->createQueryBuilder('u')
            ->distinct()
            ->innerJoin('u.historiales', 'h')
            ->andWhere('h.beneficio = :beneficioId')
            ->setParameter('beneficioId', $beneficioId)
            ->getQuery()
            ->getResult();
    }

    public function findVendedores(): array
    {
        return $this->findUsuarioByRol('vendedor');
    }

    public function findAdministradores(): array
    {
        return $this->findUsuarioByRol('admin');
    }

    public function findPendientes(): array
    {
        return $this->findUsuarioByRol('pendiente');
    }

    private function findUsuarioByRol(string $valor): array
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.rol = :valor')
            ->setParameter('valor', $valor)
            ->orderBy('u.id', 'DESC')
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Usuario[] Returns an array of Usuario objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('u.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Usuario
//    {
//        return $this->createQueryBuilder('u')
//            ->andWhere('u.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

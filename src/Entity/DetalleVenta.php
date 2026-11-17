<?php

namespace App\Entity;

use App\Repository\DetalleVentaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: DetalleVentaRepository::class)]
class DetalleVenta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Detalle')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Venta $Id_venta = null;

    #[ORM\ManyToOne(inversedBy: 'Ventas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Producto $Id_producto = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Entregado = null;

    #[ORM\Column(nullable: true)]
    private ?bool $Pagado = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdVenta(): ?Venta
    {
        return $this->Id_venta;
    }

    public function setIdVenta(?Venta $Id_venta): static
    {
        $this->Id_venta = $Id_venta;

        return $this;
    }

    public function getIdProducto(): ?Producto
    {
        return $this->Id_producto;
    }

    public function setIdProducto(?Producto $Id_producto): static
    {
        $this->Id_producto = $Id_producto;

        return $this;
    }

    public function isEntregado(): ?bool
    {
        return $this->Entregado;
    }

    public function setEntregado(?bool $Entregado): static
    {
        $this->Entregado = $Entregado;

        return $this;
    }

    public function isPagado(): ?bool
    {
        return $this->Pagado;
    }

    public function setPagado(?bool $Pagado): static
    {
        $this->Pagado = $Pagado;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\VentaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentaRepository::class)]
class Venta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 0)]
    private ?string $Monto = null;

    #[ORM\Column]
    private ?int $Cantidad = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Fecha_venta = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMonto(): ?string
    {
        return $this->Monto;
    }

    public function setMonto(string $Monto): static
    {
        $this->Monto = $Monto;

        return $this;
    }

    public function getCantidad(): ?int
    {
        return $this->Cantidad;
    }

    public function setCantidad(int $Cantidad): static
    {
        $this->Cantidad = $Cantidad;

        return $this;
    }

    public function getFechaVenta(): ?\DateTime
    {
        return $this->Fecha_venta;
    }

    public function setFechaVenta(\DateTime $Fecha_venta): static
    {
        $this->Fecha_venta = $Fecha_venta;

        return $this;
    }
}

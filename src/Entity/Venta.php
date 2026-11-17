<?php

namespace App\Entity;

use App\Repository\VentaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VentaRepository::class)]
class Venta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Monto = null;

    #[ORM\Column]
    private ?int $Cantidad = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Fecha_venta = null;

    /**
     * @var Collection<int, DetalleVenta>
     */
    #[ORM\OneToMany(targetEntity: DetalleVenta::class, mappedBy: 'Id_venta')]
    private Collection $Detalle;

    #[ORM\ManyToOne(inversedBy: 'Ventas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $Id_usuario = null;

    public function __construct()
    {
        $this->Detalle = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, DetalleVenta>
     */
    public function getDetalle(): Collection
    {
        return $this->Detalle;
    }

    public function addDetalle(DetalleVenta $detalle): static
    {
        if (!$this->Detalle->contains($detalle)) {
            $this->Detalle->add($detalle);
            $detalle->setIdVenta($this);
        }

        return $this;
    }

    public function removeDetalle(DetalleVenta $detalle): static
    {
        if ($this->Detalle->removeElement($detalle)) {
            // set the owning side to null (unless already changed)
            if ($detalle->getIdVenta() === $this) {
                $detalle->setIdVenta(null);
            }
        }

        return $this;
    }

    public function getIdUsuario(): ?Usuario
    {
        return $this->Id_usuario;
    }

    public function setIdUsuario(?Usuario $Id_usuario): static
    {
        $this->Id_usuario = $Id_usuario;

        return $this;
    }
}

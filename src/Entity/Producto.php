<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductoRepository::class)]
class Producto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $Precio = null;

    #[ORM\Column]
    private ?int $Stock_inicial = null;

    #[ORM\Column]
    private ?int $Stock_actual = null;

    /**
     * @var Collection<int, DetalleVenta>
     */
    #[ORM\OneToMany(targetEntity: DetalleVenta::class, mappedBy: 'Id_producto')]
    private Collection $Ventas;

    #[ORM\OneToOne(inversedBy: 'Producto', cascade: ['persist', 'remove'])]
    private ?Beneficio $Id_beneficio = null;

    public function __construct()
    {
        $this->Ventas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): static
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getPrecio(): ?string
    {
        return $this->Precio;
    }

    public function setPrecio(string $Precio): static
    {
        $this->Precio = $Precio;

        return $this;
    }

    public function getStockInicial(): ?int
    {
        return $this->Stock_inicial;
    }

    public function setStockInicial(int $Stock_inicial): static
    {
        $this->Stock_inicial = $Stock_inicial;

        return $this;
    }

    public function getStockActual(): ?int
    {
        return $this->Stock_actual;
    }

    public function setStockActual(int $Stock_actual): static
    {
        $this->Stock_actual = $Stock_actual;

        return $this;
    }

    /**
     * @return Collection<int, DetalleVenta>
     */
    public function getVentas(): Collection
    {
        return $this->Ventas;
    }

    public function addVenta(DetalleVenta $venta): static
    {
        if (!$this->Ventas->contains($venta)) {
            $this->Ventas->add($venta);
            $venta->setIdProducto($this);
        }

        return $this;
    }

    public function removeVenta(DetalleVenta $venta): static
    {
        if ($this->Ventas->removeElement($venta)) {
            // set the owning side to null (unless already changed)
            if ($venta->getIdProducto() === $this) {
                $venta->setIdProducto(null);
            }
        }

        return $this;
    }

    public function getIdBeneficio(): ?Beneficio
    {
        return $this->Id_beneficio;
    }

    public function setIdBeneficio(?Beneficio $Id_beneficio): static
    {
        $this->Id_beneficio = $Id_beneficio;

        return $this;
    }
}

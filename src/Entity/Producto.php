<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
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

    #[ORM\Column(type: Types::DECIMAL, precision: 11, scale: 0)]
    private ?string $Precio = null;

    #[ORM\Column]
    private ?int $Stock_inicial = null;

    #[ORM\Column]
    private ?int $Stock_actual = null;

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
}

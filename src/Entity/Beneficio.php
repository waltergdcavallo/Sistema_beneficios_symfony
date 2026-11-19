<?php

namespace App\Entity;

use App\Enum\Status;
use App\Repository\BeneficioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BeneficioRepository::class)]
class Beneficio
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Fecha_inicio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Fecha_fin = null;

    #[ORM\Column(enumType: Status::class)]
    private ?Status $Estado = null;

    #[ORM\Column(length: 255)]
    private ?string $Descripcion = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Imagen = null;

    /**
     * @var Collection<int, Historial>
     */
    #[ORM\OneToMany(targetEntity: Historial::class, mappedBy: 'Id_beneficio')]
    private Collection $Historial;

    #[ORM\OneToOne(mappedBy: 'Id_beneficio', cascade: ['persist', 'remove'])]
    private ?Producto $Producto = null;

    #[ORM\Column(length: 255)]
    private ?string $Creador = null;

    public function __construct()
    {
        $this->Historial = new ArrayCollection();
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

    public function getFechaInicio(): ?\DateTime
    {
        return $this->Fecha_inicio;
    }

    public function setFechaInicio(\DateTime $Fecha_inicio): static
    {
        $this->Fecha_inicio = $Fecha_inicio;

        return $this;
    }

    public function getFechaFin(): ?\DateTime
    {
        return $this->Fecha_fin;
    }

    public function setFechaFin(\DateTime $Fecha_fin): static
    {
        $this->Fecha_fin = $Fecha_fin;

        return $this;
    }

    public function getEstado(): ?Status
    {
        return $this->Estado;
    }

    public function setEstado(Status $Estado): static
    {
        $this->Estado = $Estado;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->Descripcion;
    }

    public function setDescripcion(string $Descripcion): static
    {
        $this->Descripcion = $Descripcion;

        return $this;
    }

    public function getImagen(): ?string
    {
        return $this->Imagen;
    }

    public function setImagen(?string $Imagen): static
    {
        $this->Imagen = $Imagen;

        return $this;
    }

    /**
     * @return Collection<int, Historial>
     */
    public function getHistorial(): Collection
    {
        return $this->Historial;
    }

    public function addHistorial(Historial $historial): static
    {
        if (!$this->Historial->contains($historial)) {
            $this->Historial->add($historial);
            $historial->setIdBeneficio($this);
        }

        return $this;
    }

    public function removeHistorial(Historial $historial): static
    {
        if ($this->Historial->removeElement($historial)) {
            // set the owning side to null (unless already changed)
            if ($historial->getIdBeneficio() === $this) {
                $historial->setIdBeneficio(null);
            }
        }

        return $this;
    }

    public function getProducto(): ?Producto
    {
        return $this->Producto;
    }

    public function setProducto(?Producto $Producto): static
    {
        // unset the owning side of the relation if necessary
        if ($Producto === null && $this->Producto !== null) {
            $this->Producto->setIdBeneficio(null);
        }

        // set the owning side of the relation if necessary
        if ($Producto !== null && $Producto->getIdBeneficio() !== $this) {
            $Producto->setIdBeneficio($this);
        }

        $this->Producto = $Producto;

        return $this;
    }

    public function getCreador(): ?string
    {
        return $this->Creador;
    }

    public function setCreador(string $Creador): static
    {
        $this->Creador = $Creador;

        return $this;
    }
}

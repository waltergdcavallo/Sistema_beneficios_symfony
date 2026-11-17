<?php

namespace App\Entity;

use App\Enum\UserRole;
use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UsuarioRepository::class)]
class Usuario
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $Apellido = null;

    #[ORM\Column]
    private ?int $Dni = null;

    #[ORM\Column]
    private ?int $Telefono = null;

    #[ORM\Column(length: 255)]
    private ?string $Email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Direccion = null;

    #[ORM\Column(length: 255)]
    private ?string $Contraseña = null;

    #[ORM\Column(enumType: UserRole::class)]
    private ?UserRole $Rol = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Foto = null;

    /**
     * @var Collection<int, Historial>
     */
    #[ORM\OneToMany(targetEntity: Historial::class, mappedBy: 'Id_usuario')]
    private Collection $Historial;

    /**
     * @var Collection<int, Venta>
     */
    #[ORM\OneToMany(targetEntity: Venta::class, mappedBy: 'Id_usuario')]
    private Collection $Ventas;

    public function __construct()
    {
        $this->Historial = new ArrayCollection();
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

    public function getApellido(): ?string
    {
        return $this->Apellido;
    }

    public function setApellido(string $Apellido): static
    {
        $this->Apellido = $Apellido;

        return $this;
    }

    public function getDni(): ?int
    {
        return $this->Dni;
    }

    public function setDni(int $Dni): static
    {
        $this->Dni = $Dni;

        return $this;
    }

    public function getTelefono(): ?int
    {
        return $this->Telefono;
    }

    public function setTelefono(int $Telefono): static
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): static
    {
        $this->Email = $Email;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->Direccion;
    }

    public function setDireccion(?string $Direccion): static
    {
        $this->Direccion = $Direccion;

        return $this;
    }

    public function getContraseña(): ?string
    {
        return $this->Contraseña;
    }

    public function setContraseña(string $Contraseña): static
    {
        $this->Contraseña = $Contraseña;

        return $this;
    }

    public function getRol(): ?UserRole
    {
        return $this->Rol;
    }

    public function setRol(UserRole $Rol): static
    {
        $this->Rol = $Rol;

        return $this;
    }

    public function getFoto(): ?string
    {
        return $this->Foto;
    }

    public function setFoto(?string $Foto): static
    {
        $this->Foto = $Foto;

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
            $historial->setIdUsuario($this);
        }

        return $this;
    }

    public function removeHistorial(Historial $historial): static
    {
        if ($this->Historial->removeElement($historial)) {
            // set the owning side to null (unless already changed)
            if ($historial->getIdUsuario() === $this) {
                $historial->setIdUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Venta>
     */
    public function getVentas(): Collection
    {
        return $this->Ventas;
    }

    public function addVenta(Venta $venta): static
    {
        if (!$this->Ventas->contains($venta)) {
            $this->Ventas->add($venta);
            $venta->setIdUsuario($this);
        }

        return $this;
    }

    public function removeVenta(Venta $venta): static
    {
        if ($this->Ventas->removeElement($venta)) {
            // set the owning side to null (unless already changed)
            if ($venta->getIdUsuario() === $this) {
                $venta->setIdUsuario(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Enum\UserRole;
use App\Repository\UsuarioRepository;
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
}

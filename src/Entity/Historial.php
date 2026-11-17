<?php

namespace App\Entity;

use App\Repository\HistorialRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HistorialRepository::class)]
class Historial
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'Historial')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Usuario $Id_usuario = null;

    #[ORM\ManyToOne(inversedBy: 'Historial')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Beneficio $Id_beneficio = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $Fecha_inscripto = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getIdBeneficio(): ?Beneficio
    {
        return $this->Id_beneficio;
    }

    public function setIdBeneficio(?Beneficio $Id_beneficio): static
    {
        $this->Id_beneficio = $Id_beneficio;

        return $this;
    }

    public function getFechaInscripto(): ?\DateTime
    {
        return $this->Fecha_inscripto;
    }

    public function setFechaInscripto(\DateTime $Fecha_inscripto): static
    {
        $this->Fecha_inscripto = $Fecha_inscripto;

        return $this;
    }
}

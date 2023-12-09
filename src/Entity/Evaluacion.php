<?php

namespace App\Entity;

use App\Repository\EvaluacionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EvaluacionRepository::class)]
class Evaluacion
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 55)]
    private ?string $Asignatura = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $Fecha = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 3, scale: '0')]
    private ?string $Calificacion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAsignatura(): ?string
    {
        return $this->Asignatura;
    }

    public function setAsignatura(string $Asignatura): static
    {
        $this->Asignatura = $Asignatura;

        return $this;
    }

    public function getFecha(): ?\DateTimeInterface
    {
        return $this->Fecha;
    }

    public function setFecha(\DateTimeInterface $Fecha): static
    {
        $this->Fecha = $Fecha;

        return $this;
    }

    public function getCalificacion(): ?string
    {
        return $this->Calificacion;
    }

    public function setCalificacion(string $Calificacion): static
    {
        $this->Calificacion = $Calificacion;

        return $this;
    }
}

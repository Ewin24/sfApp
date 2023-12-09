<?php

namespace App\Entity;

use App\Repository\EstudianteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstudianteRepository::class)]
class Estudiante
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $Apellido = null;

    #[ORM\ManyToOne(inversedBy: 'Estudiantes')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Curso $Fk_Cursos = null;

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

    public function getFkCursos(): ?Curso
    {
        return $this->Fk_Cursos;
    }

    public function setFkCursos(?Curso $Fk_Cursos): static
    {
        $this->Fk_Cursos = $Fk_Cursos;

        return $this;
    }
}

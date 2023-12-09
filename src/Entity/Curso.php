<?php

namespace App\Entity;

use App\Repository\CursoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursoRepository::class)]
class Curso
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\OneToMany(mappedBy: 'Fk_Cursos', targetEntity: Evaluacion::class)]
    private Collection $Evaluaciones;

    #[ORM\OneToMany(mappedBy: 'Fk_Cursos', targetEntity: Estudiante::class)]
    private Collection $Estudiantes;

    public function __construct()
    {
        $this->Evaluaciones = new ArrayCollection();
        $this->Estudiantes = new ArrayCollection();
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

    /**
     * @return Collection<int, Evaluacion>
     */
    public function getEvaluaciones(): Collection
    {
        return $this->Evaluaciones;
    }

    public function addEvaluacione(Evaluacion $evaluacione): static
    {
        if (!$this->Evaluaciones->contains($evaluacione)) {
            $this->Evaluaciones->add($evaluacione);
            $evaluacione->setFkCursos($this);
        }

        return $this;
    }

    public function removeEvaluacione(Evaluacion $evaluacione): static
    {
        if ($this->Evaluaciones->removeElement($evaluacione)) {
            // set the owning side to null (unless already changed)
            if ($evaluacione->getFkCursos() === $this) {
                $evaluacione->setFkCursos(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Estudiante>
     */
    public function getEstudiantes(): Collection
    {
        return $this->Estudiantes;
    }

    public function addEstudiante(Estudiante $estudiante): static
    {
        if (!$this->Estudiantes->contains($estudiante)) {
            $this->Estudiantes->add($estudiante);
            $estudiante->setFkCursos($this);
        }

        return $this;
    }

    public function removeEstudiante(Estudiante $estudiante): static
    {
        if ($this->Estudiantes->removeElement($estudiante)) {
            // set the owning side to null (unless already changed)
            if ($estudiante->getFkCursos() === $this) {
                $estudiante->setFkCursos(null);
            }
        }

        return $this;
    }
}

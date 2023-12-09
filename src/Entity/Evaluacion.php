<?php

namespace App\Entity;

use App\Repository\EvaluacionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\OneToMany(mappedBy: 'Fk_Evaluacion', targetEntity: Pregunta::class)]
    private Collection $preguntas;

    #[ORM\ManyToOne(inversedBy: 'Evaluaciones')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Curso $Fk_Cursos = null;

    public function __construct()
    {
        $this->preguntas = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Pregunta>
     */
    public function getPreguntas(): Collection
    {
        return $this->preguntas;
    }

    public function addPregunta(Pregunta $pregunta): static
    {
        if (!$this->preguntas->contains($pregunta)) {
            $this->preguntas->add($pregunta);
            $pregunta->setFkEvaluacion($this);
        }

        return $this;
    }

    public function removePregunta(Pregunta $pregunta): static
    {
        if ($this->preguntas->removeElement($pregunta)) {
            // set the owning side to null (unless already changed)
            if ($pregunta->getFkEvaluacion() === $this) {
                $pregunta->setFkEvaluacion(null);
            }
        }

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

<?php

namespace App\Entity;

use App\Repository\PreguntaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PreguntaRepository::class)]
class Pregunta
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Pregunta = null;

    #[ORM\Column(length: 255)]
    private ?string $Respuesta = null;

    #[ORM\Column]
    private ?bool $Correcto = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?TipoPregunta $Fk_Tipo_Pregunta = null;

    #[ORM\ManyToOne(inversedBy: 'preguntas')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Evaluacion $Fk_Evaluacion = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPregunta(): ?string
    {
        return $this->Pregunta;
    }

    public function setPregunta(string $Pregunta): static
    {
        $this->Pregunta = $Pregunta;

        return $this;
    }

    public function getRespuesta(): ?string
    {
        return $this->Respuesta;
    }

    public function setRespuesta(string $Respuesta): static
    {
        $this->Respuesta = $Respuesta;

        return $this;
    }

    public function isCorrecto(): ?bool
    {
        return $this->Correcto;
    }

    public function setCorrecto(bool $Correcto): static
    {
        $this->Correcto = $Correcto;

        return $this;
    }

    public function getFkTipoPregunta(): ?TipoPregunta
    {
        return $this->Fk_Tipo_Pregunta;
    }

    public function setFkTipoPregunta(TipoPregunta $Fk_Tipo_Pregunta): static
    {
        $this->Fk_Tipo_Pregunta = $Fk_Tipo_Pregunta;

        return $this;
    }

    public function getFkEvaluacion(): ?Evaluacion
    {
        return $this->Fk_Evaluacion;
    }

    public function setFkEvaluacion(?Evaluacion $Fk_Evaluacion): static
    {
        $this->Fk_Evaluacion = $Fk_Evaluacion;

        return $this;
    }
}

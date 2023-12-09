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
}

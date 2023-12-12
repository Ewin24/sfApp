<?php

namespace App\Entity;

use App\Repository\MensajeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MensajeRepository::class)]
class Mensaje
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Mensaje = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $FechaEnvio = null;

    #[ORM\Column(length: 100)]
    private ?string $Correo = null;

    public function __construct()
    {
    }

    public function __constructAll(?string $mensaje, ?\DateTime $fechaEnvio, ?string $correo)
    {
        $this->Mensaje = $mensaje;
        $this->FechaEnvio = $fechaEnvio;
        $this->Correo = $correo;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMensaje(): ?string
    {
        return $this->Mensaje;
    }

    public function setMensaje(string $Mensaje): static
    {
        $this->Mensaje = $Mensaje;

        return $this;
    }

    public function getFechaEnvio(): ?\DateTimeInterface
    {
        return $this->FechaEnvio;
    }

    public function setFechaEnvio(\DateTimeInterface $FechaEnvio): static
    {
        $this->FechaEnvio = $FechaEnvio;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(string $Correo): static
    {
        $this->Correo = $Correo;

        return $this;
    }
}

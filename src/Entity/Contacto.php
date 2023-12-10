<?php

namespace App\Entity;

use App\Repository\ContactoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactoRepository::class)]
class Contacto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Nombre = null;

    #[ORM\Column(length: 255)]
    private ?string $Apellido = null;

    #[ORM\Column(length: 255)]
    private ?string $Correo = null;

    #[ORM\Column(length: 255)]
    private ?string $Celular = null;

    #[ORM\Column(length: 255)]
    private ?string $Mensaje = null;

    #[ORM\ManyToOne(inversedBy: 'contactos')]
    #[ORM\JoinColumn(nullable: false)]
    private ?AreaContacto $Fk_AreaContacto = null;

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

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(string $Correo): static
    {
        $this->Correo = $Correo;

        return $this;
    }

    public function getCelular(): ?string
    {
        return $this->Celular;
    }

    public function setCelular(string $Celular): static
    {
        $this->Celular = $Celular;

        return $this;
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

    public function getFkAreaContacto(): ?AreaContacto
    {
        return $this->Fk_AreaContacto;
    }

    public function setFkAreaContacto(?AreaContacto $Fk_AreaContacto): static
    {
        $this->Fk_AreaContacto = $Fk_AreaContacto;

        return $this;
    }

}

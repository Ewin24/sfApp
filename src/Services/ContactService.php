<?php

namespace App\Service;

use App\Entity\Contacto;
use Doctrine\ORM\EntityManagerInterface;

class ContactoService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function saveContacto($nombre, $apellido, $correo, $celular, $mensaje, $fk_areaContacto)
    {
        $contacto = new Contacto();
        $contacto->setNombre($nombre);
        $contacto->setApellido($apellido);
        $contacto->setCorreo($correo);
        $contacto->setCelular($celular);
        $contacto->setMensaje($mensaje);
        $contacto->setFkAreaContacto($fk_areaContacto);

        $this->entityManager->persist($contacto);
        $this->entityManager->flush();
    }
}

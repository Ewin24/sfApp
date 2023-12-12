<?php

namespace App\Service;

use App\Entity\Mensaje;
use Doctrine\ORM\EntityManagerInterface;

class MensajeService
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function puedeEnviarMensaje(string $correo): bool
    {
        $ultimoMensaje = $this->entityManager->getRepository(Mensaje::class)
            ->findOneBy(['Correo' => $correo], ['FechaEnvio' => 'DESC']);

        if (!$ultimoMensaje) {
            return true;
        }

        $ayer = new \DateTime('yesterday');

        if ($ultimoMensaje->getFechaEnvio() < $ayer) {
            return true;
        } else {
            return false;
        }
    }

    public function saveMensaje(Mensaje $mensaje)
    {
        $this->entityManager->persist($mensaje);
        $this->entityManager->flush();
    }
}

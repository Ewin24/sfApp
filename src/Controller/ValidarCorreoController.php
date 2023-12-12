<?php

namespace App\Controller;

use App\Entity\Mensaje;
use App\Repository\MensajeRepository;
use App\Service\MensajeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValidarCorreoController extends AbstractController
{

    #[Route('/mensaje', name: 'getMesnaje')]
    public function index(MensajeRepository $mensajeRepository): Response
    {
        return $this->render(
            'mensaje/mensaje.html.twig',
            ['mensajes' => $mensajeRepository->findAll()]
        );
    }

    #[Route('/mensaje/save', name: 'enviarMensaje', methods: ['GET', 'POST'])]
    public function save(Request $request, MensajeRepository $mensajeRepository, MensajeService $mensajeService): Response
    {
        if ($request->isMethod('POST')) {
            $correo = $request->request->get('correo');
            $mensaje = $request->request->get('mensaje');
            $fechaEnvio = new \DateTime();
            $fechaEnvio->format('Y-m-d');

            $entidad_mensaje = new Mensaje();
            $entidad_mensaje->setMensaje($mensaje);
            $entidad_mensaje->setCorreo($correo);
            $entidad_mensaje->setFechaEnvio($fechaEnvio);

            if ($mensajeService->puedeEnviarMensaje($correo)) {
                $mensajeService->saveMensaje($entidad_mensaje);
                return $this->render(
                    'mensaje/mensaje.html.twig',
                    [
                        'mensajes' => $mensajeRepository->findAll()
                    ]
                );
            } else {
                return $this->render(
                    'mensaje/mensajeSave.html.twig',
                    [
                        'puedeEnviar' => $mensajeService->puedeEnviarMensaje($entidad_mensaje->getCorreo())
                    ]
                );
            }
        } else {
            return $this->render(
                'mensaje/mensajeSave.html.twig',
                [
                    'puedeEnviar' => true
                ]
            );
        }
    }
}

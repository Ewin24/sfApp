<?php

namespace App\Controller;

use App\Repository\AreaContactoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ContactoRepository;
use App\Service\ContactoService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactoController extends AbstractController
{
    #[Route('/contacto', name: 'get_contacto')]
    public function index(ContactoRepository $contactoRepository): Response
    {
        return $this->render(
            'contact/contact.html.twig',
            ['contacts' => $contactoRepository->findAll()]
        );
    }

    #[Route('/contacto/save', name: 'save_contacto', methods: ['GET', 'POST'])]
    public function save(Request $request, ContactoService $contactoService, ContactoRepository $contactoRepository, AreaContactoRepository $areaContactoRepository): Response
    {
        if ($request->isMethod('POST')) {
            $nombre = $request->request->get('nombre');
            $apellido = $request->request->get('apellido');
            $correo = $request->request->get('correo');
            $celular = $request->request->get('celular');
            $mensaje = $request->request->get('mensaje');
            $fk_areaContactoId = intval($request->request->get('area_contacto'));

            $entidad_AreaContacto = $areaContactoRepository->findOneById($fk_areaContactoId);


            // Realizar acciones con los datos, por ejemplo, guardar en la base de datos
            $contactoService->saveContacto($nombre, $apellido, $correo, $celular, $mensaje, $entidad_AreaContacto);

            return $this->render(
                'contact/contact.html.twig',
                ['contacts' => $contactoRepository->findAll()]
            );
        }

        return $this->render(
            'contact/contactForm.html.twig',
            ['areas_contacto' => $areaContactoRepository->findAll()]
        );
    }
}

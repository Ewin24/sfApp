<?php

namespace App\Controller;

use App\Repository\EvaluacionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ResultadoEvaluacionRepository;
use Symfony\Component\HttpFoundation\Request;

class EvaluacionController extends AbstractController
{
    #[Route('/calificaciones', name: 'mostrar_calificaciones')]
    public function mostrarCalificaciones(EvaluacionRepository $evaluacionRepository): Response
    {
        $calificaciones = $evaluacionRepository->obtenerCalificaciones();
        return $this->render('evaluacion/resultadosEvaluacion.html.twig', [
            'informacion' => $calificaciones,
        ]);
    }
}

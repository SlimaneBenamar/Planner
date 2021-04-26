<?php

namespace App\Controller;

use App\Repository\EnseignantRepository;
use App\Repository\SeanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index(SeanceRepository $seance): Response
    {
        $events = $seance->findAll();
        foreach ($events as $event) {
            $cours[] = [
                'start' => $event->getDateDebut()->format('Y-m-d H:i:s'),
                'end' => $event->getDateFin()->format('Y-m-d H:i:s'),
                'title' => $event->getType(),
                'enseignant' => $event->getIdEnseignant(),
                'idModule' => $event->getIdModule(),
                'idSalle' => $event->getIdSalle(),  
                'groupe' => $event->getGroupe(),
            ];
        }
        $data = json_encode($cours);
        return $this->render('main/index.html.twig', compact('data'));
    }
}

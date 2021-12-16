<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Repository\MissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController extends AbstractController
{


    /**
     * @Route("/missions", name="app_missions")
     */
    public function index(MissionRepository $missionRepository): Response
    {
       // $missions = $missionRepository->findAll();
        $missions = $missionRepository->findBy([], ['execute_date' => 'DESC']);

        return $this->render('mission/index.html.twig', compact('missions'));
    }

    /**
     * @Route("/missions/create", name="app_missions_create")
     */
    public function create(): Response
    {
        return $this->render('mission/create.html.twig');

    }

    /**
     * @Route ("/missions/{id<[0-9]+>}", name= "app_mission_show")
     */
    public function show(Mission $mission): Response
    {
        return $this->render('mission/details.html.twig', compact('mission'));
    }
}

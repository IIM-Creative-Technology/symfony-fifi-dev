<?php

namespace App\Controller;

use App\Repository\MissionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MissionController extends AbstractController
{
    /**
     * @Route("/missions", name="missions")
     */
    public function index(MissionRepository $missionRepository): Response
    {
        $missions = $missionRepository->findAll();
        return $this->render('mission/index.html.twig', compact('missions'));
    }
}

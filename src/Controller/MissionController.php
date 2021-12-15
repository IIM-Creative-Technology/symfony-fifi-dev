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
    private $missionRepository;
    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->missionRepository = $objectManager->getRepository(Mission::class);
    }


    /**
     * @Route("/missions", name="app_missions")
     */
    public function index(MissionRepository $missionRepository): Response
    {
        $missions = $missionRepository->findAll();
        return $this->render('mission/index.html.twig', compact('missions'));
    }

    /**
     * @Route ("/missions/{id<[0-9]+>}", name= "app_mission_show")
     */
    public function show(Mission $mission): Response
    {
        dd($mission);
    }
}

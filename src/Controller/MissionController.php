<?php

namespace App\Controller;

use App\Entity\Mission;
use App\Form\MissionType;
use App\Repository\MissionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
       // $missions = $missionRepository->findAll();
        $missions = $missionRepository->findBy([], ['execute_date' => 'DESC']);

        return $this->render('mission/index.html.twig', compact('missions'));
    }

    /**
     * @Route("/missions/create", name="app_missions_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $mission = new Mission();
        $form = $this->createForm(MissionType::class, $mission);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mission = $form->getData();
            $this->missionRepository->save($mission);

            return $this->redirectToRoute('app_missions');
        }

        return $this->renderForm('mission/create.html.twig', [
            'form' => $form
        ]);
    }


    /**
     * @Route ("/missions/{id<[0-9]+>}", name= "app_mission_show")
     */
    public function show(Mission $mission): Response
    {
        return $this->render('mission/details.html.twig', compact('mission'));
    }
}

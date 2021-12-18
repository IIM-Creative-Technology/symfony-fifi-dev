<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{

    private $userRepository;
    public function __construct(EntityManagerInterface $objectManager)
    {
        $this->userRepository = $objectManager->getRepository(User::class);
    }

    /**
     * @Route("/heroes", name="app_heroes")
     */
    public function index(UserRepository $userRepository): Response
    {
        // $users = $userRepository->findAll();
        $users = $userRepository->findAll();

        return $this->render('user/index.html.twig', compact('users'));
    }

    /**
     * @Route("/users/create", name="app_heroes_create")
     * @param Request $request
     * @return Response
     */
    public function create(Request $request): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $this->userRepository->save($user);

            return $this->redirectToRoute('app_users');
        }

        return $this->renderForm('user/create.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("users/{id}/update", name="app_heroes_update")
     * @param int $id
     * @param Request $request
     * @return Response
     */
    public function updateUser(int $id, Request $request): Response
    {
        $user = $this->userRepository->find($id);

        if (null === $user) {
            throw new NotFoundHttpException();
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $this->userRepository->save($user);

            return $this->redirectToRoute('app_users');
        }

        return $this->renderForm('user/create.html.twig', [
            'form' => $form
        ]);
    }

    /**
     * @Route("/heroes/{id}", name="app_heroes_show")
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $user = $this->userRepository->find($id);

        if (null === $user) {
            throw new NotFoundHttpException();
        }

        return $this->render('user/details.html.twig', [
            'user' => $user
        ]);
    }



    /**
     * @Route("/users/{id}/delete", name="app_heroes_delete")
     * @param int $id
     * @return Response
     */
    public function delete(int $id): Response
    {
        $user = $this->userRepository->find($id);

        if (null === $user) {
            throw new NotFoundHttpException();
        }

        $this->userRepository->delete($user);

        return $this->redirectToRoute('app_users');
    }


}

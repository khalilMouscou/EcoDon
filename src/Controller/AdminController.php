<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionType;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

final class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('admin/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }

    #[Route('/admin/ajout', name: 'app_user_ajout', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('admin/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    // delete a existing user
    #[Route('/admin/delete/{idUser}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, UserRepository $userRepository, EntityManagerInterface $entityManager, int $idUser): Response
    {
        // Fetch the user by ID from the UserRepository
        $user = $userRepository->find($idUser);

        // If the user is not found, throw an exception or handle the error
        if (!$user) {
            throw $this->createNotFoundException('No user found for id ' . $idUser);
        }

        // Check if the CSRF token is valid
        if ($this->isCsrfTokenValid('delete' . $user->getId(), $request->request->get('_token'))) {
            // Remove the user and flush the changes to the database
            $entityManager->remove($user);
            $entityManager->flush();

            // Optionally add a flash message indicating success
            $this->addFlash('success', 'User deleted successfully!');
        }

        // Redirect back to the user listing page
        return $this->redirectToRoute('app_user_index');
    }

    // 3. Edit an existing user
    #[Route('/admin/edit/{idUser}', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            $this->addFlash('success', 'User updated successfully!');
            return $this->redirectToRoute('app_user_index');
        }

        return $this->renderForm('admin/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }
}

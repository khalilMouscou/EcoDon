<?php

namespace App\Controller;

use App\Entity\Blog;
use App\Form\BlogsformType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BlogsController extends AbstractController
{
    // 1️⃣ Show all blogs
    #[Route('/blogs', name: 'app_blogs')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $blogs = $entityManager->getRepository(Blog::class)->findAll();

        return $this->render('blogs/index.html.twig', [
            'blogs' => $blogs,
        ]);
    }

    // 2️⃣ Add a new blog
    #[Route('/blogs/add', name: 'app_blogs_add')]
    public function add(Request $request, EntityManagerInterface $entityManager): Response
    {
        $blog = new Blog();
        $form = $this->createForm(BlogsformType::class, $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($blog);
            $entityManager->flush();

            $this->addFlash('success', 'Blog added successfully!');
            return $this->redirectToRoute('app_blogs');
        }

        return $this->render('blogs/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // 3️⃣ Edit a blog
    #[Route('/blogs/edit/{id_blog}', name: 'app_blogs_edit')]
    public function edit(Request $request, EntityManagerInterface $entityManager, Blog $blog): Response
    {
        $form = $this->createForm(BlogsformType::class, $blog);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Blog updated successfully!');
            return $this->redirectToRoute('app_blogs');
        }

        return $this->render('blogs/edit.html.twig', [
            'form' => $form->createView(),
            'blog' => $blog,
        ]);
    }

    // 4️⃣ Delete a blog
    #[Route('/blogs/delete/{id_blog}', name: 'app_blogs_delete', methods: ['POST'])]
    public function delete(EntityManagerInterface $entityManager, Blog $blog): Response
    {
        $entityManager->remove($blog);
        $entityManager->flush();

        $this->addFlash('success', 'Blog deleted successfully!');
        return $this->redirectToRoute('app_blogs');
    }
}

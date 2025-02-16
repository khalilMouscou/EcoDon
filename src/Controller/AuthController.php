<?php

// src/Controller/AuthController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthController extends AbstractController
{
    // Static route to display the login form at /auth
    #[Route('/auth', name: 'app_login')]
    public function loginForm(): Response
    {
        // Simply render the login form
        return $this->render('auth/login.html.twig');
    }
}

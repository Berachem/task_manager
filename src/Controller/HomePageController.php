<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(): Response
    {

        // if user is not logged in, redirect to login page
        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'user' => $this->getUser(),
            'isAdmin' =>$this->getUser()->isAdmin(),
        ]);
    }
}

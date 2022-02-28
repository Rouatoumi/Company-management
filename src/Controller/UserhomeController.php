<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserhomeController extends AbstractController
{
    #[Route('/userhome', name: 'userhome')]
    public function index(): Response
    {
        return $this->render('userhome/index2.html.twig', [
            'controller_name' => 'UserhomeController',
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\UserRepository;
use App\Repository\ServiceRepository;
use App\Repository\MessageRepository;
use App\Repository\RendezVousRepository;



class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(UserRepository $userRepository, ServiceRepository $serviceRepository, MessageRepository $messageRepository, RendezVousRepository $rendezVousRepository): Response
    {
        $nb_users = count($userRepository->findAll());
        $nb_services = count($serviceRepository->findAll());
        $nb_msg = count($messageRepository->findAll());
        $nb_rendezvous = count($rendezVousRepository->findAll());
        //dd($nb_users);
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'nb_users' => $nb_users,
            'nb_services' => $nb_services,
            'nb_msg' => $nb_msg,
            'nb_rendezvous' => $nb_rendezvous
        ]);
    }
}

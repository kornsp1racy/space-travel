<?php

namespace App\Controller;

use App\Entity\Trip;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    #[Route('/', name: 'app_home')]
    public function index(ManagerRegistry $doctrine, Security $security): Response
    {

        $trips = $doctrine->getRepository(Trip::class)->findAll();

        // if ($security->isGranted('ROLE_USER')) {
        //     return $this->redirectToRoute('app_dashboard');
        // }

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'trips' => $trips
        ]);
    }

}

<?php

namespace App\Controller;

use App\Entity\Trip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TripController extends AbstractController
{
    #[Route('/trips/{id}', name: 'app_trip_show')]
    public function show($id, EntityManagerInterface $em): Response
    {

        $trip = $em->getRepository(Trip::class)->find($id);

        return $this->render('trip/show.html.twig', [
            'trip' => $trip
        ]);
    }

    #[Route('/trips/{id}/select', name: 'app_trip_select')]
    public function select($id, EntityManagerInterface $em, Security $security): Response
    {

        $trip = $em->getRepository(Trip::class)->find($id);
        $user = $security->getUser();
        
        $user->addTrip($trip);
        $em->persist($user);

        $em->flush();


        return $this->redirectToRoute('app_home');
    }
}

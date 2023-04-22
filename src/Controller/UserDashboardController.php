<?php

namespace App\Controller;

use App\Entity\Trip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserDashboardController extends AbstractController
{
    #[Route('/user', name: 'app_user_dashboard')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {

        $user = $security->getUser();
        $trips = $user->getTrip();


        return $this->render('user_dashboard/index.html.twig', [
            'controller_name' => 'UserDashboardController',
            'trips' => $trips
        ]);
    }

    #[Route('/user/trips/{id}/manage', name: 'app_user_trip_manage')]
    public function manage($id, Security $security): Response
    {
        $user = $security->getUser();
        $trip = $user->getTrip()[$id];


        return $this->render('user_dashboard/user_trip.html.twig', [
            'trip' => $trip
        ]);
    }

    #[Route('/user/trips/{id}/packing_list', name: 'app_user_trip_packing_list')]
    public function packingList($id, Security $security): Response
    {
        $user = $security->getUser();
        $trip = $user->getTrip();

        return $this->render('user_dashboard/user_trip.html.twig', [
            $trip
        ]);
    }

}

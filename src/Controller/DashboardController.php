<?php

namespace App\Controller;

use App\Entity\Trip;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {

        $user = $security->getUser();
        $trips = $user->getSelectedTrips();
        // dd($trips);

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'UserDashboardController',
            'trips' => $trips
        ]);
    }

    #[Route('/dashboard/trips/{id}/manage', name: 'app_dashboard_trip_manage')]
    public function manage($id, Security $security): Response
    {
        $user = $security->getUser();
        $trip = $user->getSelectedTrips()[$id];


        return $this->render('dashboard/user_trip.html.twig', [
            'trip' => $trip
        ]);
    }

    #[Route('/dashboard/trips/{id}/packing_list', name: 'app_dashboard_trip_packing_list')]
    public function packingList($id, Security $security): Response
    {
        $user = $security->getUser();
        $trip = $user->getTrip();

        return $this->render('dashboard/dashboard_trip.html.twig', [
            $trip
        ]);
    }

}

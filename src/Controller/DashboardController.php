<?php

namespace App\Controller;

use App\Entity\Trip;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(Security $security, EntityManagerInterface $em): Response
    {


        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'UserDashboardController',
        ]);
    }

    #[Route('/dashboard/details', name: 'app_dashboard_personal_details')]
    public function personalDetails(Request $request, UserRepository $userRepository, Security $security): Response
    {   

        $user = $security->getUser();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $userRepository->save($user, true);

            return $this->redirectToRoute('app_dashboard');
        }

        return $this->render('dashboard/personal_details.html.twig', [
            'form' => $form->createView(),
            'isAdmin' => false
        ]);
    }

    #[Route('/dashboard/trips', name: 'app_dashboard_trips')]
    public function trips(Security $security): Response
    {

        /**
         * @var User
         */
        $user = $security->getUser();
        $trips = $user->getSelectedTrips();

        return $this->render('dashboard/trips.html.twig', [
            'trips' => $trips
        ]);
    }

    #[Route('/dashboard/trips/{id}', name: 'app_dashboard_mange_trip')]
    public function manage($id, Security $security): Response
    {
        /**
         * @var User
         */
        $user = $security->getUser();
        $trip = $user->getSelectedTrips()[$id];
       

        return $this->render('dashboard/trip.html.twig', [
            'trip' => $trip,
            'id' => $id
        ]);
    }

    #[Route('/dashboard/trips/{id}/remove', name: 'app_dashboard_trip_remove')]
    public function remove($id, Security $security, EntityManagerInterface $em): Response
    {
        /**
         * @var User
         */
        $user = $security->getUser();
        $trip = $user->getSelectedTrips()[$id];
        $user->removeSelectedTrip($trip);
        $em->persist($user);
        $em->persist($trip);
        $em->flush();


        return $this->redirectToRoute('app_dashboard_trips');
    }

    
    #[Route('/dashboard/trips/{id}/packing_list', name: 'app_dashboard_trip_packing_list')]
    public function packingList($id, Security $security): Response
    {
        /**
         * @var User
         */
        $user = $security->getUser();
        $trip = $user->getTrip();

        return $this->render('dashboard/dashboard_packing.html.twig', [
            $trip
        ]);
    }

}

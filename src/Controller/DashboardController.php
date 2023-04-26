<?php

namespace App\Controller;

use App\Entity\Item;
use App\Entity\Itinerary;
use App\Entity\Note;
use App\Entity\PackingList;
use App\Entity\Trip;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
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


        /**
         * @var User
         */
        $user = $security->getUser();
        
        $notes = $em->getRepository(Note::class)->findBy(['fk_user' => $user]);
        $selectedTrips = $user->getSelectedTrips();
        $trips = $em->getRepository(Trip::class)->findAll();
        

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            'trips' => $trips,
            'selectedTrips' => $selectedTrips,
            'notes' => $notes
        ]);

       
    }

    #[Route('/dashboard/details', name: 'app_dashboard_personal_details')]
    public function personalDetails(Request $request, UserRepository $userRepository, Security $security): Response
    {   

        /**
         * @var User 
         */
        $user = $security->getUser();
        $form = $this->createForm(UserType::class, $user);
        $isAdmin = false;
        foreach ($user->getRoles() as $role) {
            if ($role == "ROLE_ADMIN") {
                $isAdmin = true;
            }
        } 

        $form->handleRequest($request);
        
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            if ($isAdmin) {

                $user->setRoles(["ROLE_ADMIN", "ROLE_USER"]);
            } else {
                $user->setRoles(["ROLE_USER"]);
            }

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

    #[Route('/dashboard/trips/{id}', name: 'app_dashboard_manage_trip')]
    public function manage($id, Security $security, EntityManagerInterface $em): Response
    {
        /**
         * @var User
         */
        $user = $security->getUser();
        $trip = $user->getSelectedTrips()[$id];

        $userItems = $em->getRepository(PackingList::class)->findBy(['selectedTrip' => $trip]);
        $entries = $em->getRepository(Itinerary::class)->findBy(['selectedTrip' => $trip]);

        return $this->render('dashboard/trip.html.twig', [
            'trip' => $trip,
            'id' => $id,
            'packingList' => $userItems,
            'itinerary' => $entries
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
        $em->remove($trip);
        $em->flush();


        return $this->redirectToRoute('app_dashboard');
    }

    
    #[Route('/dashboard/trips/{id}/packing_list', name: 'app_dashboard_trip_packing_list')]
    public function packingList($id, Request $request, Security $security, ManagerRegistry $doctrine, EntityManagerInterface $em): Response
    {
        /**
         * @var User
         */
        $user = $security->getUser();
        $trip = $user->getSelectedTrips()[$id];

        $items = $doctrine->getRepository(Item::class)->findAll();

        $userItems = $em->getRepository(PackingList::class)->findBy(['selectedTrip' => $trip]);

        if ($request->isMethod('POST')) {

            $formData = $request->request->all();
            $selectedItems = $formData['selectedItems'] ?? [];

            $duplicate = false;
            foreach ($selectedItems as $si) {
                $packingList = new PackingList();
                $newItem = $doctrine->getRepository(Item::class)->find($si);

                //check whether currently selected item is already part of inventory
                $duplicate = false;
                foreach ($userItems as $item) {
                    // dd($item->getItem()->getId(), $si);
                    if ($item->getItem()->getId() == $si) {
                        $duplicate = true;
                    } 
                }
                
                if (!$duplicate) {
                    $packingList->setItem($newItem);
                    $packingList->setSelectedTrip($trip);
        
                    $em->persist($newItem);
                    $em->persist($packingList);
                    $em->flush();
                }
            }



            $response = $this->redirectToRoute('app_dashboard_trip_packing_list', ['id' => $id, '_cache' => time()]);
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
            return $response;
        }

        return $this->render('dashboard/trip_packing.html.twig', [
            'selectedtrip' => $trip,
            'id' => $id,
            'items' => $items,
            'userItems' => $userItems
        ]);
    }

    #[Route("/dashboard/trips/{id}/packing_list/{packingListId}/remove", name: 'app_dashboard_trip_packing_list_remove_item')]
    public function packingListRemoveItem($packingListId, $id, Request $request, Security $security, ManagerRegistry $doctrine, EntityManagerInterface $em): Response
    {
        /**
         * @var User
         */
        $user = $security->getUser();

        
        $packingList = $em->getRepository(PackingList::class)->find($packingListId);
        $em->remove($packingList);
        $em->flush();
       

        return $this->redirectToRoute('app_dashboard_trip_packing_list', ['id' => $id]);
        
    }


}

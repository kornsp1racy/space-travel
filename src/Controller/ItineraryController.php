<?php

namespace App\Controller;

use App\Entity\Itinerary;
use App\Entity\User;
use App\Form\ItineraryType;
use App\Repository\ItineraryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ItineraryController extends AbstractController
{
    #[Route('/dashboard/trips/{id}/itinerary', name: 'app_itinerary')]
    public function index($id, Request $request, Security $security, EntityManagerInterface $em): Response
    {

        $itinerary = new Itinerary();
        $form = $this->createForm(ItineraryType::class, $itinerary);

        /**
         * @var User
         */
        $user = $security->getUser();
        $selectedTrip = $user->getSelectedTrips()[$id];
        $duration = $selectedTrip->getTrip()->getDuration();
        
        $entries = $em->getRepository(Itinerary::class)->findBy(['selectedTrip' => $selectedTrip]);
        $count = count($entries);
        

        $canPlan = $count < $duration; 

        // dd($entries);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $itinerary->setSelectedTrip($selectedTrip);
            $em->persist($itinerary);
            $em->flush();


            return $this->redirectToRoute('app_itinerary', ['id' => $id ]);
        }

        return $this->render('itinerary/index.html.twig', [
            'form' => $form,
            'count' => $count,
            'duration' => $duration,
            'id' => $id,
            'canPlan'=> $canPlan,
            'entries' => $entries
        ]);
    }

    

    #[Route('/dashboard/trips/{id}/itinerary/{entryId}/remove', name: 'app_itinerary_remove')]
    public function remove($id, $entryId, Request $request, Security $security, EntityManagerInterface $em): Response
    {

        /**
         * @var User
         */
        $user = $security->getUser();
        $selectedTrip = $user->getSelectedTrips()[$id];
        // dd($selectedTrip);
        $entries = $em->getRepository(Itinerary::class)->findBy(['selectedTrip' => $selectedTrip]);

        $entry = $entries[$entryId];

        $em->remove($entry);
        $em->flush();

        return $this->redirectToRoute('app_itinerary', ['id' => $id]);
    }

}

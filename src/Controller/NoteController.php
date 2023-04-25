<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\noteFormType;
use App\Service\FileUploader;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
    #[Route('/note', name: 'app_note')]
    public function index(ManagerRegistry $doctrine, Security $security, FileUploader $fileUploader, Request $request): Response
    {

    $note = new Note();
    $form = $this->createForm(noteFormType::class, $note);
    $user = $security->getUser();
    $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $note = $form->getData();

                $imageFile = $form->get('image')->getData();
                if ($imageFile) {
                    $imageFileName = $fileUploader->upload($imageFile);
                    $note->setImage($imageFileName);
                }

            // dd($note)
            $em = $doctrine->getManager();
            $note->setFkUser($user);
            // dd($user);
            $em->persist($note);
            $em->flush();

            // ... perform some action, such as saving the task to the database

            return $this->redirectToRoute('app_dashboard');
        }
    return $this->render('note/new.html.twig', [
        'form' => $form,
    ]);

        return $this->render('note/index.html.twig', [
            'controller_name' => 'NoteController',
        ]);
    }
}

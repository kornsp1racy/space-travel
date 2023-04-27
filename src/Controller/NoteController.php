<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\noteFormType;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
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

    }

    // #[Route('/notes', name: 'app_notes')] 
    // public function showNotes(Security $security, EntityManagerInterface $em) {

    //     $user = $security->getUser();
    //     $notes = $em->getRepository(Note::class)->findBy(['fk_user' => $user]);

    //     return $this->render('note/notes.html.twig', [
    //         'notes' => $notes
    //     ]);
    // }

    // #[Route('/allnotes', name: 'app_all_notes')] 
    // public function showAllNotes(Security $security, EntityManagerInterface $em) {

    //     $user = $security->getUser();
    //     $notes = $em->getRepository(Note::class)->findAll();

    //     return $this->render('note/all_notes.html.twig', [
    //         'notes' => $notes,
    //         'user' => $user
    //     ]);
    // }

    // #[Route('/notes/{id}/remove', name: 'app_romove_note')] 
    // public function removeNote($id, Security $security, EntityManagerInterface $em) {

    //     $user = $security->getUser();
    //     $notes = $em->getRepository(Note::class)->findBy(['fk_user' => $user]);
    //     $note = $notes[$id];

    //     $em->remove($note);
    //     $em->flush();

    //     return $this->redirectToRoute('app_notes');
    // }

    // #[Route('/allnotes/{id}/remove', name: 'app_romove_note_from_all')] 
    // public function removeNoteFromAll($id, Security $security, EntityManagerInterface $em) {

    //     $note = $em->getRepository(Note::class)->find($id);

    //     $em->remove($note);
    //     $em->flush();

    //     return $this->redirectToRoute('app_all_notes');
    // }

    #[Route('/dashboard/notes/{id}/remove', name: 'app_romove_note')] 
    public function removeNote($id, Security $security, EntityManagerInterface $em) {

        $user = $security->getUser();
        $notes = $em->getRepository(Note::class)->findBy(['fk_user' => $user]);
        $note = $notes[$id];

        $em->remove($note);
        $em->flush();

        return $this->redirectToRoute('app_dashboard');
    }
}

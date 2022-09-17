<?php

namespace App\Controller;

use App\Entity\Note;
use App\Form\Type\NoteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NoteController extends AbstractController
{
    /**
     * @Route("/note", name="app_note")
     */
    public function index(Request $req): Response
    {
        $note = new Note();
        $noteForm = $this->createForm(NoteType::class,$note);
        $noteForm->handleRequest($req);

        if($noteForm->isSubmitted() && $noteForm->isValid()){
            $data = $noteForm->getData();//get all data from your form
            $mess = $data->getMess();//string
            $created = $data->getCreated()->format('d-m-Y');//Y, m, d, H, i

            return $this->redirectToRoute("app_success",[
                'mess'=>$mess,
                'created'=>$created
            ]);
        }

        return $this->render('note/index.html.twig', [
            'note_form' => $noteForm->createView()
        ]);
    }
}

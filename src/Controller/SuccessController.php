<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuccessController extends AbstractController
{
    /**
     * @Route("/success", name="app_success")
     */
    public function index(Request $req): Response
    {
        $mess = $req->query->get('mess');
        $created = $req->query->get('created');

        return $this->render('success/index.html.twig', [
            'mess'=>$mess,
            'created'=>$created
        ]);
    }
}

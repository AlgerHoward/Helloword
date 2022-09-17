<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ButtonController extends AbstractController
{
    /**
     * @Route("/", name="indexPage")
     */
    public function indexAction(): Response
    {
        return $this->render('button/index.html.twig', []);
    }
    /**
     * @Route("/post/ok", name="leftAction",methods={"GET"})
     */
    public function leftAction(): Response
    {
        return new Response("Left Ok");
    }

    /**
     * @Route("/post/ok", name="middleAction", methods={"POST"})
     */
    public function middleAction(): Response
    {
        return new Response("Middle Ok");
    }

    /**
     * @Route("/post/ok/{id}", name="rightAction", methods={"GET"},requirements={"id":"\d"})
     */
    public function rightAction($id): Response
    {
        return new Response("Right Ok ".$id);
    }

    /**
     * @Route("/button/{action}", name="btnAction")
     */
    public function btnAction(string $action): Response
    {
        return new Response($action);
    }
    
    /**
     * @Route("/button/param/{value}", name="paramForm", methods={"POST"})
     */
    public function paramAction(Request $req, $value): Response
    {
        $y = $req->request->get('y');

        return $this->render('button/index.html.twig', [
            'x' => $value,
            'y' => $y
        ]);
    }
}

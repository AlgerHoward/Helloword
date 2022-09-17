<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostsController extends AbstractController
{
    /**
     * @Route("/index", name="post_show")
     */
    public function indexAction(): Response
    {
        $post = new Post();
        $post->setId(1);
        $post->setTitle("Apple's new iPhone and iPad software");
        $post->setContent("Apple is reportedly bringing a slew of new updates to iPhones");

        return $this->render('posts/index.html.twig', [
            'post' => $post
        ]);
    }

    /**
     * @Route("/noti/{role}", name="noti", requirements={"role"="admin|user"})
     */
    public function notiAction($role): Response
    {
        $uname = "Khanh";
        $noti = ["very nice","friendly"];
        return $this->render('posts/show.html.twig', [
            'uname'=>$uname,
            'noti' => $noti,
            'role'=>$role
        ]);
    }
    /**
     * @Route("/list", name="post_list")
     */
    public function showListAction(): Response
    {
        $posts = array();
        for ($i=0; $i < 3 ; $i++) { 
            $p = new Post();
            $p->setId($i);
            $p->setTitle(sprintf("tit%d",$i));
            $p->setContent(sprintf("con%d",$i));
            $posts[] = $p;
        }
        return $this->render('posts/show.html.twig', [
            'posts' => $posts
        ]);
    }

}

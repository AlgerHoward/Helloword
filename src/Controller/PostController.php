<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\Type\PostType;
use App\Repository\PostRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PostController extends AbstractController
{
    /**
     * @Route("/postIndex", name="indexPage")
     */
    public function indexAction(): Response
    {
        $posts = PostRepository::getPostList();
        return $this->render('post/index.html.twig', [
            'posts' =>$posts
        ]);
    }
    /**
     * @Route("/post/{id}", name="post_show_1", requirements={"id":"\d+"})
     */
    public function showAction($id): Response
    {
        $posts = PostRepository::getPostList();
        $post = new Post();
        foreach($posts as $p){
            if($p->getId() == $id){
                $post = $p;
                break;
            }
        }
        return $this->render('post/show.html.twig', [
            'post' => $post
        ]);
    }

    /**
     * @Route("/add/newNote", name="newNote")
     */
    public function addNewNoteAction(Request $req): Response
    {
        //1. Create an empty form
        $post = new Post();
        $postform = $this->createForm(PostType::class,$post);
        //2. Handle form
        $postform->handleRequest($req);
        if($postform->isSubmitted() && $postform->isValid()){
            $data = $postform->getData();
            $title = $data->getTitle();
            $post->setTitle($title);

            $content = $data->getContent();
            $post->setContent($content);

            $author = $data->getAuthor();
            $post->setAuthor($author);

            $post->setCreatedAt(new \DateTime());//now

            return $this->render("post/show.html.twig",[
                'post' => $post
            ]);
        }
        return $this->render('post/new.html.twig', [
            'f' => $postform->createView()
        ]);
    }
}

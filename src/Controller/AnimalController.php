<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Repository\AnimalRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

date_default_timezone_set("Asia/Ho_Chi_Minh");
class AnimalController extends AbstractController
{
    /**
     * @Route("/addAni", name="addAni")
     */
    public function addAniAction(ManagerRegistry $res,
    ValidatorInterface $valid): Response
    {
        $entity = $res->getManager();
        $animal = new Animal();
        $animal->setName("meo");
        $animal->setBirthday(new \DateTime());
        $animal->setEmail("khanh@gmail.com");
        $animal->setWeight(12);

        $error = $valid->validate($animal);
        if(count($error)>0){
            $err_string = (string)$error;
            return new Response($err_string,400);
        }

        $entity->persist($animal);
        $entity->flush();

        return $this->json($animal);
    }

    /**
     * @Route("/show/animal", name="showAniAction")
     */
    public function showAniAction(AnimalRepository $repo): Response
    {
        //1 
        // $animal = $repo->findOneBy([
        //     'email'=> "khanh@gmail.com"
        // ]);
        // $animal = $repo->findOneBy([
        //     'email'=> "khanh@gmail.com",
        //     'weight' => 13
        // ]);

        //2
        // $animal = $repo->findBy([
        //     'email'=> "khanh1@gmail.com"
        // ]);
        // if(!$animal){
        //     throw $this->createNotFoundException("No animal found");
        // }
        //3 findAll''
        // $animal = $repo->findAll();
        $animal = $repo->findAllGreaterThan(12);

        return $this->json($animal);
    }
}
/** 
*@Route("/add_new", name="addNew")
*/



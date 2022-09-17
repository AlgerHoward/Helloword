<?php

namespace App\Repository;

use App\Entity\Post;
use DateTimeZone;

date_default_timezone_set('Asia/Ho_Chi_Minh');
class PostRepository
{

    public static function getPostList() : array
    {
        $posts = array();

        for ($i=0; $i < 5; $i++) { 
           $p = new Post();
           $p->setId(sprintf("%d",$i));
           $p->setTitle(sprintf("foo%d",$i));
           $p->setContent(sprintf("content%d",$i));
           $p->setCreatedAt(new \DateTime());
           $p->setUpdatedAt(null);
           $p->setAuthor("Khanh");
           $posts[] = $p;
        }
        return $posts;
    }
   
}

?>


<?php
namespace App\Entity;

class Note{
    private $id;
    private $mess; //text
    private $created; //datetime


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of mess
     */ 
    public function getMess()
    {
        return $this->mess;
    }

    /**
     * Set the value of mess
     *
     * @return  self
     */ 
    public function setMess($mess)
    {
        $this->mess = $mess;

        return $this;
    }

    /**
     * Get the value of created
     */ 
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @return  self
     */ 
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }
}


?>
<?php

class Genre{


private $id;
private $createdAt;
private $updatedAt;
private $name;
private $ranking;
private $active;

function __construct($id,$createdAt,$updatedAt,$name,$ranking,$active){

  $this->id=$id;
  $this->createdAt=$createdAt;
  $this->updatedAt=$updatedAt;
  $this->name=$name;
  $this->ranking=$ranking;
  $this->active=$active;
}


    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of Created At
     *
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Get the value of Updated At
     *
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of Ranking
     *
     * @return mixed
     */
    public function getRanking()
    {
        return $this->ranking;
    }

    /**
     * Get the value of Active
     *
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

}


 ?>

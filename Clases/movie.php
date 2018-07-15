<?php

class Movie{

private $id;
private $createdAt;
private $updatedAt;
private $title;
private $raiting;
private $awards;
private $releaseDate;
private $length;
private $genreID;

function __construct($id,$createdAt,$updatedAt,$title,$raiting,$awards,$releaseDate,$length,$genreID){

  $this->id=$id;
  $this->createdAt=$createdAt;
  $this->updatedAt=$updatedAt;
  $this->title=$title;
  $this->raiting=$raiting;
  $this->awards=$awards;
  $this->releaseDate=$releaseDate;
  $this->length=$length;
  $this->genereID=$genreID;

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
     * Get the value of Title
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Get the value of Raiting
     *
     * @return mixed
     */
    public function getRaiting()
    {
        return $this->raiting;
    }

    /**
     * Get the value of Awards
     *
     * @return mixed
     */
    public function getAwards()
    {
        return $this->awards;
    }

    /**
     * Get the value of Release Date
     *
     * @return mixed
     */
    public function getReleaseDate()
    {
        return $this->releaseDate;
    }

    /**
     * Get the value of Length
     *
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * Get the value of Genre
     *
     * @return mixed
     */
    public function getGenreID()
    {
        return $this->genreID;
    }

}

 ?>

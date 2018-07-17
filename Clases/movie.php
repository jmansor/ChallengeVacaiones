<?php
require_once("Clases/genres.php");
require_once("Clases/genre.php");
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
  $this->genreID=$genreID;

}
    public function validate(){
    $errors=[];
    $errors=array_merge($this->validateTitle(),$errors);
    $errors=array_merge($this->validateGenre(),$errors);
    $errors=array_merge($this->validateRating(),$errors);
    $errors=array_merge($this->validateAwards(),$errors);
    $errors=array_merge($this->validateLength(),$errors);

    return $errors;
    }

    public function updateMovie(){
      include("dbConecction.php"); //Esto debe estar mal asi, refactor
      $sql = "UPDATE movies_db.movies SET title = '{$this->title}', rating = '{$this->raiting}',awards='{$this->awards}',length='{$this->length}',genre_id='{$this->genreID}' WHERE id ='{$this->id}'";
      
      $result = $db->query($sql);
    }

    public function saveMovie(){
      include("dbConecction.php"); //Esto debe estar mal asi, refactor
      $sql = "INSERT INTO movies_db.movies (created_at,updated_at,title,rating,awards,length,genre_id) VALUES (NOW(),NOW(),'{$this->title}','{$this->raiting}','{$this->awards}','{$this->length}','{$this->genreID}')";
      $result = $db->query($sql);
    }

    private function validateGenre(){
      $genreErrors=[];
      if($this->genreID=='-1'){
        $genreErrors[]='Select a genre.';
      }
      else{
        $genres = Genres::ObtenerTodos();
        //creo un array con todos los id validos.
        $idgenres=[];
        foreach ($genres as $genre) {
          $idgenres[]=$genre->getId();
        }
        if(!in_array($this->genreID,$idgenres)){
          $genreErrors[]='Invalid genre selected.';
        }

      }
      return $genreErrors;
    }
    private function validateTitle(){
      $titleErrors=[];
      if($this->title==''){
        $titleErrors[]='Complete the title';
      }
      return $titleErrors;
    }
    private function validateRating(){
      $ratingErrors=[];
      if(is_numeric($this->raiting))
      {
        if($this->raiting<0 || $this->raiting>10){
          $ratingErrors[]='The rating must be between 0 and 10.';
        }
      }else {
        $ratingErrors[]='The rating must be number.';
      }
      return $ratingErrors;
    }
    private function validateAwards(){

      $awardErrors=[];
      if(is_numeric($this->awards))
      {
        if($this->awards<0){
          $awardErrors[]='The number of awards must be greater than 0.';
        }
      }else {
        $awardErrors[]='The number of awards must be number.';
      }
      return $awardErrors;
    }
    private function validateLength(){
      //Validate length

      $lengthErrors=[];
      if(is_numeric($this->length))
      {
        if($this->length<0){
          $lengthErrors[]='The length must be greater than 0.';
        }
      }else {
        $lengthErrors[]='The length must be number.';
      }
      return $lengthErrors;
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

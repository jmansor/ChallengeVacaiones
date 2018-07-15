<?php
require_once("genre.php");

class Genres{

public static $cantidad;
public static $todosLosGeneros;


  public static function ObtenerTodos(){

    $GenresADevolver=[];
    if(!isset(self::$todosLosGeneros)){

      include("dbConecction.php");

      $CadenaDeBusqueda = "SELECT * FROM movies_db.genres order by name";
      $ConsultaALaBase = $db->prepare($CadenaDeBusqueda);
      $ConsultaALaBase->execute();


//Recorro cada registro que obtuve
       while ($UnRegistro = $ConsultaALaBase->fetch(PDO::FETCH_ASSOC)) {

         //Instancio un objeto de tipo Genres

       $unGenre = new Genre($UnRegistro['id'],$UnRegistro['created_at'],$UnRegistro['updated_at'],$UnRegistro['name'],$UnRegistro['ranking'],$UnRegistro['active']);
        //Agrego el objeto Genre al array
        $GenresADevolver[] = $unGenre;
       }
       self::$cantidad=count($GenresADevolver);
       self::$todosLosGeneros=$GenresADevolver;
    }else{

      $GenresADevolver= self::$todosLosGeneros;
    }
    return $GenresADevolver;
  }
  }

 ?>

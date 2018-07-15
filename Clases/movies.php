<?php

require_once("movie.php");
  class Movies{
    public static $cantidad;
    public static $todasLasPeliculas;

    public static function ObtenerTodos(){

      if(!isset(self::$todasLasPeliculas)){

        include("dbConecction.php");

        $CadenaDeBusqueda = "SELECT id, created_at,updated_at, title, rating, awards, release_date, length, genre_id FROM movies_db.movies order by title";
        $ConsultaALaBase = $db->prepare($CadenaDeBusqueda);
        $ConsultaALaBase->execute();


  //Recorro cada registro que obtuve
         while ($UnRegistro = $ConsultaALaBase->fetch(PDO::FETCH_ASSOC)) {

           //Instancio un objeto de tipo Usuario
          $UnaPelicula = new Movie($UnRegistro['id'],$UnRegistro['created_at'],$UnRegistro['updated_at'],$UnRegistro['title'],$UnRegistro['rating'],$UnRegistro['awards'],$UnRegistro['release_date'],$UnRegistro['length'],$UnRegistro['genre_id']);

          //Agrego el objeto Usuaio al array
          $PeliculasADevolver[] = $UnaPelicula;
         }
         self::$cantidad=count($PeliculasADevolver);
         self::$todasLasPeliculas=$PeliculasADevolver;
      }else{

        $PeliculasADevolver= self::$todosLosUsuarios;
      }
      return $PeliculasADevolver;
    }

  }



 ?>

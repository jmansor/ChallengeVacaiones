<?php
 require_once("functions.php");
  require_once("Clases/movies.php");
    require_once("Clases/movie.php");

//var_dump($_SESSION);
 if (!isLogued()) {
   header('location: login.php');
   exit;
  	}

$todasLasPeliculas = Movies::ObtenerTodos();
//var_dump($todasLasPeliculas);
?>
<html>
  <head>
    <meta charset="utf-8">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="html/css/style.css">

    <title>MOVIES</title>
  </head>
  <body>
<?php include("nav.php") ?>

<div class="card-container row justify-content-center">
  <div class="col-11 align-self-start about-card ">
      <a href="updateMovie.php">+Add new movie</a>
    </div>
</div>
 <div class="card-container row justify-content-center ">
<?php foreach($todasLasPeliculas as $pelicula): ?>
    <div class="about-card col-11 col-md-3" style="width: 18rem;">
    <img class="card-img-top card-pic" src="html/images/movie-placeholder.jpg" alt="Card image cap">
    <div class="card-body">
    <h5 class="card-title"><?=$pelicula->getTitle();?></h5>
    <p class="card-text"><?=$pelicula->getRaiting();?></p>
    <div class="container align-self-end">
	<div class="row justify-content-around ">

<!-- //***************************no se si esta bien esconder inputs y poner un form para un boton****************************// -->
    <form class="" action="updateMovie.php" method="get">
      <input hidden type="text" name="id" value="<?=$pelicula->getId();?>">
  <button type="submit" class="btn btn-primary " name="">
    <span class="ion-edit" aria-hidden="true"></span>
    <span><strong>Edit</strong></span>
  </button>
    </form>
    <!-- <a href="#" class="btn btn-primary a-btn-slide-text">

    </a> -->
    <form class="" action="deleteMovie.php" method="post">
      <input hidden type="text" name="id" value="<?=$pelicula->getId();?>">
  <button type="submit" class="btn btn-danger " name="">
    <span class="ion-android-delete" aria-hidden="true"></span>
    <span><strong>Delete</strong></span>
  </button>
    </form>





	</div>
</div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

</section>

  </body>

</html>

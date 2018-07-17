<?php
require_once("functions.php");
require_once("Clases/movies.php");
require_once("Clases/movie.php");
require_once("Clases/genres.php");
require_once("Clases/genre.php");

if (!isLogued()) {
  header('location: login.php');
  exit;
}
// var_dump($_GET);
// echo '<br>';
// var_dump($_POST);
// echo '<br>';

$genres = Genres::ObtenerTodos();
$errors=[];
$movie = new Movie("","","","","","","","","");
$buttonAction = 'Add movie';
if(isset($_POST["id"])||isset($_GET["id"])){
  $buttonAction = 'Update movie';
}

if(isset($_GET["id"])){
  $movie = Movies::ObtenerPorId($_GET["id"]);
}

//var_dump($movie);

if($_POST){

          if(isset($_POST["genre"])){
            $genreId=$_POST["genre"];
          }
          else {
            $genreId='';
          }

        $movie = new Movie($_POST["id"],"","",$_POST["title"],$_POST["rating"],$_POST["awards"],"",$_POST["length"],$genreId);
        $errors=$movie->validate();
        if(empty($errors)){
          if($_POST["id"]==""){
            $movie->saveMovie();
          }
          else {
           $movie->updateMovie();
          }

          header('location: movies.php');
          exit;

  }

}
//var_dump($genres);
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

    <title>MOVIE</title>
  </head>
  <body>
<?php include("nav.php") ?>




<div class="">

<div class="d-flex justify-content-around align-items-center register-container">
  <div class="col-11 col-sm-8 col-md-6  grey-area align-items-center ">
  <form role="form" method="post" enctype="multipart/form-data">
    <h2>Complete the movie information. </h2>
    <hr class="colorgraph">
    <?php if($errors) : ?>
    <div class="alert alert-danger" role="alert">
    <ul>
      <?php foreach($errors as $error): ?>

         <li><?=$error ?></li>

     <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>


    <div class="row">


      <!-- Titulo -->
      <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group ">

          <input hidden type="text" name="id" value="<?=$movie->getId();?>" id="id" class="form-control input-lg" placeholder="Title" tabindex="3">

          <input type="text" name="title" value="<?=$movie->getTitle();?>" id="title" class="form-control input-lg" placeholder="Title" tabindex="3">
        </div>
      </div>
      <!-- Fin Titulo -->

            <!-- genre -->
            <div class="col-xs-12 col-sm-12 col-md-12">
              <div class="form-group ">
                 <select class="selectpicker form-control input-lg" name="genre" id="genre">
                   <option readonly="readonly" selected value='-1'>Genre</option>
<?php foreach($genres as $genre): ?>

                    <?php if ($genre->getId()==$movie->getGenreId()): ?>
                        <option  selected value="<?=$genre->getId();?>"><?=$genre->getName();?></option>
                    <?php else: ?>
                        <option  value="<?=$genre->getId();?>"><?=$genre->getName();?></option>
                    <?php endif; ?>

            <?php endforeach; ?>
                  </select>

                <!-- <input type="text" name="genere" value="" id="genre" class="form-control input-lg" placeholder="Genre" tabindex="3"> -->
              </div>
            </div>
            <!-- Fin genre -->
      <!-- Rating -->
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group ">
          <input type="number" step="0.1" min=0 max=10 name="rating" value="<?=$movie->getRaiting();?>" id="rating" class="form-control input-lg" placeholder="Rating" tabindex="3">
        </div>
      </div>
      <!--Fin Rating  -->
      <!-- Awards -->
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group ">
          <input type="number" name="awards" min=0 value="<?=$movie->getAwards();?>" id="awards" class="form-control input-lg" placeholder="Awards" tabindex="3">
        </div>
      </div>
      <!--Fin Awards  -->
      <!-- duracion -->
      <div class="col-xs-12 col-sm-4 col-md-4">
        <div class="form-group ">
          <input type="number" name="length" step="10" min=0 value="<?=$movie->getLength();?>" id="length" class="form-control input-lg" placeholder="Length (min)" tabindex="3">
        </div>
      </div>
      <!--Fin duracion  -->

  </div>




    <hr class="colorgraph">
    <div class="row justify-content-around">
      <div class="col-xs-12 col-md-6"><input type="submit" value="<?=$buttonAction?>" class="btn btn-primary btn-block btn-lg" tabindex="7"></div>

    </div>
  </form>
</div>
</div>

</div>


</form>


  </body>

</html>

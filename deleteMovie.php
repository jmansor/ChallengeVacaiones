<?php
require_once("Clases/movie.php");
require_once("functions.php");

if(isset($_POST['id'])&&isLogued()){

$movie = new Movie($_POST['id'],"","","","","","","","");
$movie->deleteMovie();


}

header('location: movies.php');
exit;
 ?>

<?php
session_start();
setcookie('email','',time()-10);
session_destroy();
header('location:login.php');
exit();
 ?>

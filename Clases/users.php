<?php

 require_once("user.php");
class Users{

  public static $cantidad;
  public static $todosLosUsuarios;

  public static function isAdmin($email){
    foreach (Users::ObtenerTodos() as $user) {
      if($user->getEmail()==$email){
        return ($user->getRole()==2);}
    }
    return false;
  }

  public static function ObtenerTodos(){

    if(!isset(self::$todosLosUsuarios)){

      include("dbConecction.php");

      $CadenaDeBusqueda = "SELECT id, name, email, role, created_at FROM movies_db.users";
      $ConsultaALaBase = $db->prepare($CadenaDeBusqueda);
      $ConsultaALaBase->execute();


//Recorro cada registro que obtuve
       while ($UnRegistro = $ConsultaALaBase->fetch(PDO::FETCH_ASSOC)) {

         //Instancio un objeto de tipo Usuario
        $UnUsuario = new User($UnRegistro['name'], $UnRegistro['email'],'password',$UnRegistro['role'],$UnRegistro['id'],$UnRegistro['created_at']);

        //Agrego el objeto Usuaio al array
        $UsuariosADevolver[] = $UnUsuario;
       }
       self::$cantidad=count($UsuariosADevolver);
       self::$todosLosUsuarios=$UsuariosADevolver;
    }else{

      $UsuariosADevolver= self::$todosLosUsuarios;
    }
    return $UsuariosADevolver;
  }

}
 ?>

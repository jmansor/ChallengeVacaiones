<?php
/**
 *

 */


class User
{
  public $id;
  public $name;
  public $email;
  public $role;
  public $password;
  public $creationDate;

  function __construct($name,$email,$password,$role=1)
  {
  
    $this->name = trim($name);
    $this->email = trim($email);
    $this->password = trim($password);
    $this->role = trim($role);
  }

  public function validar($confirmPassword){

  }
}

 ?>

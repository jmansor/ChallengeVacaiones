<?php
/**
 *

 */


class User
{
  private $id;
  private $name;
  private $email;
  private $role;
  private $password;
  private $creationDate;

  function __construct($name,$email,$password,$role=1)
  {

    $this->name = trim($name);
    $this->email = trim($email);
    $this->password = trim($password);
    $this->role = trim($role);
  }

  public function validar($confirmPassword){
      $errors=[];


      if($this->name == ''){
          $errors[]='The name can not be empty.';
      }
      if($this->email == ''){
          $errors[]='The email can not be empty.';
      }
      else if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {

         $errors[]= "Invalid email format.";

      }
      else if ($this->existeEmail()){ //existeEmail() usar funcion, no se porque no anda.
         $errors[]= "Email in use.";
      }

      if($this->password == "" || $confirmPassword ==""){
        $errors[]="Complete both passwords.";
      }elseif ($this->password !=$confirmPassword) {
        $errors[]="Both passwords must match.";
      }elseif (strlen($this->password)<8) {
        $errors[]="Password must have at least 8 characters.";
      }

      return $errors;
  }

  public function existeEmail(){

  include("dbConecction.php");

  $sql = "select count(*) from movies_db.users where email = '{$this->email}'";
  $result = $db->query($sql);
  $existe = 0;
  foreach ($result as $row) {
  $existe = $row[0];
  }
  return $existe;
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
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of Email
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the value of Role
     *
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the value of Password
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of Creation Date
     *
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

}

 ?>

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

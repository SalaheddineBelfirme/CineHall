<?php
  class UserM extends Database {
    private $db;

    public function __construct(){
       $this->db = new Database;
    }


    public function getUsers (){
      $qury="SELECT * FROM `users` WHERE 1";
      $stmt= $this->db->query($qury);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getoneUser ($token){
      $qury="SELECT * FROM `users` WHERE token=:token";
      $stmt= $this->db->query($qury);
      $stmt->bindValue("token", $token, PDO::PARAM_STR);
      $del=$stmt->execute();
      if($stmt->rowCount()>0){
        return $stmt->fetchAll(PDO::FETCH_OBJ);
      }
      else{
        return 0;

      }
      
    }



    public function AddUser ($name,$role,$email,$token){
      $qury="INSERT INTO `users` (`id_user`, `name`, `role`, `email`, `token`) VALUES (NULL, :name, :role, :email, :token)";
      $stmt= $this->db->query($qury);
      $stmt->bindValue("name", $name, PDO::PARAM_STR);
      $stmt->bindValue("email", $email, PDO::PARAM_STR);
      $stmt->bindValue("role", $role, PDO::PARAM_INT);
      $stmt->bindValue("token", $token, PDO::PARAM_STR);
      $bol=$stmt->execute();
    if($bol){
      return true;
    }
    else{
      return false;
    }
  }

}
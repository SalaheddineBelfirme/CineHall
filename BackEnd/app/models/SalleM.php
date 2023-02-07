<?php
  class SalleM extends Database {
    private $db;

    public function __construct(){
       $this->db = new Database;
    }


    public function getsalle (){
      $qury="SELECT * FROM `salle` WHERE 1";
      $stmt= $this->db->query($qury);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public function Addsalle ($name){
        $qury="INSERT INTO `salle` (`id_salle`, `name_salle`) VALUES (NULL,:name);";
        $stmt= $this->db->query($qury);
        $stmt->bindValue("name", $name, PDO::PARAM_STR);
       $bol= $stmt->execute();
      if($bol){
        return true;
      }
      else{
        return false;
      }


  }

  public function DelteSalle($id){
    $qury="DELETE FROM `salle` WHERE id_salle=:id";
    $stmt= $this->db->query($qury);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);
    $stmt->execute();
  if($stmt->execute()){
    return true;
  }
  else{
    return false;
  }


}

}
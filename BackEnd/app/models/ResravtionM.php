<?php
  class ResravtionM extends Database {
    private $db;

    public function __construct(){
       $this->db = new Database;
    }

    public function getresrvtion ($id){
      $qury="SELECT * FROM `reservation`,film WHERE reservation.id_film=film.id_filme and reservation.id_user=:id";
      $stmt= $this->db->query($qury);
      $stmt->bindValue("id", $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }


    public function getRes (){
      $qury="SELECT * FROM `reservation` WHERE 1";
      $stmt= $this->db->query($qury);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function getResLastdate (){
      $qury=" select film.id_filme FROM film WHERE film.date <= CURRENT_TIMESTAMP";
      $stmt= $this->db->query($qury);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    
    public function getplaces ($id,){
      $qury="SELECT num_place FROM  `reservation` WHERE id_film=:id";
      $stmt= $this->db->query($qury);
      $stmt->bindValue("id", $id, PDO::PARAM_INT);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }



    public function AddResrvation ($user,$prix,$place,$filme){
        $qury="INSERT INTO `reservation` (`id_res`, `id_user`, `prix`, `num_place`, `id_film`) VALUES (NULL,:user,:prix,:place,:filme);";
        $stmt= $this->db->query($qury);
        $stmt->bindValue("user", $user, PDO::PARAM_INT);
        $stmt->bindValue("prix", $prix, PDO::PARAM_INT);
        $stmt->bindValue("place", $place, PDO::PARAM_INT);
        $stmt->bindValue("filme", $filme, PDO::PARAM_STR);
       $bol= $stmt->execute();
      if($bol){
        return true;
      }
      else{
        return false;
      }

  }










  public function DelteResrvation($id){
    $qury="DELETE FROM `reservation` WHERE id_res=:id";
    $stmt= $this->db->query($qury);
    $stmt->bindValue("id", $id, PDO::PARAM_INT);
    $bol=$stmt->execute();
  if($bol){
    return true;
  }
  else{
    return false;
  }


}

}
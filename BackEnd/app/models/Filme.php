<?php
  class Filme extends Database {
    private $db;

    public function __construct(){
       $this->db = new Database;
    }


    public function GetFilm($date){
      $qury="SELECT * FROM `film` WHERE date=:date";
      $stmt= $this->db->query($qury);
      $stmt->bindValue("date", $date, PDO::PARAM_STR);
      $stmt->execute();
      return $stmt->fetchAll(PDO::FETCH_OBJ);

    }


    public function AddFilme ($date,$name,$id_salle,$prix){
        $qury="INSERT INTO `film`(`id_filme`, `date`, `name`, `id_salle`,`prixF`) VALUES VALUES (NULL,:date,:name,:id_salle);";
        $stmt= $this->db->query($qury);
        $stmt->bindValue("date", $date, PDO::PARAM_STR);
        $stmt->bindValue("name", $name, PDO::PARAM_STR);
        $stmt->bindValue("id_salle", $id_salle, PDO::PARAM_INT);
        $stmt->bindValue("prixF", $prix, PDO::PARAM_STR);
       $bol= $stmt->execute();
      if($bol){
        return true;
      }
      else{
        return false;
      }

  }

  public function DelteFilm($id){
    $qury="DELETE FROM `film  ` WHERE id_filme=:id";
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

public function GetOneFilm($id){
  $qury="SELECT * FROM `film` WHERE id_filme=:id";
  $stmt= $this->db->query($qury);
  $stmt->bindValue("id", $id, PDO::PARAM_INT);
  $stmt->execute();
  
if($stmt->rowCount()>0){
  return    $stmt->fetchAll(PDO::FETCH_OBJ);
}
else{
  return false;
}

}


public function FilterFilms($date){
  $qury="SELECT * FROM `film` WHERE date=:date";
  $stmt= $this->db->query($qury);
  $stmt->bindValue("date", $date, PDO::PARAM_STR);
  $stmt->execute();
if($stmt->rowCount()>0){
  return    $stmt->fetchAll(PDO::FETCH_OBJ);
}
else{
  return false;
}

}

}
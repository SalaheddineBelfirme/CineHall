<?php 

// header('Access-Control-Allow-Origin: *');
// header('Content-Type: application/json');
//  header('Access-Control-Allow-Methods: POST');
//  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');

  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
      header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
      header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  }
  if ($_SERVER["REQUEST_METHOD"] == "OPTIONS") return true;
 class Gett extends Controller {

    private $postModel;
    private $salle;
    private $resrvation;
    private $filme;
    public function __construct()
    {       

        $this->salle = $this->model('SalleM');
        $this->postModel = $this->model('UserM');
        $this->resrvation = $this->model('ResravtionM');
        $this->filme = $this->model('Filme');
        
    }
    

    public function getFilme (){
        $model=new Filme();
        $date=$_POST['date'];
       $data= $model->GetFilm($date);
        if (!empty($data) ) {
            echo json_encode($data);
        } else {
            echo json_encode('0');
        }
    
 }

 public function Getresrvation (){
  $id=$_POST['id'];
  $model=new ResravtionM();
  $data=$model->getresrvtion($id);
echo json_encode($data);
}
public function GetresrvationLastday (){
  $model=new ResravtionM();
  $data=$model->getResLastdate();
echo json_encode($data);
}

      public function getOneFilme (){
          $id=$_POST['id'];
          $model=new Filme();
          $data=$model->GetOneFilm($id);
        echo json_encode($data);
      }

      public function getPlaces (){
        $id=$_POST['id'];
        $user=$_POST['user'];
        $model=new ResravtionM();
        $data=$model->getplaces($id);
      echo json_encode($data);
    }


      public function filterFilme (){
        $date=$_POST['date'];
        $model=new Filme();
        $data=$model->FilterFilms($date);
      echo json_encode($data);
   }

}






?>
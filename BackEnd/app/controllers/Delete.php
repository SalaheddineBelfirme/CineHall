<?php
// header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
// header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    class Delete extends Controller{
        private $postModel;
        private $salle;
        private $resrvation;
        public function __construct(){
            $this->salle = $this->model('SalleM');
            $this->postModel = $this->model('UserM');
            $this->resrvation = $this->model('ResravtionM');
        }




        public function DeleteSalle(){
            $id= $_POST['id'];
          $data=  $this->salle->DelteSalle($id);
          if($data){
            echo json_encode(['true' => 'salle deleted']);
        } else {
            echo json_encode(['false' => 'error']);
        }




        }



        public function DeleteResrvastion(){
            $id=$_POST['id'];
          $data=  $this->resrvation->DelteResrvation($id);
          if($data){
            echo json_encode(['true' => 'resrvastion deleted']);
        } else {
            echo json_encode(['false' => 'error']);
        }




        }


   



    }
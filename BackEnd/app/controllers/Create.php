<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
    class Create extends Controller{
        private $postModel;
        private $salle;
        private $resrvation;


        public function __construct(){
            $this->salle = $this->model('SalleM');
            $this->postModel = $this->model('UserM');
            $this->resrvation = $this->model('ResravtionM');
        }


        public function adduser(){
            $model=new UserM();
            $name=$_POST['name'];
            $role=0;
            $email=$_POST['email'];
            $token=uniqid();
           $insert= $model->AddUser($name,$role,$email,$token);
            if ($insert) {
                echo json_encode(['true' => 'user added','token'=>$token]);
            } else {
                echo json_encode(['false' => 'error']);
            }



        }
        public function addSalle(){
            $name=$_POST['name'];
            $modle=new SalleM();
            $insert=$modle->addSalle($name);
            if ($insert) {
                echo json_encode(['true' => 'salle added']);
            } else {
                echo json_encode(['false' => 'error']);
            }
        }





        public function addResrvation(){
            $user=$_POST['user'];
            $prix=$_POST['prix'];
            $place=$_POST['place'];
            $filme=$_POST['filme'];
            $modle=new ResravtionM ();
            $insert=$modle->addResrvation($user,$prix,$place,$filme);
            if ($insert) {
                echo json_encode(['true' => 'resrvation added']);
            } else {
                echo json_encode(['false' => 'error']);
            }
        }

        public function addFilm(){
            $date=$_POST['date'];
            $name=$_POST['name'];
            $salle=$_POST['salle'];
            $prix=$_POST['prixF'];

          
            $modle=new Filme ();
            $insert=$modle->AddFilme($date,$name,$salle,$prix);
            if ($insert) {
                echo json_encode(['true' => 'Filme added']);
            } else {
                echo json_encode(['false' => 'error']);
            }
        }
       





       
    }

    


?>
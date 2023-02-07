<?php 
 header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');
session_start();
class login extends Controller {
    private $postModel;

    public function __construct(){
        $this->postModel = $this->model('userM');
    }


  


    public function user(){
        $token=$_POST['token'];
        $modle=new UserM();
        $data=$modle->getoneUser($token);
        if($data>0){
            echo json_encode($data);    
        }
        else{
            echo json_encode(['false','try agine']);    
        }
        
    }


    // public function loginn(){
    //     if(isset ($_POST['log'])){
    //     }

    //     $email=$_POST['email'];
    //     $pass=md5($_POST['pass']);
      
    //    $r=$this->postModel->checklogin($email,$pass);
    //    $_SESSION['log']=$r;
       
    //    if($r==false){
    //     echo("<script> alert('you have samting false')</script>");
    //     header("Location: http://localhost/CureCoj/traversymvc/pages/login");
    //    }
    //   elseif($r[0]->role==1){
    //     $name=$r[0]->name;
    //         echo("<script> var na='  $name'; alert('welcome Admin  '+na)</script>");
            
    //           header("Location: http://localhost/CureCoj/traversymvc/pages/dashboard");
            
    //    }

   
       

    }



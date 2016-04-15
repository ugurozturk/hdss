<?php

class Login extends Controller
{
  public function index(){
    require APP . 'view/login/index.php';
  }


  public function loginControl(){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $donen = $this->model->findUser($username,$password);

    if(!empty($donen)){
      $_SESSION['uye_grup'] = $donen->user_group_id;
      if($donen->user_group_id == 1){ header('location: ' . URL.'admin');}
    }
    else {
      $_SESSION['uye_grup'] = null;

          header('location: ' . URL);
    }


  }

}

?>

<?php
class Image extends Controller
{
  public function index()
  {
    if(!empty($_GET["imgname"]) && isset($_GET["imgname"])){

      $img = $this->model->getPicInfoByName(htmlspecialchars($_GET["imgname"]));
      require APP . 'view/_templates/header.php';
      require APP . 'view/image/index.php';
      require APP . 'view/_templates/footer.php';

    }
    else{
      header('location: ' . URL);
    }

  }
}


?>

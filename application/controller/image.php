<?php
class Image extends Controller
{
  public function index()
  {
    if(!empty($_GET["i"]) && isset($_GET["i"])){

      $img = $this->model->getPicInfo(htmlspecialchars($_GET["i"]));
      require APP . 'view/_templates/meta.php';
      require APP . 'view/_templates/dheader.php';
      require APP . 'view/image/index.php';
      require APP . 'view/_templates/footer.php';

    }
    else{
      header('location: ' . URL);
    }

  }
}


?>

<?php
class Image extends Controller
{
  public function index()
  {
    if(!empty($_GET["i"]) && isset($_GET["i"])){

      $img = $this->model->getPicInfo(htmlspecialchars($_GET["i"]));

      if($img->aktif && $img->yayin_tarihi <= date("Y-m-d")){

      require APP . 'view/_templates/meta.php';
      require APP . 'view/_templates/dheader.php';
      require APP . 'view/image/index.php';
      require APP . 'view/_templates/footer.php';
}
else{
  header('location: ' . URL);
}
    }
    else{
      header('location: ' . URL);
    }

  }

  public function devamigetir(){
    if(isset($_POST["miktar"])){
    $miktar = htmlspecialchars($_POST["miktar"]);
  }
    $veri = $this->model->getAllActivePics(array("skip" => $miktar));
    echo json_encode($veri);
  }
}


?>

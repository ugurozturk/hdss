<?php

class Admin extends Controller
{
  public function checkGrup(){
      if(isset($_SESSION['uye_grup']) != 1){
        header('location: ' . URL .'login');
      }
      else{
        return true;
      }
  }

  public function index()
  {
    if($this->checkGrup()){
      require APP . 'view/_templates/header.php';
      require APP . 'view/admin/index.php';
      require APP . 'view/_templates/footer.php';
    }
  }

  public function listimages(){
      if($this->checkGrup()){

      if(isset($_POST["limit"]) && isset($_POST["offset"])){
        $pics = $this->model->getAllPics($_POST["limit"],$_POST["offset"]);
      }
      else{
        $pics = $this->model->getAllPics(20,0);
      }

      $imageAmount = $this->model->getAmountOfImages();

    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/listimages.php';
    require APP . 'view/_templates/footer.php';
  }
}



  public function yukle(){
    if($this->checkGrup()){
    if(!empty($_FILES['files']['name'][0])){
      $files = $_FILES['files'];

      $uploaded = array();
      $failed = array();

      $allowed = array('jpg', 'png', 'gif');

      foreach ($files['name'] as $pozisyon => $file_name) {

        $file_bigtemp = $files['tmp_name'][$pozisyon];
        $file_size = $files['size'][$pozisyon];
        $file_error = $files['error'][$pozisyon];

        $file_ext = explode('.', $file_name);
        $file_ext = strtolower(end($file_ext));

        if(in_array($file_ext, $allowed)){

          if($file_size <= 9999999){
            $file_name_new = uniqid('',true) . '.' . $file_ext;
            $file_destination = 'img/big/' . $file_name_new;
            $file_scaledv = 'img/thumbs/' . $file_name_new;

            if(move_uploaded_file($file_bigtemp, $file_destination)) {
              $uploaded[$pozisyon] = $file_destination;
               $this->model->resize($file_destination,$file_ext);
          }
            else {
              $failed[$pozisyon] = '[{$file_name}] hata verdi';
            }
          }
          else {
            $failed[$pozisyon] = '[{$file_name}] İzin verilen dosya boyutundan büyük';
          }
        }
        else {
          $failed[$pozisyon] = '[{$file_name}] izin verilen dosya tipi değil.';
        }
      }
      if(!empty($uploaded)){
        foreach ($uploaded as $key => $value) {
          $this->model->addImg($value);
        }
        print_r($uploaded);
      }
      if(!empty($failed)){
        print_r($failed);
      }

    }
  }
  }

  public function ajaxGetinfo($imgid)
  {
    if($this->checkGrup()){
      $imginfos = $this->model->getPicInfo($imgid);

      // simply echo out something. A supersimple API would be possible by echoing JSON here
      echo json_encode($imginfos);
    }
  }

  public function updateImg()
  {
    if($this->checkGrup()){
      $this->model->updateImg($_POST["picid"],$_POST["picname"], $_POST['picbigurl'],  $_POST['picthmburl'], $_POST['yayin_tarih'], $_POST['aktif']);
      echo json_encode(array('Result' => "OK"));
    }
  }

  public function delImg()
  {
    if($this->checkGrup()){
      $sonuc = $this->model->deleteImg($_POST["picid"]);
      echo json_encode(array('Result' => "OK", 'sonuc' => $sonuc));
    }
  }

  public function delNonUsedImages(){
    $bigdekiler = scandir($_SERVER['DOCUMENT_ROOT'] . '/public/img/big/');
    $thumbdakiler = scandir($_SERVER['DOCUMENT_ROOT'] . '/public/img/thumbs/');
    $databasedekiler = $this->model->getAllPics(999,0);
    $deleted = array();
    $failed = array();

    for($i =0; $i<count($bigdekiler);$i++){

      $sil = true;
      foreach($databasedekiler as $pozisyon => $value){
        $r =explode("/",$value->big_url);
        $name=end($r);
        if($name === $bigdekiler[$i]){
          $sil = false;
        }
      }
      if($sil === true){
        $sonuc = unlink($_SERVER['DOCUMENT_ROOT'] . '/public/img/big/' . $bigdekiler[$i]);
        if($sonuc){
          array_push($deleted,'big/'.$bigdekiler[$i]);
        }
        else{
          array_push($failed,'big/'.$bigdekiler[$i]);
        }
      }
    }

    for($i =0; $i<count($thumbdakiler);$i++){

      $sil = true;
      foreach($databasedekiler as $pozisyon => $value){
        $r =explode("/",$value->thumbs_url);
        $name=end($r);
        if($name === $thumbdakiler[$i]){
          $sil = false;
        }
      }
      if($sil === true){
        $sonuc = unlink($_SERVER['DOCUMENT_ROOT'] . '/public/img/thumbs/' . $thumbdakiler[$i]);
        if($sonuc){
          array_push($deleted,'thumbs/'.$thumbdakiler[$i]);
        }
        else{
          array_push($failed,'thumbs/'.$thumbdakiler[$i]);
        }
      }
    }

    if(!empty($failed)){
      echo "fails ";
      print_r($failed);
    }
    if(!empty($deleted)){
      echo "successfulls ";
      print_r($deleted);
    }
    //var_dump($bigdekiler);

    //var_dump($sonuc);
  }
}

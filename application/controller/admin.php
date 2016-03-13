<?php

class Admin extends Controller
{
  public function index()
  {

/*
if(isset($_SESSION['uyeGrup'])
    {


    }

*/
   // load views. within the views we can echo out $songs and $amount_of_songs easily
    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/index.php';
    require APP . 'view/_templates/footer.php';
  }


  public function listimages(){
    $pics = $this->model->getAllPics();

    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/listimages.php';
    require APP . 'view/_templates/footer.php';
}

public function getImageInfo($deger){
  $sql = "SELECT pic_id, pic_name, big_url, thumbs_url FROM pics WHERE pic_id =  :deger ";
  $query = $this->db->prepare($sql);
  $parameters = array(':deger' => $deger);

  // useful for debugging: you can see the SQL behind above construction by using:
  // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

  $query->execute($parameters);

  // fetch() is the PDO method that get exactly one result
  return $query->fetch();
}

  public function yukle(){
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

        if(!empty($uploaded)){
          echo "Upload Edilen Dosyalar";
          foreach ($uploaded as $key => $value) {
            $this->model->addImg($value);
          }
        }
      }
    }
  }
}

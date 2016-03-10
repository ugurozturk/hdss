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
    $pics = $this->model->listimages();

    require APP . 'view/_templates/header.php';
    require APP . 'view/admin/listimages.php';
    require APP . 'view/_templates/footer.php';
}

  public function yukle(){
    if(!empty($_FILES['files']['name'][0])){
      $files = $_FILES['files'];

      $uploaded = array();
      $failed = array();

      $allowed = array('jpg', 'png', 'gif');

      foreach ($files['name'] as $pozisyon => $file_name) {

        $file_temp = $files['tmp_name'][$pozisyon];
        $file_size = $files['size'][$pozisyon];
        $file_error = $files['error'][$pozisyon];

        $file_ext = explode('.', $file_name);

        $file_ext = strtolower(end($file_ext));

        if(in_array($file_ext, $allowed)){

          if($file_size <= 999999){
            $file_name_new = uniqid('',true) . '.' . $file_ext;
            $file_destination = 'img/' . $file_name_new;

            if(move_uploaded_file($file_temp, $file_destination)) {
              $uploaded[$pozisyon] = $file_destination;
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


        if(!empty($failed)){
          echo "Hatalı Dosyalar";
          print_r($failed);
        }

        if(!empty($uploaded)){
          echo "Upload Edilen Dosyalar";
          print_r($uploaded);
        }
      }
    }
  }
}

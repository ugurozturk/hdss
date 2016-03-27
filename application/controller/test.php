<?php

class Test extends Controller
{
  public function index()
  {
    $this->model->logla();

    echo dirname(__FILE__);

    
  }

  public function yukle(){
    $url = 'http://images.nvidia.com/geforce-com/international/images/geforce-experience/geforce-experience-early-access-share-beta-december-update-screenshot-gallery-step-1.png';

    $r =explode("/",$url);
    $name=end($r);

    $file_extr = explode('.', $name);
    $file_ext = strtolower(end($file_extr));

    copy($url, 'img/big/'.$name);
    $img = file_get_contents($url);

    $im = imagecreatefromstring($img);

$width = imagesx($im);

$height = imagesy($im);

$newwidth = $width/3;
$newheight = $height/3;
$thumb = imagecreatetruecolor($newwidth, $newheight);

imagecopyresized($thumb, $im, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

switch ($file_ext) {
  case 'png':
    imagepng($thumb,'img/thumbs/' . $name);
    break;
  case 'jpg':
    imagejpeg($thumb,'img/thumbs/' . $name);
    break;
  case 'gif':
    imagegif($thumb,'img/thumbs/' . $name);
    break;
  default:
    # code...
    break;
  }

  $this->model->addImg($name);

imagedestroy($thumb);

imagedestroy($im);
  }

}
 ?>

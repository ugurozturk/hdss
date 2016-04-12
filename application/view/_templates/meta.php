<?php

$meta = (String)null;

if(isset($img)){
  $meta = "<meta property='og:title' content='$img->pic_name'/><meta property='og:image' content='$img->big_url'/>";
}

 ?>

<?php

$meta = (String)null;

if(isset($img)){
  $meta = "<title>{$img->pic_name} - Oneline HDSS</title><meta property='og:title' content='{$img->pic_name}'/><meta property='og:image' content='{$img->big_url}'/>";
}

 ?>

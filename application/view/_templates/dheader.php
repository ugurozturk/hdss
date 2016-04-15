<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Online HD Screen Shot</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <?php if(isset($meta)){echo $meta;} else { ?>
    <meta property="og:image" content="https://s3.eu-central-1.amazonaws.com/hdss/fbekran.png"/>
    <meta property="og:image:secure_url" content="https://s3.eu-central-1.amazonaws.com/hdss/fbekran.png" />
    <?php }?>
    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/tether/css/tether.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/justfiedgallery/css/justifiedGallery.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" type="text/css" />
    <link rel="stylesheet" href="<?php echo URL; ?>assets/font-awesome/css/font-awesome.min.css" type="text/css" />

    <script src="<?php echo URL; ?>assets/jquery/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>assets/justfiedgallery/js/jquery.justifiedGallery.js"></script>
    <script type="text/javascript" src="<?php echo URL; ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="<?php echo URL; ?>js/application.js"></script>
    <script>
        var url = "<?php echo URL; ?>";
    </script>
</head>
<body>

  <div class="container-fluid cnav">
    <!-- navigation -->
    <nav class="navbar navbar-dark bg-inverse">
      <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
    ☰
  </button>
  <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
    <a class="navbar-brand" href="<?php echo URL; ?>">HD Screen Shots</a>
    <ul class="nav navbar-nav">
      <li  class="nav-item">
        <a class="nav-link" href="http://forum.hdss.online/">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL . "?random=true"; if(isset($_GET["search"])){ echo "&search=" . htmlspecialchars($_GET["search"]);} ?>">Random</a>
      </li>
      <li class="nav-item btn-group">
          <a class="dropdown-toggle nav-link " type="button" id="drpdownLists" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          List
          </a>
          <div class="dropdown-menu" aria-labelledby="drpdownLists">
              <a class="dropdown-item" href="<?php echo URL.'?type=games'?>">Games</a>
              <a class="dropdown-item" href="<?php echo URL.'?type=animes'?>">Animes</a>
              <a class="dropdown-item" href="<?php echo URL.'?type=movtvseri'?>">Movies - Tv Series</a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline pull-xs-right" action="<?php URL ?>" method="link">
      <input class="form-control" type="text" name="search" placeholder="Search" value="<?php if(isset($_GET["search"])){ echo htmlspecialchars($_GET["search"]);} ?>">
      <button class="btn btn-info-outline" type="submit">Search</button>
    </form>
<!-- social media icons -->
      <ul class="nav navbar-nav pull-right">
          <li class="nav-item"><a class="nav-link" href="https://www.facebook.com/hdssonline/"><i class="fa fa-lg fa-facebook"></i></a></li>
          <li class="nav-item"><a class="nav-link" href="https://www.instagram.com/hdssonline/"><i class="fa fa-lg fa-instagram"></i></a></li>
      </ul>
      <form class="form-inline pull-xs-right" action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
  <input type="hidden" name="cmd" value="_s-xclick">
  <input type="hidden" name="hosted_button_id" value="MJKQXF29S7FW2">
  <input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online.">
  <img alt="" border="0" src="https://www.paypalobjects.com/tr_TR/i/scr/pixel.gif" width="1" height="1">
  </form>
    </div>
</div>
  </nav>


</div>

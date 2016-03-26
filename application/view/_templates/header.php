<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Online HD Screen Shot</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- JS -->
    <!-- please note: The JavaScript files are loaded in the footer to speed up page construction -->
    <!-- See more here: http://stackoverflow.com/q/2105327/1114320 -->

    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo URL; ?>assets/bootstrap/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous" />


    <link rel="stylesheet" href="<?php echo URL; ?>assets/tether/css/tether.min.css" type="text/css" />
  	<link rel="stylesheet" href="<?php echo URL; ?>assets/unitegallery/css/unite-gallery.css" type="text/css" />

    <script src="<?php echo URL; ?>assets/jquery/jquery-2.2.1.min.js"></script>
    <script>
        var url = "<?php echo URL; ?>";
    </script>
    <link rel="stylesheet" href="<?php echo URL; ?>css/style.css" type="text/css" />
</head>
<body>

  <div class="container-fluid cnav">
    <!-- navigation -->
    <nav class="navbar navbar-dark bg-inverse">
      <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar2">
    &#9776;
  </button>
  <div class="collapse navbar-toggleable-xs" id="exCollapsingNavbar2">
    <a class="navbar-brand" href="<?php echo URL; ?>">HD Screen Shots</a>
    <ul class="nav navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="http://forum.hdss.online/">Forum</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URL . "?random=true"; if(isset($_GET["search"])){ echo "&search=" . htmlspecialchars($_GET["search"]);} ?>">Random</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline pull-xs-right" action="<?php URL ?>" method="link">
      <input class="form-control" type="text" name="search" placeholder="Search" value="<?php if(isset($_GET["search"])){ echo htmlspecialchars($_GET["search"]);} ?>">
      <button class="btn btn-info-outline" type="submit">Search</button>
    </form>
    </div>
</div>
  </nav>


</div>

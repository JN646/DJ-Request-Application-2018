<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DJ Application</title>
    <!-- Database Link -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");?>
    <!-- Function Files -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/server.php");?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/functions.php");?>
    <!-- Libraries -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/lib/lastfm.php");?>
    <!-- CSS Links -->
    <link rel="stylesheet" href="<?php echo $environment; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $environment; ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo $environment; ?>css/venue.css">
    <link rel="stylesheet" href="<?php echo $environment; ?>css/fontawesome-all.css">
    <!-- Remote JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </head>
  <body>
    <!-- Start Clock -->
    <body onload="startTime()">
    <!-- Container -->
    <div class="container-fluid">
      <!-- Top Bar -->
      <div class='row' id='topBar'>
          <div class="col-md-4">
            <p title="<?php echo 'Version ' . ApplicationVersion::get(); ?>">
              <i class="fas fa-headphones"></i>
              <span>DJRS 2018</span>
            </p>
          </div>
          <div class="col-md-4 text-center">
            <p class='footerLink'><a href="<?php echo $environment; ?>admin/index.php"><i class="fas fa-unlock-alt"></i></a></p>
            <p class='footerLink'><a href="<?php echo $environment; ?>index.php"><i class="fas fa-home"></i></a></p>
          </div>
          <div class="col-md-4">
            <p class="text-right">
              <span id="txt"></span>
              <span><?php is_connected(); ?></span>
            </p>
          </div>
      </div>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DJ Application</title>

    <!-- Database Link -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");?>

    <!-- Function Files -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/server.php");?>
    <?php
    if ($addon_drinks == TRUE):
      require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/drinks_server.php");
    endif;
    ?>
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

    <!-- Top Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a title="<?php echo 'Version ' . ApplicationVersion::get(); ?>" class="navbar-brand" href="<?php echo $environment; ?>index.php">DJ Request 2018</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo $environment; ?>admin/index.php"><i class="fas fa-unlock-alt"></i></a>
          </li>
        </ul>
        <span id='txt' class="navbar-text"></span>
        <span>&nbsp;</span>
        <span class="navbar-text">
          <?php is_connected(); ?>
        </span>
      </div>
    </nav>

    <!-- Container -->
    <div class="container-fluid">

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>DJ Application</title>

    <!-- Database Link -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/functions.php");?>

    <!-- CSS Links -->
    <link rel="stylesheet" href="<?php echo $environment; ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo $environment; ?>css/custom.css">
    <link rel="stylesheet" href="<?php echo $environment; ?>css/fontawesome-all.css">

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
              <span>DJ Request System</span>
            </p>
          </div>
          <div class="col-md-4">
            <p></p>
          </div>
          <div class="col-md-4">
            <p class="text-right">
              <span id="txt"></span>
              <span><?php is_connected(); ?></span>
            </p>
          </div>
      </div>

<?php
  // Include Header
  include 'partials/_header.php';
?>
    <!-- Start Clock -->
    <body onload="startTime()">

    <!-- Container -->
    <div class="container-fluid">

      <!-- Top Bar -->
      <div class='row' id='topBar'>
          <div class="col-md-4">
            <p>DJ Request System</p>
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

      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">
          <?php
            // Include Blocks
            include 'partials/collection_blocks.php';
          ?>
        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <div class="row">
            <?php
              // Include Blocks
              include 'partials/song_blocks.php';
            ?>
          </div>

        </div>
      </div>
    </div>

<?php
  // Include Footer
  include 'partials/_footer.php';
?>

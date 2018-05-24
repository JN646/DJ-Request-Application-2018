<?php
  // Include Header
  include 'partials/_header.php';

  // App Running Debug.
  $appRunning = 1;
?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <?php
          // If Application is Running.
          if ($appRunning == 1) {
            // Include Blocks
            include 'partials/collection_blocks.php';
          }
          ?>

        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <!-- Row -->
          <div class="row">

            <?php
            // If Application is Running.
            if ($appRunning == 1) {
              // Include Blocks
              include 'partials/song_blocks.php';
            }
            ?>

          </div>

        </div>
      </div>
    </div>

<?php
  // Include Footer
  include 'partials/_footer.php';
?>

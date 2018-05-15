<?php
  // Include Header
  include 'partials/_header.php';
?>
    <!-- Container -->
    <div class="container-fluid">

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

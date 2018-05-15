<?php
  // Include Header
  include 'partials/_header.php';
?>
    <!-- Container -->
    <div class="container-fluid">

      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div class="col-md-2 border">
          <h2>Sidebar</h2>
        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10 border">
          <h2>Main Window</h2>

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

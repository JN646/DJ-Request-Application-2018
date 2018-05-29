<?php
  // Include Header
  include 'partials/_header.php';
?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <!-- Is the app running? -->
          <?php if ($appRunning == 1) { ?>
            <h3>Collection</h3>

            <!-- Search Form -->
            <form id='searchForm' class="form-inline" action="index.html" method="post">
              <input class='form-control' type="text" name="" value="" placeholder='Search'>
              <button class='form-control btn btn-outline-success' type="button" name="button"><i class="fas fa-search"></i></button>
            </form>

            <!-- Add Collection Blocks -->
            <?php CollectionBlocks($mysqli) ?>
          <?php } ?>

        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <!-- Row -->
          <div class="row">
            <?php if ($appRunning == 1) { include 'partials/_song_blocks.php'; } ?>
          </div>

        </div>
      </div>
    </div>

<?php
  // Include Footer
  include 'partials/_footer.php';
?>

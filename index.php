<?php include 'partials/_header.php'; ?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <!-- Is the app running? -->
          <?php if ($appRunning == 1) { ?>
            <h3>Collection</h3>

            <!-- Search Form -->
            <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
        			<input class="form-control mr-sm-2" name="search_val" type="text" placeholder="Search" class="form-control" aria-label="Search">
        			<button class="btn btn-outline-success my-2 my-sm-0" value="search" type="submit"><i class="fas fa-search"></i></button>
        		</form>

            <!-- Add Collection Blocks -->
            <?php include 'partials/_collections.php'; ?>
          <?php } ?>

        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <!-- Collection Name -->
          <div class="row">

            <!-- Message Blocks -->
            <?php if (isset($_SESSION['message'])): ?>
              <div class="msg">
                <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                ?>
              </div>
            <?php endif ?>

            <h1><?php echo $collection_name ?></h1>
          </div>

          <!-- Row -->
          <div class="row">
            <?php if ($appRunning == 1) { include 'partials/_song_blocks.php'; } ?>
          </div>

        </div>
      </div>
    </div>
<?php include 'partials/_footer.php'; ?>

<?php include 'partials/_header.php'; ?>

      <?php
      // Start session if one not running.
      if (!isset($_SESSION)) {
          session_start();
      }
      ?>

      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <!-- Is the app running? -->
          <?php if ($appRunning == 1) { ?>
            <h3 id='collectionHeader'>Collection</h3>

            <!-- Search Form -->
            <div id='searchFormBox' class="center-block form-inline">
                <input class="form-control mr-sm-2" id='name' type="text" class="form-control">
                <input class='btn btn-outline-success my-2 my-sm-0' type="submit" id='name-submit' value="Grab">
            </div>

            <!-- Add Collection Blocks -->
            <?php include 'partials/_collections.php'; ?>
          <?php
      } ?>

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

            <h1 class='headerCollection display-4'>
              <?php setDefaultCollectionName($collection_name); ?>
            </h1>
          </div>

          <!-- Row -->
          <div class="row">
            <select id='sort' class="" name="">
              <option value="Asc">Asc</option>
              <option value="Desc">Desc</option>
            </select>
          </div>


          <div class="row">
            <div id='spinningLoader' class="loading-div"><img src="img/ajax-loader.gif"></div>
            <div class='col-md-12' id="name-data">

            </div>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript">

    </script>
<?php include 'partials/_footer.php'; ?>

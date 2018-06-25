<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php"); ?>

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

          <!-- Actions -->
          <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_action_blocks.php"); ?>

            <br>
        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <div class="row">
            <div class="col-md-12">

            <div id='CRUDWindow'>

            <!-- Head -->
            <h1 class='display-4'>Stats</h1>
            <p>See all the stats of your installation.</p>
            <br>

              <!-- Message Blocks -->
              <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                  <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>

              <h1><span><i class="fas fa-music"></i></span> Songs</h1>
              <p>Information relating to the song system.</p>
              <div class="row">

                <!-- Block 1 -->
                <!-- Count Songs -->
                <div class="col-md-3">
                  <div class="card col-md-12">
                    <div class="card-body text-center">
                      <h1 class="card-title"><?php echo countSongs($db) ?></h1>
                      <h6 class="card-subtitle mb-2">Total Songs</h6>
                    </div>
                  </div>
                </div>

                <!-- Block 2 -->
                <!-- Count Active -->
                <div class="col-md-3">
                  <div class="card col-md-12">
                    <div class="card-body text-center">
                      <h1 class="card-title"><?php echo countRequestsActive($db) ?></h1>
                      <h6 class="card-subtitle mb-2">Total Requests Active</h6>
                    </div>
                  </div>
                </div>

                <!-- Block 3 -->
                <!-- Count Inactive -->
                <div class="col-md-3">
                  <div class="card col-md-12">
                    <div class="card-body text-center">
                      <h1 class="card-title"><?php echo countRequestsInActive($db) ?></h1>
                      <h6 class="card-subtitle mb-2">Total Requests Inactive</h6>
                    </div>
                  </div>
                </div>

                <!-- Block 4 -->
                <!-- Count Total Made -->
                <div class="col-md-3">
                  <div class="card col-md-12">
                    <div class="card-body text-center">
                      <h1 class="card-title"><?php echo countTotalRequests($db) ?></h1>
                      <h6 class="card-subtitle mb-2">Total Requests Made</h6>
                    </div>
                  </div>
                </div>

              <br>

            <?php if ($addon_drinks == true) {
                      ?>
              <!-- Drinks Block -->
              <h1><span><i class="fas fa-beer"></i></span> Drinks</h1>
              <p>Information relating to the drinks system.</p>
              <div class="row">

                <!-- Block 1 -->
                <!-- Count Drinks -->
                <div class="col-md-3">
                  <div class="card col-md-12">
                    <div class="card-body text-center">
                      <h1 class="card-title"><?php echo countDrinks($db) ?></h1>
                      <h6 class="card-subtitle mb-2">Total Drinks</h6>
                    </div>
                  </div>
                </div>

              </div>
            <?php
                  } ?>

              <br>

            <?php if ($addon_smartthings == true) {
                      ?>
              <!-- Smart Things Block -->
              <h1><span><i class="fas fa-plug"></i></span> Smart Things</h1>
              <p>Information about smart objects connected to this installation.</p>
              <div class="row">

                <!-- Block 1 -->
                <!-- Count Smart -->
                <div class="col-md-3">
                  <div class="card col-md-12">
                    <div class="card-body text-center">
                      <h1 class="card-title"><?php echo countDrinks($db) ?></h1>
                      <h6 class="card-subtitle mb-2">Total Smart Things</h6>
                    </div>
                  </div>
                </div>

              </div>
            <?php
                  } ?>

            </div>
          </div>

        </div>

      </div>
    </div>
  <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php"); ?>

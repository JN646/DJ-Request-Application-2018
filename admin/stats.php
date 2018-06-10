<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php"); ?>
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
            <h1>Stats</h1>
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

              <h2>Songs</h2>
              <p><b>Total Songs: </b><span><?php echo countSongs($db) ?></span></p>
              <p><b>Total Active Requests: </b><span><?php echo countRequestsActive($db) ?></span></p>
              <p><b>Total Inactive Requests: </b><span><?php echo countRequestsInActive($db) ?></span></p>

              <hr>

              <h2>Drinks</h2>
              <p><b>Total Drinks: </b><span><?php echo countDrinks($db) ?></span></p>

              <hr>

              <h2>Smart Things</h2>
              <p><b>Total Smart Things: </b><span><?php echo countSmart($db) ?></span></p>
            </div>
          </div>

        </div>

      </div>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php"); ?>
    </div>

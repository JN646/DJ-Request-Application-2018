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

          <!-- Main content row -->
          <div class="row">
            <div class="col-md-12">

            <!-- Main Window -->
            <div id='CRUDWindow'>

              <?php $myfile = fopen("../css/venue.css", "r") or die("Unable to open file!"); ?>

              <!-- Title -->
              <h1>Style</h1>
              <h3>../css/venue.css</h3>
              <p>Edit and customise your system's style. Use the blocks below to add and edit your custom css file.</p>

              <!-- Custom CSS -->
              <h2>Custom CSS</h2>

              <!-- Form -->
              <form class="form-group" action="index.html" method="post">

                <!-- Text Area -->
                <textarea class='form-control' name="cssStyle" rows="20" cols="80">
                  <?php echo fread($myfile, filesize("../css/venue.css")); ?>
                </textarea>

                <br>

                <!-- Submit Button -->
                <button class='btn btn-success' type="submit" name="cssSubmit">Update</button>
              </form>

              <?php fclose($myfile); ?>
            </div>
          </div>

        </div>

      </div>
    </div>
  <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php"); ?>

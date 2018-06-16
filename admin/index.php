<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php"); ?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-sm-12 col-md-2">

          <!-- Actions -->
          <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_action_blocks.php"); ?>

            <br>

        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-sm-12 col-md-10">

          <div class="row">
            <div class="col-md-12">
              <!-- Title -->
              <h1>Active Requests - <span class="badge badge-secondary"><?php echo countRequestsActive($db); ?></span></h1>

              <br>

              <?php
              // ACTIVE RESULTS
              $activesql = "SELECT * FROM requests WHERE request_active = 1 ORDER BY request_time ASC";
              if($result = mysqli_query($mysqli, $activesql)){
                  if(mysqli_num_rows($result) > 0){
                    ?>
                    <!-- Draw Table -->
                      <table id='myTable2' style='font-size: 120%;' class='table table-hover'>
                          <tr>
                              <th class='text-center'>Song Name</th>
                              <th class='text-center'>Song Artist</th>
                              <th class='text-center'>Song Album</th>
                              <th class='text-center'>Song Genres</th>
                              <th class='text-center'>Time</th>
                              <th class='text-center'>Pin</th>
                              <th class='text-center'>Clear</th>
                          </tr>
                  <?php
                      while($row = mysqli_fetch_array($result)){
                        // Set Variables.
                        $RequestID = $row['request_id'];
                        $Time = $row['request_time'];

                        // Draw Table.
                          echo "<tr>";
                              echo "<td class='text-center'>" . $row['request_s_name'] . "</td>";
                              echo "<td class='text-center'>" . $row['request_s_artist'] . "</td>";
                              echo "<td class='text-center'>" . $row['request_s_album'] . "</td>";
                              echo "<td class='text-center colourCell" . $row['request_s_genre'] . "'>" . $row['request_s_genre'] . "</td>";
                              echo "<td class='text-center' title='" . $row['request_time'] . "'>" . nicetime($Time) . "</td>";
                              echo "<td class='text-center'><a href='". $_SERVER['PHP_SELF'] . "?pin_song=" . $RequestID . "'>" . isPinned($db, $RequestID) ."</a></td>";
                              echo "<td class='text-center'><a href='". $_SERVER['PHP_SELF'] . "?clear_song=" . $RequestID . "'><i class='fas fa-check'></i></a></td>";
                          echo "</tr>";
                      }
                      echo "</table>";

                      // Free result set
                      mysqli_free_result($result);
                  } else {
                      echo "No active requests were found.";
                  }
              } else {
                SQLError($mysqli);
              }
              ?>
              <br>
              <br>

              <!-- Inactive Request Header -->
              <h3 id=countRequestsInactiveHeader>Inactive Requests - <span id='countRequestsInactiveBadge' class="badge badge-secondary"><?php echo countRequestsInActive($db); ?></span></h3>

              <?php
              // Close connection
              mysqli_close($mysqli);
               ?>
            </div>
          </div>

        </div>

      </div>
    </div>

<script type="text/javascript">
  // Size changing
  $(function () {
    $(".font-button").bind("click", function () {
      var size = parseInt($('table').css("font-size"));
      if ($(this).hasClass("plus")) {
        // Increase font size.
        size = size + 2;
      } else if ($(this).hasClass("minus")) {
        // Decrease font size.
        size = size - 2;

        // Prevent fontsize getting less than 10.
        if (size <= 10) {
          size = 10;
        }
      } else if ($(this).hasClass("normal")) {
        //  Set font size to 14.
        size = 14;
      }
      $('table').css("font-size", size);
    });
  });
</script>

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

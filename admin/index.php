<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php"); ?>

      <?php session_start() ?>

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
              $activesql = "SELECT * FROM crud WHERE request_active = 1 ORDER BY request_time ASC";
              if($result = mysqli_query($mysqli, $activesql)){
                  if(mysqli_num_rows($result) > 0){
                    ?>
                    <!-- Draw Table -->
                      <table id='myTable2' style='font-size: 120%;' class='table table-hover'>
                          <tr>
                              <th onclick="sortTable(0)" class='text-center'>Name</th>
                              <th onclick="sortTable(1)" class='text-center'>Artist</th>
                              <th onclick="sortTable(2)" class='text-center'>Album</th>
                              <th onclick="sortTable(3)" class='text-center'>Genres</th>
                              <th onclick="sortTable(4)" class='text-center'>Last Request</th>
                              <th onclick="sortTable(5)" class='text-center'># Requests</th>
                              <th  class='text-center'>Pin</th>
                              <th class='text-center'>Clear</th>
                          </tr>
                  <?php
                      while($row = mysqli_fetch_array($result)){
                        // Set Variables.
                        $RequestID = $row['id'];
                        $Time = $row['request_time'];

                        // Draw Table.
                          echo "<tr>";
                              echo "<td class='text-center'>" . $row['name'] . "</td>";
                              echo "<td class='text-center'>" . $row['artist'] . "</td>";
                              echo "<td class='text-center'>" . $row['album'] . "</td>";
                              echo "<td class='text-center colourCell" . $row['genre'] . "'>" . $row['genre'] . "</td>";
                              echo "<td class='text-center' title='" . $row['request_time'] . "'>" . nicetime($Time) . "</td>";
                              echo "<td class='text-center'>" . $row['number_requests'] . "</td>";
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

  // Size changing
  $(function () {
    $(".font-button").bind("click", function () {
      var size = parseInt($('table').css("font-size"));
      if ($(this).hasClass("plus")) {
        size = size + 2;
      } else {
        size = size - 2;
        if (size <= 10) {
          size = 10;
        }
      }
      $('table').css("font-size", size);
    });
  });

  //############## Table Sorting #################################################
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable2");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.getElementsByTagName("TR");
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
</script>

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

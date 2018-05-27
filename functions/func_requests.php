<?php

// REQUEST PAGE
function RequestList($mysqli) {
  // Attempt select query execution
  $sql = "SELECT * FROM requests WHERE request_active = 1 ORDER BY request_time ASC";
  if($result = mysqli_query($mysqli, $sql)){
      if(mysqli_num_rows($result) > 0){
        ?>
        <!-- Draw Table -->
          <table id='myTable2' style='font-size: 120%;' class='table table-hover'>
              <tr>
                  <th class='text-center'>ID</th>
                  <th class='text-center'>Song Name</th>
                  <th class='text-center'>Song Artist</th>
                  <th class='text-center'>Song Album</th>
                  <th class='text-center'>Time</th>
                  <th class='text-center'>Clear</th>
              </tr>
      <?php
          while($row = mysqli_fetch_array($result)){
            // Set Variables.
            $RequestID = $row['request_id'];
            $Time = $row['request_time'];

            // Draw Table.
              echo "<tr>";
                  echo "<td class='text-center'>" . $row['request_id'] . "</td>";
                  echo "<td class='text-center'>" . $row['request_s_name'] . "</td>";
                  echo "<td class='text-center'>" . $row['request_s_artist'] . "</td>";
                  echo "<td class='text-center'>" . $row['request_s_album'] . "</td>";
                  echo "<td class='text-center'>" . nicetime($Time) . "</td>";
                  echo "<td class='text-center'><a href='". $_SERVER['PHP_SELF'] . "?" . $RequestID . "'>Clear</a></td>";
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

  // Close connection
  mysqli_close($mysqli);

  if (isset($_GET[$RequestID])) {
    echo "The record " . $RequestID . " Made Inactive";
  }
}

// SET INACTIVE
function SetInactive($mysqli, $UID) {
  // SQL Query
  $sql = "UPDATE requests SET request_active = '0' WHERE request_ID = $UID";

  // Run Query
  $result = mysqli_query($mysqli, $sql);
  mysqli_free_result($result);

  // Close Connection
  mysqli_close($mysqli);
}

 ?>

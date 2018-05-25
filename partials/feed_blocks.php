<div class="col-md-12">
  <div class="">
    <?php
    // Attempt select query execution
    $sql = "SELECT * FROM requests WHERE request_active = 1 ORDER BY request_time ASC";
    if($result = mysqli_query($mysqli, $sql)){
        if(mysqli_num_rows($result) > 0){
          ?>
            <table id='table_search' class='table table-bordered'>
                <tr>
                    <th class='text-center'>ID</th>
                    <th class='text-center'>Song Name</th>
                    <th class='text-center'>Song Artist</th>
                    <th class='text-center'>Song Album</th>
                    <th class='text-center'>Clear</th>
                </tr>
        <?php
            while($row = mysqli_fetch_array($result)){
              $RequestID = $row['request_id'];

                echo "<tr>";
                    echo "<td class='text-center'>" . $row['request_id'] . "</td>";
                    echo "<td>" . $row['request_s_name'] . "</td>";
                    echo "<td>" . $row['request_s_artist'] . "</td>";
                    echo "<td>" . $row['request_s_album'] . "</td>";
                    echo "<td><a href='". $_SERVER['PHP_SELF'] . "?" . $RequestID . "'>Clear</a></td>";
                echo "</tr>";
            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else{
            echo "No active requests were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
    }

    // Close connection
    mysqli_close($mysqli);

    if (isset($_GET[$RequestID])) {
      echo "The record " . $RequestID . " Made Inactive";
    }
    ?>
  </div>
</div>

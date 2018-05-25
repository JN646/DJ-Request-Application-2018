<?php
//DB Config
include("../config/DBConfig.php");
 ?>
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="listModalLabel">List of Songs</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Here are all the songs stored in the database.</p>

      <?php
      // Attempt select query execution
      $sql = "SELECT * FROM songs";
      if($result = mysqli_query($mysqli, $sql)){
          if(mysqli_num_rows($result) > 0){
              echo "<table id='table_search' class='table table-bordered'>";
                  echo "<tr>";
                      echo "<th class='text-center'>ID</th>";
                      echo "<th class='text-center'>Song Name</th>";
                      echo "<th class='text-center'>Song Artist</th>";
                      echo "<th class='text-center'>Song Album</th>";
                      echo "<th class='text-center'>Song Genre</th>";
                  echo "</tr>";
              while($row = mysqli_fetch_array($result)){
                  echo "<tr>";
                      echo "<td class='text-center'>" . $row['song_id'] . "</td>";
                      echo "<td>" . $row['song_name'] . "</td>";
                      echo "<td>" . $row['song_artist'] . "</td>";
                      echo "<td>" . $row['song_album'] . "</td>";
                      echo "<td>" . $row['song_genre'] . "</td>";
                  echo "</tr>";
              }
              echo "</table>";
              // Free result set
              mysqli_free_result($result);
          } else{
              echo "No jobs were found.";
          }
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
      }

      // Close connection
      mysqli_close($mysqli);
      ?>

      <br>

    </div>
    <div class="modal-footer">

      <!-- Close and Submit Buttons -->
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>

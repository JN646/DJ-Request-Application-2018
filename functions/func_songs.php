<?php
// SONG FUNCITONS

// LIST SONGS
function ListSongs($mysqli) {
  // Attempt select query execution
  $sql = "SELECT * FROM songs ORDER BY song_name ASC";
  if($result = mysqli_query($mysqli, $sql)) {
      if(mysqli_num_rows($result) > 0) {
        ?>
          <table id='table_search' class='table table-bordered'>
              <tr>
                  <th class='text-center'>ID</th>
                  <th class='text-center'>Song Name</th>
                  <th class='text-center'>Song Artist</th>
                  <th class='text-center'>Song Album</th>
                  <th class='text-center'>Song Genre</th>
              </tr>
      <?php
          while($row = mysqli_fetch_array($result)) {
              echo "<tr>";
                  echo "<td class='text-center'>" . $row['song_id'] . "</td>";
                  echo "<td>" . $row['song_name'] . "</td>";
                  echo "<td>" . $row['song_artist'] . "</td>";
                  echo "<td>" . $row['song_album'] . "</td>";
                  echo "<td class='colourCell" . $row['song_genre'] . "'>" . $row['song_genre'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";

          // Free result set
          mysqli_free_result($result);
      } else {
          // Error Message
          echo "<p>No songs were found.</p>";
      }
  } else {
      SQLError($mysqli);
  }

  // Close connection
  mysqli_close($mysqli);
}
 ?>

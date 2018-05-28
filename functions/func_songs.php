<?php
// SONG FUNCITONS

// ADD SONG
function AddSong($mysqli) {
  // Assign variables to input.
  $song_name = $_POST['name'];
  $song_artist = $_POST['artist'];
  $song_album = $_POST['album'];
  $song_genre = $_POST['genre'];

  // Add songs to database.
  $sql = "INSERT INTO songs (song_name, song_artist, song_album, song_genre) VALUES ('$song_name', '$song_artist', '$song_album', '$song_genre')";

  // Apply import.
  if(mysqli_query($mysqli,$sql)) {
      echo "<p class='alert alert-success'>Added</p>";
    } else {
      SQLError($mysqli);
    }
      // close connection
      mysqli_close($mysqli);
}

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

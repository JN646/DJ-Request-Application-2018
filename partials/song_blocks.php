<?php
  // Attempt select query execution
  $sql = "SELECT * FROM songs";

  if($result = mysqli_query($mysqli, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        // Sets variables
        $SongID = $row['song_id'];
        $SongName = $row['song_name'];
        $SongArtist = $row['song_artist'];
        $SongGenre = $row['song_genre'];
?>

<!-- Song Blocks -->
<div class="card song_block <?php echo 'colour' . $SongGenre ?>" style="width: 18rem;">
  <img class="card-img-top" src="img/img.svg" alt="Card image cap">
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <?php
          // Checks to see if song name is blank.
          if ($SongName !== '') {
            // Adds song name and artist
            echo "<h5 class='card-text'>" . $SongName . "</h5>";
            echo "<h6 class='card-text'>" . $SongArtist . "</h6>";
          } else {
            // Adds Unkown Song text.
            echo "<h5 class='card-text'>Unknown Song</h5>";
            echo "<h6 class='card-text'>" . $SongArtist . "</h6>";
          }

        ?>
      </div>
      <div class="col-md-3">
        <a id='requestLink' href="#">
          <i id='requestButton' class="far fa-thumbs-up fa-3x"></i>
        </a>
      </div>
    </div>
  </div>
</div>

<?php
  // Set variables on submit
  if(isset($_POST['submit'])) {
      $SongID = $_POST['id'];

      // Add songs to database.
      $sql = "INSERT INTO requests (song_id) VALUES ('$songID')";

      if(mysqli_query($mysqli,$sql)) {
          echo "<p class='alert alert-success'>Added</p>";
        } else {
          echo "<p class-'alert alert-danger'>Error: " . $sql . "<br>" . mysqli_error($mysqli) . "</p>";
        }
  }

      }
      // Free result set
      mysqli_free_result($result);
    } else{

      // Nothing Found
      echo "<h3 class='text-center'>No songs were found.</h3>";
    }
  } else{
    QueryError($query, $mysqli);
  }
 ?>

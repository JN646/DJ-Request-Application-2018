<?php
  // Attempt select query execution
  $sql = "SELECT * FROM songs";

  if($result = mysqli_query($mysqli, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
        // Sets variables
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
        <i id='requestButton' class="far fa-thumbs-up fa-3x"></i>
      </div>
    </div>
  </div>
</div>

<?php
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

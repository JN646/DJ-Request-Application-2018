<?php
  // Attempt select query execution
  $sql = "SELECT DISTINCT * FROM songs ORDER BY song_name ASC";

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

  <!-- Song Top Image -->
  <?php if ($coverArtMode == 1) { ?>
    <img class="card-img-top" src="img/img.svg" alt="Card image cap">
  <?php } ?>

  <!-- Song Body -->
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">

        <!-- Song Name -->
        <?php echo "<h5 class='card-text'>" . $SongName . "</h5>"; ?>

        <!-- Song Artist -->
        <?php echo "<h6 class='card-text'>" . $SongArtist . "</h6>"; ?>
      </div>

      <!-- Request Button -->
      <div class="col-md-3">
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
          <button type="submit" name="request" class="btn-link" style='border: 0px;'>
            <i id='requestButton' class="far fa-thumbs-up fa-2x"></i>
          </button>
        </form>
      </div>

    </div>
  </div>
</div>

<?php
  // Set variables on submit
  if(isset($_POST['request'])) {

      // // Add songs to database.
      // $sql = "INSERT INTO requests (request_s_name, request_s_artist, request_s_genre) VALUES ('$SongName', '$SongArtist', '$SongGenre')";
      //
      // if(mysqli_query($mysqli,$sql)) {
      //     echo "<p class='alert alert-success'>Added</p>";
      //   } else {
      //     echo "<p class-'alert alert-danger'>Error: " . $sql . "<br>" . mysqli_error($mysqli) . "</p>";
      //   }
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

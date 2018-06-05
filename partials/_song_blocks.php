<?php
  if($result = mysqli_query($mysqli, $songblock_sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){

        // Sets variables
        $SongID = $row['id'];
        $SongName = $row['name'];
        $SongArtist = $row['artist'];
        $SongAlbum = $row['album'];
        $SongGenre = $row['genre'];
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
        <a href="index.php?request_song=<?php echo $row['id']; ?>" class="" ><i class="far fa-thumbs-up fa-2x"></i></a>
      </div>

    </div>
  </div>
</div>

<?php
  // Set variables on submit
  if(isset($_POST['request'])) {
  }

      }
      // Free result set
      mysqli_free_result($result);

    } else{

      // Nothing Found
      echo "<h3 class='text-center'>No " . $collection_name . " were found.</h3>";
    }
  } else{
    QueryError($query, $mysqli);
  }
 ?>

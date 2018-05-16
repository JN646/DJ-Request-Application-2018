<?php
  // Attempt select query execution
  $sql = "SELECT * FROM songs";

  if($result = mysqli_query($mysqli, $sql)){
    if(mysqli_num_rows($result) > 0){
      while($row = mysqli_fetch_array($result)){
?>

<!-- Song Blocks -->
<div class="card song_block" style="width: 18rem;">
  <img class="card-img-top" src="img/img.svg" alt="Card image cap">
  <div class="card-body">
    <div class="row">
      <div class="col-md-9">
        <?php echo "<h5 class='card-text'>" . $row['song_name'] . "</h5>"; ?>
        <?php echo "<h6 class='card-text'>" . $row['song_artist'] . "</h6>"; ?>
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
      echo "<h3 class='text-center'>No artists were found.</h3>";
    }
  } else{
    QueryError($query, $mysqli);
  }
 ?>

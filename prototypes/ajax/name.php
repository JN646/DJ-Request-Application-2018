<?php
if (isset($_POST['name']) === true && empty($_POST['name']) === false) {

require_once '../../config/DBConfig.php';

  $name = $_POST['name'];

  $songblock_sql = mysqli_query($mysqli, "SELECT * FROM crud WHERE name LIKE '%$name%'");

  while ($row = mysqli_fetch_array($songblock_sql)) {
      $SongGenre = $row['genre'];
      $SongName = $row['name'];
      $SongArtist = $row['artist'];
      $SongAlbum = $row['album'];
?>
      <!-- Song Blocks -->
      <div class="col-sm-4 col-md-2 card song_block" style="padding: 0px;">

        <!-- Song Body -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">

              <!-- Song Name -->
              <?php echo "<h5 class='card-text' title='" . $SongName . "'>" . $SongName . "</h5>"; ?>

              <!-- Song Artist -->
              <?php echo "<h6 class='card-text' title='" . $SongArtist . "'>" . $SongArtist . "</h6>"; ?>

            </div>

            <!-- Request Button -->
            <div id='requestButtonDiv' class="col-md-3">
              <a href="index.php?request_song=<?php echo $id ?>"><i class="far fa-thumbs-up fa-2x"></i></a>
            </div>

          </div>
        </div>
      </div>
    </div>
    <?php
  }
}
?>

<?php
if (isset($_POST['name']) === true && empty($_POST['name']) === false) {

// Connect to database
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/functions.php");

  // Trim input.
  $name = trim($_POST['name']);

  // Run SQL
  $songblock_sql = mysqli_query($mysqli, "SELECT * FROM crud WHERE name LIKE '%$name%' OR artist LIKE '%$name%' OR album LIKE '%$name%'");

  // Catch any errors.
  mysqli_error($mysqli);

  // Create blocks
  while ($row = mysqli_fetch_array($songblock_sql)) {
      // Assign Variables
      $SongID = $row['id'];
      $SongGenre = $row['genre'];
      $SongName = $row['name'];
      $SongArtist = $row['artist'];
      $SongAlbum = $row['album'];
?>
      <!-- Song Blocks -->
      <div class="col-sm-4 col-md-2 card song_block <?php echo 'colour' . $SongGenre ?>">

        <!-- Song Body -->
        <div class="card-body">
          <div class="row">
            <div class="col-md-9">

              <!-- Song Name -->
              <?php echo "<h5 class='card-text' title='" . $SongName . "'>" . NameLimiter($SongName) . "</h5>"; ?>

              <!-- Song Artist -->
              <?php echo "<h6 class='card-text' title='" . $SongArtist . "'>" . ArtistLimiter($SongArtist) . "</h6>"; ?>

            </div>

            <!-- Request Button -->
            <div id='requestButtonDiv' class="col-md-3">
              <a href="index.php?request_song=<?php echo $SongID ?>"><i class="far fa-thumbs-up fa-2x"></i></a>
            </div>

          </div>
        </div>
      </div>
    </div>
    <?php
  }
}
?>

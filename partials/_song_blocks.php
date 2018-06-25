<?php
################ DJ APP 2018 ###################################################
// Author: Josh Ginn
// Copyright: 2018
################################################################################

################ SONG BLOCKS ###################################################

// Additional Files.
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/server.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/functions.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/lib/lastfm.php");

// Variables
// $collectionIDNum = 0;
$coverArtMode = 0;
$orderType = 'artist';

    //get total number of records from database for pagination
    $songblock_sql = mysqli_query($db, "SELECT * FROM crud WHERE collec_id = $collectionIDNum ORDER BY $orderType ASC LIMIT 20");

    //Display records fetched from database.
    while ($row = mysqli_fetch_array($songblock_sql)) {
        $SongGenre = $row['genre'];
        $SongName = $row['name'];
        $SongArtist = $row['artist'];
        $SongAlbum = $row['album']; ?>
              <!-- Song Blocks -->
              <div class="col-sm-4 col-md-2 card song_block <?php echo 'colour' . $SongGenre ?>" style="padding-left: 0px; padding-right: 0px;">

                <!-- Song Top Image -->
                <?php if ($coverArtMode == 1) {
            ?>
                  <?php
                  echo "<img class='headerimage' onerror=this.src='img/img1.svg' src=\"";
            echo LastFMArtwork::getArtwork($SongArtist, $SongAlbum, true, "large");
            echo "\"></a>"; ?>
                <?php
        } ?>

                <!-- Song Body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-9">

                      <!-- Song Name -->
                      <?php echo "<h5 class='card-text'>" . NameLimiter($SongName) . "</h5>"; ?>

                      <!-- Song Artist -->
                      <?php echo "<h6 class='card-text'>" . ArtistLimiter($SongArtist) . "</h6>"; ?>

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
?>

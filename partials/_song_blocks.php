<?php
  if ($result = mysqli_query($mysqli, $songblock_sql)) {
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {

        // Sets variables
              $SongID = $row['id'];
              $SongName = $row['name'];
              $SongArtist = $row['artist'];
              $SongAlbum = $row['album'];
              $SongGenre = $row['genre']; ?>

        <!-- Song Blocks -->
        <div class="card song_block <?php echo 'colour' . $SongGenre ?>" style="width: 18rem;">

          <!-- Song Top Image -->
          <?php if ($coverArtMode == 1) { ?>
            <?php
            echo "<img class='headerimage' onerror=this.src='img/img.svg' src='img/spinner.gif' data-src=\"";
                  echo LastFMArtwork::getArtwork($SongArtist, $SongAlbum, true, "large");
                  echo "\"></a>"; ?>
          <?php } ?>

          <!-- Song Body -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-9">

                <!-- Song Name -->
                <?php echo "<h5 class='card-text'>" . NameLimiter($SongName) . "</h5>"; ?>

                <!-- Song Artist -->
                <?php echo "<h6 class='card-text'>" . NameLimiter($SongArtist) . "</h6>"; ?>

              </div>

              <!-- Request Button -->
              <div class="col-md-3">
                <a href="index.php?request_song=<?php echo $row['id']; ?>" class="" ><i class="far fa-thumbs-up fa-2x"></i></a>
              </div>

            </div>
          </div>
        </div>
        <?php
          }
      }
  }
         ?>
         <script>
         window.addEventListener('load', function(){
             var allimages= document.getElementsByTagName('img');
             for (var i=0; i<allimages.length; i++) {
                 if (allimages[i].getAttribute('data-src')) {
                     allimages[i].setAttribute('src', allimages[i].getAttribute('data-src'));
                 }
             }
         }, false)
         </script>

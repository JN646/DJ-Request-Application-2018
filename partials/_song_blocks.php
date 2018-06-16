<?php
// FETCH PAGES.

// Additional Files.
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/server.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/functions.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/lib/lastfm.php");

// Variables
$coverArtMode = 1;
$collectionIDNum = 0;

//continue only if $_POST is set and it is a Ajax request
if (isset($_POST) && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");
    //Get page number from Ajax POST
    if (isset($_POST["page"])) {
        $page_number = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH); //filter number
        if (!is_numeric($page_number)) {
            die('Invalid page number!');
        } //incase of invalid page number
    } else {
        $page_number = 1; //if there's no page number, set it to 1
    }

    //get total number of records from database for pagination
    $results = $mysqli->query("SELECT COUNT(*) FROM crud WHERE collec_id = $collectionIDNum");
    $get_total_rows = $results->fetch_row(); //hold total records in variable
    //break records into pages
    $total_pages = ceil($get_total_rows[0]/$item_per_page);

    //get starting position to fetch the records
    $page_position = (($page_number-1) * $item_per_page);

    //Limit our results within a specified range.
    $results = $mysqli->prepare("SELECT id, name, artist, album, genre, collec_id FROM crud WHERE collec_id = $collectionIDNum ORDER BY id ASC LIMIT $page_position, $item_per_page");
    $results->execute(); //Execute prepared Query
    $results->bind_result($id, $SongName, $SongArtist, $SongAlbum, $SongGenre, $collec_id); //bind variables to prepared statement

    echo "<div class='row paginateButtons'>";
      echo paginate_function($item_per_page, $page_number, $get_total_rows[0], $total_pages);
    echo '</div>';

    echo "</br>";

    //Display records fetched from database.
    while ($results->fetch()) { //fetch values
      ?>
              <!-- Song Blocks -->
              <div class="col-md-2 card song_block <?php echo 'colour' . $SongGenre ?>" style="min-width: 250px; padding-left: 5px; padding-right: 5px;">

                <!-- Song Top Image -->
                <?php if ($coverArtMode == 1) { ?>
                  <?php
                  echo "<img class='headerimage' onerror=this.src='img/img.svg' src=\"";
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
                      <?php echo "<h6 class='card-text'>" . ArtistLimiter($SongArtist) . "</h6>"; ?>

                    </div>

                    <!-- Request Button -->
                    <div class="col-md-3">
                      <a href="index.php?request_song=<?php echo $id ?>" class="" ><i class="far fa-thumbs-up fa-2x"></i></a>
                    </div>

                  </div>
                </div>
              </div>
              <?php
    }

    echo "</div>";

    exit;
}
?>

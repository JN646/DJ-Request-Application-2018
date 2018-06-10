<?php
################ DJ SERVER FILE ################################################
################ Start Session #################################################
session_start();

################ Database Connection ###########################################
$db = mysqli_connect('localhost', 'root', '', 'djapp2');

################ Variables #####################################################
$name = $artist = $album = $genre = $year = "";
$collectionID = $id = 0;
$update = false;

// Other Variables
$collectionIDNum = 0;
$collection_name = "";

################ Clean Inputs ##################################################
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

################ Collection ID Array ###########################################
function CollectionArray()
{
    $collecionSQL = "SELECT DISTINCT * FROM collections";
    $collectionResult = mysqli_query($mysqli, $collecionSQL);
    $rs = mysqli_fetch_array($collectionResult);
    $collection_id = $rs['collection_id'];
    $collection_name = $rs['collection_name'];

    // Loop Through Collection Array.
    for ($i=0; $i < count($collection_id); $i++) {
        echo "<option value='" . $collection_id ."'>" . $collection_name ."</option>";
    }
}

################ SONG CRUD #####################################################
################ Add Record ####################################################
if (isset($_POST['save'])) {
    $name = test_input($_POST['name']);
    $artist = test_input($_POST['artist']);
    $album = test_input($_POST['album']);
    $genre = test_input($_POST['genre']);
    $year = test_input($_POST['year']);
    $collectionID = test_input($_POST['collectionID']);

    if(mysqli_query($db, "INSERT INTO crud (name, artist, genre, year, collec_id) VALUES ('$name', '$artist', '$album', '$genre', '$year', '$collectionID')")) {
      $_SESSION['message'] = "<div class='alert alert-success'>Song saved</div>";
      header('location: ../admin/list_manager.php');
    } else {
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
      header('location: ../admin/list_manager.php');
    }
}

################ Update Record #################################################
if (isset($_POST['update'])) {
    $id = test_input($_POST['id']);
    $name = test_input($_POST['name']);
    $artist = test_input($_POST['artist']);
    $album = test_input($_POST['album']);
    $genre = test_input($_POST['genre']);
    $year = test_input($_POST['year']);
    $collectionID = test_input($_POST['collectionID']);

    if(mysqli_query($db, "UPDATE crud SET name='$name', artist='$artist', album='$album', genre='$genre', collec_id='$collectionID', year='$year' WHERE id='$id'")) {
      $_SESSION['message'] = "<div class='alert alert-success'>Song updated</div>";
      header('location: ../admin/list_manager.php');
    } else {
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
      header('location: ../admin/list_manager.php');
    }
}

################ Delete Record #################################################
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    if(mysqli_query($db, "DELETE FROM crud WHERE id=$id")) {
      $_SESSION['message'] = "<div class='alert alert-success'>Song deleted</div>";
      header('location: ../admin/list_manager.php');
    } else {
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
      header('location: ../admin/list_manager.php');
    }
}

################ Request Song ##################################################
if (isset($_GET['request_song'])) {
    // Get song ID.
    $song_request_ID_number = $_GET['request_song'];

    // Select song from database.
    $songrequestSQL = "SELECT * FROM crud WHERE id = $song_request_ID_number";
    $songrequestResult = mysqli_query($mysqli, $songrequestSQL);

    // Get Results.
    $sr = mysqli_fetch_array($songrequestResult);

    // Set Variables
    $song_name = $sr['name'];
    $song_artist = $sr['artist'];
    $song_album = $sr['album'];
    $song_genre = $sr['genre'];
    $song_year = $sr['year'];

    // Insert into database
    if($song_insert = mysqli_query($db, "INSERT INTO requests (request_s_name, request_s_artist, request_s_album, request_s_genre) VALUES ('$song_name', '$song_artist', '$song_album', '$song_genre')")) {
      // Message
      $_SESSION['message'] = "<div class='alert alert-success'>Song Requested!</div>";
      header('location: index.php');
    } else {
      // Message
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
      header('location: index.php');
    }
}

################ Get Results ###################################################
$results = mysqli_query($db, "SELECT * FROM crud");

################ Collection Values #############################################
if (isset($_GET['collection'])) {
    $CollectionIDTitle = $_GET['collection'];
    $CollectionID = $_GET['collection'];

    // Get collection ID from URL.
    $collectionIDNum = $_GET['collection'];

    // Get Collection Name from ID.
    $collecionNameSQL = "SELECT DISTINCT * FROM collections WHERE collection_id = $collectionIDNum";
    $collectionResult = mysqli_query($mysqli, $collecionNameSQL);
    $rs = mysqli_fetch_array($collectionResult);
    $collection_name = $rs['collection_name'];
}

// Checks to see if collection exists in URL.
if (isset($_GET['collection'])) {
    // Get Collection Name
    $collectionIDNum = $_GET['collection'];
    // Set Collection SQL.
    $songblock_sql = "SELECT DISTINCT * FROM crud WHERE collec_id = $collectionIDNum ORDER BY name ASC LIMIT $SongLimit";
} else {
    // Set Collection ID to 0.
    $collectionIDNum = 0;
    //  Set Collection SQL.
    $songblock_sql = "SELECT DISTINCT * FROM crud ORDER BY name ASC LIMIT $SongLimit";
}

################ DJ ADMIN ######################################################
################ Clear Song ####################################################
if (isset($_GET['clear_song'])) {
    // Get song ID.
    $song_request_ID_number = $_GET['clear_song'];

    // Run SQL
    if(mysqli_query($db, "UPDATE requests SET request_active=0 WHERE request_id=$song_request_ID_number")) {
      // Message
      $_SESSION['message'] = "<div class='alert alert-success'>Request Cleared!</div>";
      // Reload Page
      header('location: index.php');
    } else {
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
    }
}

################ Pin Song ######################################################
if (isset($_GET['pin_song'])) {
    // Get song ID.
    $song_request_ID_number = $_GET['pin_song'];

    // SELECT requests WHERE id = GET
  	$check = "SELECT * FROM requests WHERE request_id = $song_request_ID_number";

  	// Store pin value as a variable
  	$result = mysqli_query($db, $check);
  	$rs = mysqli_fetch_array($result);

  	$value = $rs['request_pinned'];
  	$togpin = $value;

  	//Execute the Query
  	if(mysqli_query($db, $check))  {
  		// Check and save as another variable
  		if($value == 1) {
  			$togpin = 0;
  		}
  		if($value == 0) {
  			$togpin = 1;
  		}
  	}

  	// Write variable to the database
  	if(mysqli_query($db, "UPDATE requests SET request_pinned = $togpin WHERE request_id = $song_request_ID_number")) {
      // Message
      $_SESSION['message'] = "<div class='alert alert-success'>Song Pinned!</div>";
      header('location: index.php');
    } else {
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
      header('location: index.php');
    }
}

################ Delete Requests ###############################################
if (isset($_GET['deleterequests'])) {
    // Get song ID.
    $deleteallrequests = $_GET['deleterequests'];

    // Run SQL
    if(mysqli_query($db, "DELETE FROM requests")) {
      // Message
      $_SESSION['message'] = "<div class='alert alert-success'>Requests Deleted!</div>";
      header('location: index.php');
    } else {
      $_SESSION['message'] = "<div class='alert alert-danger'>Something Went Wrong. " . mysqli_error($db) . "</div>";
      header('location: index.php');
    }
}

################ Search ########################################################
if (isset($_GET['search_val'])) {
    $SongSearchVal = $_GET['search_val'];

    // Song Search SQL
    $songblock_sql = "SELECT * FROM crud WHERE name LIKE '%$SongSearchVal%' OR artist LIKE '%$SongSearchVal%' OR year LIKE '%$SongSearchVal%' OR genre LIKE '%$SongSearchVal%' LIMIT $SongLimit";
}

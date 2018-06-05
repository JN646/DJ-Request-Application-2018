<?php
// DJ APPLICATION SERVER FILE.

// Start Session
session_start();

// Connect to DB.
$db = mysqli_connect('localhost', 'root', '', 'djapp2');

// initialise variables
$name = $artist = $genre = $year = "";
$collectionID = $id = 0;
$update = false;

// Other Variables
$collectionIDNum = 0;
$collection_name = "";

// CLEAN Database
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Collection ID ARRAY - NOT WORKING
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

// Add Records
if (isset($_POST['save'])) {
    $name = test_input($_POST['name']);
    $artist = test_input($_POST['artist']);
    $genre = test_input($_POST['genre']);
    $year = test_input($_POST['year']);
    $collectionID = test_input($_POST['collec_id']);

    mysqli_query($db, "INSERT INTO crud (name, artist, genre) VALUES ('$name', '$artist', '$genre', '$year', '$collectionID')");
    $_SESSION['message'] = "Song saved";
    header('location: ../admin/list_manager.php');
}

// Update Records
if (isset($_POST['update'])) {
    $id = test_input($_POST['id']);
    $name = test_input($_POST['name']);
    $artist = test_input($_POST['artist']);
    $genre = test_input($_POST['genre']);

    mysqli_query($db, "UPDATE crud SET name='$name', artist='$artist', genre='$genre', collec_id='$collectionID', year='$year
      ' WHERE id=$id");
    $_SESSION['message'] = "Song updated!";
    header('location: ../admin/list_manager.php');
}

// Delete Records
if (isset($_GET['del'])) {
    $id = $_GET['del'];
    mysqli_query($db, "DELETE FROM crud WHERE id=$id");
    $_SESSION['message'] = "Song deleted!";
    header('location: ../admin/list_manager.php');
}

// Request Records
if (isset($_POST['request'])) {
    $id = $_POST['id'];

    mysqli_query($db, "UPDATE crud SET active='1' WHERE id=$id");
    $_SESSION['message'] = "Request updated!";
    header('location: index.php');
}

// Get Results
$results = mysqli_query($db, "SELECT * FROM crud");

// Collection Values
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
    $songblock_sql = "SELECT DISTINCT * FROM crud WHERE collec_id = $collectionIDNum ORDER BY name ASC";
} else {
    // Set Collection ID to 0.
    $collectionIDNum = 0;
    //  Set Collection SQL.
    $songblock_sql = "SELECT DISTINCT * FROM crud ORDER BY name ASC";
}

// Request Song
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
    $song_genre = $sr['genre'];
    $song_year = $sr['year'];

    // Insert into database
    $song_insert = mysqli_query($db, "INSERT INTO requests (request_s_name, request_s_artist, request_s_genre) VALUES ('$song_name', '$song_artist', '$song_genre')");

    // Message
    $_SESSION['message'] = "Request Sent!";

    // Reload Page
    header('location: index.php');
}

// Clear Song
if (isset($_GET['clear_song'])) {
    // Get song ID.
    $song_request_ID_number = $_GET['clear_song'];

    // Run SQL
    mysqli_query($db, "UPDATE requests SET request_active=0 WHERE request_id=$song_request_ID_number");

    // Message
    $_SESSION['message'] = "Request Cleared!";

    echo $song_request_ID_number;

    // Reload Page
    // header('location: index.php');
}

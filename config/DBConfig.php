 <?php
//MySQL connection
$mysqli = new mysqli('localhost', 'root', '', 'djapp2');

 //If connection fail
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

/*
This file loads all of the global variables for the application. When you install the system, ensure you go through this file and make sure all of the correct variables and details have been added to this file.
Make a backup of this file as changes can have catastrophic results.
 */

// Global Variables.
define("LOCAL", "http://localhost/dj-app2/"); //local URL
define("WEB", "http://192.168.1.72:80/dj-app2/"); //website URL
$environment = LOCAL; //change to WEB if you're live

// App Running Debug.
$appRunning = 1;

// CoverArt Mode.
$coverArtMode = 1;

// Song Limit
$SongLimit = 50;

// Paginatation
// Number per page.
$item_per_page = 20;


// ADDONS
// Checks to see what addons have been activated.
$addon_drinks = TRUE;
?>

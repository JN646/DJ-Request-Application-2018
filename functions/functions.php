<?php
################ DJ APP 2018 ###################################################
// Author: Josh Ginn
// Copyright: 2018
################################################################################

################ PHP FUNCTIONS #################################################
// Keep all functions where possible in this file. Try and keep the code organised and easy to read.

################ Get Version Number ############################################
class ApplicationVersion
{
    // Define version numbering
    const MAJOR = 0;
    const MINOR = 0;
    const PATCH = 0;

    public static function get()
    {
        // Prepare git information to form version number.
        $commitHash = trim(exec('git log --pretty="%h" -n1 HEAD'));

        // Get date and time information.
        $commitDate = new \DateTime(trim(exec('git log -n1 --pretty=%ci HEAD')));
        $commitDate->setTimezone(new \DateTimeZone('UTC'));

        // Format all information into a version identifier.
        return sprintf('v%s.%s.%s-dev.%s (%s)', self::MAJOR, self::MINOR, self::PATCH, $commitHash, $commitDate->format('Y-m-d H:m:s'));
    }

    // Usage: echo 'MyApplication ' . ApplicationVersion::get();
}

################ Check online function #########################################
function is_connected()
{
    $connected = @fsockopen("www.google.co.uk", 80);

    if ($connected) {
        $is_conn = true; //action when connected
        fclose($connected);
    } else {
        $is_conn = false; //action in connection failure
    }

    // Displays Icon based on connected status
    if ($is_conn == true) {
        echo "<i class='fas fa-wifi' title='Connected'></i>";
        $coverArtMode = 1;
    } else {
        echo "<i class='fas fa-ban' title='Not Connected'></i>";
        $coverArtMode = 0;
    }
}

################ Date Function #################################################
function nicetime($date)
{
    if (empty($date)) {
        return "No date provided";
    }

    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60","60","24","7","4.35","12","10");
    $now = time();
    $unix_date = strtotime($date);

    // check validity of date
    if (empty($unix_date)) {
        return "Bad date";
    }

    // is it future date or past date
    if ($now > $unix_date) {
        $difference = $now - $unix_date;
        $tense = "ago";
    } else {
        $difference = $unix_date - $now;
        $tense = "from now";
    }

    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }

    $difference = round($difference);

    if ($difference != 1) {
        $periods[$j].= "s";
    }

    // Return Value.
    return "$difference $periods[$j] {$tense}";
}

################ SONG FUNCTIONS ################################################
################ Genre function ################################################
function GenreArray()
{
    // Genre Array.
    $genreList = array('', 'Other', 'Pop', 'Rock', 'RnB', 'Hip-Hop', 'Classical', 'Rap', 'Dance');
    sort($genreList);

    // Loop Through Genre Array.
    for ($i=0; $i < count($genreList); $i++) {
        echo "<option value='" . $genreList[$i] ."'>" . $genreList[$i] ."</option>";
    }
}

################ Year Null function ############################################
function yearNull($songYear)
{
    if ($songYear == 0) {
        // Check to see if the year is 0.

        // Set the year to blank.
        return $songYear = "";
    }

    // Return year.
    return $songYear;
}

################ Check Pinned function #########################################
function isPinned($db, $RequestID)
{
    // SELECT requests WHERE id = GET
    $check = "SELECT * FROM crud WHERE id = $RequestID";

    // Store pin value as a variable
    $result = mysqli_query($db, $check);
    $rs = mysqli_fetch_array($result);

    // Get Value.
    $value = $rs['request_pinned'];

    // Check to see if pinned.
    if ($value == 1) {
        return "<i class='fas fa-thumbtack'></i>";
    } elseif ($value == 0) {
        return "Pin";
    }
}

################ COUNTING THINGS ###############################################
################ Count Song Active function ####################################
function countRequestsActive($db)
{
    // SELECT requests WHERE id = GET
    $query = "SELECT COUNT(*) FROM crud WHERE request_active = 1";
    $result = mysqli_query($db, $query);
    $rows = mysqli_fetch_row($result);

    // Return Value.
    return $rows[0];
}

################ Count Request Inactive function ###############################
function countRequestsInActive($db)
{
    // SELECT requests WHERE id = GET
    $query = "SELECT COUNT(*) FROM crud WHERE request_active = 0";
    $result = mysqli_query($db, $query);
    $rows = mysqli_fetch_row($result);

    // Return Value.
    return $rows[0];
}

################ Count Song function ###########################################
function countSongs($db)
{
    // SELECT requests WHERE id = GET
    $query = "SELECT COUNT(*) FROM crud";
    $result = mysqli_query($db, $query);
    $rows = mysqli_fetch_row($result);

    // Return Value.
    return $rows[0];
}

################ Count Total Requests function #################################
function countTotalRequests($db)
{
    // SELECT requests WHERE id = GET
    $query = "SELECT SUM(number_requests) from crud";
    $result = mysqli_query($db, $query);
    $rows = mysqli_fetch_row($result);

    // Return Value.
    return $rows[0];
}

################ Collection Name function ######################################
function getCollectionName($db, $collectionNum)
{
    // Run SQL
    $check = "SELECT * FROM collections WHERE collection_id = $collectionNum";
    $result = mysqli_query($db, $check);
    $rs = mysqli_fetch_array($result);

    // Store Collection Name as Variable.
    $collectionName = $rs['collection_name'];

    // Contains No Collection Name.
    if ($collectionName == "") {
        $collectionName = "";
    }

    // Return Value.
    return $collectionName;
}

################ Cover Art Style ###############################################
function coverArtStyleMode($coverArtMode)
{
    if ($coverArtMode == 0) {
        return $coverArtStyle = "song_block_small";
    } elseif ($coverArtMode == 1) {
        return $coverArtStyle = "song_block";
    } elseif ($coverArtMode == 2) {
        return $coverArtStyle = "song_block_list";
    }
}

################ Default Collection Name #######################################
function setDefaultCollectionName($collectionName)
{
    // Check to see if collection name is empty.
    if (empty($collection_name)) {
        // Set value to "All Songs".
        $collection_name = "All Songs";
    }
    // Output Collection Name.
    echo $collection_name;
}

################ TEXT LIMITERS #################################################
################ Name Limiter function #########################################
function NameLimiter($SongName)
{
    $name_lim = 20; //string length limit
    if (strlen($SongName) > $name_lim) {
        $output = substr($SongName, 0, $name_lim-3) . "...";
        return $output;
    } else {
        return $SongName;
    }
}

################ Arist Limiter function ########################################
function ArtistLimiter($SongArtist)
{
    $name_lim = 20; //string length limit
    if (strlen($SongArtist) > $name_lim) {
        $output = substr($SongArtist, 0, $name_lim-3) . "...";
        return $output;
    } else {
        return $SongArtist;
    }
}

################ GLOBAL FUNCTIONS ##############################################
################ SQL ERROR function ############################################
function SQLError($sql, $mysqli)
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

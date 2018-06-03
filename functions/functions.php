<?php
// PHP FUNCTION FILE.
// Keep all functions where possible in this file. Try and keep the code organised and easy to read.

// GET VERSION NUMBER
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

// CHECK ONLINE
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
    } else {
        echo "<i class='fas fa-ban' title='Not Connected'></i>";
    }
}

// GENRE ARRAY
function GenreArray()
{
    // Genre Array.
    $genreList = ['Other', 'Pop', 'Rock', 'RnB', 'Hip-Hop', 'Classical', 'Rap'];

    // Loop Through Genre Array.
    for ($i=0; $i < count($genreList); $i++) {
        echo "<option value='" . $genreList[$i] ."'>" . $genreList[$i] ."</option>";
    }
}

// DATE PURIFIER
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

    return "$difference $periods[$j] {$tense}";
}

// GLOBAL FUNCTIONS
function SQLError($sql, $mysqli)
{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

// CLEAN Database
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

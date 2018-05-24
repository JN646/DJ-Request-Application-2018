<?php

//  Get GITHUB Version.
class ApplicationVersion {
    // Define version numbering
    const MAJOR = 0;
    const MINOR = 0;
    const PATCH = 0;

    public static function get() {
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

// Check to see if Online.
function is_connected() {
    $connected = @fsockopen("www.google.co.uk", 80);
                                        //website, port  (try 80 or 443)
    if ($connected){
        $is_conn = true; //action when connected
        fclose($connected);
    }else{
        $is_conn = false; //action in connection failure
    }

    // Displays Icon based on connected status
     if ($is_conn == true) {
       echo "<i class='fas fa-wifi' title='Connected'></i>";
     } else {
       echo "<i class='fas fa-ban' title='Not Connected'></i>";
     }
}

function GenreArray() {
  // Genre Array.
  $genreList = ['Other', 'Pop', 'Rock', 'RnB', 'Hip-Hop', 'Classical', 'Rap'];

  // Loop Through Genre Array.
  for ($i=0; $i < count($genreList); $i++) {
    echo "<option value='" . $genreList[$i] ."'>" . $genreList[$i] ."</option>";
  }
}
 ?>

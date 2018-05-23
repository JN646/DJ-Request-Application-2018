<?php
function is_connected()
{
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
 ?>

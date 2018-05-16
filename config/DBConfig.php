 <?php
//MySQL connection
$mysqli = new mysqli('localhost', 'root', '', 'djapp2');

 //If connection fail
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') '
            . $mysqli->connect_error);
}
?>

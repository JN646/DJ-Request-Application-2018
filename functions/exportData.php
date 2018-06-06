<?php
//include database configuration file
$db = mysqli_connect('localhost', 'root', '', 'djapp2');

//get records from database
$query = $db->query("SELECT * FROM crud ORDER BY id DESC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "songs_" . date('Y-m-d') . ".csv";

    //create a file pointer
    $f = fopen('php://memory', 'w');

    //set column headers
    $fields = array('ID', 'Name', 'Artist', 'Album', 'Genre', 'Year');
    fputcsv($f, $fields, $delimiter);

    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
        $lineData = array($row['id'], $row['name'], $row['artist'], $row['album'], $row['genre'], $row['year']);
        fputcsv($f, $lineData, $delimiter);
    }

    //move back to beginning of file
    fseek($f, 0);

    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>

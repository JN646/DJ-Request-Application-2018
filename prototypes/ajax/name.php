<?php
if (isset($_POST['name']) === true && empty($_POST['name']) === false) {
  require '../../config/DBConfig.php';

  $name = $_POST['name'];

  $songblock_sql = mysqli_query($mysqli, "SELECT * FROM crud WHERE name LIKE '%$name%'");

  while ($row = mysqli_fetch_array($songblock_sql)) {
      $SongGenre = $row['genre'];
      $SongName = $row['name'];
      $SongArtist = $row['artist'];
      $SongAlbum = $row['album'];

      echo $SongName;
  }
}
?>

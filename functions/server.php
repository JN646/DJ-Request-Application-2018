<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'djapp2');

    // initialize variables
    $name = "";
    $artist = "";
    $genre = "";
    $id = 0;
    $update = false;

// Add Records
    if (isset($_POST['save'])) {
        $name = $_POST['name'];
        $artist = $_POST['artist'];
        $genre = $_POST['genre'];

        mysqli_query($db, "INSERT INTO crud (name, artist, genre) VALUES ('$name', '$artist', '$genre')");
        $_SESSION['message'] = "Song saved";
        header('location: ../admin/list_manager.php');
    }

// Update Records
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $artist = $_POST['artist'];
        $genre = $_POST['genre'];

        mysqli_query($db, "UPDATE crud SET name='$name', artist='$artist', genre='$genre' WHERE id=$id");
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
  ?>

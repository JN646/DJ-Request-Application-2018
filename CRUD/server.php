<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'djapp2');

	// initialize variables
	$name = "";
	$artist = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$artist = $_POST['artist'];

		mysqli_query($db, "INSERT INTO crud (name, artist) VALUES ('$name', '$artist')");
		$_SESSION['message'] = "Song saved";
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$name = $_POST['name'];
		$artist = $_POST['artist'];

		mysqli_query($db, "UPDATE crud SET name='$name', artist='$artist' WHERE id=$id");
		$_SESSION['message'] = "Song updated!";
		header('location: index.php');
	}

if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM crud WHERE id=$id");
	$_SESSION['message'] = "Song deleted!";
	header('location: index.php');
}

	$results = mysqli_query($db, "SELECT * FROM crud");

?>

<?php
  // Include Header
  include '../partials/_header.php';
?>

<div class="fluid-container">
	<div class="col-md-12">

		<h1>Insert Songs</h1>
		<p>Use this form to add new songs to the database. Ensure that all of the fields are correct prior to pressing submit.</p>

		<?php

		// Set Null values
		$song_name = NULL;
		$song_artist = NULL;
		$song_album = NULL;
		$song_genre = NULL;

		// Set variables on submit
		if(isset($_POST['submit'])) {
		    $song_name = $_POST['name'];
				$song_artist = $_POST['artist'];
				$song_album = $_POST['album'];
				$song_genre = $_POST['genre'];

				// Add songs to database.
				$sql = "INSERT INTO songs (song_name, song_artist, song_album, song_genre) VALUES ('$song_name', '$song_artist', '$song_album', '$song_genre')";

				if(mysqli_query($mysqli,$sql)) {
						echo "<p class='alert alert-success'>Added</p>";
					} else {
						echo "<p class-'alert alert-danger'>Error: " . $sql . "<br>" . mysqli_error($mysqli) . "</p>";
					}
		}
		?>

		<!-- Entry Form -->
		<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="form-group col-md-3">
			<label for="">Song Name</label>
			<input class="form-control" type="text" name="name"><br>

			<label for="">Song Artist</label>
			<input class="form-control" type="text" name="artist"><br>

			<label for="">Song Album</label>
			<input class="form-control" type="text" name="album"><br>

			<label for="">Song Genre</label>
			<input class="form-control" type="text" name="genre"><br>

			<input class="btn btn-primary" type="submit" name="submit" value="Add"><br>
		</form>

		<br>

		<!-- Result Preview -->
		<div class='col-md-3 border'>
			<?php
				echo "<p>Song Name: " . $song_name . "</p>";
				echo "<p>Song Artist: " . $song_artist . "</p>";
				echo "<p>Song Album: " . $song_album . "</p>";
				echo "<p>Song Genre: " . $song_genre . "</p>";

				// close connection
				mysqli_close($mysqli);
			 ?>
		</div>
	</div>
</div>

<?php
	  // Include Footer
	  include '../partials/_footer.php';
	?>

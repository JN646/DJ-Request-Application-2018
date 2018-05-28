<?php
// Include Header
include '../partials/_header.php';

include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM crud WHERE id=$id");

		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['name'];
			$address = $n['artist'];
			$genre = $n['genre'];
		}

	}
?>

<div id='CRUDWindow'>

<!-- Head -->
<h1>Song Management</h1>

	<!-- Message Blocks -->
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php
				echo $_SESSION['message'];
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM crud"); ?>

<!-- Result Table -->
<table class='table'>
	<thead>
		<tr>
			<th class='text-center'>Name</th>
			<th class='text-center'>Artist</th>
			<th class='text-center'>Genre</th>
			<th colspan="2" class='text-center'>Action</th>
		</tr>
	</thead>

	<!-- Get Results -->
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['artist']; ?></td>
			<td class='text-center'><?php echo $row['genre']; ?></td>
			<td class='text-center'>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><i class="far fa-edit"></i></a>
			</td>
			<td class='text-center'>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn"><i class="far fa-trash-alt"></i></a>
			</td>
		</tr>
	<?php } ?>
</table>

<!-- New Content -->
<form method="post" class="form-group col-md-4 border" action="server.php" >

	<input type="hidden" name="id" value="<?php echo $id; ?>">

	<div class="form-group">
		<label>Name</label><br>
		<input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
	</div>
	<div class="form-group">
		<label>Artist</label><br>
		<input type="text" class="form-control" name="artist" value="<?php echo $artist; ?>">
	</div>
	<div class="form-group">
		<label>Genre</label><br>
		<input type="text" class="form-control" name="genre" value="<?php echo $genre; ?>">
	</div>
	<div class="form-group">

		<!-- Submit Buttons -->
		<?php if ($update == true): ?>
			<button class="btn btn-primary" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn btn-primary" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>

</div>

<?php include '../partials/_footer.php'; ?>

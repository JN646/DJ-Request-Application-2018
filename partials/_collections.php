<?php
// Get collection ID from URL.
$collectionIDNum = $_GET['collection'];

// Get Collection Name from ID.
$collecionNameSQL = "SELECT DISTINCT * FROM collections WHERE collection_id = $collectionIDNum";
$collectionResult = mysqli_query($mysqli, $collecionNameSQL);
$rs = mysqli_fetch_array($collectionResult);
$collection_name = $rs['collection_name'];

// Attempt select query execution
$sql = "SELECT * FROM collections";

if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $CollectionID = $row['collection_id'];
            $CollectionName = $row['collection_name'];
            ?>

          <!-- Generate a Collection Block -->
          <div id="" class="card collection_block">
            <a href='index.php?collection=<?php echo $row['collection_id']; ?>'>
              <div class="card-body">
                <p class='card-text'><?php echo $CollectionName ?></p>
              </div>
            </a>
          </div>
<?php }
        // Free result set
        mysqli_free_result($result);
    } else {

   // Nothing Found
        echo "<h3 class='text-center'>No collections were found.</h3>";
    }
} else {
    SQLError($mysqli);
}
?>

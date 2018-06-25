<?php
// Attempt select query execution
$sql = "SELECT * FROM collections";

?>
    <!-- Show All Block -->
    <div id="" class="card collection_block">
      <a href='index.php'>
        <div class="card-body">
          <p class='card-text'><span><i class="fas fa-music"></i></span> All Songs</p>
        </div>
      </a>
    </div>

    <!-- Show Drinks Block -->
    <?php if ($addon_drinks == true) {
    ?>
    <div id="" class="card collection_block">
      <a href='index.php'>
        <div class="card-body">
          <p class='card-text'><span><i class="fas fa-beer"></i></span> Drinks</p>
        </div>
      </a>
    </div>
    <?php
} ?>

    <!-- Show Smart Things Block -->
    <?php if ($addon_smartthings == true) {
        ?>
    <div id="" class="card collection_block">
      <a href='index.php'>
        <div class="card-body">
          <p class='card-text'><span><i class="fas fa-plug"></i></span> Smart Things</p>
        </div>
      </a>
    </div>
    <?php
    } ?>

<hr>

<?php

if ($result = mysqli_query($mysqli, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $CollectionID = $row['collection_id'];
            $CollectionName = $row['collection_name']; ?>

          <!-- Generate a Collection Block -->
          <div id="" class="card collection_block">
            <a href='index.php?collection=<?php echo $row['collection_id']; ?>'>
              <div class="card-body">
                <p class='card-text'><?php echo $CollectionName ?></p>
              </div>
            </a>
          </div>
<?php
        }
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

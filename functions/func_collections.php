<?php
// COLLECTION Blocks
function CollectionBlocks($mysqli)
{
    // Attempt select query execution
    $sql = "SELECT * FROM collections";

    if ($result = mysqli_query($mysqli, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $CollectionName = $row['collection_name']; ?>
              <!-- Generate a Collection Block -->
              <div id="" class="card collection_block">
                <div class="card-body">
                  <?php
                    // Check to see if the collection has a name.
                    if ($CollectionName !== '') {
                        echo "<p class='card-text'>" . $CollectionName . "</p>";
                    } else {
                        echo "<p class='card-text'>Unknown Name</p>";
                    } ?>
                </div>
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
}
 ?>

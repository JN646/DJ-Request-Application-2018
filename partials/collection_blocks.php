<h3>Collection</h3>

<form class="" action="index.html" method="post">
  <input type="text" name="" value="">
  <button type="button" name="button">Search</button>
</form>

<?php
  // Attempt select query execution
  $sql = "SELECT * FROM collections";

  if ($result = mysqli_query($mysqli, $sql)) {
      if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_array($result)) {
              ?>

             <div class="card collection_block">
               <div class="card-body">
                 <?php echo "<p class='card-text'>" . $row['collection_name'] . "</p>"; ?>
               </div>
             </div>

 <?php
          }
          // Free result set
          mysqli_free_result($result);
      } else {

       // Nothing Found
          echo "<h3 class='text-center'>No artists were found.</h3>";
      }
  } else {
      QueryError($query, $mysqli);
  }
  ?>

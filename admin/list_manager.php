<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php"); ?>
      <!-- Row -->
      <div class="row">
        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">
          <!-- Actions -->
          <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_action_blocks.php"); ?>
            <br>
        </div>
        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">
          <div class="row">
            <div class="col-md-12">
            <?php
              if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $update = true;
                $record = mysqli_query($db, "SELECT * FROM crud WHERE id=$id");

                if (count($record) == 1 ) {
                  $n = mysqli_fetch_array($record);
                  $name = $n['name'];
                  $artist = $n['artist'];
                  $album = $n['album'];
                  $genre = $n['genre'];
                  $year = $n['year'];
                  $collectionID = $n['collec_id'];
                }
              }
            ?>
            <div id='CRUDWindow'>
            <!-- Head -->
            <h1>Song Management - <span class="badge badge-secondary"><?php echo countSongs($db); ?></span></h1>
            <p>Use this screen to add and edit songs in your library.</p>
            <br>
              <!-- Message Blocks -->
              <?php if (isset($_SESSION['message'])): ?>
                <div class="msg">
                  <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                  ?>
                </div>
              <?php endif ?>
            <?php $results = mysqli_query($db, "SELECT * FROM crud ORDER BY name ASC"); ?>
            <!-- Result Table -->
            <div class="ResultTable">
              <table id='myTable2' class='table table-bordered'>
                <thead>
                  <tr>
                    <th onclick="sortTable(0)" class='text-center'>Name</th>
                    <th onclick="sortTable(1)" class='text-center'>Artist</th>
                    <th onclick="sortTable(2)" class='text-center'>Album</th>
                    <th onclick="sortTable(3)" class='text-center'>Genre</th>
                    <th onclick="sortTable(4)" class='text-center'>Year</th>
                    <th onclick="sortTable(5)" class='text-center'>Collection</th>
                    <th colspan="2" class='text-center'>Action</th>
                  </tr>
                </thead>
                <!-- Get Results -->
                <?php while ($row = mysqli_fetch_array($results)) {
                  $collectionNum = $row['collec_id'];
                  ?>
                  <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['artist']; ?></td>
                    <td><?php echo $row['album']; ?></td>
                    <td class='text-center'><span class='colourCell<?php echo $row['genre']; ?>'><?php echo $row['genre']; ?></span></td>
                    <td class='text-center'><?php echo $row['year']; ?></td>
                    <td class='text-center'><?php echo getCollectionName($db, $collectionNum); ?></td>
                    <td class='text-center'>
                      <a href="../admin/list_manager.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><i class="far fa-edit"></i></a>
                    </td>
                    <td class='text-center'>
                      <a href="../functions/server.php?del=<?php echo $row['id']; ?>" class="del_btn"><i class="far fa-trash-alt"></i></a>
                    </td>
                  </tr>
                <?php } ?>
              </table>
            </div>
            <br>
            <br>
            <!-- New Content -->
            <form method="post" class="form-group col-md-12 border" action="../functions/server.php" >
              <!-- Form Header -->
              <?php if ($update == true): ?>
                <h2>Update</h2>
              <?php else: ?>
                <h2>Add New</h2>
              <?php endif ?>
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="row">
                <div class="col">
                  <!-- Name -->
                  <div class="form-group">
                    <label>Name</label><br>
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
                    <small id="nameHelpBlock" class="form-text text-muted">
                      Enter the song name.
                    </small>
                  </div>
                </div>
                <!-- Artist -->
                <div class="col">
                  <div class="form-group">
                    <label>Artist</label><br>
                    <input type="text" class="form-control" name="artist" value="<?php echo $artist; ?>">
                    <small id="nameHelpBlock" class="form-text text-muted">
                      Enter the artist name.
                    </small>
                  </div>
                </div>
                <!-- Album -->
                <div class="col">
                  <div class="form-group">
                    <label>Album</label><br>
                    <input type="text" class="form-control" name="album" value="<?php echo $album; ?>">
                    <small id="nameHelpBlock" class="form-text text-muted">
                      Enter the album name (optional - but required for the cover art).
                    </small>
                  </div>
                </div>
              </div>
              <!-- Genre -->
              <div class="row">
                <div class="col">
                  <label>Genre</label><br>
                  <select class="form-control" name="genre" value="<?php echo $genre; ?>">
                    <?php GenreArray() ?>
                  </select>
                  <small id="nameHelpBlock" class="form-text text-muted">
                    Choose the genre.
                  </small>
                </div>
                <!-- Year -->
                <div class="col">
                  <label>Year</label><br>
                  <input type="text" class="form-control" name="year" value="<?php echo $year; ?>">
                  <small id="nameHelpBlock" class="form-text text-muted">
                    Enter the song year.
                  </small>
                </div>
                <!-- Colelction ID -->
                <div class="col">
                  <label>Collection ID</label><br>
                  <input type="text" class="form-control" name="collectionID" value="<?php echo $collectionID; ?>">
                  <small id="nameHelpBlock" class="form-text text-muted">
                    Choose a colelction to be part of.
                  </small>
                </div>
              </div>
              <br>
              <!-- Submit Buttons -->
              <div class="row">
                <div class="col">
                  <?php if ($update == true): ?>
                    <button class="btn btn-primary" type="submit" name="update">Update</button>
                  <?php else: ?>
                    <button class="btn btn-success" type="submit" name="save" >Save</button>
                  <?php endif ?>
                </div>
              </div>
              <br>
            </form>
            </div>
          </div>
        </div>
      </div>
      <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php"); ?>
    </div>
<script type="text/javascript">
  // Size changing
  $(function () {
    $(".font-button").bind("click", function () {
      var size = parseInt($('table').css("font-size"));
      if ($(this).hasClass("plus")) {
        size = size + 2;
      } else {
        size = size - 2;
        if (size <= 10) {
          size = 10;
        }
      }
      $('table').css("font-size", size);
    });
  });

  //############## Table Sorting #################################################
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable2");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc";
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.getElementsByTagName("TR");
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("TD")[n];
        y = rows[i + 1].getElementsByTagName("TD")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }
</script>

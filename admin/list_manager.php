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
                  $genre = $n['genre'];
                  $year = $n['year'];
                  $collectionID = $n['collec_id'];
                }
              }
            ?>

            <div id='CRUDWindow'>

            <!-- Head -->
            <h1>Song Management</h1>
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
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th class='text-center'>Name</th>
                    <th class='text-center'>Artist</th>
                    <th class='text-center'>Genre</th>
                    <th class='text-center'>Year</th>
                    <th class='text-center'>Collection</th>
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
            <form method="post" class="form-group col-md-4 border" action="../functions/server.php" >
              <!-- Form Header -->
              <?php if ($update == true): ?>
                <h2>Update</h2>
              <?php else: ?>
                <h2>Add New</h2>
              <?php endif ?>

              <input type="hidden" name="id" value="<?php echo $id; ?>">

              <!-- Name -->
              <div class="form-group">
                <label>Name</label><br>
                <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">
              </div>

              <!-- Artist -->
              <div class="form-group">
                <label>Artist</label><br>
                <input type="text" class="form-control" name="artist" value="<?php echo $artist; ?>">
              </div>

              <!-- Genre -->
              <div class="form-group">
                <label>Genre</label><br>
                <select class="form-control" name="genre" value="<?php echo $genre; ?>">
                  <?php GenreArray() ?>
                </select>
              </div>

              <!-- Year -->
              <div class="form-group">
                <label>Year</label><br>
                <input type="text" class="form-control" name="year" value="<?php echo $year; ?>">
              </div>

              <!-- Colelction ID -->
              <div class="form-group">
                <label>Collection ID</label><br>
                <input type="text" class="form-control" name="collection" value="<?php echo $collectionID; ?>">
                <!-- <select class="form-control" name="collection" value="<?php echo $collection; ?>">
                  <?php //CollectionArray() ?>
                </select> -->
              </div>

              <!-- Submit Buttons -->
              <div class="form-group">
                <?php if ($update == true): ?>
                  <button class="btn btn-primary" type="submit" name="update">Update</button>
                <?php else: ?>
                  <button class="btn btn-success" type="submit" name="save" >Save</button>
                <?php endif ?>
              </div>
            </form>

            </div>
          </div>

        </div>

      </div>
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
</script>

<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php"); ?>

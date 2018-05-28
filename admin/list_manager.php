<?php
  // Include Header
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php");
?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <!-- Actions -->
          <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_action_blocks.php"); ?>

            <br>

            <!-- Views -->
          <div class="card collection_block">
            <div class="card">
              <div class="card-header text-center">
                <h5>Views</h5>
              </div>
              <ul class="nav flex-column">
                <li>
                  <span><a class="nav-link-small font-button plus" style="cursor: pointer;">A+</a></span>
                  <span><a class="nav-link-small font-button minus" style="cursor: pointer;">A-</a></span>
                </li>
          			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php"><i class="fas fa-music"></i> Coming Soon</a></li>
          		</ul>

            </div>
          </div>
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
                    <a href="../admin/list_manager.php?edit=<?php echo $row['id']; ?>" class="edit_btn" ><i class="far fa-edit"></i></a>
                  </td>
                  <td class='text-center'>
                    <a href="../CRUD/server.php?del=<?php echo $row['id']; ?>" class="del_btn"><i class="far fa-trash-alt"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </table>

            <!-- New Content -->
            <form method="post" class="form-group col-md-4 border" action="../CRUD/server.php" >

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
          </div>

        </div>

      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="addsongModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php include 'add_song.php'; ?>
</div>

<div class="modal fade" id="listsongModal" tabindex="-1" role="dialog" aria-labelledby="listModalLabel" aria-hidden="true">
  <?php include 'list_songs.php'; ?>
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

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

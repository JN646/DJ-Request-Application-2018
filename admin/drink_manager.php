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
                $record = mysqli_query($db, "SELECT * FROM drinks WHERE drink_id=$id");

                if (count($record) == 1 ) {
                  $n = mysqli_fetch_array($record);
                  $name = $n['drink_name'];
                  $category = $n['drink_category'];
                  $quantity = $n['drink_quantity'];
                  $measurement = $n['drink_measurement'];
                  $cost = $n['drink_cost'];
                }
              }
            ?>

            <div id='CRUDWindow'>

            <!-- Head -->
            <h1>Drink Management - <span class="badge badge-secondary"><?php echo countDrinks($db); ?></span></h1>
            <p>Use this screen to add and edit drinks in your library.</p>
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

            <?php $results = mysqli_query($db, "SELECT * FROM drinks ORDER BY drink_name ASC"); ?>

            <!-- Result Table -->
            <div class="ResultTable">
              <table class='table table-bordered'>
                <thead>
                  <tr>
                    <th class='text-center'>Name</th>
                    <th class='text-center'>Category</th>
                    <th class='text-center'>Quantity</th>
                    <th class='text-center'>Measurement</th>
                    <th class='text-center'>Cost</th>
                    <th colspan="2" class='text-center'>Action</th>
                  </tr>
                </thead>

                <!-- Get Results -->
                <?php while ($row = mysqli_fetch_array($results)) {
                  ?>
                  <tr>
                    <td><?php echo $row['drink_name']; ?></td>
                    <td><?php echo $row['drink_category']; ?></td>
                    <td class='text-center'><?php echo $row['drink_quantity']; ?></td>
                    <td><?php echo $row['drink_measurement']; ?></td>
                    <td><?php echo '£' . $row['drink_cost']; ?></td>
                    <td class='text-center'>
                      <a href="../admin/list_manager.php?drink_edit=<?php echo $row['id']; ?>" class="edit_btn" ><i class="far fa-edit"></i></a>
                    </td>
                    <td class='text-center'>
                      <a href="../functions/server.php?drink_del=<?php echo $row['id']; ?>" class="del_btn"><i class="far fa-trash-alt"></i></a>
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
                  </div>
                </div>

                <!-- Category -->
                <div class="col">
                  <div class="form-group">
                    <label>Category</label><br>
                    <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">
                  </div>
                </div>

                <!-- Quantity -->
                <div class="col">
                  <div class="form-group">
                    <label>Quantity</label><br>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
                  </div>
                </div>
              </div>

              <!-- Measurement -->
              <div class="row">
                <div class="col">
                  <label>Measurement</label><br>
                  <select class="form-control" name="measurement" value="<?php echo $measurement; ?>">
                    <?php DrinkMeasurementArray() ?>
                  </select>
                </div>


                <!-- Cost -->
                <div class="col">
                  <label>Cost</label><br>
                  <input type="text" class="form-control" name="cost" value="<?php echo $cost; ?>">
                </div>
              </div>

              <br>

              <!-- Submit Buttons -->
              <div class="row">
                <div class="col">
                  <?php if ($update == true): ?>
                    <button class="btn btn-primary" type="submit" name="drinks_update">Update</button>
                  <?php else: ?>
                    <button class="btn btn-success" type="submit" name="drinks_save" >Save</button>
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
</script>

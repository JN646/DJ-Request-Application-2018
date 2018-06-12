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
              if (isset($_GET['drink_edit'])) {
                $id = $_GET['drink_edit'];
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
                    <th onclick="sortTable(0)" class='text-center'>Name</th>
                    <th onclick="sortTable(1)" class='text-center'>Category</th>
                    <th onclick="sortTable(2)" class='text-center'>Quantity</th>
                    <th onclick="sortTable(3)" class='text-center'>Measurement</th>
                    <th onclick="sortTable(4)" class='text-center'>Cost</th>
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
                      <a href="../admin/drink_manager.php?drink_edit=<?php echo $row['drink_id']; ?>" class="edit_btn" ><i class="far fa-edit"></i></a>
                    </td>
                    <td class='text-center'>
                      <a href="../functions/server.php?drink_del=<?php echo $row['drink_id']; ?>" class="del_btn"><i class="far fa-trash-alt"></i></a>
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
                      Enter the drink name.
                    </small>
                  </div>
                </div>
                <!-- Category -->
                <div class="col">
                  <div class="form-group">
                    <label>Category</label><br>
                    <input type="text" class="form-control" name="category" value="<?php echo $category; ?>">
                    <small id="nameHelpBlock" class="form-text text-muted">
                      Enter the drink category.
                    </small>
                  </div>
                </div>
                <!-- Quantity -->
                <div class="col">
                  <div class="form-group">
                    <label>Quantity</label><br>
                    <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>">
                    <small id="nameHelpBlock" class="form-text text-muted">
                      Enter the drink quantity.
                    </small>
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
                  <small id="nameHelpBlock" class="form-text text-muted">
                    Choose the measurement amount name.
                  </small>
                </div>
                <!-- Cost -->
                <div class="col">
                  <label>Cost</label><br>
                  <input type="text" class="form-control" name="cost" value="<?php echo $cost; ?>">
                  <small id="nameHelpBlock" class="form-text text-muted">
                    Enter the drink cost. Do not include the '£' sign.
                  </small>
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

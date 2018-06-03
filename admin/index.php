<?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php"); ?>
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
              <?php include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_requests.php") ?>
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

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

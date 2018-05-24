<?php
  // Include Header
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php");
?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">
          <?php
            // Include Blocks
            include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/action_blocks.php");
          ?>
        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <div class="row">
            <?php
              // Include Blocks
              include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/feed_blocks.php");
            ?>
          </div>

        </div>

      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="addsongModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <?php include 'add_song.php'; ?>
</div>

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

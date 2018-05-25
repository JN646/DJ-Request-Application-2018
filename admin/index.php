<?php
  // Include Header
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php");
?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">
          <div class="card collection_block">
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#addsongModal">Add Song</button>
            <button type="button" class="btn btn-link" data-toggle="modal" data-target="#listsongModal">List Songs</button>
          </div>
        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <div class="row">
            <div class="col-md-12">
              <?php RequestList($mysqli) ?>
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

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

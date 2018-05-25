<?php
//DB Config
include("../config/DBConfig.php");
 ?>
<div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="listModalLabel">List of Songs</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Here are all the songs stored in the database.</p>

      <?php ListSongs($mysqli) ?>

      <br>

    </div>
    <div class="modal-footer">

      <!-- Close and Submit Buttons -->
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>

<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add Song</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <p>Use this form to add new songs to the database. Ensure that all of the fields are correct prior to pressing submit.</p>

      <?php
        if(isset($_POST['submit'])) {
          AddSong($mysqli);
        }
      ?>

      <!-- Entry Form -->
      <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-group">

        <!-- Song Name -->
        <label for="">Song Name</label>
        <input class="form-control" type="text" name="name"><br>

        <!-- Song Artist -->
        <label for="">Song Artist</label>
        <input class="form-control" type="text" name="artist"><br>

        <!-- Song Album -->
        <label for="">Song Album</label>
        <input class="form-control" type="text" name="album"><br>

        <!-- Song Genre -->
        <label for="">Song Genre</label>
        <select class="form-control" name="genre">
          <?php GenreArray(); ?>
        </select>
      </form>

      <br>

    </div>
    <div class="modal-footer">

      <!-- Close and Submit Buttons -->
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" name="submit" value="Add" class="btn btn-primary">Save</button>
    </div>
  </div>
</div>

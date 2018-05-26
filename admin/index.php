<?php
  // Include Header
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_header.php");
?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <!-- Actions -->
          <div class="card collection_block">
          	<div class="card">
          		<div class="card-header text-center">
          			<h5>Actions</h5>
          		</div>
          		<ul class="nav flex-column">
                <li><button type="button" class="btn btn-link nav-item text-left" data-toggle="modal" data-target="#addsongModal"><i class="fas fa-plus"></i> Add Song</button></li>
                <li><button type="button" class="btn btn-link nav-item text-left" data-toggle="modal" data-target="#listsongModal"><i class="fas fa-list-ul"></i> List Songs</button></li>
          		</ul>
          	</div>
          </div>

            <br>

            <!-- Views -->
          <div class="card collection_block">
            <div class="card">
              <div class="card-header text-center">
                <h5>Views</h5>
              </div>
              <ul class="nav flex-column">
          			<li class="nav-item"><a class="nav-link" href="<?php echo $environment; ?>songs/index.php"><i class="fas fa-music"></i> Coming Soon</a></li>
          		</ul>

            </div>
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

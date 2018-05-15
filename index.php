<?php
  // Include Header
  include 'partials/_header.php';
?>
    <!-- Start Clock -->
    <body onload="startTime()">

    <!-- Container -->
    <div class="container-fluid">

      <!-- Top Bar -->
      <div class='row' id='topBar'>
          <div class="col-md-4">
            <p>DJ Request System</p>
          </div>
          <div class="col-md-4">
            <p></p>
          </div>
          <div class="col-md-4">
            <p id="txt" class="text-right"></p>
          </div>
      </div>

      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">
          <?php
            // Include Blocks
            include 'partials/collection_blocks.php';
          ?>
        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <div class="row">
            <?php
              // Include Blocks
              include 'partials/song_blocks.php';
            ?>
          </div>

        </div>

      </div>
    </div>

    <script>
    function startTime() {
        var today = new Date();
        var h = today.getHours();
        var m = today.getMinutes();
        var s = today.getSeconds();
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('txt').innerHTML =
        h + ":" + m + ":" + s;
        var t = setTimeout(startTime, 500);
    }
    function checkTime(i) {
        if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
        return i;
    }
    </script>

<?php
  // Include Footer
  include 'partials/_footer.php';
?>

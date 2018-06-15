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
        // Increase font size.
        size = size + 2;
      } else if ($(this).hasClass("minus")) {
        // Decrease font size.
        size = size - 2;
        
        // Prevent fontsize getting less than 10.
        if (size <= 10) {
          size = 10;
        }
      } else if ($(this).hasClass("normal")) {
        //  Set font size to 14.
        size = 14;        
      }
      $('table').css("font-size", size);
    });
  });
</script>

<?php
  // Include Footer
  include($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/partials/_footer.php");
?>

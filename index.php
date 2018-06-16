<?php include 'partials/_header.php'; ?>
      <!-- Row -->
      <div class="row">

        <!-- Small Side -->
        <div id='collectionWin' class="col-md-2">

          <!-- Is the app running? -->
          <?php if ($appRunning == 1) { ?>
            <h3 id='collectionHeader'>Collection</h3>

            <!-- Search Form -->
            <div id='searchFormBox' class="center-block">
              <form class="form-inline my-2 my-lg-0" action="index.php" method="get">
                <input id='searchFormInput' class="form-control mr-sm-2" name="search_val" type="text" placeholder="Search" class="form-control" aria-label="Search">
                <button id='searchFormButton' class="btn btn-outline-success my-2 my-sm-0" value="search" type="submit"><i class="fas fa-search"></i></button>
              </form>
            </div>

            <!-- Add Collection Blocks -->
            <?php include 'partials/_collections.php'; ?>
          <?php } ?>

        </div>

        <!-- Main Window -->
        <div id='mainWin' class="col-md-10">

          <!-- Collection Name -->
          <div class="row">

            <!-- Message Blocks -->
            <?php if (isset($_SESSION['message'])): ?>
              <div class="msg">
                <?php
                  echo $_SESSION['message'];
                  unset($_SESSION['message']);
                ?>
              </div>
            <?php endif ?>

            <h1 class='headerCollection display-4'>
              <?php
              // Check to see if collection name is empty.
              if (empty($collection_name)) {
                // Set value to "All Songs".
                $collection_name = "All Songs";
              }
                // Output Collection Name.
                echo $collection_name;
              ?>
            </h1>
          </div>

          <!-- Row -->
          <div class="row">
            <div id='spinningLoader' class="loading-div"><img src="img/ajax-loader.gif"></div>
            <div id="results"></div>
          </div>

        </div>
      </div>
    </div>

    <script type="text/javascript">
    $(document).ready(function() {
    	$("#results" ).load( "partials/_song_blocks.php"); //load initial records

    	//executes code below when user click on pagination links
    	$("#results").on( "click", ".pagination a", function (e){
    		e.preventDefault();
    		$(".loading-div").show(); //show loading element
    		var page = $(this).attr("data-page"); //get page number from link
    		$("#results").load("partials/_song_blocks.php",{"page":page}, function(){ //get content from PHP page
    			$(".loading-div").hide(); //once done, hide loading element
    		});

    	});
    });
    </script>
<?php include 'partials/_footer.php'; ?>

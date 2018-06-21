//############## JS FUNCTIONS ##################################################
//############## Hello World ###################################################
console.log('functions.js loaded successfully...');

//############## Clock #########################################################
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

//############## Check Time ####################################################
function checkTime(i) {
  if (i < 10) {
    i = "0" + i
  }; // add zero in front of numbers < 10
  return i;
}

//############## Get Paginated Results #########################################
function getPaginatedResults() {
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
}

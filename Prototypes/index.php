<?php include '../partials/_header.php'; ?>
<head>
<script type="text/javascript">
$(document).ready(function() {
	$("#results" ).load( "partials/_song_blocks2.php"); //load initial records

	//executes code below when user click on pagination links
	$("#results").on( "click", ".pagination a", function (e){
		e.preventDefault();
		$(".loading-div").show(); //show loading element
		var page = $(this).attr("data-page"); //get page number from link
		$("#results").load("partials/_song_blocks2.php",{"page":page}, function(){ //get content from PHP page
			$(".loading-div").hide(); //once done, hide loading element
		});

	});
});
</script>
</head>
<body>
<div class="loading-div"><img src="ajax-loader.gif" ></div>
<div id="results"><!-- content will be loaded here --></div>
</body>
</html>

//############## JS FUNCTIONS ##################################################

//############## Song Sort #####################################################
$("select#sort").change(function() {
  alert("Handler for .change() called.");
});

// SEARCH BOX
// Grab Button
$('input#name-submit').on('click', function() {
  var name = $('input#name').val();

  // Run AJAX
  if ($.trim(name) != '') {
    $.post('ajax/songs.php', {name: name}, function(data) {
      $('div#name-data').html(data);
    });
  }
});

//############## Hello World ###################################################
console.log('global.js loaded successfully...');

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

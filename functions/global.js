$("select#sort").change(function() {
  alert("Handler for .change() called.");
});

$('input#name-submit').on('click', function() {
  var name = $('input#name').val();

  if ($.trim(name) != '') {
    $.post('ajax/name.php', {name: name}, function(data) {
      $('div#name-data').html(data);
    });
  }
});

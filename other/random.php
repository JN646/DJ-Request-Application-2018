<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Random Generator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Database Link -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/config/DBConfig.php");?>

    <!-- Function Files -->
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/server.php");?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/functions.php");?>
    <?php require_once($_SERVER["DOCUMENT_ROOT"] . "/dj-app2/functions/func_songs.php");?>
  </head>
  <body>
<?php
// Create Variable.
$min = "";
$max = "";
$result = "";
$resultArray = ['Song 1', 'Song 2', 'Song 3', 'Song 4', 'Song 5', 'Apples', 'Pears', 'Lemons', 'Lorem', 'ipsum', 'dolar', 'sit', 'amet'];
$resultPrevious = [];

// Get Values from Inputs.
$min = test_input($_POST['min']);
$max = test_input($_POST['max']);

// Count array values.
$song_count = count($resultArray);
 ?>

<div class="container">
  <h1 class='display-4'>Random Number Generator</h1>
  <h4>Count: <?php echo $song_count ?></h4>

  <!-- Generate Form -->
  <form class="form-group" action="random.php" method="post">
    <!-- Min -->
    <label for="">Min</label>
    <select class="form-control" name="min">
      <?php ArrayLoop($resultArray) ?>
    </select>
    <br>

    <!-- Max -->
    <label for="">Max</label>
    <select class="form-control" name="max">
      <?php ArrayLoop($resultArray) ?>
    </select>
    <br>

    <!-- Button -->
    <button class='btn btn-primary' type="submit" name="submit">Generate</button>
    <br>
  </form>

  <?php
  if (isset($_POST['submit'])) {

    // Generate Random Number.

    // Check to see if numeric
    if (is_numeric($min) && is_numeric($max)) {

      // Set floors
      $result = rand($min,$max);

      // Result Output
      $resultOutput = $resultArray[$result];
      array_push($resultPrevious, $resultOutput);
    } else {
      // Init Variable.
      $result = "";

      // Error Message.
      echo "Values are not numbers.";
    }

    function GetPrevious() {
      // Previous results.
      for ($i=0; $i < count($resultPrevious); $i++) {

        // Output Array.
        echo $resultPrevious[$i];
        echo "<br>";
      }
    }
  }
   ?>

  <h2><?php echo $resultArray[$result] ?></h2>

  <?php

    if (!empty($resultArray) && !empty($results)) {
      // print previous results.
      GetPrevious();
    } else {
      echo "No Previous Results to Show.";
    }

    function ArrayLoop($resultArray) {
      // Loop Through Array.
      for ($i=0; $i < count($resultArray); $i++) {
          echo "<option value='" . $i ."'>" . $i ."</option>";
      }
    }

   ?>
</div>

  </body>
</html>

<?php function ListSongs() { ?>
  <?php $results = mysqli_query($db, "SELECT * FROM crud"); ?>

  <!-- Result Table -->
  <table class='table'>
    <thead>
      <tr>
        <th class='text-center'>Name</th>
        <th class='text-center'>Artist</th>
        <th class='text-center'>Genre</th>
      </tr>
    </thead>

    <!-- Get Results -->
    <?php while ($row = mysqli_fetch_array($results)) { ?>
      <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['artist']; ?></td>
        <td class='text-center'><?php echo $row['genre']; ?></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>

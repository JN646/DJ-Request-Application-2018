
<div class="col-md-12">
  <div class="">
    <?php
    $sql = "SELECT * FROM requests WHERE request_active = '1'";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0) {

        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            echo $row["request_s_name"]. " - " . $row["request_s_artist"]. "<br>";
        }
    } else {
        echo "0 results";
    }

    mysqli_close($mysqli);
    ?>
  </div>
</div>

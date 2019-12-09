<?php
  include_once 'include/dbh.inc.php'
?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <form method="GET">
    <input type="text" name="city_name" placeholder="city name">
    <br>
    <button type="submit" name="submit_search" value="submit">search</button>
  </form>


<?php

  if(isset($_GET['submit_search'])){
    $city_name = $_GET['city_name'];
    $sql = "
      SELECT *
      FROM station natural join measurement as m1
      WHERE scity=? and m1.mtimestamp >= all(
        SELECT m2.mtimestamp
        FROM measurement as m2
        WHERE m1.sid = m2.sid
        )
      ";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt,$sql)){
      mysqli_stmt_bind_param($stmt, "s", $city_name);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if(mysqli_num_rows($result) == 0){
        echo "please input a valid city name and try again";
      }
      else{
        echo "station(id) and latest measurement is:<br><br>";
      }

      while($row = mysqli_fetch_array($result)){
        echo "
          <form method='GET'>
            <button type='submit' name='sid' value=".$row['sid'].">sid: ".$row['sid']."</button>
          </form>
        ";
        echo "temperature: ".$row['mtemp']."<br>humidity: ".$row['mhumid']."<br>precipitation".$row['mpriecip']."<br><br>";
      }
    }
  }
  if(isset($_GET['sid'])){
    $sid = $_GET['sid'];
    $sql = "
      SELECT *
      FROM measurement as m1
      WHERE sid=?
      ";
    $stmt = mysqli_stmt_init($conn);
    if(mysqli_stmt_prepare($stmt, $sql)){
      mysqli_stmt_bind_param($stmt, "s", $sid);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);
      echo "
        <table border=1 cellpadding='5'>
        <tr>
          <th>TIME</th>
          <th>TEMPERATURE</th>
          <th>HUMIDITY</th>
          <th>PRIECIPITATION</th>
        </tr>";

      while($row = mysqli_fetch_array($result)){
        echo "<tr>
          <td align='center'>".$row['mtimestamp']."</td>
          <td align='center'>".$row['mtemp']."</td>
          <td align='center'>".$row['mhumid']."</td>
          <td align='center'>".$row['mpriecip']."</td>";
      }
      echo "</table>";
    }
  }

?>

</body>
</html>

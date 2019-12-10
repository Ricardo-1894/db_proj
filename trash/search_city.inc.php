<?php
  include_once 'include/dbh.inc.php';

  if(isset($_GET['submit'])){
    $sql = "select * from station;";
    $result = mysqli_query($conn, $sql);
    $result_check = mysqli_num_rows($result);
    if ($result_check > 0){
      while($row = mysqli_fetch_assoc($result)){
        echo $row['scity']."<br>";
      }
    }
  }


?>

<?php
include "connect.php";



if(!empty($_POST["user"])) {
  $result = mysqli_query($con,"SELECT count(*) FROM landuser WHERE username='" . $_POST["user"] . "'");
  $row = mysqli_fetch_row($result);
  $user_count = $row[0];
  if($user_count>0) {
      echo "<span class='status-not-available' style='color:red;'>This land user already exist..Please try another username</span>";
  }else{
      echo "<span class='status-available' style='color:green;'>Good to choose this usernane..proceed</span>";
  }
}
?>
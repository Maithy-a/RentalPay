<?php
$con = @mysqli_connect("localhost", "root", "", "rpms_db");
if(!$con){
  echo "Connection failed!".@mysqli_error($con);
}
?>

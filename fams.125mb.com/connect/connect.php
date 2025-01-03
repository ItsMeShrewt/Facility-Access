<?php

$mycon = mysqli_connect("fdb1027.125mb.com", "4561024_famsdb", "Shrewt16625", "4561024_famsdb");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}
?>
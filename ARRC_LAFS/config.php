<?php

$conn = mysqli_connect("localhost", "root", "1234", "db_lafts");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
  $conn = mysqli_connect('localhost','root','','gate');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
?>
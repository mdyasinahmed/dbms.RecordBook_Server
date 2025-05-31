<?php
$servername = "sql101.infinityfree.com";
$username = "if0_39129585";
$password = "RecordBook12";
$dbname = "if0_39129585_dbms_recordbook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

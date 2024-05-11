<?php
include "../db_conn.php";
$patron_id = $_GET["patron_id"];
$sql = "DELETE FROM `patron` WHERE patron_id = $patron_id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: members_page.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

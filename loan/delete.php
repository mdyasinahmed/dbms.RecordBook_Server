<?php
include "../db_conn.php";
$resource_id = $_GET["resource_id"];
$sql = "DELETE FROM `resource` WHERE resource_id = $resource_id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: resource_page.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

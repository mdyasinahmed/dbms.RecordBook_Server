<?php
include "../db_conn.php";
$borrow_id = $_GET["borrow_id"];
$sql = "DELETE FROM `loan` WHERE borrow_id = $borrow_id";
$result = mysqli_query($conn, $sql);

if ($result) {
  header("Location: loan_page.php?msg=Data deleted successfully");
} else {
  echo "Failed: " . mysqli_error($conn);
}

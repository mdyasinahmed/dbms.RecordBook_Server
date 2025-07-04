<?php
include "../db_conn.php";

// Validate and sanitize resource_id
if (!isset($_GET["resource_id"]) || !is_numeric($_GET["resource_id"])) {
    die("Invalid resource ID.");
}
$resource_id = intval($_GET["resource_id"]);

if (isset($_POST["submit"])) {
    $category = $_POST['category'];
    $collection_date = $_POST['collection_date'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $publisher_name = $_POST['publisher_name'];
    $publishing_date = $_POST['publishing_date'];
    $edition = $_POST['edition'];

    $sql = "UPDATE `resource` SET 
        `category` = ?, 
        `collection_date` = ?, 
        `title` = ?, 
        `author` = ?, 
        `publisher_name` = ?, 
        `publishing_date` = ?, 
        `edition` = ? 
        WHERE `resource_id` = ?";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssii", 
        $category, 
        $collection_date, 
        $title, 
        $author, 
        $publisher_name, 
        $publishing_date, 
        $edition, 
        $resource_id
    );

    if (mysqli_stmt_execute($stmt)) {
        header("Location: resource_page.php?msg=Data updated successfully");
        exit;
    } else {
        echo "Update failed: " . mysqli_error($conn);
    }
}

// Fetch data for editing
$sql = "SELECT * FROM `resource` WHERE `resource_id` = $resource_id LIMIT 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("Resource not found.");
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../assets/style.css">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>PHP resource Application</title>
</head>

<body>
  <nav class="navbar-content text-center">
      <div class="nav_image container text-center">
      <a href="../index.html"><img src="../assets/images/record-book_title.png" alt="" class="img_fluid"></a>
      </div>
  </nav>
  <section class="title_bar text-center">
    <div class="title_bar_body container">
        <div class="row m-4">
            <div class="col-md-4">
                <div class="dashboard_body_single">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Library Resources
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="resource_page.php">View All Resources</a></li>
                            <li><a class="dropdown-item" href="add-new.php">Add New Resource</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard_body_single">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Loan Information
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                          <li><a class="dropdown-item" href="../loan/loan_page.php">View Loan Information</a></li>
                          <li><a class="dropdown-item" href="../loan/add-new.php">Entry New Loan</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="dashboard_body_single">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Member's Portals
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="members_page.php">View & Edit Members</a></li>
                            <li><a class="dropdown-item" href="add-new.php">Register New Member</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>
  <section class="edit_members mb-4">
    <div class="container">
      <div class="text-center mb-4">
        <h3>Edit Library Resources</h3>
        <p class="text-muted">Click update after changing any information</p>
      </div>

      <?php
      $sql = "SELECT * FROM `resource` WHERE resource_id = $resource_id LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>

      <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
            <div class="col mb-3">
              <label class="form-label">Category</label>
              <input type="text" class="form-control" name="category" value="<?php echo $row['category'] ?>">
            </div>

            <div class="col mb-3">
              <label class="form-label">Collection Date</label>
              <input type="date" class="form-control" name="collection_date" value="<?php echo $row['collection_date'] ?>">
            </div>

            <div class="col mb-3">
              <label class="form-label">Title</label>
              <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
            </div>

            <div class="col mb-3">
              <label class="form-label">Publisher Name</label>
              <input type="text" class="form-control" name="publisher_name" value="<?php echo $row['publisher_name'] ?>">
            </div>

            <div class="col mb-3">
              <label class="form-label">Author</label>
              <input type="text" class="form-control" name="author" value="<?php echo $row['author'] ?>">
            </div>

            <div class="col mb-3">
              <label class="form-label">Publishing Date</label>
              <input type="date" class="form-control" name="publishing_date" value="<?php echo $row['publishing_date'] ?>">
            </div>

            <div class="col mb-3">
              <label class="form-label">Edition</label>
              <input type="number" class="form-control" name="edition" value="<?php echo $row['edition'] ?>">
            </div>

          <div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="resource_page.php" class="btn btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </section>
    <!-- Top Buttons -->
    <div class="top_buttons">
        <ul>
            <li><a href="https://recordbook.great-site.net/index.html">Home</a></li>
            <li><a href="https://recordbook.great-site.net/dashboard.html">Dashboard</a></li>
        </ul>
    </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
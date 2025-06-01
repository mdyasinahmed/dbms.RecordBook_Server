<?php
include "../db_conn.php";
$borrow_id = $_GET["borrow_id"];

if (isset($_POST["submit"])) {
  $category = $_POST['category'];
  $collection_date = $_POST['collection_date'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $publisher_name = $_POST['publisher_name'];
  $publishing_date = $_POST['publishing_date'];
  $edition = $_POST['edition'];

  $sql = "UPDATE `loan` SET `category`='$category',`collection_date`='$collection_date',`title`='$title',`author`='$author',`publisher_name`='$publisher_name',`publishing_date`='$publishing_date',`edition`='$edition' WHERE borrow_id = $borrow_id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: loan_page.php?msg=Data updated successfully");
  } else {
    echo "Failed: " . mysqli_error($conn);
  }
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

  <title>PHP loan Application</title>
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
                            Library loans
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="loan_page.php">View All loans</a></li>
                            <li><a class="dropdown-item" href="add-new.php">Add New loan</a></li>
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
                            <li><a class="dropdown-item" href="#">View & Edit Members</a></li>
                            <li><a class="dropdown-item" href="#">Register New Member</a></li>
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
        <h3>Edit is Restricted for Loans.</h3>
        <p class="text-muted">Operate Insert then Delete.</p>
      </div>

      <?php
      $sql = "SELECT * FROM `loan` WHERE loan_id = $loan_id LIMIT 1";
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
            <a href="loan_page.php" class="btn btn-danger">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </section>
    <!-- <h2>Data Edit is Restricted For Loan Table. Operate Insert or Delete.</h2> -->

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- Top Buttons -->
    <div class="top_buttons">
        <ul>
            <li><a href="https://recordbook.great-site.net/index.html">Home</a></li>
            <li><a href="https://recordbook.great-site.net/dashboard.html">Dashboard</a></li>
        </ul>
    </div>
</body>

</html>
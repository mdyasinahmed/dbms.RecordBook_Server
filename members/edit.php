<?php
include "../db_conn.php";
$patron_id = $_GET["patron_id"];

if (isset($_POST["submit"])) {
  $name = $_POST['name'];
  $department = $_POST['department'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];

  $sql = "UPDATE `patron` SET `name`='$name',`department`='$department',`email`='$email',`phone`='$phone' WHERE patron_id = $patron_id";

  $result = mysqli_query($conn, $sql);

  if ($result) {
    header("Location: members_page.php?msg=Data updated successfully");
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

  <title>PHP patron Application</title>
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
  <section class="edit_members">
    <div class="container">
      <div class="text-center mb-4">
        <h3>Edit User Information</h3>
        <p class="text-muted">Click update after changing any information</p>
      </div>

      <?php
      $sql = "SELECT * FROM `patron` WHERE patron_id = $patron_id LIMIT 1";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      ?>

      <div class="container d-flex justify-content-center">
        <form action="" method="post" style="width:50vw; min-width:300px;">
          <div class="row mb-3">
            <div class="col">
              <label class="form-label">Member's Name</label>
              <input type="text" class="form-control" name="name" value="<?php echo $row['name'] ?>">
            </div>

            <div class="col">
              <label class="form-label">Department</label>
              <input type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>">
            </div>
          </div>

          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $row['email'] ?>">
          </div>

          <div class="mb-3">
            <label class="form-label">Contact No</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'] ?>">
          </div>


          <div>
            <button type="submit" class="btn btn-success" name="submit">Update</button>
            <a href="members_page.php" class="btn btn-danger">Cancel</a>
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
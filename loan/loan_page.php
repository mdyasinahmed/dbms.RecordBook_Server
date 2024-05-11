<?php
include "../db_conn.php";
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

  <title>RecordBook-dashboard</title>
</head>

<body>
    <nav class="navbar-content text-center">
        <div class="nav_image container text-center">
        <a href="../home_page.php"><img src="../assets/images/record-book_title.png" alt="" class="img_fluid"></a>
        </div>
    </nav>
    <main>
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
                                    <li><a class="dropdown-item" href="add-new.php">Add New Resources</a></li>
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
                                    <li><a class="dropdown-item" href="loan_page.php">View Loan Information</a></li>
                                    <li><a class="dropdown-item" href="add-new.php">Entry New Loan</a></li>
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
        <section class="basic_page_headline container">
            <h5>View Loan Information</h5>
        </section>
        <section class="view_and_edit_member_section container">
            <!-- HEADER PHP -->
            <?php
            if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            ' . $msg . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
            ?>
            <!-- OUTPUT TABLE -->
            <table class="table table-hover text-center">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">Borrow ID</th>
                        <th scope="col">Resource Title</th>
                        <th scope="col">Borrower Name</th>
                        <th scope="col">Borrower Phone</th>
                        <th scope="col">Borrow Date</th>
                        <th scope="col">Return Date</th>
                        <th scope="col">Publishing Date</th>
                        <th scope="col">Action(Edit/Delete)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `loan`";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <td><?php echo $row["borrow_id"] ?></td>
                        <td><?php echo $row["resource_title"] ?></td>
                        <td><?php echo $row["borrower_name"] ?></td>
                        <td><?php echo $row["borrower_phone"] ?></td>
                        <td><?php echo $row["borrow_date"] ?></td>
                        <td><?php echo $row["return_date"] ?></td>
                        <td>
                        <a href="edit.php?borrow_id=<?php echo $row["borrow_id"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                        <a href="delete.php?borrow_id=<?php echo $row["borrow_id"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
    <footer class="d-none">
        <section class="presented_by">
            <div class="footer_image container text-center">
                <img src="../assets/images/team-title.png" class="img-fluid" alt="">
            </div>
        </section>
    </footer>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
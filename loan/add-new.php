<?php
include "../db_conn.php";

if (isset($_POST["submit"])) {
   $resource_id = $_POST['resource_id'];
   $patron_id = $_POST['patron_id'];
   $borrow_date = $_POST['borrow_date'];
   $return_date = $_POST['return_date'];

   // Check if the patron exists
   $patron_check = mysqli_query($conn, "SELECT name, phone FROM patron WHERE patron_id = $patron_id");
   if (mysqli_num_rows($patron_check) == 0) {
      header("Location: loan_page.php?msg=Member not Registered!");
      exit();
   }

   // Check if the resource exists
   $resource_check = mysqli_query($conn, "SELECT title FROM resource WHERE resource_id = $resource_id");
   if (mysqli_num_rows($resource_check) == 0) {
      header("Location: loan_page.php?msg=Resource not found!");
      exit();
   }

   // Get member and resource data
   $patron_data = mysqli_fetch_assoc($patron_check);
   $borrower_name = $patron_data['name'];
   $borrower_phone = $patron_data['phone'];

   $resource_data = mysqli_fetch_assoc($resource_check);
   $resource_title = $resource_data['title'];

   // Insert into loan table
   $sql = "INSERT INTO loan (
               borrow_id,
               resource_id,
               resource_title,
               patron_id,
               borrower_name,
               borrower_phone,
               borrow_date,
               return_date
           ) VALUES (
               NULL,
               '$resource_id',
               '$resource_title',
               '$patron_id',
               '$borrower_name',
               '$borrower_phone',
               '$borrow_date',
               '$return_date'
           )";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: loan_page.php?msg=New record created successfully");
   } else {
      header("Location: loan_page.php?msg=Failed to insert data: " . mysqli_error($conn));
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

   <title>RecordBook-ResourceAdd</title>
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
        <!-- <section class="basic_page_headline container">
            <h5>View & Edit Members</h5>
        </section> -->
   <section class="register_member mb-5">
      <div class="container">
         <div class="text-center mb-4">
            <h3>Entry New Loan</h3>
            <p class="text-muted">Complete the form below to add a new loan</p>
         </div>

         <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
               <div class="col mb-3">
                  <label class="form-label">Resource ID</label>
                  <input type="number" class="form-control" name="resource_id" placeholder="1">
               </div>

               <div class="col mb-3">
                  <label class="form-label">Patron ID</label>
                  <input type="number" class="form-control" name="patron_id" placeholder="1">
               </div>
               
               <div class="col mb-3">
                  <label class="form-label">Borrow Date</label>
                  <input type="date" class="form-control" name="borrow_date" placeholder="Borrow Date">
               </div>

               <div class="mb-3">
                  <label class="form-label">Return Date</label>
                  <input type="date" class="form-control" name="return_date" placeholder="Return Date">
               </div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">Save</button>
                  <a href="loan_page.php" class="btn btn-danger">Cancel</a>
               </div>
            </form>
         </div>
      </div>
   </section>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
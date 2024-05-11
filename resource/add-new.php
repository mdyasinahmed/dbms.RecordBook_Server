<?php
include "../db_conn.php";

if (isset($_POST["submit"])) {
   $category = $_POST['category'];
   $collection_date = $_POST['collection_date'];
   $title = $_POST['title'];
   $author = $_POST['author'];
   $publisher_name = $_POST['publisher_name'];
   $publishing_date = $_POST['publishing_date'];
   $edition = $_POST['edition'];

   $sql = "INSERT INTO `resource`(`resource_id`, `category`, `collection_date`, `title`, `author`, `publisher_name`,`publishing_date`, `edition`) VALUES (NULL,'$category','$collection_date','$title','$author', '$publisher_name', '$publishing_date', '$edition')";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      header("Location: resource_page.php?msg=New record created successfully");
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

   <title>RecordBook-ResourceAdd</title>
</head>

<body>
   <nav class="navbar-content text-center">
      <div class="nav_image container text-center">
         <a href="../home_page.php"><img src="../assets/images/record-book_title.png" alt="" class="img_fluid"></a>
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
        <!-- <section class="basic_page_headline container">
            <h5>View & Edit Members</h5>
        </section> -->
   <section class="register_member mb-5">
      <div class="container">
         <div class="text-center mb-4">
            <h3>Add New Resource</h3>
            <p class="text-muted">Complete the form below to add a new resource</p>
         </div>

         <div class="container d-flex justify-content-center">
            <form action="" method="post" style="width:50vw; min-width:300px;">
               <div class="col mb-3">
                  <label class="form-label">Category</label>
                  <input type="text" class="form-control" name="category" placeholder="books/magazines/papers">
               </div>
               
               <div class="col mb-3">
                  <label class="form-label">Collection Date</label>
                  <input type="date" class="form-control" name="collection_date" placeholder="Collection Date">
               </div>
               
               <div class="col mb-3">
                  <label class="form-label">Title</label>
                  <input type="text" class="form-control" name="title" placeholder="Name of Resource">
               </div>
               
               <div class="col mb-3">
                  <label class="form-label">Author</label>
                  <input type="text" class="form-control" name="author" placeholder="Author's Name">
               </div>

               <div class="col mb-3">
                  <label class="form-label">Publisher Name</label>
                  <input type="text" class="form-control" name="publisher_name" placeholder="Publication Name">
               </div>

               <div class="mb-3">
                  <label class="form-label">Publishing Date</label>
                  <input type="date" class="form-control" name="publishing_date" placeholder="Date of Publishing">
               </div>

               <div class="mb-4">
                  <label class="form-label">Edition</label>
                  <input type="number" class="form-control" name="edition" placeholder="00">
               </div>

               <div>
                  <button type="submit" class="btn btn-success" name="submit">Save</button>
                  <a href="resource_page.php" class="btn btn-danger">Cancel</a>
               </div>
            </form>
         </div>
      </div>
   </section>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
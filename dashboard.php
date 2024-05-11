<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="assets/style.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>RecordBook-dashboard</title>
</head>

<body>
    <nav class="navbar-content text-center">
        <div class="nav_image container text-center">
            <a href="home_page.php"><img src="assets/images/record-book_title.png" alt="" class="img_fluid"></a>
        </div>
    </nav>

    <div class="container">
        <div class="dashboard_inner_body p-5">
            <div class="dashboard_headline text-center m-2">
                <h3><u>Browse Options</u></h3>
            </div>
            <div class="dashboard_body text-center">
                <div class="dashboard_body_single m-5">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Library Resources
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="resource/resource_page.php">View All Resources</a></li>
                            <li><a class="dropdown-item" href="resource/add-new.php">Add New Resource</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard_body_single m-5">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Loan Information
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                        </ul>
                    </div>
                </div>
                <div class="dashboard_body_single m-5">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Member's Portals
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="members/members_page.php">View & Edit Members</a></li>
                            <li><a class="dropdown-item" href="members/add-new.php">Register New Member</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <section class="presented_by">
            <div class="footer_image container text-center">
                <img src="assets/images/team-title.png" class="img-fluid" alt="">
            </div>
        </section>
    </footer>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>
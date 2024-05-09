<?php
session_start();
require_once("config/db.class.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>eLEARNING - eLearning HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <?php
    include 'header_menu.php';
    ?>




    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 ">
        <div class="container py-5">
            <div class="row justify-content-center ">
                <div class="col-lg-10 text-center ">
                    <h1 class="display-3 text-white animated slideInDown">Resources</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center ">
                            <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                            <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Resources</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- Search bar -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="search-container">
                    <form class="form-inline  input-group" method="get">
                        <input class="form-control mr-sm-2 " name="search_content" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" name="search" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Search bar end -->



    <!-- Categories Start -->
    <div class="container-xxl py-5 category">
        <div class="container">
            <div class="row">

                <div class="col-md-3 col-sd-2" id="sub_menu">
                    <!-- <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="add_lecture.php">Courses</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul> -->
                </div>
                <div class="col-md-9 col-sd-10 justify-content-center">


                    <?php

                    $item_per_page = !empty($_GET['per_page']) ? ($_GET['per_page']) : 4;
                    $current_page = !empty($_GET['page']) ? ($_GET['page']) : 1;
                    $offset = ($current_page - 1) * $item_per_page;
                    $db = new DB;



                    if (!empty($_GET['search_content'])) {
                        $search_query = ($_GET['search_content']);
                        $docs = $db->select_to_array("SELECT * FROM monhoc WHERE TenMonHoc LIKE '%$search_query%' ORDER BY IDMonHoc ASC LIMIT {$item_per_page} OFFSET {$offset}");
                        $totalRecords = $db->query_execute("SELECT * FROM monhoc WHERE TenMonHoc LIKE '%$search_query%'");
                    } else {
                        $docs = $db->select_to_array("SELECT * FROM monhoc ORDER BY IDMonHoc ASC LIMIT {$item_per_page} OFFSET {$offset}");
                        $totalRecords = $db->query_execute("SELECT * FROM monhoc");
                    }


                    $totalRecords = $totalRecords->num_rows;
                    $totalPages = ceil($totalRecords / $item_per_page);


                    foreach ($docs as $doc) {
                        $IDMonHoc = $doc['IDMonHoc'];
                        echo "<section class ='my-2'>
                        <div class='row'>
                        <div class='card col-md-9 col-sm-9' '>
                        <div class='card-body'>
                        <h5 class='card-title'><i class='fa-solid fa-book'></i>
                        <a href='resources_detail.php?IDMonHoc=$IDMonHoc'  >
                        {$doc['TenMonHoc']}</a></h5>
                        <p>Ma mon hoc: {$IDMonHoc}</p>
                        </div>
                        </div>
                        </div>
                        </section>";
                    }
                    ?>

                    <?php
                    require_once("pagination.php");

                    ?>





                </div>


            </div>



        </div>
    </div>
    <!-- Categories Start -->





    <?php
    include 'footer.php';
    ?>




    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
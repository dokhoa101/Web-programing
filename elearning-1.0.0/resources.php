<?php
require_once("config/db.class.php");
include_once './tintuc_ketnoi.php';
include_once './tintuc_hamgetTintuc.php';
session_start();

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
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->

    <?php
    include 'header_menu.php';
    ?>




    <!-- Header Start -->
    <div class="container-fluid bg-primary py-5 mb-5 " style="background-image: url('../elearning-1.0.0/img/it-1.jpg')">
        <div class="container py-5">
            <div class="row justify-content-center ">
                <div class="col-lg-10 text-center ">
                    <h1 class="display-3 text-white animated slideInDown">Resources</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center ">
                            <li class="breadcrumb-item"><a class="text-white" href="index.php">Home</a></li>
                            <li class="breadcrumb-item text-white active" aria-current="page">Resources</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->




    <!-- Categories Start -->
    <div class="container-fluid pb-2 pt-0">
        <div class="container-fluid">
            <div class="row">
                <!-- Leftside -->
                <div class="col-md-3 col-sd-2" id="sub_menu">
                    <div class="row">
                        <div class="mb-3 text-right font-weight-bold">
                            <h5 class="display-6">
                            <i class="fa-regular fa-newspaper"></i>
                                Thông Báo </h5>
                        </div>

                        <div id="carouselAutoplaying" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $newtintuc = getthongbao();
                                $count = count($newtintuc);
                                foreach ($newtintuc as $index => $item) {
                                    extract($item);
                                    $activeClass = ($index === 0) ? 'active' : ''; // Đánh dấu mục đầu tiên là active
                                    echo '
                                <div class="carousel-item ' . $activeClass . '">
                                    <div class="card border-0" style="height:200px">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="thongbao_chitiet.php?id=' . $MaTB . '">' . $titleTB . '</a></h5>
                                            <p class="card-text text-truncate">' . $NoiDung . '</p> <!-- Giảm kích thước -->
                                            <p class="card-text"><small class="text-muted">' . $time . '</small></p>
                                        </div>
                                    </div>
                                </div>
                            ';
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-2">
                        <div class="mb-3 text-right font-weight-bold">
                            <h5 class="display-6">
                            <i class="fa-solid fa-users"></i>
                                Tuyển dụng</h5>
                        </div>

                        <div id="carouselAutoplaying2" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <?php
                                $newtintuc = getvieclam();
                                $count = count($newtintuc);
                                foreach ($newtintuc as $index => $item) {
                                    extract($item);
                                    $activeClass = ($index === 0) ? 'active' : ''; // Đánh dấu mục đầu tiên là active
                                    echo '
                                <div class="carousel-item ' . $activeClass . '">
                                <div class="card border-0 mb-3 "style="height:200px">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="' . $anhcongty . '" class="img-fluid" alt="Logo công ty">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="vieclam_chitiet.php?id=' . $maso . '">' . $vitri . '</a></h5>
                                            <p class="card-text">' . $tencongty . '</p>
                                            <p class="card-text">Mức lương: ' . $luong . '</p>
                                            <p class="card-text"><small class="text-muted">' . $time . '</small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                </div>
                            ';
                                }
                                ?>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying2" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying2" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>

                    </div>



                </div>
                <!--End Leftside -->

                <div class="col-md-6 col-sd-6 justify-content-center">
                    <div class="col-md-9 py-2 mx-auto">
                        <div class="search-container">
                            <form class="form-inline  input-group" method="get">
                                <input class="form-control mr-sm-2 " name="search_content" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn  btn-outline-primary my-2 my-sm-0" name="search" type="submit">Search</button>
                            </form>
                        </div>
                    </div>


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
                        <div class='row '>
                        <div class='card col-md-9 col-sm-9 mx-auto' >
                        <div class='card-body'>
                        <h5 class='card-title'><i class='fa-solid fa-book'></i>
                        <a class='no-underline' href='resources_detail.php?IDMonHoc=$IDMonHoc'  >
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

                <div class="col-md-3 col-sd-3" id="sub_menu1">
                    <div class="mb-3 text-right font-weight-bold">
                        <h5 class="display-6">
                        <i class="fa-regular fa-calendar-days"></i>
                            Tin tức</h5>
                    </div>
                    <div id="carouselAutoplaying1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php
                            $newtintuc = getnew();
                            $count = count($newtintuc);
                            foreach ($newtintuc as $index => $item) {
                                extract($item);
                                $activeClass = ($index === 0) ? 'active' : ''; // Đánh dấu mục đầu tiên là active
                                echo '
                                <div class="carousel-item ' . $activeClass . '">
                                    <div class="card border-0 shadow-sm">
                                        <img src="' . $linkAnh . '" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title"><a href="tintuc_chitiet.php?id=' . $MaTin . '">' . $title . '</a></h5>
                                            <p class="card-text"><small class="text-muted">' . $time . '</small></p>
                                        </div>
                                    </div>
                                </div>
                            ';
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselAutoplaying1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselAutoplaying1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


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
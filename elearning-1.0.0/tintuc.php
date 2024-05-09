<?php
include_once "tintuc_ketnoi.php";
include_once "tintuc_hamgetTintuc.php";

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tin Tức - eLEARNING</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Header Start -->
    <?php include 'header_menu.php'; ?>
    <!-- Header End -->

    <!-- Page Title Start -->
    <div class="container-fluid bg-primary py-5 mb-5">
        <div class="container py-5 text-center">
            <h1 class="display-3 text-white">Tin Tức</h1>
        </div>
    </div>
    <!-- Page Title End -->

    <!-- News Section Start -->
    <div class="container">
        <div class="row justify-content-center">
            <?php
            $newtintuc = getnew();
            foreach ($newtintuc as $item) {
                extract($item);
            ?>
                <div class="col-lg-4 mb-4">
                    <div class="card border-0 shadow-sm">
                        <img src="<?= $linkAnh ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><a href="tintuc_chitiet.php?id=<?= $MaTin ?>"><?= $title ?></a></h5>
                            <p class="card-text"><small class="text-muted"><?= $time ?></small></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- Pagination -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-5">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- News Section End -->

    <!-- Footer Start -->
    <?php include "footer.php"; ?>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fas fa-arrow-up"></i></a>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Script -->
    <script src="js/script.js"></script>
</body>

</html>

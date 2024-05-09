<?php
include_once './tintuc_ketnoi.php';
include_once './tintuc_hamgetTintuc.php';  

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Thông Tin Việc Làm - eLearning</title>
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
    <?php include 'header_menu.php'; ?>

    <!-- Page Content Start -->
    <div class="container py-5">
        <?php
        $vieclam = getvieclam();
        foreach ($vieclam as $item) {
            extract($item);
            echo '
            <div class="card mb-3">
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
            </div>';
        }
        ?>
    </div>
    <!-- Page Content End -->

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

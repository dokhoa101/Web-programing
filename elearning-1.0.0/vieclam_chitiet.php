<?php
include_once './tintuc_ketnoi.php';
include_once './tintuc_hamgetTintuc.php';  

session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Chi Tiết Việc Làm - eLearning</title>
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
        $tintuc = chitietvieclam();

        extract($tintuc);
        echo '
        <div class="row">
            <div class="col-lg-8">
                <h2>' . $vitri . '</h2>
                <h3>' . $tencongty . '</h3>
                <img src="' . $anhcongty . '" class="img-fluid mb-4" alt="Logo công ty">
                <h4>Yêu cầu công việc:</h4>
                <p>' . $yeucau . '</p>
                <h4>Giới thiệu công ty:</h4>
                <p>' . $gioithieucongty . '</p>
                <h5>Mức lương: ' . $luong . '</h5>
            </div>
            <div class="col-lg-4">
                <!-- Sidebar Widget -->
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin công ty</h5>
                        <p class="card-text">Tên công ty: ' . $tencongty . '</p>
                        <p class="card-text">Địa chỉ: ' . $diachicongty . '</p>
                        <p class="card-text">Kinh nghiệm: ' . $kinhnghiem . '</p>
                    </div>
                </div>
            </div>
        </div>';
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

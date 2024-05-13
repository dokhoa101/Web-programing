<?php
include_once "tintuc_ketnoi.php";
include_once "tintuc_hamgetTintuc.php";

session_start();

$thongbao_id = $_GET['id'] ?? die("Không có thông báo được chọn.");
$thongbao = chitietthongbao(); // Lấy thông tin chi tiết của thông báo

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Chi Tiết Thông Báo - eLearning</title>
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
        // Lấy thông tin chi tiết của thông báo
        $thongbao = chitietthongbao();

        // Kiểm tra xem có thông tin thông báo hay không
        if ($thongbao) {
            // Extract thông tin từ mảng kết quả
            extract($thongbao);
            // Hiển thị nội dung thông báo chi tiết
            echo '
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-4">' . $titleTB . '</h2>
                    <p class="lead">' . $NoiDung . '</p>
                    <p class="text-muted">' . $time . '</p>
                </div>
            </div>';
        } else {
            // Nếu không có thông báo, hiển thị thông báo
            echo '<p>Không có thông báo để hiển thị.</p>';
        }
        ?>
    </div>
    <!-- Page Content End -->

    <!-- Footer, back to top button, JavaScript links, etc. -->
</body>
</html>

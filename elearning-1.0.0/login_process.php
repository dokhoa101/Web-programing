<?php
require ("config/db.class.php");
session_start();


$db = new Db();

// Lấy kết nối đến cơ sở dữ liệu từ đối tượng Db
$con = $db->connect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $username = mysqli_real_escape_string($con, $username);



        $password = $_POST['password'];
        $password = mysqli_real_escape_string($con, $password);
        $password = md5($password);
        echo $password;

        // Mã hóa mật khẩu trước khi kiểm tra
        // $hashed_password = md5($password); 

        // Truy vấn kiểm tra tài khoản từ cơ sở dữ liệu
        $sql = "SELECT * FROM giangvien Where Email = '$username'";
        $result = $db->select_to_array($sql);

        if ($result !== FALSE) {
            if (count($result) > 0) {
                foreach ($result as $row)

                    $password_database_hashed = $row['password'];
                if ($password == $password_database_hashed) {
                    # code...
                }
                // Đăng nhập thành công
                session_start();
                $_SESSION['email'] = $username;
                header("Location: index.php"); // Chuyển hướng đến trang home.php
            } else {
                // Đăng nhập thất bại
                echo "Invalid username or password";
            }
        } else {
            echo "connect error";
        }




    } else {
        // Nếu không có dữ liệu được gửi từ form, hiển thị thông báo lỗi
        $error_message = "Vui lòng nhập đầy đủ thông tin đăng nhập.";
    }
}




?>
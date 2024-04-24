<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$database = "your_database";

$conn = new mysqli($servername, $username, $password, $database);

// // Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy thông tin đăng nhập từ form
$username = $_POST['username'];
$password = $_POST['password'];

// Mã hóa mật khẩu trước khi kiểm tra
// $hashed_password = md5($password); 

// Truy vấn kiểm tra tài khoản từ cơ sở dữ liệu
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);




if ($result->num_rows > 0) {
    // Đăng nhập thành công
    session_start();
    $_SESSION['username'] = $username;
    header("Location: home.php"); // Chuyển hướng đến trang home.php
} else {
    // Đăng nhập thất bại
    echo "Invalid username or password";
}

$conn->close();
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if(isset($_POST['username'], $_POST['password'])) {
        // Lấy thông tin từ form
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        // Thực hiện kiểm tra đăng nhập
        // Trong ví dụ này, chúng ta sử dụng thông tin đăng nhập cứng để kiểm tra
        if($username === 'nq2019.dominhkhoa101004@gmail.com' && $password === '123') {
            // Đăng nhập thành công, chuyển hướng người dùng tới trang sau đăng nhập
            header("Location: index.html");
            exit; // Dừng kịch bản để đảm bảo không có mã HTML hoặc PHP nào được thực thi sau khi chuyển hướng
        } else {
            // Đăng nhập không thành công, hiển thị thông báo lỗi
            $error_message = "Tên người dùng hoặc mật khẩu không chính xác.";
        }
    } else {
        // Nếu không có dữ liệu được gửi từ form, hiển thị thông báo lỗi
        $error_message = "Vui lòng nhập đầy đủ thông tin đăng nhập.";
    }
}
?>
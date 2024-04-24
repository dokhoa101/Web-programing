<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có dữ liệu được gửi từ form không
    if(isset($_POST['username'], $_POST['password'])) {
        // Lấy thông tin từ form
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Thực hiện kiểm tra đăng nhập
        // Trong ví dụ này, chúng ta sử dụng thông tin đăng nhập cứng để kiểm tra
        if($username === 'admin' && $password === 'admin123') {
            // Đăng nhập thành công, chuyển hướng người dùng tới trang sau đăng nhập
            header("Location: index.html");
            exit; // Dừng kịch bản để đảm bảo không có mã HTML hoặc PHP nào được thực thi sau khi chuyển hướng
        } else {
            // Đăng nhập không thành công, hiển thị thông báo lỗi
            echo 'Tên người dùng hoặc mật khẩu không chính xác.';
        }
    } else {
        // Nếu không có dữ liệu được gửi từ form, hiển thị thông báo lỗi
        echo 'Vui lòng nhập đầy đủ thông tin đăng nhập.';
    }
} else {
    // Nếu không phải là phương thức POST, chẳng hạn là truy cập trực tiếp vào login.php, bạn có thể xử lý nó ở đây tùy thuộc vào yêu cầu của bạn
    echo 'Phương thức không được chấp nhận.';
}
?>

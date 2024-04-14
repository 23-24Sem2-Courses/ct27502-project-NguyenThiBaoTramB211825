<?php
require_once __DIR__ . '/../src/bootstrap.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có tồn tại email và mật khẩu không
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Lấy thông tin đăng nhập từ form
        $email = $_POST['username'];
        $matkhau = $_POST['password'];

        // Kiểm tra thông tin đăng nhập
        $stmt = $pdo->prepare("SELECT * FROM loginuser WHERE email = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $kq = '';
        if ($user) {
            // Kiểm tra mật khẩu
            if (password_verify($password, $user['password'])) {
                // Đăng nhập thành công
                $_SESSION['username'] = $username;
                redirect('index.php');
                exit(); // Kết thúc quá trình xử lý và chuyển hướng
            } else {
                $kq = 'Mật khẩu không đúng.';
            }
        } else {
            // Đăng nhập thất bại
            $kq = 'Tên đăng nhập không tồn tại.';
        }
    } else {
        $kq = 'Vui lòng nhập đầy đủ thông tin.';
    }
}

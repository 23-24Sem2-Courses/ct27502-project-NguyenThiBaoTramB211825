<?php
session_start();
$username = "";
$password = "";
$kq = "";
if (isset($_POST['submit'])) {
    require 'src/connect.php';
    $username = $_POST['txtus'];
    $password = $_POST['txtem'];
    $sql = "SELECT * FROM loginuser where email = '$username' and matkhau = '$password'";
    $result = $conn->query($sql); //sai vì connect.php chua có conn
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['txtus'] = $username;
            $_SESSION['HoTen'] = $row["HoTen"];
            $_SESSION['email'] = $row["email"];
            $_SESSION['dienthoai'] = $row["DienThoai"];
            header('Location: index.php');
            $row = $result->fetch_assoc();
        }
    } else {
        $kq = "Thông tin đăng nhập không đúng. Vui lòng kiểm tra lại!";
    }
}

/* 

<?php
session_start();
require_once __DIR__ . '/../src/connect.php';

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Kiểm tra xem có tồn tại username và password không
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        // Kết nối CSDL và lấy dữ liệu đăng nhập từ form
        

        // Kiểm tra thông tin đăng nhập
        $stmt = $pdo->prepare("SELECT * FROM loginuser WHERE email = ?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if(password_verify($_POST['password'], $user['matkhau'])) {
                // Đăng nhập thành công
                $_SESSION['username'] = $_POST['username'];
                redirect('index.php');
            } else {
                $error_message = "Mật khẩu không đúng.";
            }
        } else {
            // Đăng nhập thất bại
            $error_message = "Tên đăng nhập không tồn tại.";
        }
    } else {
        $error_message = "Vui lòng nhập đầy đủ thông tin.";
    }
    
}
if ($error_message) {
    include __DIR__ . '/../src/partials/show_error.php';
}
?>
*/
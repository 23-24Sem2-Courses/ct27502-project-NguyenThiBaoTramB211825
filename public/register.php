<?php
$email = "";
$mk = "";
$repass = "";
$name = "";
$dt = "";
$kqdk = "";

if (isset($_POST['dangky'])) {
    require '../src/myconnect.php';
    $name  = $_POST['fullname'];
    $email = $_POST['email'];
    $dt = $_POST['phone'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    if ($repass != $mk) {
        $kqdk = "Nhập lại mật khẩu không khớp.";
    } else {
        $sql = "INSERT INTO nguoiDung (emaildn,matKhau,hoTen,dienThoai) 
        VALUES ('$email','$mk' ,'$name','$dt') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            $email = "";
            $mk = "";
            $repass = "";
            $name = "";
            $dt = "";
            $kqdk = "Đăng ký thành công.";
        } else {
            $kqdk = "Đăng ký không thành công. Vui lòng kiểm tra lại thông tin.";
        }
    }
    mysqli_close($conn);
}
?>
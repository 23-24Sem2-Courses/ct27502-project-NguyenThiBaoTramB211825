<?php
session_start();
$tk = "";
$mk = "";
$kq = "";
if (isset($_POST['submit'])) {
    require '../src/myconnect.php';
    $tk = $_POST['txtus'];
    $mk = $_POST['txtem'];
    $sql = "SELECT * FROM nguoiDung where emaildn = '$tk'  and matKhau = '$mk'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['txtus'] = $tk;
            $_SESSION['hoTen'] = $row["hoTen"];
            $_SESSION['emaildn'] = $row["emaildn"];
            $_SESSION['dienThoai'] = $row["dienThoai"];
            header('Location: index.php');
            $row = $result->fetch_assoc();
        }
    } else {
        $kq = "Thông tin không đúng, vui lòng kiểm tra lại";
    }
}

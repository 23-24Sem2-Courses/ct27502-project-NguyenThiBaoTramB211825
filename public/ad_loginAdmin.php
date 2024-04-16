<?php
session_start();
$kq = "";
if (isset($_POST['dnhapadmin'])) {

    require '../src/myconnect.php';
    $tk = $_POST['txtdangnhap'];
    $mk = $_POST['txtmatkhau'];
    $sql = "SELECT * FROM admin  where tenDN = '$tk'  and matKhau = '$mk'";
    $result = $conn->query($sql);
    // echo  $mk;
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['tenDN'] = $row["tenDN"];
            header('Location: ad_index.php');
            $row = $result->fetch_assoc();
        }
    } else {
        $kq = "Thông tin không đúng vui lòng kiềm tra lại";
    }
}

<?php
require "../src/myconnect.php";
if (isset($_POST['muangay'])) {
    $total = "";
    $email =  $_POST['email'];
    $ngaylap = $_POST['date'];
    $diachi = $_POST['txtdiachi'];
    $hinhthucthanhtoan = $_POST['hinhthuctt'];
    $sql1 = "INSERT INTO hoadon (emaildn,ngayLap,dcGiaoHang,hinhThucTT)
                VALUES ('$email','$ngaylap','$diachi','$hinhthucthanhtoan');";

    if ($conn->query($sql1) === TRUE) {
        $masp = $_POST['idsp'];
        $dongia = $_POST['gia'];
        $sl = $_POST['txtsoluong'];
        $thanhtien =  $sl * $dongia;
        $hd =  mysqli_insert_id($conn);
        $sql2 = "INSERT INTO CTHD (soHD,maSach,soLuong,thanhTien) 
                       VALUES ('$hd','$masp','$sl','$thanhtien');";

        if ($conn->query($sql2) === TRUE) {
            session_destroy();
        } else {
            echo "Error: " . $sql2 . "<br>" . $conn->error;
        }
    }
}
?>
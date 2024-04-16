<?php
require "../src/myconnect.php";
if (isset($_POST['Dat'])) {
    if (isset($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $key  => $value) {
            $item[] = $key;
        }
        $str = implode(",", $item);
        $query = "SELECT s.maSach,s.tenSach,s.giaSach,s.hinhAnh,s.mota, n.tenNXB,s.maNXB from sach s 
				LEFT JOIN nhaXuatBan n on n.maNXB = s.maNXB
				WHERE  s.maSach  in ($str)";
        $result = $conn->query($query);
        $email =  $_SESSION['email'];
        $ngaylap = $_POST['date'];
        $diachi = $_POST['diachi'];
        $hinhthucthanhtoan = $_POST['hinhthuctt'];

        if ($total != 0) {
            $sql1 = "INSERT INTO hoadon (emaildn,ngayLap,dcGiaoHang,hinhThucTT)
                VALUES ('$email','$ngaylap','$diachi','$hinhthucthanhtoan');";
            if ($conn->query($sql1) === TRUE) {
                foreach ($result as $s) {
                    $masp = $s["maSach"];
                    $dongia = $s["giaSach"];
                    $sl = $_SESSION['cart'][$s["maSach"]];
                    $thanhtien =  $sl * $dongia;
                    $hd[] =  mysqli_insert_id($conn);
                    $str = implode(",", $hd);
                    $sql2 = "INSERT INTO  CTHD (soHD,maSach,soLuong,thanhTien) 
                       VALUES ('$str','$masp','$sl','$thanhtien');";

                    if ($conn->query($sql2) === TRUE) {
                        header('Location: orderConfirmation.php');
                        unset($_SESSION['cart']);
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
                }
            }
        } else {
            $sql1 = "INSERT INTO hoadon (emaildn,ngayLap,dcGiaoHang,hinhThucTT)
                VALUES ('$email','$ngaylap','$diachi','$hinhthucthanhtoan');";
            if ($conn->query($sql1) === TRUE) {
                foreach ($result as $s) {
                    $masp = $s["maSach"];
                    $dongia = $s["giaSach"];
                    $sl = $_SESSION['cart'][$s["maSach"]];
                    $thanhtien =  $sl * $dongia;
                    $hd[] =  mysqli_insert_id($conn);
                    $str = implode(",", $hd);
                    $sql2 = "INSERT INTO  CTHD (soHD,maSach,soLuong,thanhTien) 
                       VALUES ('$str','$masp','$sl','$thanhtien');";

                    if ($conn->query($sql2) === TRUE) {
                        header('Location: orderConfirmation.php');
                        session_destroy();
                    } else {
                        echo "Error: " . $sql2 . "<br>" . $conn->error;
                    }
                }
            }
        }
    }
}

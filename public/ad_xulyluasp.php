<?php
if (isset($_POST['create'])) {

    require '../src/myconnect.php';
    $maSach= $_POST['maSach'];
    $name = $_POST['name'];

    $gia = $_POST['gia'];
    $hinhanh = $_FILES['hinhanh']['name'];
    move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'images/' . $_FILES['hinhanh']['name']);
    $matg = $_POST['matg'];
    $matl = $_POST['matl'];
    $manhasx = $_POST['manhasx'];
    $namxb = $_POST['namxb'];
    $mota = $_POST['editor1'];
    $sql = "INSERT INTO  sach (maSach,tenSach,giaSach,hinhAnh, maTG, maTL, maNXB, namXuatBan, mota) 
    VALUES ('$maSach','$name','$gia' ,'$hinhanh','$matg','$matl','$manhasx','$namxb','$mota') ";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: ad_qlsach.php');
        echo "Thành công";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Thêm lỗi";
    }
}


<?php
    if (isset($_POST['create'])) {
        require '../src/myconnect.php';
        $manhasx = $_POST['manhasx'];
        $name = $_POST['name'];
        $diachi = $_POST['diachi'];
        $email = $_POST['email'];
        $sql = "INSERT INTO  nhaXuatBan (maNXB,tenNXB,diaChi,email) 
        VALUES ('$manhasx','$name','$diachi' ,'$email') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            header('Location: ad_qlnxb.php');
            echo "Thành công";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            echo "Thêm lỗi";
        }
    }

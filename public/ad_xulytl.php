
<?php
if (isset($_POST['create'])) {
    require '../src/myconnect.php';
    $maTL = $_POST['maTL'];
    $tenTL = $_POST['tenTL'];
    $sql = "INSERT INTO theLoai (maTL,tenTL) 
        VALUES ('$maTL','$tenTL') ";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: ad_qltl.php');
        echo "Thành công";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Thêm lỗi";
    }
}

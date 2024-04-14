
<?php
if (isset($_POST['create'])) {
    require '../src/myconnect.php';
    $maTG = $_POST['maTG'];
    $tenTG = $_POST['tenTG'];
    $website = $_POST['website'];
    $ghiChu = $_POST['ghiChu'];
    $sql = "INSERT INTO  tacGia (maTG,tenTG,website,ghiChu) 
        VALUES ('$maTG','$tenTG','$website' ,'$ghiChu') ";
    // echo  $mk;
    if (mysqli_query($conn, $sql)) {
        header('Location: ad_qltg.php');
        echo "Thành công";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "Thêm lỗi";
    }
}

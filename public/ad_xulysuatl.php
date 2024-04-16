

<?php
if (isset($_POST['Edit'])) {
    require '../src/myconnect.php';
    // Lấy các giá trị từ form
    $maTL = $_POST['maTL'];
    $tenTL = $_POST['tenTL'];

    // Thực hiện truy vấn SQL để cập nhật thông tin tác giả
    $sql = "UPDATE theLoai
        SET tenTL = '$tenTL'
        WHERE maTL = '$maTL'";

    // Thực thi truy vấn
    if ($conn->query($sql) === TRUE) {
        // Nếu thành công, chuyển hướng trở lại trang quản lý sách
        header('Location: ad_qltl.php');
        exit(); // Đảm bảo không có mã HTML nào được xuất ra sau khi chuyển hướng
    } else {
        // Nếu có lỗi, in ra thông báo lỗi
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}


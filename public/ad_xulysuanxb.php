
<?php
if (isset($_POST['Edit'])) {
    require '../src/myconnect.php';
    // Lấy các giá trị từ form
    $manhasx = $_POST['maNXB'];
    $name = $_POST['name'];
    $diachi = $_POST['diachi'];
    $email = $_POST['email'];

    // Thực hiện truy vấn SQL để cập nhật thông tin sách
    $sql = "UPDATE nhaXuatBan
        SET tenNXB='$name', diaChi='$diachi', email='$email'
        WHERE maNXB='$manhasx'";

    // Thực thi truy vấn
    if ($conn->query($sql) === TRUE) {
        // Nếu thành công, chuyển hướng trở lại trang quản lý sách
        header('Location: ad_qlnxb.php');
        exit(); // Đảm bảo không có mã HTML nào được xuất ra sau khi chuyển hướng
    } else {
        // Nếu có lỗi, in ra thông báo lỗi
        echo "Error updating record: " . $conn->error;
    }
    $conn->close();
}


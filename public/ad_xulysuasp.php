<?php
    if (isset($_POST['Edit'])) {
        require '../src/myconnect.php';
        // Xử lý tải lên hình ảnh (nếu có)
        if ($_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
        $hinhanh = $_FILES['hinhanh']['name'];
        move_uploaded_file($_FILES['hinhanh']['tmp_name'], 'images/' . $hinhanh);
        } else {
        // Sử dụng hình ảnh hiện tại nếu không có hình ảnh mới được tải lên
        $hinhanh = $_POST['anh'];
        }
        // Lấy các giá trị từ form
        $id = $_POST['id'];
        $name = $_POST['name'];
        $gia = $_POST['gia'];
        $matg = $_POST['matg'];
        $matl = $_POST['matl'];
        $manhasx = $_POST['manhasx'];
        $namxb = $_POST['namxb'];
        $mota = $_POST['editor1'];

        // Thực hiện truy vấn SQL để cập nhật thông tin sách
        $sql = "UPDATE sach
        SET tenSach='$name', giaSach='$gia', hinhAnh='$hinhanh', maTG='$matg', maTL='$matl', maNXB='$manhasx', namXuatBan='$namxb', mota='$mota'
        WHERE maSach='$id'";

        // Thực thi truy vấn
        if ($conn->query($sql) === TRUE) {
        // Nếu thành công, chuyển hướng trở lại trang quản lý sách
            header('Location: ad_qlsach.php');
            exit(); // Đảm bảo không có mã HTML nào được xuất ra sau khi chuyển hướng
        } else {
        // Nếu có lỗi, in ra thông báo lỗi
            echo "Error updating record: " . $conn->error;
        }
        $conn->close();
    }

?>





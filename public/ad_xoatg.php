<?php
require '../src/myconnect.php';

// Kiểm tra xem có tham số id được truyền không
if (isset($_GET['id'])) {
    // Sử dụng Prepared Statements để thực thi truy vấn SQL an toàn
    $id = $_GET['id'];
    $sql = "DELETE FROM tacGia WHERE maTG = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id); // i đại diện cho kiểu dữ liệu INTEGER
    // Thực thi truy vấn
    if ($stmt->execute()) {
        // Nếu thành công, chuyển hướng trở lại trang quản lý sách
        header('Location: ad_qltg.php');
        exit();
    } else {
        // Nếu có lỗi, in ra thông báo lỗi
        echo "Error deleting record: " . $stmt->error;
    }
    // Đóng câu lệnh prepared
    $stmt->close();
} else {
    // Xử lý khi không có hoặc id không hợp lệ
    echo "Invalid id";
}

// Đóng kết nối
$conn->close();
?>
<script>
    // Hiển thị thông báo khi xóa thành công (có thể không cần thiết)
    alert("Xóa thành công");
</script>
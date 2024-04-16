<?php
require '../src/myconnect.php';
if (isset($_GET['id'])) {
  
    $id = $_GET['id'];
    $sql = "DELETE FROM sach WHERE maSach = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $id); 
    if ($stmt->execute()) {
    
        header('Location: ad_qlsach.php');
        exit();
    } else {

        echo "Error deleting record: " . $stmt->error;
    }

    $stmt->close();
} else {

    echo "Invalid id";
}

$conn->close();
?>
<script>

    alert("Xóa thành công");
</script>
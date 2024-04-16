<?php
ob_start();
?>
<?php
include "../src/partials/ad_head.php";
?>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
        include "../src/partials/ad_header.php";
        ?>

        <div class="row flex">
            <div class="col-md-2">
                <?php
                include "../src/partials/ad_aside.php";
                ?>
            </div>
            <div class="content-wrapper col-md-10">
                <!-- Content Header (Page header) -->

                <section class="content-header">
                    <h4>
                        Danh sách
                        <small class="light">hóa đơn</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_dshd.php"><i class="ion-printer"></i> Danh sách </a></li>
                        <li class="active"> > Chi tiết hóa đơn</li>
                    </ol>
                </section>
                 <hr>


                <!-- Main content -->
                <section class="content">
                    <div class="row">

                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title" style="text-align: center"> Chi tiết hóa đơn</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->

                                <?php
                                require '../src/myconnect.php';
                                // Kiểm tra biến $_GET['soHD'] có tồn tại không
                                if (isset($_GET['soHD'])) {
                                    // Sử dụng hàm mysqli_real_escape_string để tránh SQL Injection
                                    $soHD = mysqli_real_escape_string($conn, $_GET["soHD"]);

                                    // Truy vấn SQL sử dụng Prepared Statements
                                    $query = "SELECT ct.id_CTHD, s.tenSach, s.giaSach, ct.soLuong, ct.thanhTien
                                        FROM CTHD ct
                                        JOIN hoadon hd ON hd.soHD = ct.soHD
                                        JOIN sach s ON s.maSach = ct.maSach
                                        WHERE hd.soHD = ?";
                                    $stmt = $conn->prepare($query);
                                    $stmt->bind_param("s", $soHD);
                                    $stmt->execute();
                                    $result = $stmt->get_result();

                                    // Kiểm tra có kết quả trả về không
                                    if ($result->num_rows > 0) {
                                ?>
                                        <!-- Hiển thị bảng dữ liệu -->
                                        <table class="table table-bordered mr-3">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>Mã chi tiết hóa đơn</th>
                                                    <th>Tên sách</th>
                                                    <th>Giá sách</th>
                                                    <th>Số lượng</th>
                                                    <th>Thành tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                // Tạo biến tổng tiền
                                                $totalPrice = 0;
                                                while ($row = $result->fetch_assoc()) {
                                                    // Cộng thêm giá trị thành tiền vào tổng tiền
                                                    $totalPrice += $row['thanhTien'];
                                                ?>
                                                    <!-- Hiển thị dữ liệu trong từng hàng của bảng -->
                                                    <tr>
                                                        <td><?php echo $row['id_CTHD']; ?></td>
                                                        <td><?php echo $row['tenSach']; ?></td>
                                                        <td><?php echo $row['giaSach']; ?></td>
                                                        <td><?php echo $row['soLuong']; ?></td>
                                                        <td><?php echo $row['thanhTien']; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                        <!-- Hiển thị tổng tiền -->
                                        <p id="toltal">Tổng  tiền: <?php echo   $totalPrice . '.000 ĐỒNG' ?></p>

                                <?php
                                    } else {
                                        echo "Không có dữ liệu.";
                                    }

                                    // Đóng kết nối và câu truy vấn
                                    $stmt->close();
                                } else {
                                    echo "Thiếu thông tin về số hóa đơn.";
                                }
                                ?>
                            </div><!-- /.box -->
                            <!-- general form elements disabled -->
                            <!-- /.box -->
                        </div><!--/.col (right) -->
                    </div> <!-- /.row -->
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include "../src/partials/ad_footer.php";
            ?>

        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.4 -->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <script>
            $(function() {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace('editor1');
                //bootstrap WYSIHTML5 - text editor
                $(".textarea").wysihtml5();
            });
        </script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
</body>
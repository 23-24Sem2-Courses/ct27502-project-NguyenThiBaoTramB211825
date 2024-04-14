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

            <div class="content-wrapper col-md-10 p-2">
                <!-- Content Header (Page header) -->

                <?php
                require '../src/myconnect.php';

                // Kiểm tra xem có tham số id được truyền không
                if (isset($_GET["id"])) {
                    // Sử dụng Prepared Statements để thực thi truy vấn SQL an toàn
                    $id = $_GET["id"];
                    $query = "SELECT s.maSach, s.tenSach, s.giaSach, s.hinhAnh, tg.tenTG, tl.tenTL, nxb.tenNXB, s.namXuatBan, s.mota
                    FROM sach s
                    JOIN theLoai tl ON s.maTL = tl.maTL
                    JOIN tacGia tg ON s.maTG = tg.maTG
                    JOIN nhaXuatBan nxb ON s.maNXB = nxb.maNXB
                    WHERE s.maSach = ?";

                    // Chuẩn bị truy vấn
                    $stmt = $conn->prepare($query);
                    // Bind tham số
                    $stmt->bind_param("s", $id); // i đại diện cho kiểu dữ liệu INTEGER
                    // Thực thi truy vấn
                    $stmt->execute();
                    // Lấy kết quả
                    $result = $stmt->get_result();
                    // Lấy dòng dữ liệu
                    $row = $result->fetch_assoc();
                    // Đóng kết nối và giải phóng bộ nhớ
                    $stmt->close();
                } else {
                    // Xử lý khi không có hoặc id không hợp lệ
                    echo "Invalid id";
                }

                // Đóng kết nối
                $conn->close();
                ?>

                <section class="content-header">
                    <h4>
                        Quản lý
                        <small class="light">Sách</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qlsach.php"><i class="fa fa-dashboard"></i> Quản lý sách</a></li>
                        <li class="active"> > Chi tiết sách</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->

                        <!-- right column -->

                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Chi tiết Sách</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal">
                                    <div class="box-body">
                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center">Tên:</label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["tenSach"] ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center ">Giá:</label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["giaSach"] ?>.000 VNĐ</p>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center">Hình ảnh:</label>
                                            <div class="col-sm-6">
                                                <p><img src="images/<?php echo $row["hinhAnh"] ?>" style="width:300px;height:300px"></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center">Tác giả:</label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["tenTG"] ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center ">Thể loại:</label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["tenTL"] ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center">Nhà xuất bản:</label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["tenNXB"] ?></p>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center">Năm xuất bản:</label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["namXuatBan"] ?></p>
                                            </div>
                                        </div>


                                        <div class="form-group d-flex">
                                            <label class="col-sm-4 text-center">Mô tả: </label>
                                            <div class="col-sm-6">
                                                <p><?php echo $row["mota"] ?></p>
                                            </div>

                                        </div>
                                    </div><!-- /.box-body -->
                                    <div class="box-footer ">
                                        <a href="ad_qlsach.php"><button type="button" name="cancel" class="btn btn-info">Return</button></a>
                                    </div><!-- /.box-footer -->
                                </form>
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

</html>
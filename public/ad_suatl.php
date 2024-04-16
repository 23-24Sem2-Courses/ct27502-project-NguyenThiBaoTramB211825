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

            <div class="content-wrapper col-md-10 p-2">
                <!-- Content Header (Page header) -->
                <?php
                require '../src/myconnect.php';
                // Kiểm tra xem có tham số id được truyền không
                if (isset($_GET["id"])) {
                    // Sử dụng prepared statements để thực thi truy vấn SQL an toàn
                    $id = $_GET["id"];
                    $query = "SELECT *
                                FROM theLoai tl
                                WHERE tl.maTL = ?";

                    // Chuẩn bị truy vấn
                    $stmt = $conn->prepare($query);
                    // Bind tham số
                    $stmt->bind_param("s", $id);
                    // Thực thi truy vấn
                    $stmt->execute();
                    // Lấy kết quả
                    $result = $stmt->get_result();
                    // Kiểm tra số dòng trả về
                    if ($result->num_rows > 0) {
                        // Lấy dòng dữ liệu
                        $row = $result->fetch_assoc();
                    } else {
                        // Xử lý khi không có dữ liệu trả về
                        echo "Không có thông tin thể loại được tìm thấy";
                    }
                    // Đóng kết nối và giải phóng bộ nhớ
                    $stmt->close();
                } else {
                    // Xử lý khi không có hoặc id không hợp lệ
                    echo "Không có thông tin thể loại được tìm thấy";
                }


                ?>
                <section class="content-header">
                    <h4>
                        Quản lý
                        <small class="light">Thể loại</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qltl.php"><i class="fa-regular fa-tablet"></i> Quản lý thể loại</a></li>
                        <li class="active"> > Sửa</li>
                    </ol>
                </section>
                <hr>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->

                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Sửa thể loại</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal ad_suasp" method="POST" action="ad_xulysuatl.php" enctype=" multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group d-flex  ">
                                            <label for="inputEmail3" class="offset-sm-2 col-sm-1 control-label">Tên</label>
                                            <div class="col-sm-6">
                                                <input type="hidden" name="maTL" value="<?php echo $row["maTL"]; ?>">
                                                <input type="text" class="form-control" name="tenTL" value="<?php echo $row["tenTL"] ?>" required>
                                            </div>
                                        </div>

                                        <div class="box-footer text-center">
                                            <a href="ad_qltl.php">
                                                <button type="button" name="cancel" class="btn btn-danger m-2">Cancel</button>
                                            </a>
                                            <button type="submit" name="Edit" class="btn btn-info">Edit</button>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box-footer -->
                                </form>
                            </div><!-- /.box -->
                            <!-- general form elements disabled -->
                            <!-- /.box -->
                        </div><!--/.col (right) -->
                    </div> <!-- /.row -->
                </section><!-- /.content -->

                <?php
                include "../src/partials/ad_footer.php";
                ?>


            </div><!-- /.content-wrapper -->
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
<?php ob_end_flush(); ?>
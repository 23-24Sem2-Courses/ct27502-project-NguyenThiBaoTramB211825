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
                    $query = "SELECT nxb.maNXB, nxb.tenNXB, nxb.diaChi, nxb.email
                                FROM nhaXuatBan nxb
                                WHERE nxb.maNXB = ?";

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
                        echo "Không có thông tin nhà xuất bản được tìm thấy";
                    }
                    // Đóng kết nối và giải phóng bộ nhớ
                    $stmt->close();
                } else {
                    // Xử lý khi không có hoặc id không hợp lệ
                    echo "Không có thông tin nhà xuất bản được tìm thấy";
                }
                ?>
                <section class="content-header">
                    <h4>
                        Quản lý
                        <small class="light">Nhà xuất bản</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qlnxb.php"><i class="fa-solid fa-list"></i> Quản lý nhà xuất bản</a></li>
                        <li class="active"> > Sửa </li>
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
                                    <h3 class="box-title">Sửa nhà xuất bản</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="POST" action="<?php include 'ad_xulysuanxb.php' ?>" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group d-flex  ">
                                            <label for="inputEmail3" class="col-sm-2 control-label text-center">Tên</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" value="<?php echo $row["tenNXB"] ?>" required>
                                            </div>
                                        </div>


                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class="col-sm-2 control-label text-center">Địa chỉ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="diachi" required value="<?php echo $row["diaChi"] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class="col-sm-2 control-label text-center">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" required value="<?php echo $row["email"] ?>">
                                            </div>
                                        </div>


                                        <div class="box-footer text-center">
                                            <a href="ad_qlnxb.php">
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
</body>

</html>
<?php ob_end_flush(); ?>
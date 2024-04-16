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
                    $query = "SELECT s.maSach, s.tenSach, s.giaSach, s.hinhAnh, tg.tenTG, tl.tenTL, nxb.tenNXB, s.namXuatBan, s.mota
                                FROM sach s
                                JOIN theLoai tl ON s.maTL = tl.maTL                                               
                                JOIN tacGia tg ON s.maTG = tg.maTG
                                JOIN nhaXuatBan nxb ON s.maNXB = nxb.maNXB
                                WHERE s.maSach = ?";

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
                        echo "Không có thông tin sách được tìm thấy";
                    }
                    // Đóng kết nối và giải phóng bộ nhớ
                    $stmt->close();
                } else {
                    // Xử lý khi không có hoặc id không hợp lệ
                    echo "Không có thông tin sách được tìm thấy";
                }


                ?>
                <section class="content-header">
                    <h4>
                        Quản lý
                        <small class="light">Sách</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qlsach.php"><i class="fa fa-dashboard"></i> Quản lý sách</a></li>
                        <li class="active"> > Sửa sách</li>
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
                                    <h3 class="box-title">Sửa Sách</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal  ad_suasp" method="POST" action="<?php include 'ad_xulysuasp.php' ?>" enctype="multipart/form-data">
                                    <div class="box-body">

                                        <!-- sach (maSach,tenSach,giaSach,hinhAnh, maTG, maTL, maNXB, namXuatBan, mota) -->
                                        <div class="form-group d-flex  ">
                                            <label for="inputEmail3" class=" offset-sm-2 col-sm-1 control-label ">Tên</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" value="<?php echo $row["tenSach"] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class=" offset-sm-2 col-sm-1 control-label ">Giá</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="gia" required value="<?php echo $row["giaSach"] ?>">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class=" offset-sm-2 col-sm-1 control-label ">Hình ảnh</label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" name="hinhanh" value="<?php echo $row["hinhAnh"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class=" offset-sm-2 col-sm-1 control-label ">Ảnh hiện tại: </label>
                                            <div class="col-sm-6">
                                                <img src="images/<?php echo $row["hinhAnh"] ?>" style="width:300px;height:300px">
                                            </div>
                                            <input type="hidden" class="form-control" name="anh" value="<?php echo $row["hinhAnh"] ?>">
                                            <input type="hidden" class="form-control" name="id" value="<?php echo $row["maSach"] ?>">
                                        </div>


                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class=" offset-sm-2 col-sm-1 control-label ">Tác giả</label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" style="width: 100%;" name="matg">
                                                    <?php
                                                    require '../src/myconnect.php';
                                                    // Thực hiện truy vấn SQL để lấy dữ liệu nhà xuất bản
                                                    $sqls = "SELECT maTG, tenTG FROM tacGia";
                                                    $results = $conn->query($sqls);
                                                    if ($results->num_rows > 0) {
                                                        // Hiển thị tất cả các nhà xuất bản trong select option
                                                        while ($rows = $results->fetch_assoc()) {
                                                            // Kiểm tra xem có dòng dữ liệu nào được chọn trước đó không
                                                            if (isset($row) && $row["maTG"] == $rows["maTG"]) {
                                                                // Nếu có, hiển thị dòng dữ liệu đó làm giá trị mặc định
                                                                echo '<option selected="selected" value="' . $rows["maTG"] . '">' . $rows["tenTG"] . '</option>';
                                                            } else {
                                                                // Nếu không, hiển thị các dòng dữ liệu khác
                                                                echo '<option value="' . $rows["maTG"] . '">' . $rows["tenTG"] . '</option>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Thể loại</label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" style="width: 100%;" name="matl">
                                                    <?php
                                                    require '../src/myconnect.php';
                                                    // Thực hiện truy vấn SQL để lấy dữ liệu thể loại
                                                    $sqls = "SELECT maTL, tenTL FROM theLoai";
                                                    $results = $conn->query($sqls);
                                                    if ($results->num_rows > 0) {
                                                        // Hiển thị tất cả các nhà xuất bản trong select option
                                                        while ($rows = $results->fetch_assoc()) {
                                                            // Kiểm tra xem có dòng dữ liệu nào được chọn trước đó không
                                                            if (isset($row) && $row["maTL"] == $rows["tenTL"]) {
                                                                // Nếu có, hiển thị dòng dữ liệu đó làm giá trị mặc định
                                                                echo '<option selected="selected" value="' . $rows["maTL"] . '">' . $rows["tenTL"] . '</option>';
                                                            } else {
                                                                // Nếu không, hiển thị các dòng dữ liệu khác
                                                                echo '<option value="' . $rows["maTL"] . '">' . $rows["tenTL"] . '</option>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Nhà xuất bản</label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" style="width: 100%;" name="manhasx">
                                                    <?php
                                                    require '../src/myconnect.php';
                                                    // Thực hiện truy vấn SQL để lấy dữ liệu nhà xuất bản
                                                    $sqls = "SELECT maNXB, tenNXB FROM nhaXuatBan";
                                                    $results = $conn->query($sqls);
                                                    if ($results->num_rows > 0) {
                                                        // Hiển thị tất cả các nhà xuất bản trong select option
                                                        while ($rows = $results->fetch_assoc()) {
                                                            // Kiểm tra xem có dòng dữ liệu nào được chọn trước đó không
                                                            if (isset($row) && $row["maNXB"] == $rows["maNXB"]) {
                                                                // Nếu có, hiển thị dòng dữ liệu đó làm giá trị mặc định
                                                                echo '<option selected="selected" value="' . $rows["maNXB"] . '">' . $rows["tenNXB"] . '</option>';
                                                            } else {
                                                                // Nếu không, hiển thị các dòng dữ liệu khác
                                                                echo '<option value="' . $rows["maNXB"] . '">' . $rows["tenNXB"] . '</option>';
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Năm xuất bản</label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="namxb" required value="<?php echo $row["namXuatBan"] ?>">
                                            </div>
                                        </div>

                                        <div class="form-group d-flex ">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Mô tả</label>
                                            <div class="col-sm-6">
                                                <textarea id="editor1" name="editor1" name="editor1" rows="10" cols="80">
                                                <?php echo $row["mota"] ?>
                                                </textarea>
                                            </div>
                                        </div>

                                        <div class="box-footer text-center">
                                            <a href="ad_qlsach.php">
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
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

        <!-- Left side column. contains the logo and sidebar -->

        <div class="row flex">
            <div class="col-md-2">
                <?php
                include "../src/partials/ad_aside.php";
                ?>
            </div>
            <div class="content-wrapper col-md-10 p-2">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        Thêm
                        <small class="light">Sách</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qlsach.php"><i class="fa fa-dashboard"></i>  Quản lý sách</a></li>
                        <li class="active"> > Thêm sách</li>
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
                                    <h3 class="box-title">Thêm Sách</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal ad_themsp" method="POST" action="<?php include 'ad_xulyluasp.php' ?>" enctype="multipart/form-data">
                                    <div class="box-body">
                                        <div class="form-group d-flex ">
                                            <label for="idsach" class="offset-sm-2 col-sm-1 control-label ">ID: </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="maSach" placeholder="Nhập ID sách" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex ">
                                            <label for="inputEmail3" class="offset-sm-2 col-sm-1 control-label ">Tên: </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="name" placeholder="Nhập tên sách" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Giá: </label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="gia" placeholder="Nhập giá sách">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Hình ảnh: </label>
                                            <div class="col-sm-6">
                                                <input type="file" class="form-control" placeholder="Chọn tiệp" name="hinhanh" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Tác giả: </label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" style="width: 100%;" name="matg">
                                                    <option selected="selected" value="3">Chọn Tác giả</option>
                                                    <?php
                                                    require '../src/myconnect.php';
                                                    $sql = "SELECT maTG, tenTG from tacGia";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $row["maTG"] ?>"><?php echo $row["tenTG"] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Thể loại: </label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" style="width: 100%;" name="matl">
                                                    <option selected="selected" value="3">Chọn thể loại</option>
                                                    <?php
                                                    require '../src/myconnect.php';
                                                    $sql = "SELECT maTL, tenTL from theLoai";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $row["maTL"] ?>"><?php echo $row["tenTL"] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Nhà xuất bản: </label>
                                            <div class="col-sm-6">
                                                <select class="form-control select2" style="width: 100%;" name="manhasx">
                                                    <option selected="selected" value="3">Chọn Nhà xuất bản</option>
                                                    <?php
                                                    require '../src/myconnect.php';
                                                    $sql = "SELECT maNXB,tenNXB from nhaXuatBan";
                                                    $result = $conn->query($sql);
                                                    if ($result->num_rows > 0) {
                                                        // output data of each row
                                                        while ($row = $result->fetch_assoc()) {
                                                    ?>
                                                            <option value="<?php echo $row["maNXB"] ?>"><?php echo $row["tenNXB"] ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Năm xuất bản: </label>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" name="namxb" placeholder="Nhập năm xuất bản">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex">
                                            <label for="inputPassword3" class="offset-sm-2 col-sm-1 control-label ">Mô tả: </label>
                                            <div class="col-sm-6">
                                                <textarea id="editor1" name="editor1" rows="10" cols="80">
                                                    Nhập mô tả
                                                 </textarea>
                                            </div>
                                        </div>
                                        <div class="box-footer text-center">
                                            <a href="ad_qlsach.php"><button type="button" name="cancel" class="btn btn-danger m-3 ">Cancel</button></a>
                                            <button type="submit" name="create" class="btn btn-info">Create</button>
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
        <script src="../../dist/js/demo.js"></script>
</body>

</html>
<?php ob_end_flush(); 
?>
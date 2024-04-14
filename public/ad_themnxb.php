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
                <section class="content-header">
                    <h4>
                        Quản lý
                        <small class="light">Nhà xuất bản</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qlnxb.php"><i class="fa-solid fa-list"></i> Quản lý nhà xuất bản</a></li>
                        <li class="active"> > Thêm</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Horizontal Form -->
                            <div class="box box-info">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Thêm Nhà xuất bản</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="POST" action="<?php include 'ad_xulynxb.php' ?>">
                                    <div class="box-body m-5">
                                        <div class="form-group d-flex m-2 ">
                                            <label for="idsach" class="col-sm-2 control-label text-center">ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="manhasx" placeholder="Nhập ID nhà xuất bản" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex  m-2">
                                            <label for="idsach" class="col-sm-2 control-label text-center">Tên NXB</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" placeholder="Nhập ten nhà xuất bản" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex m-2 ">
                                            <label for="idsach" class="col-sm-2 control-label text-center">Địa chỉ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="diachi" placeholder="Nhập địa chỉ nhà xuất bản" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex m-2 ">
                                            <label for="idsach" class="col-sm-2 control-label text-center">Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="email" placeholder="Nhập email nhà xuất bản" required>
                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->
                                    <div class="box-footer text-center">
                                        <a href="ad_qlnxb.php"><button type="button" name="cancel" class="btn btn-danger m-3 ">Cancel</button></a>
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
</body>

</html>
<?php ob_end_flush(); ?>
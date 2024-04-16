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
                        <small class="light">Tác giả</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qltg.php"><i class="fa-solid fa-people-group"></i> Quản lý tác giả</a></li>
                        <li class="active"> > Thêm</li>
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
                                    <h3 class="box-title">Thêm Tác giả</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="POST" action="<?php include 'ad_xulytg.php' ?>">
                                    <div class="box-body m-5">
                                        <div class="form-group d-flex m-2 ">
                                            <label for="maTG" class="offset-sm-2 col-sm-1 control-label">ID</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="maTG" placeholder="Nhập ID tác giả" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex  m-2">
                                            <label for="tenTG" class="offset-sm-2 col-sm-1 control-label">Tên tác giả</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="tenTG" placeholder="Nhập tên tác giả" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex m-2 ">
                                            <label for="website" class="offset-sm-2 col-sm-1 control-label">website</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="website" placeholder="Nhập website" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex m-2 ">
                                            <label for="ghiChu" class="offset-sm-2 col-sm-1 control-label">Ghi chú</label>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" name="ghiChu" placeholder="Nhập ghi chú " required>
                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->
                                    <div class="box-footer text-center">
                                        <a href="ad_qltg.php"><button type="button" name="cancel" class="btn btn-danger m-3 ">Cancel</button></a>
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
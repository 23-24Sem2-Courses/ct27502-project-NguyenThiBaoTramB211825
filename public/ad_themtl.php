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
                        <small class="light">Thể loại</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-home"></i> Home > </a></li>
                        <li><a href="ad_qltl.php"><i class="fa-regular fa-tablet"></i> Quản lý thể loại</a></li>
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
                                    <h3 class="box-title">Thêm Thể loại</h3>
                                </div><!-- /.box-header -->
                                <!-- form start -->
                                <form class="form-horizontal" method="POST" action="<?php include 'ad_xulytl.php' ?>">
                                    <div class="box-body m-5">
                                        <div class="form-group d-flex m-2 ">
                                            <label for="maTL" class="col-sm-2 control-label text-center">ID</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="maTL" placeholder="Nhập ID thể loại" required>
                                            </div>
                                        </div>
                                        <div class="form-group d-flex  m-2">
                                            <label for="tenTL" class="col-sm-2 control-label text-center">Tên thể loại</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="tenTL" placeholder="Nhập tên thể loại" required>
                                            </div>
                                        </div>

                                    </div><!-- /.box-body -->
                                    <div class="box-footer text-center">
                                        <a href="ad_qltl.php"><button type="button" name="cancel" class="btn btn-danger m-3 ">Cancel</button></a>
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
<?php
ob_start();
?>
<?php
include "../src/partials/ad_head.php";
?>
<?php
require "ad_loginAdmin.php";
if (!isset($_SESSION['tenDN']))
{
    header("Location:ad_login.php");
}

?>

<body >
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
            <div class="content-wrapper col-md-10">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        Trang quản trị
                        <small class="light">Admin</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">> Trang quản trị</li>
                    </ol>
                </section>
                <hr>

                <!-- Main content -->
                <section class="content_sach">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-xs-6 bg-primary m-4 rounded-3 p-2">
                            <!-- small box -->
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>Quản lý</h3>
                                    <p>Sách</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-book"></i>
                                </div>
                                <a href="ad_qlsach.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 bg-danger m-4 rounded-3 p-2">
                            <div class="small-box bg-aqua">
                                <div class="inner">
                                    <h3>Quản lý</h3>
                                    <p>Tác giả</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-solid fa-people-group"></i>
                                </div>
                                <a href="ad_qltg.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 bg-warning m-4 rounded-3 p-2">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>Quản lý</h3>
                                    <p>Nhà xuất bản</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-ios-home"></i>
                                </div>
                                <a href="ad_qlnxb.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 bg-warning m-4 rounded-3 p-2">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>Quản lý</h3>
                                    <p>Thể loại</p>
                                </div>
                                <div class="icon">
                                    <i class="fa-regular fa-tablet"></i>
                                </div>
                                <a href="ad_qltl.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->

                        <div class="col-lg-3 col-xs-6 m-4 bg-primary rounded-3 p-2">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>Danh Sách</h3>
                                    <p>Khách hàng</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-person-stalker"></i>
                                </div>
                                <a href="ad_dskh.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                        <div class="col-lg-3 col-xs-6 m-4 bg-danger rounded-3 p-2">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>Danh Sách</h3>
                                    <p>Hóa đơn</p>
                                </div>
                                <div class="icon">
                                    <i class="ion-printer"></i>
                                </div>
                                <a href="ad_dshd.php" class="small-box-footer">Xem chi tiết <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                    <!-- Main row -->

                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->

        </div>

        <?php
        include "../src/partials/ad_footer.php";
        ?>


</body>

</html>
<?php ob_end_flush(); ?>
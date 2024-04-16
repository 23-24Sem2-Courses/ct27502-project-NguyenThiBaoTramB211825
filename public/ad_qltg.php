<?php
ob_start();
?>

<?php
include "../src/partials/ad_head.php";
?>

<body>
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
                        <li><a href="ad_index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">> Quản lý tác giả</li>
                    </ol>
                </section>
                <hr>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Quản lý Tác giả</h3>
                                </div><!-- /.box-header -->
                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-left m-1">
                                        <a class="btn btn-primary " href="ad_themtg.php">
                                            Thêm tác giả</a>
                                    </div>
                                    <div class="box-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>
                                                        <p class="align-center">Mã tác giả</p>
                                                    </th>
                                                    <th>
                                                        <p class="align-center">Tên tác giả</p>
                                                    </th>
                                                    <th>
                                                        <p class="align-center">Website</p>
                                                    </th>
                                                    <th>
                                                        <p class="align-center ">Ghi Chú</p>
                                                    </th>
                                                    <th>
                                                        <p class="align-center ">Tác vụ</p>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                require '../src/myconnect.php';
                                                $sql = "SELECT *
                                            from tacGia tg
                                             ORDER BY tg.maTG";

                                                $result = $conn->query($sql);
                                                if ($result->num_rows > 0) {
                                                    // output data of each row
                                                    while ($row = $result->fetch_assoc()) {
                                                ?>
                                                        <tr>
                                                            <td><?php echo $row["maTG"] ?></td>
                                                            <td><?php echo $row["tenTG"] ?></td>
                                                            <td><?php echo $row["website"] ?></td>
                                                            <td><?php echo $row["ghiChu"] ?></td>
                                                            <td class="d-block">
                                                                <a class="btn btn-primary m-2" href="ad_suatg.php?id=<?php echo $row["maTG"] ?>">
                                                                    <i class="fa fa-edit fa-lg" <acronym title="Chỉnh sửa"></acronym> </i>

                                                                </a>
                                                                <a class="btn btn-danger m-2" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="ad_xoatg.php?id=<?php echo $row["maTG"]  ?>" onclick="myFunction()">
                                                                    <i class="fa fa-trash-o fa-lg" <acronym title="Xóa"> </acronym></i>
                                                                </a>
                                                            </td>
                                                            </td>
                                                    <?php
                                                    }
                                                }
                                                    ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.box-body -->


                                </div><!-- /.box -->

                            </div><!-- /.col -->
                        </div><!-- /.row -->
                </section>
                <!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include "../src/partials/ad_footer.php";
            ?>
            <!-- Control Sidebar -->

            <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div><!-- ./wrapper -->

        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.5 -->
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- DataTables -->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="plugins/fastclick/fastclick.min.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <!-- page script -->
        <script>
            $(function() {
                $("#example1").DataTable();
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });
            });
        </script>
        <script>
            function myFunction() {
                alert("Xóa thành công");
            }
        </script>
</body>

</html>
<?php ob_end_flush(); ?>
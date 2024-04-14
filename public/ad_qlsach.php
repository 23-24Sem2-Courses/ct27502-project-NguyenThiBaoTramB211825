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
                        <small class="light">Sách</small>
                    </h4>
                    <ol class="breadcrumb">
                        <li><a href="ad_index.php"><i class="fa-solid fa-house"></i> Home</a></li>
                        <li class="active">> Quản lý sách</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Quản lý Sách</h3>
                                </div><!-- /.box-header -->

                                <div class="row mb-3">
                                    <div class="col d-flex justify-content-left">
                                        <a class="btn btn-primary " href="ad_themsp.php">
                                            Thêm Sách</a>
                                    </div>
                                </div>

                                <div class="box-body">

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>
                                                    <p class="align-center">Tên</p>
                                                </th>
                                                <th>
                                                    <p class="align-center">Giá</p>
                                                </th>
                                                <th>
                                                    <p class="align-center ">Hình ảnh</p>
                                                </th>
                                                <th>
                                                    <p class="align-center">Tác giả</p>
                                                </th>
                                                <th>
                                                    <p class="align-center">Thể loại</p>
                                                </th>
                                                <th>
                                                    <p class="align-center ">Nhà xuất bản</p>
                                                </th>
                                                <th>
                                                    <p class="align-center">Năm xuất bản</p>
                                                </th>
                                                <th>
                                                    <p class="align-center">Tác vụ</p>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require '../src/myconnect.php';
                                            $sql = "SELECT s.maSach,s.tenSach,s.giaSach,s.hinhAnh,tg.tenTG, tl.tenTL, nxb.tenNXB, s.namXuatBan, s.mota
                                            from sach s
                                            JOIN theLoai tl on s.maTL = tl.maTL                                               
                                            join tacGia tg on s.maTG = tg.maTG
                                            join nhaXuatBan nxb on s.maNXB = nxb.maNXB
                                             ORDER BY s.tenSach ";

                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><a href="ad_chitietsp.php?id=<?php echo $row["maSach"] ?>" style="color:black"><?php echo $row["tenSach"] ?></a></td>
                                                        <td><?php echo $row["giaSach"] ?></td>
                                                        <td><img src="images/<?php echo $row["hinhAnh"] ?>" style="width:100px;height:100px"></td>
                                                        <td><?php echo $row["tenTG"] ?></td>
                                                        <td><?php echo $row["tenTL"] ?></td>
                                                        <td><?php echo $row["tenNXB"] ?></td>
                                                        <td><?php echo $row["namXuatBan"] ?></td>
                                                        <td class="d-block">
                                                            <a class="btn btn-primary m-2" href="ad_suasp.php?id=<?php echo $row["maSach"] ?>">
                                                                <i class="fa fa-edit fa-lg" <acronym title="Chỉnh sửa"></acronym> </i>

                                                            </a>
                                                            <a class="btn btn-danger m-2" onclick="return confirm('Bạn có thật sự muốn xóa không ?');" href="ad_xoasp.php?id=<?php echo $row["maSach"]  ?>" onclick="myFunction()">
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
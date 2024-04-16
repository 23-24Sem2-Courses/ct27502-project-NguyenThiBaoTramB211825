<?php
ob_start();

?>
<?php
require "login.php";
if (!isset($_SESSION['txtus'])) {
    header("Location:account.php");
}
?>

<?php
include __DIR__ . '/../src/partials/header.php';
?>

<form name="form6" id="ff6" method="POST" action="<?php include 'orderSave.php' ?>">
    <div id="page-content" class="single-page">

        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Trang chủ</a></li>
                        <li><a style="text-align:center">Xác nhận đơn hàng</a></li>
                    </ul>
                </div>
            </div>

            <div class="row">

                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin khách hàng</div>
                        <div class="panel-body">
                            <div class="col-md-8" style="margin-left: 130px;">
                                <label>Tên khách hàng : <?php echo  $_SESSION['hoTen'] ?></label>
                                <label>Số điện thoại: <?php echo  $_SESSION['dienThoai'] ?></label>
                                <label>Email:<?php echo    $_SESSION['emaildn'] ?></label>
                                <label><input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng   :" name="diachi" required></label>
                                <br />

                                <label><input type="date" class="form-control" placeholder="Ngày giao  :" name="date" id="datechoose" required></label>
                                <label> Hình thức thanh toán :<select class="selectpicker" name="hinhthuctt">
                                        <option value="ATM">Chuyển khoản</option>
                                        <option value="Live">Thanh toán khi giao hàng (COD)</option>
                                        </optgroup>
                                    </select>
                                </label>

                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin đơn hàng</div>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sách</th>
                                                <th>Số lượng</th>
                                                <th>Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($_SESSION['cart'])) {
                                                foreach ($_SESSION['cart'] as $key  => $value) {
                                                    $item[] = $key;
                                                }
                                                // echo $item;
                                                $str = implode(",", $item);
                                                $query = "SELECT s.maSach,s.tenSach,s.giaSach,s.hinhAnh,s.mota, n.tenNXB,s.maNXB from sach s 
                                                LEFT JOIN nhaXuatBan n on n.maNXB = s.maNXB
                                                WHERE  s.maSach  in ($str)";
                                                $result = $conn->query($query);

                                                $total = 0;
                                                foreach ($result as $s) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $s["tenSach"] ?></td>
                                                        <td><?php echo $_SESSION['cart'][$s["maSach"]] ?></td>
                                                        <td><?php echo $s["giaSach"] ?>.000 VND</td>
                                                    </tr>
                                                    <?php $total += $_SESSION['cart'][$s["maSach"]] * $s["giaSach"]  ?>
                                            <?php
                                                }
                                            } ?>
                                        </tbody>
                                    </table>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Thành tiền:</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                                <th name="result" style="color:red"><strong style="color:red" id="result" name="total"><?php echo  $total    ?>.000 VND</strong></th>
                                                <input type="hidden" id="thannhtien" name="totalkcodv" value="<?php echo  $total    ?>" />
                                                <input type="hidden" name="total" id="total" value="" />
                                                <input type="hidden" name="madv" id="madv" value="" />
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading">Sách (<?php echo count($_SESSION['cart']) ?>)</div>
                    <div class="panel-body">
                        <?php

                        require "../src/myconnect.php";

                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key  => $value) {
                                $item[] = $key;
                            }
                            // echo $item;
                            $str = implode(",", $item);
                            $query = "SELECT s.maSach,s.tenSach,s.giaSach,s.hinhAnh,s.mota, n.tenNXB,s.maNXB from sach s 
                            LEFT JOIN nhaXuatBan n on n.maNXB = s.maNXB
				            WHERE  s.maSach  in ($str)";
                            $result = $conn->query($query);
                            $total = 0;
                            foreach ($result as $s) {
                        ?>
                                <div class="product well">
                                    <div class="col-md-3">
                                        <div class="image">
                                            <img src="images/<?php echo $s["hinhAnh"] ?>" style="width:300px;height:300px" />
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="caption">
                                            <div class="name">
                                                <h3><a href="product.php?id=<?php echo $s["maSach"] ?>"><?php echo $s["tenSach"] ?></a></h3>
                                            </div>
                                            <div class="info">
                                                <ul>
                                                    <li>Nhà xuất bản: <?php echo $s["tenNXB"] ?></li>
                                                </ul>
                                            </div>
                                            <div class="price"><?php echo $s["giaSach"] ?>.000 VND</div>
                                        <?php
                                    }
                                        ?>

                                        <!-- <label>Số lượng: </label>  -->
                                        <input class="form-inline quantity" type="hidden" name="qty[<?php echo $s["maSach"] ?>]" value="<?php echo $_SESSION['cart'][$s["maSach"]] ?>">
                                        <hr>

                                        <lable>Số lượng :<?php echo $_SESSION['cart'][$s["maSach"]] ?></lable>
                                        <input type="hidden" name="idsprm" value="<?php echo $s["maSach"] ?>" />
                                        <input type="hidden" name="dongia" value="<?php echo $s["giaSach"] ?>" />
                                    <?php
                                }
                                    ?>

                                        </div>
                                    </div>

                                    <div class="clear"></div>
                                </div>

                                <?php
                                $total += $_SESSION['cart'][$s["maSach"]] * $s["giaSach"]
                                ?>
                    </div>
                </div>
            </div>
            <input type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" />
        </div>
    </div>
</form>
<?php
include __DIR__ . '/../src/partials/header.php';
?>

<!-- Lấy ngày hiện tại -->
<script>
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();

    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;
    document.getElementById("datechoose").value = today;
</script>

<?php ob_end_flush(); ?>
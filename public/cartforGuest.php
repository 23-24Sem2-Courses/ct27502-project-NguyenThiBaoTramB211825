<?php
ob_start();
?>

<?php
session_start();
include __DIR__ . '/../src/partials/header.php';
?>

<?php
if (is_countable($_SESSION['cart']) == 0) {
    header('Location: emptycart.php');
}
?>
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                    <li><a href="cart.php">Giỏ hàng</a></li>
                </ul>
            </div>
        </div>
        <div class="cart">
            <p><?php
                $ok = 1;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if (isset($key)) {
                            $ok = 2;
                        }
                    }
                }

                if ($ok == 2) {
                    echo "Có " . count($_SESSION['cart']) . " Sách trong giỏ hàng.";
                } else {
                    echo   "<p>Không có Sách nào trong giỏ hàng.</p>";
                }

                $sl = count($_SESSION['cart']);
                ?></p>
        </div>

        <?php
        require '../src/myconnect.php';

        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key  => $value) {
                $item[] = $key;
            }
            $str = implode(",", $item);
            $query = "SELECT s.maSach,s.tenSach,s.giaSach,s.hinhAnh,s.namXuatBan,s.mota,n.tenNXB,s.maNXB
				from sach s 
				LEFT JOIN nhaXuatBan n on n.maNXB = s.maNXB
				WHERE  s.maNXB  in ($str)";
            $result = $conn->query($query);
            $total = 0;
            foreach ($result as $s) {
        ?>

                <div class="row">
                    <form name="form-rm" id="frm" method="post" action="removeFromCart.php">
                        <div class="product well">
                            <div class="col-md-3">
                                <div class="image">
                                    <img src="images/<?php echo $s["hinhAnh"] ?>" style="width: 300px;height:300px" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="caption">
                                    <div class="name">
                                        <h3><a href="product.php?id=<?php echo $s["maNXB"] ?>"><?php echo $s["tenNXB"] ?></a></h3>
                                    </div>
                                    <div class="info">
                                        <ul>
                                            <li>Nhà xuất bản: <?php echo $s["tenNXB"] ?></li>
                                        </ul>
                                    </div>
                                    <label class="form-label">Số lượng: </label>
                                    <input class="form-control quantity" style="margin-right: 80px;width: 50px" min="1" max="99" type="number" name="qty[<?php echo $s["maSach"] ?>]" value="<?php echo $_SESSION['cart'][$s["maSach"]] ?>">
                                    <div class="mb-3">
                                        <input type="submit" name="update" style="margin-top: 31px" value="Cập nhật Sách này" class="btn btn-2" />
                                    </div>
                                    <hr>
                                    <input type="submit" name="remove" value="Xóa Sách này" class="btn btn-outline-secondary float-end" />
                                    <input type="hidden" name="idsprm" value="<?php echo $s["maSach"] ?>" />
                                    <label style="color: red">Thành tiền: <?php echo $_SESSION['cart'][$s["maSach"]] * $s["giaSach"] ?>.000</label>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </form>
                    <?php $total += $_SESSION['cart'][$s["maSach"]] * $s["giaSach"] ?>
            <?php
            }
        }
            ?>

            <div class="row">
                <div class="col-md-4 col-md-offset-8 ">

                    <center>
                        <p style="color:red"><i class="fa fa-exclamation" aria-hidden="true"> Bạn cần đăng nhập để đặt hàng</i></p>
                        <a href="index.php" class="btn btn-1" style="margin-left:-76px">Chọn những Sách khác</a>
                    </center>
                </div>
                <div class="row">
                    <div class="pricedetails">
                        <div class="col-md-4 col-md-offset-8">
                            <table style="margin-right:31px">
                                <h6>Chi tiết giỏ hàng</h6>
                                <tr>
                                    <td>Số lượng sách </td>
                                    <td><?php echo $sl ?></td>
                                </tr>
                                <tr style="border-top: 1px solid #333">
                                    <td>
                                        <h5>Tổng cộng</h5>
                                    </td>
                                    <td><?php echo $total ?>.000</td>
                                </tr>
                            </table>
                            <center>
                                <a href="account.php" class="btn btn-1">vào trang đăng nhập</a>
                            </center>

                        </div>
                    </div>
                </div>
            </div>
                </div>
    </div>
    <?php
    include __DIR__ . '/../src/partials/footer.php';
    ?>
    <?php ob_end_flush(); ?>
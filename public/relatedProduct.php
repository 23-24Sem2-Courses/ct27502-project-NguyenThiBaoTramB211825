<div class="product-related">
    <div class="heading">
        <h2>Sách tương tự</h2>
    </div>
    <div class="products">
        <?php
        require '../src/myconnect.php';
        $mansx = $row["maNXB"];
        $query = "SELECT maSach,tenSach,giaSach,hinhAnh from sach 
	WHERE  maNXB = '$mansx'  limit 3 ";
        $re = $conn->query($query);
        if ($re->num_rows > 0) {
            while ($dong = $re->fetch_assoc()) {
        ?>
                <div class="col-lg-4 col-md-4 col-xs-12">
                    <div class="product">
                        <div class="image"><a href="product.php?id=<?php echo $dong["maSach"] ?>"><img src="images/<?php echo $dong["hinhAnh"] ?>" style="width:300px;height:300px" /></a></div>
                        <div class="caption">
                            <div class="name">
                                <h3><a href="product.php?id=<?php echo $dong["maSach"] ?>"><?php echo $dong["tenSach"] ?></a></h3>
                            </div>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        ?>
    </div>
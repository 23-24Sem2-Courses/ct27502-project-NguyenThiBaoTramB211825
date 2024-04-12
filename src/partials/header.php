<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Hệ thống thương mại điện tử về sách">
    <?php
    $title = "HỆ THỐNG THƯƠNG MẠI ĐIỆN TỬ VỀ SÁCH";
    $name = "Hệ thống thương mại điện tử về sách";
    ?>
    <title><?php echo $title ?></title>

    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <script src="https://apis.google.com/js/platform.js" async defer>
        {
            lang: 'vi'
        }
    </script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="fonts/font-slider.css" type="text/css">
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
    <header class="container">
        <div class="row">
            <div class="col-md-4" style="margin-bottom:25px">
                <div id="logo">
                    <h5>THƯƠNG MẠI ĐIỆN TỬ VỀ SÁCH</h5>
                </div>
            </div>
            <div class="col-md-4">
                <form class="form-search" method="GET" action="timkiem.php">
                    <input type="text" class="input-medium search-query" name="txttimkiem" required>
                    <button type="submit" name="tk" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>
            <div class="col-md-4">
                <div id="cart"><a class="btn btn-1" href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span>Giỏ hàng (<?php
                    $ok = 1;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $key => $value) {
                        if (isset($key)) {
                            $ok = 2;
                        }
                        }
                    }
                    if ($ok == 2) {
                    echo count($_SESSION['cart']);
                    } else {
                        echo   "0";
                        }
               ?>)</a></div>
            </div>
        </div>
    </header>
</body>
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
    $title = "SAKURA - HỆ THỐNG THƯƠNG MẠI ĐIỆN TỬ VỀ SÁCH";
    $name = "Hệ thống thương mại điện tử về sách";
    ?>
    <title><?php echo $title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style_user.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script src="https://apis.google.com/js/platform.js" async defer>
        {
            lang: 'vi'
        }
    </script>
</head>

<body>
    <nav id="top" class="navbar navbar-expand-lg">
        <div class="container">
            <div class="col-xs-6"></div>
            <div class="col-xs-6">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php
                    if (!isset($_SESSION['txtus'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="account.php"><span class="fas fa-sign-in"></span> Đăng nhập</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="account.php"><span class="fas fa-user-plus"></span> Đăng ký</a></li>';
                    } else {
                        echo '<li class="nav-item"><span class="nav-link"><span class="fas fa-user"></span> Xin chào <b style="color: Tomato;">' . $_SESSION['hoTen'] . '</b></span></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="logout.php"><span class="fas fa-sign-out"></span> Đăng xuất</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="container">
        <div class="row">
            <div class="col-md-4" style="margin-bottom:25px">
                <div id="logo">
                    <h5><a href="index.php"><img src="<?php echo '/images/sakura-bookstore-logo.png'; ?>" alt="logo" width="50" height="50"></a> NHÀ SÁCH SAKURA</h5>
                </div>
            </div>
            <div class="col-md-4">
                <form class="form-search" method="GET" action="search.php">
                    <input type="text" class="input-medium search-query" style="margin-top: 10px;" name="txttimkiem" required>
                    <button type="submit" name="tk" class="btn"><span class="fas fa-search"></span></button>
                </form>
            </div>
            <div class="col-md-4">
                <div id="cart">
                    <a class="btn btn-1" href="cart.php">
                        <span class="fas fa-shopping-cart"></span>Giỏ hàng
                        (<?php
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
                                echo "0";
                            }
                            ?>)
                    </a>
                </div>
            </div>
        </div>
    </header>
    <nav id="menu" class="navbar navbar-expand-lg">
        <div class="container">
            <div class="navbar-header">
                <span id="heading" class="d-block d-sm-none">Categories</span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Thể loại
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            require '../src/myconnect.php';
                            $layTL = "SELECT maTL,tenTL from theLoai";
                            $rstenTL = $conn->query($layTL);
                            if ($rstenTL->num_rows > 0) {
                                while ($row = $rstenTL->fetch_assoc()) {
                            ?>
                                    <li><a href="category.php?maTL=<?php echo $row["maTL"] ?>"><?php echo $row["tenTL"] ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Tác giả
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            require '../src/myconnect.php';
                            $layTG = "SELECT maTG,tenTG from tacGia";
                            $rstenTG = $conn->query($layTG);
                            if ($rstenTG->num_rows > 0) {
                                while ($row = $rstenTG->fetch_assoc()) {
                            ?>
                                    <li><a href="category.php?maTG=<?php echo $row["maTG"] ?>"><?php echo $row["tenTG"] ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Nhà xuất bản
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php
                            require '../src/myconnect.php';
                            $layNXB = "SELECT maNXB,tenNXB from nhaXuatBan";
                            $rstenNXB = $conn->query($layNXB);
                            if ($rstenNXB->num_rows > 0) {
                                while ($row = $rstenNXB->fetch_assoc()) {
                            ?>
                                    <li><a href="category.php?maNXB=<?php echo $row["maNXB"] ?>"><?php echo $row["tenNXB"] ?></a></li>
                            <?php
                                }
                            }
                            ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php">Giỏ hàng</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
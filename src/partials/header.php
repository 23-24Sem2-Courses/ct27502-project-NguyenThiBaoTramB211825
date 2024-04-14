<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<<<<<<< HEAD
=======

>>>>>>> e30f6dcfda5df6fd1c43cb213c9404864cd29a49
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
<<<<<<< HEAD

    <meta name="description" content="Hệ thống thương mại điện tử về sách">
    <?php
    $title = "SAKURA - HỆ THỐNG THƯƠNG MẠI ĐIỆN TỬ VỀ SÁCH";
=======
    <meta name="description" content="Hệ thống thương mại điện tử về sách">
    <?php
    $title = "HỆ THỐNG THƯƠNG MẠI ĐIỆN TỬ VỀ SÁCH";
>>>>>>> e30f6dcfda5df6fd1c43cb213c9404864cd29a49
    $name = "Hệ thống thương mại điện tử về sách";
    ?>
    <title><?php echo $title ?></title>

<<<<<<< HEAD
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/css/style_user.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
=======
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
>>>>>>> e30f6dcfda5df6fd1c43cb213c9404864cd29a49
    <script src="https://apis.google.com/js/platform.js" async defer>
        {
            lang: 'vi'
        }
    </script>
<<<<<<< HEAD
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
                        echo '<li class="nav-item"><span class="nav-link"><span class="fas fa-user"></span> Xin chào <b style="color: Tomato;">' . $_SESSION['HoTen'] . '</b></span></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="dangxuat.php"><span class="fas fa-sign-out"></span> Đăng xuất</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
=======
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="plugins/select2/select2.min.css">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="fonts/font-slider.css" type="text/css">
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
>>>>>>> e30f6dcfda5df6fd1c43cb213c9404864cd29a49
    <header class="container">
        <div class="row">
            <div class="col-md-4" style="margin-bottom:25px">
                <div id="logo">
<<<<<<< HEAD
                    <h5><img src="<?php echo '/images/sakura-bookstore-logo.png'; ?>" alt="logo" width="50" height="50"> NHÀ SÁCH SAKURA</h5>
=======
                    <h5>THƯƠNG MẠI ĐIỆN TỬ VỀ SÁCH</h5>
>>>>>>> e30f6dcfda5df6fd1c43cb213c9404864cd29a49
                </div>
            </div>
            <div class="col-md-4">
                <form class="form-search" method="GET" action="timkiem.php">
<<<<<<< HEAD
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
                            require_once __DIR__ . '/../bootstrap.php';

                            use CT275\Labs\Sach;

                            // Truy vấn cơ sở dữ liệu để lấy danh sách thể loại
                            $statement = $PDO->prepare('SELECT maTL, tenTL FROM theLoai');
                            $statement->execute();
                            $categories = $statement->fetchAll(PDO::FETCH_ASSOC);

                            // Hiển thị danh sách thể loại dưới dạng liên kết trên thanh nav
                            echo '<ul>';
                            foreach ($categories as $category) {
                                echo "<li><a href=\"category.php?matloai={$category['maTL']}\">{$category['tenTL']}</a></li>";
                            }
                            echo '</ul>';

                            // Kiểm tra xem người dùng đã chọn một thể loại hay chưa
                            if (isset($_GET['matloai']) && is_numeric($_GET['matloai'])) {
                                $maTL = $_GET['matloai'];

                                // Tạo một đối tượng Sach
                                $book = new Sach($PDO);

                                // Gọi hàm findbasedonCategory() để lấy danh sách các sách của thể loại
                                $books = $book->findbasedonCategory($maNXB);

                                // Kiểm tra xem có sách nào của thể loại đó hay không
                                if ($books) {
                                    echo "<h2>Danh sách sách của thể loại:</h2>";
                                    echo "<ul>";
                                    foreach ($books as $book) {
                                        echo "<li>{$book->hinhAnh}</li>";
                                        echo "<li>{$book->tenSach}</li>";
                                        echo "<li>{$book->giaSach}</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Không tìm thấy sách của thể loại này.";
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
                            require_once __DIR__ . '/../bootstrap.php';

                            // Truy vấn cơ sở dữ liệu để lấy danh sách tác giả
                            $statement = $PDO->prepare('SELECT maTG, tenTG FROM tacGia');
                            $statement->execute();
                            $authors = $statement->fetchAll(PDO::FETCH_ASSOC);

                            // Hiển thị danh sách tác giả dưới dạng liên kết trên thanh nav
                            echo '<ul>';
                            foreach ($authors as $author) {
                                echo "<li><a href=\"category.php?matgia={$author['maTG']}\">{$author['tenTG']}</a></li>";
                            }
                            echo '</ul>';

                            // Kiểm tra xem người dùng đã chọn một tác giả hay chưa
                            if (isset($_GET['matgia']) && is_numeric($_GET['matgia'])) {
                                $maTG = $_GET['matgia'];

                                // Tạo một đối tượng Sach
                                $book = new Sach($PDO);

                                // Gọi hàm findbasedonAuthor() để lấy danh sách các sách của tác giả
                                $books = $book->findbasedonAuthor($maTG);

                                // Kiểm tra xem có sách nào của tác giả đó hay không
                                if ($books) {
                                    echo "<h2>Danh sách sách của tác giả:</h2>";
                                    echo "<ul>";
                                    foreach ($books as $book) {
                                        echo "<li>{$book->hinhAnh}</li>";
                                        echo "<li>{$book->tenSach}</li>";
                                        echo "<li>{$book->giaSach}</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Không tìm thấy sách của tác giả này.";
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
                            require_once __DIR__ . '/../bootstrap.php';

                            // Truy vấn cơ sở dữ liệu để lấy danh sách nhà xuất bản
                            $statement = $PDO->prepare('SELECT maNXB, tenNXB FROM nhaXuatBan');
                            $statement->execute();
                            $publishers = $statement->fetchAll(PDO::FETCH_ASSOC);

                            // Hiển thị danh sách nhà xuất bản dưới dạng liên kết trên thanh nav
                            echo '<ul>';
                            foreach ($publishers as $publisher) {
                                echo "<li><a href=\"category.php?manhaxb={$publisher['maNXB']}\">{$publisher['tenNXB']}</a></li>";
                            }
                            echo '</ul>';

                            // Kiểm tra xem người dùng đã chọn một nhà xuất bản hay chưa
                            if (isset($_GET['manhaxb']) && is_numeric($_GET['manhaxb'])) {
                                $maNXB = $_GET['manhaxb'];

                                // Tạo một đối tượng Sach
                                $book = new Sach($PDO);

                                // Gọi hàm findbasedonPublisher() để lấy danh sách các sách của nhà xuất bản
                                $books = $book->findbasedonPublisher($maNXB);

                                // Kiểm tra xem có sách nào của nhà xuất bản đó hay không
                                if ($books) {
                                    echo "<h2>Danh sách sách của nhà xuất bản:</h2>";
                                    echo "<ul>";
                                    foreach ($books as $book) {
                                        echo "<li>{$book->hinhAnh}</li>";
                                        echo "<li>{$book->tenSach}</li>";
                                        echo "<li>{$book->giaSach}</li>";
                                    }
                                    echo "</ul>";
                                } else {
                                    echo "Không tìm thấy sách của nhà xuất bản này.";
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
=======
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
>>>>>>> e30f6dcfda5df6fd1c43cb213c9404864cd29a49

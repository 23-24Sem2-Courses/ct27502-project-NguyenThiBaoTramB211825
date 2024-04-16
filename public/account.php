<?php
ob_start();
session_start();
?>

<?php
include __DIR__ . '/../src/partials/header.php';
?>

<?php
$tk = "";
$mk = "";
$kq = "";
if (isset($_POST['submit'])) {
    require '../src/myconnect.php';
    $tk = $_POST['txtus'];
    $mk = $_POST['txtem'];
    $sql = "SELECT * FROM nguoiDung where emaildn = '$tk'  and matKhau = '$mk'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $_SESSION['txtus'] = $tk;
            $_SESSION['hoTen'] = $row["hoTen"];
            $_SESSION['emaildn'] = $row["emaildn"];
            $_SESSION['dienThoai'] = $row["dienThoai"];
            header('Location: cart.php');
            $row = $result->fetch_assoc();
        }
    } else {
        $kq = "Thông tin không đúng, vui lòng kiểm tra lại";
    }
}
?>

<?php
$email = "";
$mk = "";
$repass = "";
$name = "";
$dt = "";
$kqdk = "";

if (isset($_POST['dangky'])) {
    require '../src/myconnect.php';
    $name  = $_POST['fullname'];
    $email = $_POST['email'];
    $dt = $_POST['phone'];
    $mk = $_POST['password'];
    $repass = $_POST['repass'];
    if ($repass != $mk) {
        $kqdk = "Nhập lại mật khẩu không khớp.";
    } else {
        $sql = "INSERT INTO nguoiDung (emaildn,matKhau,hoTen,dienThoai) 
        VALUES ('$email','$mk' ,'$name','$dt') ";
        // echo  $mk;
        if (mysqli_query($conn, $sql)) {
            $email = "";
            $mk = "";
            $repass = "";
            $name = "";
            $dt = "";
            $kqdk = "Đăng ký thành công.";
        } else {
            $kqdk = "Đăng ký không thành công. Vui lòng kiểm tra lại thông tin.";
        }
    }
    mysqli_close($conn);
}
?>

<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
                        <li class="breadcrumb-item"><a href="account.php">Tài khoản</a></li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="heading">
                    <h2>Đăng nhập</h2>
                </div>
                <form name="form1" id="ff1" method="POST" action="#">
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="txtus" required value="">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="txtem" required value="">
                    </div>
                    <button type="submit" name="submit" class="btn btn-1" name="login" id="login">Đăng nhập</button>
                    <P style="color:red"><?php echo $kq; ?></p>
                    <a href="#"></a>
                    <br>
                    <i>* Bạn chưa có tài khoản? Vui lòng đăng ký.</i>
                </form>
            </div>
            <div class="col-md-6">
                <div class="heading">
                    <h2>Đăng ký tài khoản</h2>
                </div>
                <form name="form2" id="ff2" method="post" action="#">
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Họ tên" name="fullname" id="firstname" value="<?php echo $name; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="<?php echo $email; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" placeholder="Điện thoại" name="phone" id="phone" value="<?php echo $dt; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" value="<?php echo $mk; ?>" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="repass" id="repass" value="<?php echo $repass; ?>" required>
                    </div>
                    <button type="submit" name="dangky" class="btn btn-1">Đăng ký</button>
                    <P style="color:red"><?php echo $kqdk; ?></p>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include __DIR__ . '/../src/partials/footer.php';
?>
<?php ob_end_flush(); ?>
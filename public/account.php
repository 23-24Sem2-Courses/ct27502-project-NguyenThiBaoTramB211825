<?php
ob_start();
session_start();
?>

<?php
define('TITLE', 'Login');

$loggedin = false;
$kq = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        if ((strtolower($_POST['email']) == 'thanh@gmail.com' || strtolower($_POST['email']) == 'tungvu@gmail.com') && ($_POST['password'] == '123')) {
            $_SESSION['user'] = 'me';
            $loggedin = true;
        } else {
            $kq = 'Địa chỉ email và mật khẩu không khớp!';
        }
    } else {
        $kq = 'Hãy đảm bảo rằng bạn cung cấp đầy đủ địa chỉ email và mật khẩu!';
    }
}

if ($loggedin) {
    echo '<p>Bạn đã đăng nhập!</p>';
} else {
    echo '<p>Vui lòng đăng nhập lại!</p>';
}

?>

<?php
include __DIR__ . '/../src/partials/header.php';
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
                        <input type="text" class="form-control" placeholder="Họ Tên" name="fullname" id="firstname" value="<?php echo $name; ?>" required>
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
                        <input type="password" class="form-control" placeholder="Mật khẩu nhập lại" name="repass" id="repass" value="<?php echo $repass; ?>" required>
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
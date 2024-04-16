<?php
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập trang quản trị</title>

    <link rel="stylesheet" href="css/styles.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/styles.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>

</head>

<body >
    <div class="container mt-5 pt-5">
        <div class="row offset-md-2">
            <div class="form-box w-50 text-center mx-4 border border-primary border-3 p-5">
                <div class="form-top py-1">
                    <div class="text-center">
                        <h3>Đăng nhập tài khoản <br> <strong>QUẢN TRỊ VIÊN</strong></h3>
                        <i class="fa fa-key"></i>
                    </div>
                </div>

                <div class="form-bottom p-1">
                    <form role="form" action="<?php include "ad_loginAdmin.php" ?>" method="post" class="login-form">
                        <div class="form-group p-3">
                            <label class="sr-only" for="form-username">Tàikhoản</label>
                            <input type="text" name="txtdangnhap" placeholder="Nhập tên tài khoản..." class="form-username form-control" id="form-username" required>
                        </div>
                        <div class="form-group p-3">
                            <label class="sr-only" for="form-password">Mậtkhẩu</label>
                            <input type="password" name="txtmatkhau" placeholder="Nhập mật khẩu..." class="form-password form-control" id="form-password" required>
                        </div>
                        <hr>
                        <button type="submit" name="dnhapadmin" class="btn btn-danger border-3">Sign in!</button>
                        <p style="color:red"><?php echo  $kq ?></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
<?php ob_end_flush(); ?>
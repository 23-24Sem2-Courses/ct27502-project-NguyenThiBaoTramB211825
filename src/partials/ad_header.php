<?php
ob_start();
?>

<header class="main-header row">

    <div class="col-md-2 bg-header text-white font-weight-bold">
        <p class="header mt-3"> QLHT BÁN SÁCH</p>
    </div>

    <nav class="navbar col-md-10 text-dark bg-nav justify-content-end align-center" role="navigation">
        <div class="row m-2 account">
            <div class="col-md-auto align-self-center ">
                <div class="fa-solid fa-user-tie"></div>
            </div>
            <div class="col-md-auto align-self-center pr-5 ">
                <a href="ad_dangxuat.php"> <button type="button" class="btn btn-primary pr-5">Đăng xuất</button></a>
            </div>
        </div>

    </nav>
</header>
<?php ob_end_flush(); ?>
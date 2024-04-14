<?php
ob_start();
?>

<header class="main-header row">

    <div class="col-md-2 bg-header text-white font-weight-bold">
        <p class="header mt-3"> QLHT BÁN SÁCH</p>
    </div>

    <nav class="navbar col-md-10 text-dark mr-5 bg-nav justify-content-end align-center" role="navigation">
            <div class="row  mt-2 account">
                <div class="col-md-auto align-self-center ">
                    <div class="fa-solid fa-user-tie"></div>
                </div>
                <div class="col-md-auto align-self-center">
                    <button type="button" class="btn btn-primary pr-5">Đăng xuất</button>
                </div>
            </div>

    </nav>
</header>
<?php ob_end_flush(); ?>
<?php
require_once __DIR__ . '/../src/bootstrap.php';

use CT275\Labs\Sach;
use CT275\Labs\Paginator;

$book = new Sach($PDO);

$limit = (isset($_GET['limit']) && is_numeric($_GET['limit'])) ?
    (int)$_GET['limit'] : 6;
$page = (isset($_GET['page']) && is_numeric($_GET['page'])) ?
    (int)$_GET['page'] : 1;
$paginator = new Paginator(
    totalRecords: $book->count(),
    recordsPerPage: $limit,
    currentPage: $page
);
$books = $book->paginate($paginator->recordOffset, $paginator->recordsPerPage);
$pages = $paginator->getPages(length: 3);

include "login.php";
include __DIR__ . '/../src/partials/header.php';
?>

<div id="page-content" class="home-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Carousel -->
                <div id="carousel-example-generic" class="carousel slide" data-bs-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/1.png" class="d-block w-100" alt="First slide">
                            <!-- Static Header -->
                            <div class="header-text d-none d-md-block">
                                <div class="text-center">
                                </div>
                            </div><!-- /header-text -->
                        </div>
                        <div class="carousel-item">
                            <img src="images/2.png" class="d-block w-100" alt="Second slide">
                            <!-- Static Header -->
                            <div class="header-text d-none d-md-block">
                                <div class="text-center">
                                </div>
                            </div><!-- /header-text -->
                        </div>
                        <div class="carousel-item">
                            <img src="images/3.png" class="d-block w-100" alt="Third slide">
                            <!-- Static Header -->
                            <div class="header-text d-none d-md-block">
                                <div class="text-center">
                                </div>
                            </div><!-- /header-text -->
                        </div>
                        <div class="carousel-item">
                            <img src="images/4.png" class="d-block w-100" alt="Fourth slide">
                            <!-- Static Header -->
                            <div class="header-text d-none d-md-block">
                                <div class="text-center">
                                </div>
                            </div><!-- /header-text -->
                        </div>
                    </div>
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#carousel-example-generic" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carousel-example-generic" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div><!-- /carousel -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="heading">
                    <h2>Sách bán chạy nhất</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="product" style="text-align: center;">
                    <div class="image">
                        <a href="product.php?id=S001"><img src="images/anh1.png" style="width:300px;height:300px" /></a>
                    </div>
                    <div class="caption">
                        <div class="name">
                            <h3><a href="product.php?id=S001">Nguyên Lý Hệ quản trị cơ sở dữ liệu</a></h3>
                        </div>
                        <div class="price" style="color: red;">40,000₫</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="product" style="text-align: center;">
                    <div class="image">
                        <a href="product.php?id=S008"><img src="images/anh8.png" style="width:300px;height:300px" /></a>
                    </div>
                    <div class="caption">
                        <div class="name">
                            <h3><a href="product.php?id=S008">Giáo trình Triết học Mác-Lênin</a></h3>
                        </div>
                        <div class="price" style="color: red;">75,000₫</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="product" style="text-align: center;">
                    <div class="image">
                        <a href="product.php?id=S003"><img src="images/anh3.png" style="width:300px;height:300px" /></a>
                    </div>
                    <div class="caption">
                        <div class="name">
                            <h3><a href="product.php?id=S003">Các giải pháp lập trình C#</a></h3>
                        </div>
                        <div class="price" style="color: red;">50,000₫</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="heading">
                    <h2>Tất cả sách</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <?php foreach ($books as $book) : ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="product" style="text-align: center;">
                        <div class="image">
                            <img src="images/<?= html_escape($book->hinhAnh) ?>" style="width:300px;height:300px" />
                        </div>
                        <div class="caption">
                            <div class="name">
                                <h3><?= html_escape($book->tenSach) ?></h3>
                            </div>
                            <div class="price" style="color: red;"><?= html_escape($book->giaSach) ?>,000₫</div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <nav class="d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item<?= $paginator->getPrevPage() ?
                                        '' : ' disabled' ?>">
                    <a role="button" href="/?page=<?= $paginator->getPrevPage() ?>&limit=6" class="page-link">
                        <span>&laquo;</span>
                    </a>
                </li>
                <?php foreach ($pages as $page) : ?>
                    <li class="page-item<?= $paginator->currentPage === $page ?
                                            ' active' : '' ?>">
                        <a role="button" href="/?page=<?= $page ?>&limit=6" class="page-link"><?= $page ?></a>
                    </li>
                <?php endforeach ?>
                <li class="page-item<?= $paginator->getNextPage() ?
                                        '' : ' disabled' ?>">
                    <a role="button" href="/?page=<?= $paginator->getNextPage() ?>&limit=6" class="page-link">
                        <span>&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav><br>
    </div>

    <?php
    include __DIR__ . '/../src/partials/footer.php';
    ?>
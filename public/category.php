<?php
ob_start();
?>
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

include __DIR__ . '/../src/partials/header.php';
?>
<div id="page-content" class="single-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="index.php">Trang chủ</a></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div id="main-content" class="col-md-8">
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
            </div>
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
</div>

<?php
include __DIR__ . '/../src/partials/footer.php';
?>
<?php ob_end_flush(); ?>
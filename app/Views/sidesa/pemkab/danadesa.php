<?php
$request = \Config\Services::request();
$url = strlen($request->uri->getSegment(3));
?>

<?= $this->include('sidesa/layout/pemkab/header') ?>
<?php if ($url === 13) : ?> <?= $this->include('sidesa/layout/pemkab/topbar_desa'); ?> <?php else : ?> <?= $this->include('sidesa/layout/pemkab/topbar'); ?> <?php endif; ?>
<?php if ($url === 13) : ?> <?= $this->include('sidesa/layout/pemkab/sidebar_desa') ?> <?php else : ?> <?= $this->include('sidesa/layout/pemkab/sidebar') ?> <?php endif; ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        HALO WORLD!!!
    </div>
</div>

<?= $this->include('sidesa/layout/pemkab/footer-dashboard') ?>
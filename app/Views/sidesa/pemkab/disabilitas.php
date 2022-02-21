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
        <div class="container">
            <div class="section-title text-center">
                <p>Data Disabilitas desa terintegrasi dengan Sistem Dinas Sosial Provinsi Jawa Tengah</p>
            </div>
            <div class="row" style="margin:auto;">
                <div class="col-md-12 col-lg-12">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_disabilitas"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('sidesa/layout/pemkab/footer-disabilitas') ?>
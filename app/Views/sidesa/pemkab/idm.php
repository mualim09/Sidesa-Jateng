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

        <?php if ($url === 13) : ?>
            <div class="row" style="margin: auto;">
                <div class="section-title text-center">
                    <p>Data Indeks Desa Membangun (IDM) Terintegrasi dengan Sistem Kementrian Desa</p>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_nilaiidm"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_komposit"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="section-title text-center">
                <p>Data Indeks Desa Membangun (IDM) Terintegrasi dengan Sistem Kementrian Desa</p>
            </div>
            <div class="col-md-12 col-lg-12">
                <div class="media">
                    <div class="media-body text-center">
                        <figure class="highcharts-figure">
                            <div id="grafik_idm"></div>
                        </figure>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php if ($url === 13) : ?> <?= $this->include('sidesa/layout/pemkab/footer-idm-desa') ?> <?php else : ?> <?= $this->include('sidesa/layout/pemkab/footer-idm') ?> <?php endif; ?>
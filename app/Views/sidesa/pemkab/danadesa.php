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
        <style>
            body {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>

        <?php if ($total_salur != 0) : ?>
            <div class="row">
                <div class="row" style="margin-bottom:45px;">
                    <div class="col-md-6 col-lg-6 text-center">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="postur_danadesa_kab"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 text-center">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="capaian_danadesa"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom:45px;">
                    <div class="col-md-6 col-lg-6 text-center">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_reguler_bulanan"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_bltdd_bulanan"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-bottom:45px;">
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_kph_bulanan"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_covid_bulanan"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="text-center mt-4">
                <h3 style="color: crimson;">DATA SEDANG DALAM TAHAP PERSIAPAN</h3>
            </div>
        <?php endif; ?>

    </div>
</div>

<?= $this->include('sidesa/layout/pemkab/footer-danadesa') ?>
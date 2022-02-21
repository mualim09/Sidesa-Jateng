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
        <div class="section-title text-center">
            <p>Data Kesejahteraan Sosial terintegrasi dengan Sistem Dinas Sosial Provinsi Jawa Tengah</p>
            <p>DTKS 2021 telah mengalami perubahan model data. Perubahan tersebut menyesuaikan peraturan/regulasi dari KEMENTERIAN SOSIAL RI. Sehingga data DTKS 2021 dan seterusnya (hingga batas waktu yg belum ditentukan ) tidak dapat dipublikasikan seperti pada Tahun 2020.</p>
        </div>

        <div class="row" style="margin: auto;">
            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_kesejahteraan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_masak"></div>
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
                                <div id="grafik_bab"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_minum"></div>
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
                                <div id="grafik_penerangan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="media">
                        <div class="media-body text-center">
                            <figure class="highcharts-figure">
                                <div id="grafik_tinggal"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('sidesa/layout/pemkab/footer-kesejahteraansosial') ?>
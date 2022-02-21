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
            <p>Data Kependudukan Yang digunakan untuk proses pelayanan masyarakat desa bersumber dari data Sistem Informasi Administrasi Kependudukan (SIAK).</p>
        </div>
        <div class="row">
            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-6 col-lg-6 text-center">
                    <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN JENIS KELAMIN SESUAI DATA DESA YANG BARU TERITEGRASI</h5>
                    <figure class="highcharts-figure">
                        <div id="penduduk_jns_kelamin"></div>
                    </figure>
                </div>
                <div class="col-md-6 col-lg-6 text-center">
                    <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN KEPEMILIKAN KK SESUAI DATA DESA YANG BARU TERINTEGRASI</h5>
                    <figure class="highcharts-figure">
                        <div id="penduduk_kepemilikan_kk"></div>
                    </figure>
                </div>
            </div>

            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-6 col-lg-6">
                    <div class="media">
                        <div class="media-body text-center">
                            <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN USIA SESUAI DATA DESA YANG BARU TERINTEGRASI</h5>
                            <figure class="highcharts-figure">
                                <div id="penduduk_kelompok_usia"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="media">
                        <div class="media-body text-center">
                            <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN PENDIDIKAN SESUAI DATA DESA YANG BARU TERINTEGRASI</h5>
                            <figure class="highcharts-figure">
                                <div id="penduduk_pendidikan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" style="margin-bottom:45px;">
                <div class="col-md-6 col-lg-6">
                    <div class="media">
                        <div class="media-body text-center">
                            <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN AGAMA SESUAI DATA DESA YANG BARU TERINTEGRASI</h5>
                            <figure class="highcharts-figure">
                                <div id="penduduk_agama"></div>
                            </figure>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="media">
                        <div class="media-body text-center">
                            <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN PEKERJAAN SESUAI DATA DESA YANG BARU TERINTEGRASI</h5>
                            <figure class="highcharts-figure">
                                <div id="penduduk_pekerjaan"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="margin-bottom:45px;">
                <div class="col-md-12 col-lg-12">
                    <div class="media">
                        <div class="media-body text-center">
                            <h5 class="mt-0">JUMLAH PENDUDUK DESA BERDASARKAN GOLONGAN DARAH SESUAI DATA DESA YANG BARU TERINTEGRASI</h5>
                            <figure class="highcharts-figure">
                                <div id="penduduk_gol_darah"></div>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->include('sidesa/layout/pemkab/footer-kependudukan') ?>
<?= $this->extend('sidesa/layout/pemprov/bankeu'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Data Bantuan Keuangan</h3>
        <p>Data rekapitulasi bantuan keuangan Pemerintah Desa Jawa Tengah yang disalurkan oleh Pemerintah Provinsi Jawa Tengah</p>
    </div>
    <div class="row">
        <div class="container" style="margin-bottom:45px;">
            <div class="col-md-12 col-lg-12">
                <div class="media">
                    <div class="media-body text-center">
                        <h5 class="mt-0">Rekapitulasi anggaran bantuan keuangan Pemerintah Desa Jawa Tengah per Kabupaten tahun 2018 - 2021</h5>
                        <figure class="highcharts-figure">
                            <div id="bankeu_salur_perkab_duit"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom:45px;">
            <div class="col-md-12 col-lg-12">
                <div class="media">
                    <div class="media-body text-center">
                        <h5 class="mt-0">Rekapitulasi jumlah titik lokasi bantuan keuangan Pemerintah Desa Jawa Tengah per Kabupaten tahun 2018 - 2021</h5>
                        <figure class="highcharts-figure">
                            <div id="bankeu_salur_perkab_lokasi"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom:45px;">
            <div class="col-md-12 col-lg-12">
                <div class="media">
                    <div class="media-body text-center">
                        <h5 class="mt-0">Rekapitulasi jumlah anggaran bantuan keuangan Pemerintah Desa Jawa Tengah</h5>
                        <figure class="highcharts-figure">
                            <div id="bankeu_salur_pertahun_duit"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-bottom:45px;">
            <div class="col-md-12 col-lg-12">
                <div class="media">
                    <div class="media-body text-center">
                        <h5 class="mt-0">Rekapitulasi jumlah titik lokasi bantuan keuangan Pemerintah Desa Jawa Tengah</h5>
                        <figure class="highcharts-figure">
                            <div id="bankeu_salur_pertahun_lokasi"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
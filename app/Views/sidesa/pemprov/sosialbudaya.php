<?= $this->extend('sidesa/layout/pemprov/sosialbudaya'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Data Sosial Budaya</h3>
        <p>Data Sosial Budaya terintegrasi dengan Sistem Satgas Adat Desa Provinsi Jawa Tengah</p>
    </div>
    <div class="row" style="margin:auto;">
        <div class="col-md-12 col-lg-12">
            <div class="media">
                <div class="media-body text-center">
                    <figure class="highcharts-figure">
                        <div id="grafik_satgas"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
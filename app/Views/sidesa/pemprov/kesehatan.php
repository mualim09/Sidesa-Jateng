<?= $this->extend('sidesa/layout/pemprov/kesehatan'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Data Kesehatan</h3>
        <p>Data Kesehatan terintegrasi dengan Sistem Dinas Kesehatan Provinsi Jawa Tengah</p>
    </div>
    <div class="row" style="margin:auto;">
        <div class="col-md-12 col-lg-12">
            <div class="media">
                <div class="media-body text-center">
                    <figure class="highcharts-figure">
                        <div id="grafik_posyandu"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
<?= $this->extend('sidesa/layout/pemprov/disabilitas'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Data Disabilitas</h3>
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

<?= $this->endSection(); ?>
<?= $this->extend('sidesa/layout/pemprov/idm'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Data Indeks Desa Membangun</h3>
        <p>Data Indeks Desa Membangun (IDM) Terintegrasi dengan Sistem Kementrian Desa</p>
    </div>
    <div class="row" style="margin:auto;">
        <div class="col-md-12 col-lg-12">
            <div class="media">
                <div class="media-body text-center">
                    <figure class="highcharts-figure">
                        <div id="grafik_idm"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
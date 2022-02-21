<?= $this->extend('sidesa/layout/pemprov/muatandata'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Muatan Data Dan Informasi SIDesa Provinsi Jawa Tengah</h3>
    </div>
    <div class="row" style="margin:auto;">
        <div class="col-md-12 col-lg-12">
            <div class="media">
                <div class="media-body text-center">
                    <figure class="highcharts-figure">
                        <div id="grafik_muatandata"></div>
                    </figure>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
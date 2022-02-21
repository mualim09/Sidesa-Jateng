<?= $this->extend('sidesa/layout/pemprov/kesejahteraan'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <div class="section-title text-center">
        <h3 style="text-transform: uppercase;">Data Kesejahteraan Sosial</h3>
        <p>Data Kesejahteraan Sosial terintegrasi dengan Sistem Dinas Sosial Provinsi Jawa Tengah</p>
        <p>DTKS 2021 telah mengalami perubahan model data. Perubahan tersebut menyesuaikan peraturan/regulasi dari KEMENTERIAN SOSIAL RI. Sehingga data DTKS 2021 dan seterusnya (hingga batas waktu yg belum ditentukan ) tidak dapat dipublikasikan seperti pada Tahun 2020.</p>
    </div>

    <div class="row">
        <div class="row" style="margin-bottom:45px;">
            <div class="col-md-6 col-lg-6 text-center">
                <h5 class="mt-0">Data Kesejahteraan Rumah Tangga dan Anggota Rumah Tangga Tingkat Provinsi Jawa Tengah</h5>
                <figure class="highcharts-figure">
                    <div id="grafik_kesejahteraan"></div>
                </figure>
            </div>
            <div class="col-md-6 col-lg-6 text-center">
                <h5 class="mt-0">Data Bahan Bakar Utama Memasak Tingkat Provinsi Jawa Tengah</h5>
                <figure class="highcharts-figure">
                    <div id="grafik_masak"></div>
                </figure>
            </div>
        </div>

        <div class="row" style="margin-bottom:45px;">
            <div class="col-md-6 col-lg-6 text-center">
                <h5 class="mt-0">Data Penggunaan Fasilitas Buang Air Besar Tingkat Provinsi Jawa Tengah</h5>
                <figure class="highcharts-figure">
                    <div id="grafik_bab"></div>
                </figure>
            </div>
            <div class="col-md-6 col-lg-6 text-center">
                <h5 class="mt-0">Data Sumber Air Minum Tingkat Provinsi Jawa Tengah</h5>
                <figure class="highcharts-figure">
                    <div id="grafik_minum"></div>
                </figure>
            </div>
        </div>

        <div class="row" style="margin-bottom:45px;">
            <div class="col-md-6 col-lg-6 text-center">
                <h5 class="mt-0">Data Sumber Penerangan Utama Tingkat Provinsi Jawa Tengah</h5>
                <figure class="highcharts-figure">
                    <div id="grafik_penerangan"></div>
                </figure>
            </div>
            <div class="col-md-6 col-lg-6 text-center">
                <h5 class="mt-0">Data Status Penguasaan Bangunan Tempat Tinggal Tingkat Provinsi Jawa Tengah</h5>
                <figure class="highcharts-figure">
                    <div id="grafik_tinggal"></div>
                </figure>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
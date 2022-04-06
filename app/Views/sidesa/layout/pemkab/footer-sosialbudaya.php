<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?>. Sistem Informasi Desa . Provinsi Jawa Tengah</span>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

</div>
<!-- end main content-->

</div>
<!-- END layout-wrapper -->

<?= $this->include('sidesa/layout/pemkab/theme') ?>

<script src="<?= base_url('minia/libs/jquery/jquery.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/metismenu/metisMenu.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/simplebar/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/node-waves/waves.min.js'); ?>"></script>
<script src="<?= base_url('minia/libs/feather-icons/feather.min.js'); ?>"></script>

<!-- Sweet alert init js-->
<script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- App js -->
<script src="<?= base_url('minia/js/app.js'); ?>"></script>

<!-- Punya highchart -->
<script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
<script src="<?= base_url() ?>/highchart/code/modules/series-label.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>

<script>
    // basicline satgas
    Highcharts.chart('grafik_satgas', {

        title: {
            text: 'Kumpulan data Sosial Budaya secara urutan waktu'
        },

        yAxis: {
            title: {
                text: 'Total Populasi (Jiwa)'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },

        xAxis: {
            categories: ['2019', '2020', '2021', '2022'],
            lineWidth: 1
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Jumlah Satgas Adat',
            data: [
                <?= $satgas19->no_sk != 0 ? $satgas19->no_sk : 0 ?>, <?= $satgas20->no_sk != 0 ? $satgas20->no_sk : null ?>, <?= $satgas21->no_sk != 0 ? $satgas21->no_sk : null ?>, <?= $satgas22->no_sk != 0 ? $satgas22->no_sk : null ?>
            ]
        }, {
            name: 'Jumlah Anggota Satgas Adat',
            data: [
                <?= $satgas19->anggota != 0 ? $satgas19->anggota : 0 ?>, <?= $satgas20->anggota != 0 ? $satgas20->anggota : null ?>, <?= $satgas21->anggota != 0 ? $satgas21->anggota : null ?>, <?= $satgas22->anggota != 0 ? $satgas22->anggota : null ?>
            ]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                }
            }]
        },
    });
</script>

</body>

</html>
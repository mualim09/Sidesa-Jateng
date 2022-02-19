<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa</span>
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
    // basicline posyandu
    Highcharts.chart('grafik_posyandu', {

        title: {
            text: 'Kumpulan data Posyandu secara urutan waktu'
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
            categories: ['2020', '2021', '2022'],
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
            name: 'Jumlah Posyandu',
            data: [
                <?= $posyandu20->posyandu != 0 ? $posyandu20->posyandu : 0 ?>, <?= $posyandu21->posyandu != 0 ? $posyandu21->posyandu : null ?>, <?= $posyandu22->posyandu != 0 ? $posyandu22->posyandu : null ?>
            ]
        }, {
            name: 'Jumlah Kader',
            data: [
                <?= $posyandu20->kader != 0 ? $posyandu20->kader : 0 ?>, <?= $posyandu21->kader != 0 ? $posyandu21->kader : null ?>, <?= $posyandu22->kader != 0 ? $posyandu22->kader : null ?>
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
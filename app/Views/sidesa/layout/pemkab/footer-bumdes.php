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
    // basic line idm
    Highcharts.chart('grafik_bumdes', {

        title: {
            text: 'Kumpulan data BUMDES secara urutan waktu'
        },

        yAxis: {
            title: {
                text: 'Total (Desa)'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },

        xAxis: {
            tickInterval: 1,
            reversedStacks: false,
            endOnTick: false,
            showLastLabel: true
        },

        // legend: {
        //     layout: 'vertical',
        //     align: 'right',
        //     verticalAlign: 'middle'
        // },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2019
            }
        },

        credits: {
            enabled: false
        },

        series: [{
            name: 'Maju',
            data: [
                <?= isset($bumdes2019['MAJU']) ? $bumdes2019['MAJU'] : 0 ?>, <?= isset($bumdes2020['MAJU']) ? $bumdes2020['MAJU'] : 0 ?>
            ]
        }, {
            name: 'Dasar',
            data: [
                <?= isset($bumdes2019['DASAR']) ? $bumdes2019['DASAR'] : 0 ?>, <?= isset($bumdes2020['DASAR']) ? $bumdes2020['DASAR'] : 0 ?>
            ]
        }, {
            name: 'Berkembang',
            data: [
                <?= isset($bumdes2019['BERKEMBANG']) ? $bumdes2019['BERKEMBANG'] : 0 ?>, <?= isset($bumdes2020['BERKEMBANG']) ? $bumdes2020['BERKEMBANG'] : 0 ?>
            ]
        }, {
            name: 'Tumbuh',
            data: [
                <?= isset($bumdes2019['TUMBUH']) ? $bumdes2019['TUMBUH'] : 0 ?>, <?= isset($bumdes2020['TUMBUH']) ? $bumdes2020['TUMBUH'] : 0 ?>
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
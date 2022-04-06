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
<script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>

<script>
    Highcharts.setOptions({
        lang: {
            decimalPoint: ',',
            thousandsSep: '.'
        },
        colors: Highcharts.getOptions().colors.map(function(color) {
            return {
                radialGradient: {
                    cx: 0.5,
                    cy: 0.3,
                    r: 0.7
                },
                stops: [
                    [0, color],
                    [1, Highcharts.color(color).brighten(-0.3).get('rgb')] // darken
                ]
            };
        })
    });

    // basic line idm
    Highcharts.chart('grafik_idm', {
        chart: {
            type: 'column'
        },

        title: {
            text: 'Data Status Indeks Desa Membangun (IDM)'
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
            name: 'Mandiri',
            data: [
                <?= isset($idm2019['MANDIRI']) ? $idm2019['MANDIRI'] : 0 ?>, <?= isset($idm2020['MANDIRI']) ? $idm2020['MANDIRI'] : 0 ?>, <?= isset($idm2021['MANDIRI']) ? $idm2021['MANDIRI'] : 0 ?>
            ]
        }, {
            name: 'Maju',
            data: [
                <?= isset($idm2019['MAJU']) ? $idm2019['MAJU'] : 0 ?>, <?= isset($idm2020['MAJU']) ? $idm2020['MAJU'] : 0 ?>, <?= isset($idm2021['MAJU']) ? $idm2021['MAJU'] : 0 ?>
            ]
        }, {
            name: 'Berkembang',
            data: [
                <?= isset($idm2019['BERKEMBANG']) ? $idm2019['BERKEMBANG'] : 0 ?>, <?= isset($idm2020['BERKEMBANG']) ? $idm2020['BERKEMBANG'] : 0 ?>, <?= isset($idm2021['BERKEMBANG']) ? $idm2021['BERKEMBANG'] : 0 ?>
            ]
        }, {
            name: 'Tertinggal',
            data: [
                <?= isset($idm2019['TERTINGGAL']) ? $idm2019['TERTINGGAL'] : 0 ?>, <?= isset($idm2020['TERTINGGAL']) ? $idm2020['TERTINGGAL'] : 0 ?>, <?= isset($idm2021['TERTINGGAL']) ? $idm2021['TERTINGGAL'] : 0 ?>
            ]
        }, {
            name: 'Sangat tertinggal',
            data: [
                <?= isset($idm2019['SANGAT TERTINGGAL']) ? $idm2019['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idm2020['SANGAT TERTINGGAL']) ? $idm2020['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idm2021['SANGAT TERTINGGAL']) ? $idm2021['SANGAT TERTINGGAL'] : 0 ?>
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
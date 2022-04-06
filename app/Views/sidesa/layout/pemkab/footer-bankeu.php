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
<script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
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

    Highcharts.chart('bankeu_salur_pertahun_duitkab', {
        title: {
            text: ''
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2018
            }
        },
        yAxis: {
            title: {
                text: 'BANKEU (Tersalur)'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },
        credits: {
            enabled: false
        },
        series: [{
            type: 'column',
            colorByPoint: true,
            data: [<?= $bankeu_salur_2018[0]['bantuan'] ?>, <?= $bankeu_salur_2019[0]['bantuan'] ?>, <?= $bankeu_salur_2020[0]['bantuan'] ?>, <?= $bankeu_salur_2021[0]['bantuan'] ?>, <?= isset($bankeu_salur_2022[0]['bantuan']) ? $bankeu_salur_2022[0]['bantuan'] : NULL ?>, <?= isset($bankeu_salur_2023[0]['bantuan']) ? $bankeu_salur_2023[0]['bantuan'] : NULL ?>, <?= isset($bankeu_salur_2024[0]['bantuan']) ? $bankeu_salur_2024[0]['bantuan'] : NULL ?>, <?= isset($bankeu_salur_2025[0]['bantuan']) ? $bankeu_salur_2025[0]['bantuan'] : NULL ?>],
            showInLegend: false,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                pointFormat: 'Rp. {point.y}'
            },
        }]
    });

    Highcharts.chart('bankeu_salur_pertahun_lokasikab', {
        title: {
            text: ''
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2018
            }
        },
        yAxis: {
            title: {
                text: 'BANKEU (Titik Lokasi)'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },
        credits: {
            enabled: false
        },
        series: [{
            type: 'column',
            colorByPoint: true,
            data: [<?= $bankeu_salur_2018[0]['lokasi'] ?>, <?= $bankeu_salur_2019[0]['lokasi'] ?>, <?= $bankeu_salur_2020[0]['lokasi'] ?>, <?= $bankeu_salur_2021[0]['lokasi'] ?>, <?= isset($bankeu_salur_2022[0]['lokasi']) ? $bankeu_salur_2022[0]['lokasi'] : NULL ?>, <?= isset($bankeu_salur_2023[0]['lokasi']) ? $bankeu_salur_2023[0]['lokasi'] : NULL ?>, <?= isset($bankeu_salur_2024[0]['lokasi']) ? $bankeu_salur_2024[0]['lokasi'] : NULL ?>, <?= isset($bankeu_salur_2025[0]['lokasi']) ? $bankeu_salur_2025[0]['lokasi'] : NULL ?>],
            showInLegend: false,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                pointFormat: '{point.y} Titik'
            },
        }]
    });
</script>

</body>

</html>
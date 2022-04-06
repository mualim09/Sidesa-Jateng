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
    Highcharts.chart('grafik_nilaiidm', {

        title: {
            text: 'Nilai Indeks Desa Membangun (IDM)'
        },

        yAxis: {
            title: {
                text: 'Total (Nilai)'
            }
        },

        tooltip: {
            valueDecimals: 4
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
            name: 'Nilai IDM',
            data: [
                <?= isset($idm2019[0]->nilai_idm) ? $idm2019[0]->nilai_idm : 0 ?>, <?= isset($idm2020[0]->nilai_idm) ? $idm2020[0]->nilai_idm : 0 ?>, <?= isset($idm2021[0]->nilai_idm) ? $idm2021[0]->nilai_idm : 0 ?>
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

    Highcharts.chart('grafik_komposit', {

        title: {
            text: 'Komposit Indeks Desa Membangun (IDM)'
        },

        yAxis: {
            title: {
                text: 'Total (Nilai)'
            }
        },

        tooltip: {
            valueDecimals: 4
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
            name: 'IKS',
            data: [
                <?= isset($idm2019[0]->iks) ? $idm2019[0]->iks : 0 ?>, <?= isset($idm2020[0]->iks) ? $idm2020[0]->iks : 0 ?>, <?= isset($idm2021[0]->iks) ? $idm2021[0]->iks : 0 ?>
            ]
        }, {
            name: 'IKE',
            data: [
                <?= isset($idm2019[0]->ike) ? $idm2019[0]->ike : 0 ?>, <?= isset($idm2020[0]->ike) ? $idm2020[0]->ike : 0 ?>, <?= isset($idm2021[0]->ike) ? $idm2021[0]->ike : 0 ?>
            ]
        }, {
            name: 'IKL',
            data: [
                <?= isset($idm2019[0]->ikl) ? $idm2019[0]->ikl : 0 ?>, <?= isset($idm2020[0]->ikl) ? $idm2020[0]->ikl : 0 ?>, <?= isset($idm2021[0]->ikl) ? $idm2021[0]->ikl : 0 ?>
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
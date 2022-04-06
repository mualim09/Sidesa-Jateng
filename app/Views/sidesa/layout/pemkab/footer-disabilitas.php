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
    // basicline disabilitas
    Highcharts.chart('grafik_disabilitas', {

        title: {
            text: 'Kumpulan data Disabilitas secara urutan waktu'
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
            categories: ['Jan 20', 'Okt 20'],
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
            name: 'Normal / tidak cacat',
            data: [
                <?= isset($disabilitasI20->normal) ? $disabilitasI20->normal : NULL ?>, <?= isset($disabilitasII20->normal) ? $disabilitasII20->normal : NULL ?>
            ],
            visible: false
        }, {
            name: 'Tuna daksa',
            data: [
                <?= isset($disabilitasI20->daksa) ? $disabilitasI20->daksa : NULL ?>, <?= isset($disabilitasII20->daksa) ? $disabilitasII20->daksa : NULL ?>
            ]
        }, {
            name: 'Tuna netra',
            data: [
                <?= isset($disabilitasI20->netra) ? $disabilitasI20->netra : NULL ?>, <?= isset($disabilitasII20->netra) ? $disabilitasII20->netra : NULL ?>
            ]
        }, {
            name: 'Tuna rungu',
            data: [
                <?= isset($disabilitasI20->rungu) ? $disabilitasI20->rungu : NULL ?>, <?= isset($disabilitasII20->rungu) ? $disabilitasII20->rungu : NULL ?>
            ]
        }, {
            name: 'Tuna wicara',
            data: [
                <?= isset($disabilitasI20->wicara) ? $disabilitasI20->wicara : NULL ?>, <?= isset($disabilitasII20->wicara) ? $disabilitasII20->wicara : NULL ?>
            ]
        }, {
            name: 'Tuna rungu & wicara',
            data: [
                <?= isset($disabilitasI20->rungu_wicara_daksa) ? $disabilitasI20->rungu_wicara_daksa : NULL ?>, <?= isset($disabilitasII20->rungu_wicara_daksa) ? $disabilitasII20->rungu_wicara_daksa : NULL ?>
            ]
        }, {
            name: 'Tuna netra & daksa',
            data: [
                <?= isset($disabilitasI20->netra_daksa) ? $disabilitasI20->netra_daksa : NULL ?>, <?= isset($disabilitasII20->netra_daksa) ? $disabilitasII20->netra_daksa : NULL ?>
            ]
        }, {
            name: 'Tuna netra, rungu & wicara',
            data: [
                <?= isset($disabilitasI20->netra_rungu_wicara) ? $disabilitasI20->netra_rungu_wicara : NULL ?>, <?= isset($disabilitasII20->netra_rungu_wicara) ? $disabilitasII20->netra_rungu_wicara : NULL ?>
            ]
        }, {
            name: 'Tuna rungu, wicara & daksa',
            data: [
                <?= isset($disabilitasI20->rungu_wicara_daksa) ? $disabilitasI20->rungu_wicara_daksa : NULL ?>, <?= isset($disabilitasII20->rungu_wicara_daksa) ? $disabilitasII20->rungu_wicara_daksa : NULL ?>
            ]
        }, {
            name: 'Tuna rungu, netra, wicara & daksa',
            data: [
                <?= isset($disabilitasI20->rungu_netra_wicara_daksa) ? $disabilitasI20->rungu_netra_wicara_daksa : NULL ?>, <?= isset($disabilitasII20->rungu_netra_wicara_daksa) ? $disabilitasII20->rungu_netra_wicara_daksa : NULL ?>
            ]
        }, {
            name: 'Tuna mental reterdasi',
            data: [
                <?= isset($disabilitasI20->mental) ? $disabilitasI20->mental : NULL ?>, <?= isset($disabilitasII20->mental) ? $disabilitasII20->mental : NULL ?>
            ]
        }, {
            name: 'Bekas penderita gangguan jiwa',
            data: [
                <?= isset($disabilitasI20->jiwa) ? $disabilitasI20->jiwa : NULL ?>, <?= isset($disabilitasII20->jiwa) ? $disabilitasII20->jiwa : NULL ?>, <?= isset($disabilitasI21->jiwa) ? $disabilitasI21->jiwa : NULL ?>
            ]
        }, {
            name: 'Tuna daksa & mental',
            data: [
                <?= isset($disabilitasI20->daksa_mental) ? $disabilitasI20->daksa_mental : NULL ?>, <?= isset($disabilitasII20->daksa_mental) ? $disabilitasII20->daksa_mental : NULL ?>
            ]
        }, {
            name: 'Tanpa keterangan',
            data: [
                <?= isset($disabilitasI20->tanpa_keterangan) ? $disabilitasI20->tanpa_keterangan : NULL ?>, <?= isset($disabilitasII20->tanpa_keterangan) ? $disabilitasII20->tanpa_keterangan : NULL ?>
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
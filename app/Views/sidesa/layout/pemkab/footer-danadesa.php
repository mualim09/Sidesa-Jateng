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
<script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/data.js"></script>
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

    Highcharts.chart('postur_danadesa_kab', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            backgroundColor: 'rgba(0,0,0,0)',
            type: 'pie'
        },
        title: {
            text: 'POSTUR DANA DESA <?= date("Y") ?>'
        },
        subtitle: {
            text: 'Total DIPA Rp. <?= number_format($anggaran_danadesa, 0, '', '.'); ?>'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>Rp. {point.y:,.0f}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: ''
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: Rp. {point.y:,.0f}',
                    connectorColor: 'silver'
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: [{
                    name: 'Reguler (<?= $persen_reg ?>%)',
                    y: <?= $grand_total_reg ?>
                },
                {
                    name: 'BLTDD (<?= $persen_bltdd ?>%)',
                    y: <?= $grand_total_bltdd ?>
                },
                {
                    name: 'KPH (<?= $persen_kph ?>%)',
                    y: <?= $grand_total_kph ?>
                },
                {
                    name: 'PPKM (<?= $persen_covid ?>%)',
                    y: <?= $grand_total_covid ?>
                },
            ]
        }]
    });

    Highcharts.chart('capaian_danadesa', {
        chart: {
            backgroundColor: 'rgba(0,0,0,0)',
            type: 'bar'
        },
        title: {
            text: 'PERSENTASE CAPAIAN DANADESA'
        },
        subtitle: {
            text: 'Kabupaten <?= $kab ?>' + ' ' + '<?= date("Y") ?>'
        },
        xAxis: {
            categories: ['Reguler', 'BLTDD', 'KPH', 'PPKM'],
            title: {
                text: null
            }
        },
        yAxis: [{
            min: 0,
            title: {
                text: 'Persentase (%)',
                align: 'high'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0) + '%';
                }
            }
        }],
        plotOptions: {
            bar: {
                dataLabels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.y), 2) + ' %';
                    },
                    enabled: true
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Salur',
            data: [<?= $capaian_salur_reg ?>, <?= $capaian_salur_bltdd ?>, <?= $capaian_salur_kph ?>, <?= $capaian_salur_covid ?>],
            tooltip: {
                valueSuffix: ' %'
            },
            showInLegend: true,
        }, {
            name: 'Realisasi',
            data: [<?= $capaian_realisasi_reg ?>, <?= $capaian_realisasi_bltdd ?>, <?= $capaian_realisasi_kph ?>, <?= $capaian_realisasi_covid ?>],
            tooltip: {
                valueSuffix: ' %'
            },
            showInLegend: true,
        }]
    });

    Highcharts.chart('realisasi_danadesa_reguler_bulanan', {
        chart: {
            backgroundColor: 'rgba(0,0,0,0)'
        },
        title: {
            text: 'DANA DESA REGULER'
        },
        subtitle: {
            text: 'Kabupaten <?= $kab ?>' + ' ' + '<?= date("Y") ?>'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
        },
        yAxis: {
            title: {
                text: 'Realisasi (Rp.)'
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
            name: 'Salur',
            type: 'column',
            color: 'tomato',
            data: [<?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_januari'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_februari'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_maret'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_april'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_mei'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_juni'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_juli'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_agustus'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_september'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_oktober'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_november'] : 0 ?>, <?= $salur_bulanan_danadesa_reguler != null ? $salur_bulanan_danadesa_reguler['salur_desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }, {
            name: 'Realisasi',
            type: 'column',
            color: 'cyan',
            data: [<?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_reguler != null ? $realisasi_bulanan_danadesa_reguler['desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }]
    });

    Highcharts.chart('realisasi_danadesa_bltdd_bulanan', {
        chart: {
            backgroundColor: 'rgba(0,0,0,0)'
        },
        title: {
            text: 'DANA DESA BLTDD'
        },
        subtitle: {
            text: 'Kabupaten <?= $kab ?>' + ' ' + '<?= date("Y") ?>'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
        },
        yAxis: {
            title: {
                text: 'Realisasi (Rp.)'
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
            name: 'Salur',
            type: 'column',
            color: 'tomato',
            data: [<?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_januari'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_februari'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_maret'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_april'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_mei'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_juni'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_juli'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_agustus'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_september'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_oktober'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_november'] : 0 ?>, <?= $salur_bulanan_danadesa_bltdd != null ? $salur_bulanan_danadesa_bltdd['salur_desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }, {
            name: 'Realisasi',
            type: 'column',
            color: 'cyan',
            data: [<?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_bltdd != null ? $realisasi_bulanan_danadesa_bltdd['desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }]
    });

    Highcharts.chart('realisasi_danadesa_kph_bulanan', {
        chart: {
            backgroundColor: 'rgba(0,0,0,0)'
        },
        title: {
            text: 'DANA DESA KPH'
        },
        subtitle: {
            text: 'Kabupaten <?= $kab ?>' + ' ' + '<?= date("Y") ?>'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
        },
        yAxis: {
            title: {
                text: 'Realisasi (Rp.)'
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
            name: 'Salur',
            type: 'column',
            color: 'tomato',
            data: [<?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_januari'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_februari'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_maret'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_april'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_mei'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_juni'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_juli'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_agustus'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_september'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_oktober'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_november'] : 0 ?>, <?= $salur_bulanan_danadesa_kph != null ? $salur_bulanan_danadesa_kph['salur_desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }, {
            name: 'Realisasi',
            type: 'column',
            color: 'cyan',
            data: [<?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_kph != null ? $realisasi_bulanan_danadesa_kph['desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }]
    });

    Highcharts.chart('realisasi_danadesa_covid_bulanan', {
        chart: {
            backgroundColor: 'rgba(0,0,0,0)'
        },
        title: {
            text: 'DANA DESA PPKM'
        },
        subtitle: {
            text: 'Kabupaten <?= $kab ?>' + ' ' + '<?= date("Y") ?>'
        },
        xAxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des']
        },
        yAxis: {
            title: {
                text: 'Realisasi (Rp.)'
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
            name: 'Salur',
            type: 'column',
            color: 'tomato',
            data: [<?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_januari'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_februari'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_maret'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_april'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_mei'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_juni'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_juli'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_agustus'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_september'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_oktober'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_november'] : 0 ?>, <?= $salur_bulanan_danadesa_covid != null ? $salur_bulanan_danadesa_covid['salur_desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }, {
            name: 'Realisasi',
            type: 'column',
            color: 'cyan',
            data: [<?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['januari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['februari'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['maret'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['april'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['mei'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['juni'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['juli'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['agustus'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['september'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['oktober'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['november'] : 0 ?>, <?= $realisasi_bulanan_danadesa_covid != null ? $realisasi_bulanan_danadesa_covid['desember'] : 0 ?>],
            showInLegend: true,
            // dataLabels: {
            //     enabled: true,
            //     format: 'Rp. {point.y:,.0f}'
            // },
            tooltip: {
                valuePrefix: 'Rp. '
            },
        }]
    });
</script>

</body>

</html>
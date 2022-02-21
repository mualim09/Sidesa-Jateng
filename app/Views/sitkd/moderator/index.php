<!-- Begin Page Content -->
<link rel="stylesheet" href="<?= base_url() ?>/css/sitkd/dashboardpemprov.css">
<link rel="stylesheet" href="<?= base_url() ?>/css/sitkd/chartss.css">

<!-- yang piechart -->
<script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/export-data.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>
<!-- yang batang -->
<script src="<?= base_url(); ?>/highchart/code/modules/data.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/drilldown.js"></script>

<div class="container-fluid">
    <style>
        #content {
            background: url(<?= base_url("/img/bg/sitkd/bg-body.png") ?>);
            background-position: center;
        }
    </style>
    <div class="row text-white" style="justify-content: center;">
        <div class="card bg-primary" style="width: 16rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-users"></i>
                </div>
                <h5 class="card-title">JUMLAH MEMBER SAAT INI</h5>
                <div class="display-4 mb-2"><?= $getmember ?></div>
                <a href="<?= base_url('sitkd/moderator/role') ?>" style="text-decoration: none;">
                    <p class="card-text">Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
        <div class="card bg-success ml-3" style="width: 16rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-file-medical-alt"></i>
                </div>
                <h5 class="card-title">TOTAL DOKUMEN TMTKD</h5>
                <div class="display-4 mb-2"><?= $getdokumen ?></div>
                <a href="<?= base_url('sitkd/menu/verifikasidokumen') ?>" style="text-decoration: none;">
                    <p class="card-text">Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
        <div class="card bg-warning ml-3" style="width: 16rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-calendar-check"></i>
                </div>
                <h5 class="card-title">DOKUMEN SUKSES TMTKD</h5>
                <div class="display-4 mb-2"><?= $getdokumensukses ?></div>
                <a href="<?= base_url('sitkd/accmenu/dokumensukses') ?>" style=" text-decoration: none;">
                    <p class="card-text">Detail<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
        <div class="card bg-danger ml-3" style="width: 16rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-fw fa-file-csv"></i>
                </div>
                <h6 class="card-title mb-4">Rekap Persetujuan Gubernur TMTKD</h6>
                <div class="display-5 mb-4"><?= date("Y") ?></div>
                <a href="<?= base_url('sitkd/excel/rekap') ?>" style="text-decoration: none;">
                    <p class="card-text">Download<i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
    </div>

    <figure class="highcharts-figure">
        <div id="kategori3"></div>
    </figure>

    <figure class="highcharts-figure">
        <div id="chart18jenis"></div>
    </figure>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>

<script>
    // Build the chart
    Highcharts.setOptions({
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

    // Build the chart
    Highcharts.chart('kategori3', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Grafik kategori yang terselesaikan ditahun <?= date("Y") ?>'
        },
        credits: {
            enabled: false
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}</b>'
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
                    format: '<b>{point.name}</b>: {point.y:,.0f}',
                    connectorColor: 'silver'
                }
            }
        },
        series: [{
            name: 'Total',
            data: [{
                    name: 'Kepentingan umum',
                    y: <?= $kategori1; ?>
                },
                {
                    name: 'PERMENDAGRI No. 4 / 2007',
                    y: <?= $kategori2; ?>
                },
                {
                    name: 'Bukan kepentingan umum',
                    y: <?= $kategori3; ?>
                }
            ]
        }]
    });

    // Create the chart
    Highcharts.chart('chart18jenis', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik kepentingan umum yang terselesaikan ditahun <?= date("Y") ?>'
        },
        subtitle: {
            text: '18 Jenis Kepentingan Umum Pasal 10 UU No. 2 / 2012'
        },
        accessibility: {
            announceNewData: {
                enabled: true
            }
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total yang terselesaikan'
            }

        },
        legend: {
            enabled: false
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:,.0f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:,.0f}</b> of total<br/>'
        },

        series: [{
            name: "Total",
            colorByPoint: true,
            data: [{
                    name: 'Jalan Umum, Jalan Tol, Terowongan, Jalur Kereta Api, Stasiun Kereta Api, Dan Fasilitas Operasi Kereta Api',
                    y: <?= $jenis2; ?>,
                    drilldown: false
                },
                {
                    name: 'Waduk, Bendungan, Bendung, Irigasi, Saluran Air Minum, Saluran Pembuangan Air dan Sanitasi, Dan Bangunan Pengairan Lainnya',
                    y: <?= $jenis3; ?>,
                    drilldown: false
                },
                {
                    name: 'Rumah Sakit Pemerintah / Pemerintah Daerah',
                    y: <?= $jenis9; ?>,
                    drilldown: false
                },
                {
                    name: 'Kantor Pemerintah / Pemerintah Daerah / Desa',
                    y: <?= $jenis14; ?>,
                    drilldown: false
                },
                {
                    name: 'Prasarana Pendidikan Atau Sekolah Pemerintah / Pemerintah Daerah',
                    y: <?= $jenis16; ?>,
                    drilldown: false
                },
                {
                    name: 'Prasarana Olah Raga Pemerintah / Pemerintah Daerah',
                    y: <?= $jenis17; ?>,
                    drilldown: false
                }
            ]
        }],
    });
</script>
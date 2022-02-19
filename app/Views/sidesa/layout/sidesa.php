<!-- **start header -->
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <meta name="description" content="Sistem Informasi Desa Provinsi Jawa Tengah" />
    <meta name="keywords" content="SIDesa, SITKD, GEODESA, JATENG, PROV JATENG, Provinsi Jawa Tengah" />
    <meta name="author" content="zakezone" />
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/fav.ico'); ?>">

    <!-- preloader -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/preloadersidesa.css'); ?>">

    <!-- style load : font, icon, css.-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/css/bootstrap.css'); ?>"> <!-- ini bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/tubuh.css'); ?>"> <!-- ini nav -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/gataudah.css'); ?>"> <!-- ini page kontennya -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/codrop.css'); ?>"> <!-- ini codrop template blueprint -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('fontawesome-free/css/all.css'); ?>"> <!-- ini paket icon sidesa -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admpemdes.css'); ?>"> <!-- ini style tampilan halaman adm pemdes -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/pemerintahprovinsipage.css'); ?>"> <!-- untuk halaman pemerintah provinsi -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('highchart/css/statistikbulanan.css'); ?>"> <!-- untuk statistik bulanan -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('highchart/css/statistiktahunan.css'); ?>"> <!-- untuk statistik tahunan -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('leaflet/leaflet.css'); ?>"> <!-- ini leaflet halaman kontak-->

    <!-- data tables untuk halaman download -->
    <link href="<?= base_url('css/datatablepart1sidesa.min.css') ?>" rel="stylesheet" type="text/css" /> <!-- untuk halaman download datatables dan searching -->
    <link href="<?= base_url('css/datatablepart2sidesa.min.css') ?>" rel="stylesheet" type="text/css" /> <!-- untuk halaman download datatables dan searching -->

    <!-- untuk preloader js dkk -->
    <script type="text/javascript" src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script> <!-- ini supaya bisa pakai JS -->
</head>

<body>
    <div class="text-center" id="loading">
        <div class="loader"></div>
        <div class="textLoader" style="margin-top: 25%; color: #34495e;">
            <b>SIDesa Provinsi Jawa Tengah</b>
        </div>
    </div>
    <!-- /header -->

    <!-- start konten -->
    <?= $this->renderSection('content'); ?>
    <!-- /konten -->

    <!-- **start footer -->

    <!-- preloader -->
    <script type="text/javascript" src="<?= base_url('js/sidesa/loader.js'); ?>"></script>

    <!-- Punya blueprint -->
    <script src="<?= base_url('bootstrap/js/bootstrap.js'); ?>"></script>
    <script src="<?= base_url('js/modernizr-custom.js'); ?>"></script> <!-- ini js blueprint -->
    <script src="<?= base_url('js/classie.js'); ?>"></script>
    <script src="<?= base_url('js/main.js'); ?>"></script>

    <!-- data tables pada halaman download -->
    <script src="<?= base_url('minia/libs/datatables.net/js/jquery.dataTables.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js'); ?>"></script>
    <!-- tampilan banyaknya data halaman download-->
    <script>
        $(document).ready(function() {
            $('.datatable').DataTable({
                responsive: false,
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]
            });
        });
    </script>

    <!-- Punya leaflet -->
    <script src="<?= base_url('leaflet/leaflet.js'); ?>"></script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->

    <!-- Punya highchart -->
    <script src="<?= base_url('highchart/code/highcharts.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/highcharts-more.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/modules/data.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/modules/exporting.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/modules/export-data.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/modules/accessibility.js'); ?>"></script>

    <!-- keperluan kontak kami -->
    <script type="text/javascript">
        var map = L.map('map').setView([-6.9929237, 110.4164768], 16);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

        L.marker([-6.9929237, 110.4164768]).addTo(map)
            .bindPopup('DISPERMADESDUKCAPIL<br>PROV. JATENG.')
            .openPopup();
    </script>
    <!-- /kontak kami -->

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

        //Keperluan statistik bulanan
        Highcharts.chart('statistikbulanan', {
            data: {
                table: 'freq',
                startRow: 1,
                endRow: 13,
                endColumn: 3
            },

            title: {
                text: 'Data Bulanan di Tahun <?= date("Y"); ?>',
                align: 'left'
            },

            chart: {
                polar: true,
                type: 'column'
            },

            credits: {
                enabled: false
            },

            pane: {
                size: '85%'
            },

            legend: {
                align: 'right',
                verticalAlign: 'top',
                y: 125,
                layout: 'vertical'
            },

            xAxis: {
                tickmarkPlacement: 'on'
            },

            yAxis: {
                min: 0,
                endOnTick: false,
                showLastLabel: true,
                title: false,
                labels: false,
                reversedStacks: false
            },

            tooltip: {
                valueSuffix: ''
            },

            plotOptions: {
                series: {
                    stacking: 'normal',
                    shadow: false,
                    groupPadding: 0,
                    pointPlacement: 'on'
                }
            }
        });

        //Keperluan statistik tahunan
        Highcharts.chart('statistiktahunan', {
            chart: {
                type: 'areaspline'
            },
            title: {
                text: 'Data tahunan'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            xAxis: {
                categories: ['2020', '2021', '2022', '2023', '2024', '2025', '2026', '2027', '2028', '2029', '2030']
            },
            yAxis: {
                title: {
                    text: 'Frekuensi'
                },
                labels: {
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                },
            },
            tooltip: {
                shared: true,
                valueSuffix: false
            },
            credits: {
                enabled: false
            },
            plotOptions: {
                areaspline: {
                    fillOpacity: 0.5
                }
            },
            series: [{
                name: 'Pengunjung',
                color: 'rgba(0, 61, 255, 0.5)',
                data: [
                    <?php if ($pengunjung2020 != 0) {
                        echo $pengunjung2020;
                    } ?>,
                    <?php if ($pengunjung2021 != 0) {
                        echo $pengunjung2021;
                    } ?>,
                    <?php if ($pengunjung2022 != 0) {
                        echo $pengunjung2022;
                    } ?>,
                    <?php if ($pengunjung2023 != 0) {
                        echo $pengunjung2023;
                    } ?>,
                    <?php if ($pengunjung2024 != 0) {
                        echo $pengunjung2024;
                    } ?>,
                    <?php if ($pengunjung2025 != 0) {
                        echo $pengunjung2025;
                    } ?>,
                    <?php if ($pengunjung2026 != 0) {
                        echo $pengunjung2026;
                    } ?>,
                    <?php if ($pengunjung2027 != 0) {
                        echo $pengunjung2027;
                    } ?>,
                    <?php if ($pengunjung2028 != 0) {
                        echo $pengunjung2028;
                    } ?>,
                    <?php if ($pengunjung2029 != 0) {
                        echo $pengunjung2029;
                    } ?>,
                    <?php if ($pengunjung2030 != 0) {
                        echo $pengunjung2030;
                    } ?>
                ]
            }, {
                name: 'Akses',
                color: 'rgba(0, 0, 0, 0.6)',
                data: [
                    <?php if ($pengunjungakses2020->hits != 0) {
                        echo $pengunjungakses2020->hits;
                    } ?>,
                    <?php if ($pengunjungakses2021->hits != 0) {
                        echo $pengunjungakses2021->hits;
                    } ?>,
                    <?php if ($pengunjungakses2022->hits != 0) {
                        echo $pengunjungakses2022->hits;
                    } ?>,
                    <?php if ($pengunjungakses2023->hits != 0) {
                        echo $pengunjungakses2023->hits;
                    } ?>,
                    <?php if ($pengunjungakses2024->hits != 0) {
                        echo $pengunjungakses2024->hits;
                    } ?>,
                    <?php if ($pengunjungakses2025->hits != 0) {
                        echo $pengunjungakses2025->hits;
                    } ?>,
                    <?php if ($pengunjungakses2026->hits != 0) {
                        echo $pengunjungakses2026->hits;
                    } ?>,
                    <?php if ($pengunjungakses2027->hits != 0) {
                        echo $pengunjungakses2027->hits;
                    } ?>,
                    <?php if ($pengunjungakses2028->hits != 0) {
                        echo $pengunjungakses2028->hits;
                    } ?>,
                    <?php if ($pengunjungakses2029->hits != 0) {
                        echo $pengunjungakses2029->hits;
                    } ?>,
                    <?php if ($pengunjungakses2030->hits != 0) {
                        echo $pengunjungakses2030->hits;
                    } ?>
                ]
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 700
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });
    </script>
    <!-- /Keperluan statistik tahunan -->
    <!-- /footer -->

</body>

</html>
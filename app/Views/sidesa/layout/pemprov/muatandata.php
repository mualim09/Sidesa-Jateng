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
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/logodata.ico'); ?>">

    <!-- style load : font, icon, css.-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('bootstrap/css/bootstrap.css'); ?>"> <!-- ini bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/pemprovdata.css'); ?>"> <!-- ini style page data tingkat pemprov -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('highchart/css/basicbar.css') ?>">
    <script type="text/javascript" src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script> <!-- ini supaya bisa pakai JS -->
</head>

<body>
    <!-- /header -->

    <!-- start konten -->
    <?= $this->renderSection('content'); ?>
    <!-- /konten -->

    <!-- **start footer -->
    <!-- Punya highchart -->
    <script src="<?= base_url('highchart/code/highcharts.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/modules/series-label.js') ?>"></script>
    <script src="<?= base_url('highchart/code/modules/exporting.js'); ?>"></script>
    <script src="<?= base_url('highchart/code/modules/accessibility.js'); ?>"></script>

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

        // basic bar muatandata
        Highcharts.chart('grafik_muatandata', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Laporan data dan informasi yang telah di unggah'
            },
            subtitle: {
                text: 'sepanjang tahun 2022 - <?= date('Y'); ?>'
            },
            xAxis: {

                categories: [
                    <?php foreach ($nmdata22 as $data) : ?> "<?= $data ?>",
                    <?php endforeach; ?>
                ],
                title: {
                    text: null
                }
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Download (total)',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify',
                    formatter: function() {
                        return Highcharts.numberFormat(Math.abs(this.value), 0);
                    }
                }
            },
            tooltip: {
                valueSuffix: ' kali'
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            series: [{
                name: 'Tahun 2022',
                data: [
                    <?php foreach ($click22 as $dataclick) : ?>
                        <?= $dataclick ?>,
                    <?php endforeach; ?>
                ],
            }]
        });
    </script>
    <!-- /footer -->

</body>

</html>
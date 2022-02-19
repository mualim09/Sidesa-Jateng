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
    <link rel="shortcut icon" href="<?= base_url(); ?>/img/thumbnail/logodata.ico">

    <!-- style load : font, icon, css.-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/bootstrap/css/bootstrap.css"> <!-- ini bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/css/pemprovdata.css"> <!-- ini style page data tingkat pemprov -->
    <link rel="stylesheet" href="<?= base_url() ?>/highchart/css/basicliner.css">
</head>

<body>
    <!-- /header -->

    <!-- start konten -->
    <?= $this->renderSection('content'); ?>
    <!-- /konten -->

    <!-- **start footer -->
    <!-- Punya highchart -->
    <script type="text/javascript" src="<?= base_url(); ?>/js/jquery-3.5.1.js"></script> <!-- ini supaya bisa pakai JS -->
    <script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
    <script src="<?= base_url() ?>/highchart/code/modules/series-label.js"></script>
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

        // basicline posyandu
        Highcharts.chart('grafik_posyandu', {

            title: {
                text: 'Data Posyandu Tingkat Provinsi Jawa Tengah'
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
                    <?= $posyandu20->posyandu != 0 ? $posyandu20->posyandu : null ?>, <?= $posyandu21->posyandu != 0 ? $posyandu21->posyandu : null ?>, <?= $posyandu22->posyandu != 0 ? $posyandu22->posyandu : null ?>
                ]
            }, {
                name: 'Jumlah Kader',
                data: [
                    <?= $posyandu20->kader != 0 ? $posyandu20->kader : null ?>, <?= $posyandu21->kader != 0 ? $posyandu21->kader : null ?>, <?= $posyandu22->kader != 0 ? $posyandu22->kader : null ?>
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
    <!-- /footer -->

</body>

</html>
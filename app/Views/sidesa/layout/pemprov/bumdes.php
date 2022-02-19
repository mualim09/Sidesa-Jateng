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
    <link rel="stylesheet" type="text/css" href="<?= base_url('highchart/css/basicliner.css') ?>">
</head>

<body>
    <!-- /header -->

    <!-- start konten -->
    <?= $this->renderSection('content'); ?>
    <!-- /konten -->

    <!-- **start footer -->
    <!-- Punya highchart -->
    <script type="text/javascript" src="<?= base_url('js/jquery-3.5.1.js'); ?>"></script> <!-- ini supaya bisa pakai JS -->
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

        // basic line idm
        Highcharts.chart('grafik_bumdes', {

            title: {
                text: 'Tingkat Provinsi Jawa Tengah'
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
                    <?= isset($bumdes2019['MAJU']) ? $bumdes2019['MAJU'] : 0 ?>, <?= isset($bumdes2020['MAJU']) ? $bumdes2020['MAJU'] : 0 ?>, <?= isset($bumdes2021['MAJU']) ? $bumdes2021['MAJU'] : NULL ?>, <?= isset($bumdes2022['MAJU']) ? $bumdes2022['MAJU'] : NULL ?>
                ]
            }, {
                name: 'Dasar',
                data: [
                    <?= isset($bumdes2019['DASAR']) ? $bumdes2019['DASAR'] : NULL ?>, <?= isset($bumdes2020['DASAR']) ? $bumdes2020['DASAR'] : NULL ?>, <?= isset($bumdes2021['DASAR']) ? $bumdes2021['DASAR'] : NULL ?>, <?= isset($bumdes2022['DASAR']) ? $bumdes2022['DASAR'] : NULL ?>
                ]
            }, {
                name: 'Berkembang',
                data: [
                    <?= isset($bumdes2019['BERKEMBANG']) ? $bumdes2019['BERKEMBANG'] : NULL ?>, <?= isset($bumdes2020['BERKEMBANG']) ? $bumdes2020['BERKEMBANG'] : NULL ?>, <?= isset($bumdes2021['BERKEMBANG']) ? $bumdes2021['BERKEMBANG'] : NULL ?>, <?= isset($bumdes2022['BERKEMBANG']) ? $bumdes2022['BERKEMBANG'] : NULL ?>
                ]
            }, {
                name: 'Tumbuh',
                data: [
                    <?= isset($bumdes2019['TUMBUH']) ? $bumdes2019['TUMBUH'] : NULL ?>, <?= isset($bumdes2020['TUMBUH']) ? $bumdes2020['TUMBUH'] : NULL ?>, <?= isset($bumdes2021['TUMBUH']) ? $bumdes2021['TUMBUH'] : NULL ?>, <?= isset($bumdes2022['TUMBUH']) ? $bumdes2022['TUMBUH'] : NULL ?>
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
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
                name: 'Mandiri',
                data: [
                    <?= isset($idm2019['MANDIRI']) ? $idm2019['MANDIRI'] : null ?>, <?= isset($idm2020['MANDIRI']) ? $idm2020['MANDIRI'] : null ?>, <?= isset($idm2021['MANDIRI']) ? $idm2021['MANDIRI'] : null ?>, <?= isset($idm2022['MANDIRI']) ? $idm2022['MANDIRI'] : null ?>
                ]
            }, {
                name: 'Maju',
                data: [
                    <?= isset($idm2019['MAJU']) ? $idm2019['MAJU'] : null ?>, <?= isset($idm2020['MAJU']) ? $idm2020['MAJU'] : null ?>, <?= isset($idm2021['MAJU']) ? $idm2021['MAJU'] : null ?>, <?= isset($idm2022['MAJU']) ? $idm2022['MAJU'] : null ?>
                ]
            }, {
                name: 'Berkembang',
                data: [
                    <?= isset($idm2019['BERKEMBANG']) ? $idm2019['BERKEMBANG'] : null ?>, <?= isset($idm2020['BERKEMBANG']) ? $idm2020['BERKEMBANG'] : null ?>, <?= isset($idm2021['BERKEMBANG']) ? $idm2021['BERKEMBANG'] : null ?>, <?= isset($idm2022['BERKEMBANG']) ? $idm2022['BERKEMBANG'] : null ?>
                ]
            }, {
                name: 'Tertinggal',
                data: [
                    <?= isset($idm2019['TERTINGGAL']) ? $idm2019['TERTINGGAL'] : null ?>, <?= isset($idm2020['TERTINGGAL']) ? $idm2020['TERTINGGAL'] : null ?>, <?= isset($idm2021['TERTINGGAL']) ? $idm2021['TERTINGGAL'] : null ?>, <?= isset($idm2022['TERTINGGAL']) ? $idm2022['TERTINGGAL'] : null ?>
                ]
            }, {
                name: 'Sangat tertinggal',
                data: [
                    <?= isset($idm2019['SANGAT TERTINGGAL']) ? $idm2019['SANGAT TERTINGGAL'] : null ?>, <?= isset($idm2020['SANGAT TERTINGGAL']) ? $idm2020['SANGAT TERTINGGAL'] : null ?>, <?= isset($idm2021['SANGAT TERTINGGAL']) ? $idm2021['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idm2022['SANGAT TERTINGGAL']) ? $idm2022['SANGAT TERTINGGAL'] : null ?>
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
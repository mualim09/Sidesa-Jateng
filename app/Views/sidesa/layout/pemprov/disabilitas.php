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

        // basicline disabilitas
        Highcharts.chart('grafik_disabilitas', {

            title: {
                text: 'Tingkat Provinsi Jawa Tengah'
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
    <!-- /footer -->

</body>

</html>
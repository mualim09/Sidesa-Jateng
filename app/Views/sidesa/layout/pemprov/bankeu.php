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
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/bankeu.css">
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
    <script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
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

        Highcharts.chart('bankeu_salur_perkab_duit', {
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes']
            },
            yAxis: {
                title: {
                    text: 'BANKEU (Tersalur)'
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
                type: 'column',
                colorByPoint: true,
                data: [<?= $bankeu_salur_cilacap[0]['bantuan'] ?>, <?= $bankeu_salur_banyumas[0]['bantuan'] ?>, <?= $bankeu_salur_purbalingga[0]['bantuan'] ?>, <?= $bankeu_salur_banjarnegara[0]['bantuan'] ?>, <?= $bankeu_salur_kebumen[0]['bantuan'] ?>, <?= $bankeu_salur_purworejo[0]['bantuan'] ?>, <?= $bankeu_salur_wonosobo[0]['bantuan'] ?>, <?= $bankeu_salur_magelang[0]['bantuan'] ?>, <?= $bankeu_salur_boyolali[0]['bantuan'] ?>, <?= $bankeu_salur_klaten[0]['bantuan'] ?>, <?= $bankeu_salur_sukoharjo[0]['bantuan'] ?>, <?= $bankeu_salur_wonogiri[0]['bantuan'] ?>, <?= $bankeu_salur_karanganyar[0]['bantuan'] ?>, <?= $bankeu_salur_sragen[0]['bantuan'] ?>, <?= $bankeu_salur_grobogan[0]['bantuan'] ?>, <?= $bankeu_salur_blora[0]['bantuan'] ?>, <?= $bankeu_salur_rembang[0]['bantuan'] ?>, <?= $bankeu_salur_pati[0]['bantuan'] ?>, <?= $bankeu_salur_kudus[0]['bantuan'] ?>, <?= $bankeu_salur_jepara[0]['bantuan'] ?>, <?= $bankeu_salur_demak[0]['bantuan'] ?>, <?= $bankeu_salur_semarang[0]['bantuan'] ?>, <?= $bankeu_salur_temanggung[0]['bantuan'] ?>, <?= $bankeu_salur_kendal[0]['bantuan'] ?>, <?= $bankeu_salur_batang[0]['bantuan'] ?>, <?= $bankeu_salur_pekalongan[0]['bantuan'] ?>, <?= $bankeu_salur_pemalang[0]['bantuan'] ?>, <?= $bankeu_salur_tegal[0]['bantuan'] ?>, <?= $bankeu_salur_brebes[0]['bantuan'] ?>, ],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    pointFormat: 'Rp. {point.y}'
                },
            }]
        });

        Highcharts.chart('bankeu_salur_perkab_lokasi', {
            title: {
                text: ''
            },
            xAxis: {
                categories: ['Cilacap', 'Banyumas', 'Purbalingga', 'Banjarnegara', 'Kebumen', 'Purworejo', 'Wonosobo', 'Magelang', 'Boyolali', 'Klaten', 'Sukoharjo', 'Wonogiri', 'Karanganyar', 'Sragen', 'Grobogan', 'Blora', 'Rembang', 'Pati', 'Kudus', 'Jepara', 'Demak', 'Semarang', 'Temanggung', 'Kendal', 'Batang', 'Pekalongan', 'Pemalang', 'Tegal', 'Brebes']
            },
            yAxis: {
                title: {
                    text: 'BANKEU (Titik Lokasi)'
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
                type: 'column',
                colorByPoint: true,
                data: [<?= $bankeu_salur_cilacap[0]['lokasi'] ?>, <?= $bankeu_salur_banyumas[0]['lokasi'] ?>, <?= $bankeu_salur_purbalingga[0]['lokasi'] ?>, <?= $bankeu_salur_banjarnegara[0]['lokasi'] ?>, <?= $bankeu_salur_kebumen[0]['lokasi'] ?>, <?= $bankeu_salur_purworejo[0]['lokasi'] ?>, <?= $bankeu_salur_wonosobo[0]['lokasi'] ?>, <?= $bankeu_salur_magelang[0]['lokasi'] ?>, <?= $bankeu_salur_boyolali[0]['lokasi'] ?>, <?= $bankeu_salur_klaten[0]['lokasi'] ?>, <?= $bankeu_salur_sukoharjo[0]['lokasi'] ?>, <?= $bankeu_salur_wonogiri[0]['lokasi'] ?>, <?= $bankeu_salur_karanganyar[0]['lokasi'] ?>, <?= $bankeu_salur_sragen[0]['lokasi'] ?>, <?= $bankeu_salur_grobogan[0]['lokasi'] ?>, <?= $bankeu_salur_blora[0]['lokasi'] ?>, <?= $bankeu_salur_rembang[0]['lokasi'] ?>, <?= $bankeu_salur_pati[0]['lokasi'] ?>, <?= $bankeu_salur_kudus[0]['lokasi'] ?>, <?= $bankeu_salur_jepara[0]['lokasi'] ?>, <?= $bankeu_salur_demak[0]['lokasi'] ?>, <?= $bankeu_salur_semarang[0]['lokasi'] ?>, <?= $bankeu_salur_temanggung[0]['lokasi'] ?>, <?= $bankeu_salur_kendal[0]['lokasi'] ?>, <?= $bankeu_salur_batang[0]['lokasi'] ?>, <?= $bankeu_salur_pekalongan[0]['lokasi'] ?>, <?= $bankeu_salur_pemalang[0]['lokasi'] ?>, <?= $bankeu_salur_tegal[0]['lokasi'] ?>, <?= $bankeu_salur_brebes[0]['lokasi'] ?>, ],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    pointFormat: '{point.y} Titik'
                },
            }]
        });

        Highcharts.chart('bankeu_salur_pertahun_duit', {
            title: {
                text: ''
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2018
                }
            },
            yAxis: {
                title: {
                    text: 'BANKEU (Tersalur)'
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
                type: 'column',
                colorByPoint: true,
                data: [<?= $bankeu_salur_2018[0]['bantuan'] ?>, <?= $bankeu_salur_2019[0]['bantuan'] ?>, <?= $bankeu_salur_2020[0]['bantuan'] ?>, <?= $bankeu_salur_2021[0]['bantuan'] ?>, <?= isset($bankeu_salur_2022[0]['bantuan']) ? $bankeu_salur_2022[0]['bantuan'] : NULL ?>, <?= isset($bankeu_salur_2023[0]['bantuan']) ? $bankeu_salur_2023[0]['bantuan'] : NULL ?>, <?= isset($bankeu_salur_2024[0]['bantuan']) ? $bankeu_salur_2024[0]['bantuan'] : NULL ?>, <?= isset($bankeu_salur_2025[0]['bantuan']) ? $bankeu_salur_2025[0]['bantuan'] : NULL ?>],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    pointFormat: 'Rp. {point.y}'
                },
            }]
        });

        Highcharts.chart('bankeu_salur_pertahun_lokasi', {
            title: {
                text: ''
            },
            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2018
                }
            },
            yAxis: {
                title: {
                    text: 'BANKEU (Titik Lokasi)'
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
                type: 'column',
                colorByPoint: true,
                data: [<?= $bankeu_salur_2018[0]['lokasi'] ?>, <?= $bankeu_salur_2019[0]['lokasi'] ?>, <?= $bankeu_salur_2020[0]['lokasi'] ?>, <?= $bankeu_salur_2021[0]['lokasi'] ?>, <?= isset($bankeu_salur_2022[0]['lokasi']) ? $bankeu_salur_2022[0]['lokasi'] : NULL ?>, <?= isset($bankeu_salur_2023[0]['lokasi']) ? $bankeu_salur_2023[0]['lokasi'] : NULL ?>, <?= isset($bankeu_salur_2024[0]['lokasi']) ? $bankeu_salur_2024[0]['lokasi'] : NULL ?>, <?= isset($bankeu_salur_2025[0]['lokasi']) ? $bankeu_salur_2025[0]['lokasi'] : NULL ?>],
                showInLegend: false,
                // dataLabels: {
                //     enabled: true,
                //     format: 'Rp. {point.y:,.0f}'
                // },
                tooltip: {
                    pointFormat: '{point.y} Titik'
                },
            }]
        });
    </script>
    <!-- /footer -->

</body>

</html>
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

        // basicline kesejahteraan
        Highcharts.chart('grafik_kesejahteraan', {

            title: {
                text: 'Data time series'
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
                categories: ['Jan 20', 'Okt 20', ],
                lineWidth: 1
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    }
                }
            },

            credits: {
                enabled: false
            },

            series: [{
                name: 'desil 1 Individu',
                data: [
                    <?= $artI20->desil1 != null ? $artI20->desil1 : null ?>, <?= $artII20->desil1 != null ? $artII20->desil1 : null ?>
                ]
            }, {
                name: 'desil 2 Individu',
                data: [
                    <?= $artI20->desil2 != null ? $artI20->desil2 : null ?>, <?= $artII20->desil2 != null ? $artII20->desil2 : null ?>
                ]
            }, {
                name: 'desil 3 Individu',
                data: [
                    <?= $artI20->desil3 != null ? $artI20->desil3 : null ?>, <?= $artII20->desil3 != null ? $artII20->desil3 : null ?>
                ]
            }, {
                name: 'desil 4 Individu',
                data: [
                    <?= $artI20->desil4 != null ? $artI20->desil4 : null ?>, <?= $artII20->desil4 != null ? $artII20->desil4 : null ?>
                ]
            }, {
                name: 'desil 4+ Individu',
                data: [
                    <?= $artI20->desil4plus != null ? $artI20->desil4plus : null ?>, <?= $artII20->desil4plus != null ? $artII20->desil4plus : null ?>
                ]
            }, {
                name: 'desil 1 Rumah tangga',
                data: [
                    <?= $krtI20->desil1 != null ? $krtI20->desil1 : null ?>, <?= $krtII20->desil1 != null ? $krtII20->desil1 : null ?>
                ]
            }, {
                name: 'desil 2 Rumah tangga',
                data: [
                    <?= $krtI20->desil2 != null ? $krtI20->desil2 : null ?>, <?= $krtII20->desil2 != null ? $krtII20->desil2 : null ?>
                ]
            }, {
                name: 'desil 3 Rumah tangga',
                data: [
                    <?= $krtI20->desil3 != null ? $krtI20->desil3 : null ?>, <?= $krtII20->desil3 != null ? $krtII20->desil3 : null ?>
                ]
            }, {
                name: 'desil 4 Rumah tangga',
                data: [
                    <?= $krtI20->desil4 != null ? $krtI20->desil4 : null ?>, <?= $krtII20->desil4 != null ? $krtII20->desil4 : null ?>
                ]
            }, {
                name: 'desil 4+ Rumah tangga',
                data: [
                    <?= $krtI20->desil4plus != null ? $krtI20->desil4plus : null ?>, <?= $krtII20->desil4plus != null ? $krtII20->desil4plus : null ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    }
                }]
            }
        });

        // basicline masak
        Highcharts.chart('grafik_masak', {

            title: {
                text: 'Data time series'
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
                categories: ['Jan 20', 'Okt 20', 'Feb 2021'],
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
                name: 'Listrik / Gas',
                data: [
                    <?= isset($masakI20->listrik_gas) ? $masakI20->listrik_gas : null ?>, <?= isset($masakII20->listrik_gas) ? $masakII20->listrik_gas : null ?>
                ]
            }, {
                name: 'Minyak Tanah',
                data: [
                    <?= isset($masakI20->minyak_tanah) ? $masakI20->minyak_tanah : null ?>, <?= isset($masakII20->minyak_tanah) ? $masakII20->minyak_tanah : null ?>
                ]
            }, {
                name: 'Briket / Arang / Kayu',
                data: [
                    <?= isset($masakI20->briket_arang_kayu) ? $masakI20->briket_arang_kayu : null ?>, <?= isset($masakII20->briket_arang_kayu) ? $masakII20->briket_arang_kayu : null ?>
                ]
            }, {
                name: 'Tidak Memasak',
                data: [
                    <?= isset($masakI20->tidak_memasak) ? $masakI20->tidak_memasak : null ?>, <?= isset($masakII20->tidak_memasak) ? $masakII20->tidak_memasak : null ?>
                ]
            }, {
                name: 'Tanpa Keterangan',
                data: [
                    <?= isset($masakI20->tanpa_ket) ? $masakI20->tanpa_ket : null ?>, <?= isset($masakII20->tanpa_ket) ? $masakII20->tanpa_ket : null ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    }
                }]
            }

        });

        // basicline bab
        Highcharts.chart('grafik_bab', {

            title: {
                text: 'Data time series'
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
                name: 'Milik sendiri',
                data: [
                    <?= $babI20->milik_sendiri != null ? $babI20->milik_sendiri : null ?>, <?= $babII20->milik_sendiri != null ? $babII20->milik_sendiri : null ?>
                ]
            }, {
                name: 'Bersama',
                data: [
                    <?= $babI20->bersama != null ? $babI20->bersama : null ?>, <?= $babII20->bersama != null ? $babII20->bersama : null ?>
                ]
            }, {
                name: 'Umum',
                data: [
                    <?= $babI20->umum != null ? $babI20->umum : null ?>, <?= $babII20->umum != null ? $babII20->umum : null ?>
                ]
            }, {
                name: 'Tidak ada',
                data: [
                    <?= $babI20->tidak_ada != null ? $babI20->tidak_ada : null ?>, <?= $babII20->tidak_ada != null ? $babII20->tidak_ada : null ?>
                ]
            }, {
                name: 'Tanpa Keterangan',
                data: [
                    <?= $babI20->tanpa_ket != null ? $babI20->tanpa_ket : null ?>, <?= $babII20->tanpa_ket != null ? $babII20->tanpa_ket : null ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    }
                }]
            }
        });

        // basicline minum
        Highcharts.chart('grafik_minum', {

            title: {
                text: 'Data time series'
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
                name: 'Air kemasan',
                data: [
                    <?= $minumI20->air_kemasan != null ? $minumI20->air_kemasan : null ?>, <?= $minumII20->air_kemasan != null ? $minumII20->air_kemasan : null ?>
                ]
            }, {
                name: 'Air ledeng',
                data: [
                    <?= $minumI20->air_ledeng != null ? $minumI20->air_ledeng : null ?>, <?= $minumII20->air_ledeng != null ? $minumII20->air_ledeng : null ?>
                ]
            }, {
                name: 'Sumber terlindungi',
                data: [
                    <?= $minumI20->sumber_terlindung != null ? $minumI20->sumber_terlindung : null ?>, <?= $minumII20->sumber_terlindung != null ? $minumII20->sumber_terlindung : null ?>
                ]
            }, {
                name: 'Sumber tak terlindungi',
                data: [
                    <?= $minumI20->sumber_takterlindung != null ? $minumI20->sumber_takterlindung : null ?>, <?= $minumII20->sumber_takterlindung != null ? $minumII20->sumber_takterlindung : null ?>
                ]
            }, {
                name: 'lainnya',
                data: [
                    <?= $minumI20->lainnya != null ? $minumI20->lainnya : null ?>, <?= $minumII20->lainnya != null ? $minumII20->lainnya : null ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    }
                }]
            }
        });

        // basicline penerangan
        Highcharts.chart('grafik_penerangan', {

            title: {
                text: 'Data time series'
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
                categories: ['I 20', 'II 20'],
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
                name: 'Air kemasan',
                data: [
                    <?= $peneranganI20->pln != null ? $peneranganI20->pln : null ?>, <?= $peneranganII20->pln != null ? $peneranganII20->pln : null ?>
                ]
            }, {
                name: 'Air ledeng',
                data: [
                    <?= $peneranganI20->nonpln != null ? $peneranganI20->nonpln : null ?>, <?= $peneranganII20->nonpln != null ? $peneranganII20->nonpln : null ?>
                ]
            }, {
                name: 'Sumber terlindungi',
                data: [
                    <?= $peneranganI20->bukan_listrik != null ? $peneranganI20->bukan_listrik : null ?>, <?= $peneranganII20->bukan_listrik != null ? $peneranganII20->bukan_listrik : null ?>
                ]
            }, {
                name: 'Sumber tak terlindungi',
                data: [
                    <?= $peneranganI20->tanpa_keterangan != null ? $peneranganI20->tanpa_keterangan : null ?>, <?= $peneranganII20->tanpa_keterangan != null ? $peneranganII20->tanpa_keterangan : null ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    }
                }]
            }
        });

        // basicline tinggal
        Highcharts.chart('grafik_tinggal', {

            title: {
                text: 'Data time series'
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
                name: 'Milik sendiri',
                data: [
                    <?= $tinggalI20->milik_sendiri != null ? $tinggalI20->milik_sendiri : null ?>, <?= $tinggalII20->milik_sendiri != null ? $tinggalII20->milik_sendiri : null ?>
                ]
            }, {
                name: 'Kontrak / sewa',
                data: [
                    <?= $tinggalI20->kontrak != null ? $tinggalI20->kontrak : null ?>, <?= $tinggalII20->kontrak != null ? $tinggalII20->kontrak : null ?>
                ]
            }, {
                name: 'Beban sewa',
                data: [
                    <?= $tinggalI20->beban_sewa != null ? $tinggalI20->beban_sewa : null ?>, <?= $tinggalII20->beban_sewa != null ? $tinggalII20->beban_sewa : null ?>
                ]
            }, {
                name: 'Dinas',
                data: [
                    <?= $tinggalI20->dinas != null ? $tinggalI20->dinas : null ?>, <?= $tinggalII20->dinas != null ? $tinggalII20->dinas : null ?>
                ]
            }, {
                name: 'Lainnya',
                data: [
                    <?= $tinggalI20->lainnya != null ? $tinggalI20->lainnya : null ?>, <?= $tinggalII20->lainnya != null ? $tinggalII20->lainnya : null ?>
                ]
            }, {
                name: 'Tanpa keterangan',
                data: [
                    <?= $tinggalI20->tanpa_keterangan != null ? $tinggalI20->tanpa_keterangan : null ?>, <?= $tinggalII20->tanpa_keterangan != null ? $tinggalII20->tanpa_keterangan : null ?>
                ]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    }
                }]
            }
        });
    </script>
    <!-- /footer -->

</body>

</html>
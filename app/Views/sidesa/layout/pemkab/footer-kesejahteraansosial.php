<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?>. Sistem Informasi Desa . Provinsi Jawa Tengah</span>
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
<script src="<?= base_url() ?>/highchart/code/modules/series-label.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/exporting.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/accessibility.js"></script>

<script>
    // basicline kesejahteraan
    Highcharts.chart('grafik_kesejahteraan', {

        title: {
            text: 'Data Kesejahteraan Rumah Tangga dan Anggota Rumah Tangga'
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
                <?= isset($artI20->desil1) ? $artI20->desil1 : 0 ?>, <?= isset($artII20->desil1) ? $artII20->desil1 : 0 ?>
            ]
        }, {
            name: 'desil 2 Individu',
            data: [
                <?= isset($artI20->desil2) ? $artI20->desil2 : 0 ?>, <?= isset($artII20->desil2) ? $artII20->desil2 : 0 ?>
            ]
        }, {
            name: 'desil 3 Individu',
            data: [
                <?= isset($artI20->desil3) ? $artI20->desil3 : 0 ?>, <?= isset($artII20->desil3) ? $artII20->desil3 : 0 ?>
            ]
        }, {
            name: 'desil 4 Individu',
            data: [
                <?= isset($artI20->desil4) ? $artI20->desil4 : 0 ?>, <?= isset($artII20->desil4) ? $artII20->desil4 : 0 ?>
            ]
        }, {
            name: 'desil 4+ Individu',
            data: [
                <?= isset($artI20->desil4plus) ? $artI20->desil4plus : 0 ?>, <?= isset($artII20->desil4plus) ? $artII20->desil4plus : 0 ?>
            ]
        }, {
            name: 'desil 1 Rumah tangga',
            data: [
                <?= isset($krtI20->desil1) ? $krtI20->desil1 : 0 ?>, <?= isset($krtII20->desil1) ? $krtII20->desil1 : 0 ?>
            ]
        }, {
            name: 'desil 2 Rumah tangga',
            data: [
                <?= isset($krtI20->desil2) ? $krtI20->desil2 : null ?>, <?= isset($krtII20->desil2) ? $krtII20->desil2 : null ?>
            ]
        }, {
            name: 'desil 3 Rumah tangga',
            data: [
                <?= isset($krtI20->desil3) ? $krtI20->desil3 : null ?>, <?= isset($krtII20->desil3) ? $krtII20->desil3 : null ?>
            ]
        }, {
            name: 'desil 4 Rumah tangga',
            data: [
                <?= isset($krtI20->desil4) ? $krtI20->desil4 : null ?>, <?= isset($krtII20->desil4) ? $krtII20->desil4 : null ?>
            ]
        }, {
            name: 'desil 4+ Rumah tangga',
            data: [
                <?= isset($krtI20->desil4plus) ? $krtI20->desil4plus : null ?>, <?= isset($krtII20->desil4plus) ? $krtII20->desil4plus : null ?>
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
            text: 'Data Bahan Bakar Utama Memasak'
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
            text: 'Data Penggunaan Fasilitas Buang Air Besar'
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
            text: 'Data Sumber Air Minum'
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
            text: 'Data Sumber Penerangan Utama'
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
            text: 'Data Status Penguasaan Bangunan Tempat Tinggal'
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

</body>

</html>
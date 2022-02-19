<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa</span>
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
<!-- apexcharts -->
<script src="<?= base_url('minia/libs/apexcharts/apexcharts.min.js'); ?>"></script>
<!-- Sweet alert init js-->
<script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- App js -->
<script src="<?= base_url('minia/js/app.js'); ?>"></script>

<script>
    //Warning Message
    document.getElementById("sa-close").addEventListener("click", function() {
        var timerInterval;
        Swal.fire({
            title: 'Peringatan! Auto Close',
            html: 'Anda Akan keluar pada <b></b> detik.',
            timer: 500,
            timerProgressBar: true,
            didOpen: function() {
                Swal.showLoading()
                timerInterval = setInterval(function() {
                    var content = Swal.getHtmlContainer()
                    if (content) {
                        var b = content.querySelector('b')
                        if (b) {
                            b.textContent = Swal.getTimerLeft()
                        }
                    }
                }, 100)
            },
            onClose: function() {
                clearInterval(timerInterval)
            }
        })
    });

    // Mini Charts
    function getChartColorsArray(chartId) {
        var colors = $(chartId).attr('data-colors');
        var colors = JSON.parse(colors);
        return colors.map(function(value) {
            var newValue = value.replace(' ', '');
            if (newValue.indexOf('--') != -1) {
                var color = getComputedStyle(document.documentElement).getPropertyValue(newValue);
                if (color) return color;
            } else {
                return newValue;
            }
        })
    }
    var minichart1Colors = getChartColorsArray("#idm-iks");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm[0]->iks) ? $idm2thsblm[0]->iks : 0 ?>, <?= isset($idmthsblm[0]->iks) ? $idmthsblm[0]->iks : 0 ?>, <?= isset($idmnowgrafik[0]->iks) ? $idmnowgrafik[0]->iks : NULL ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value;
                }
            },
        },
        xaxis: {
            categories: [<?= date("Y") - 2 ?>, <?= date("Y") - 1 ?>, <?= date("Y") ?>],
            labels: {
                formatter: function(value) {
                    return "Tahun: " + value;
                }
            }
        },
        chart: {
            type: 'line',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        colors: minichart1Colors,
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: true
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#idm-iks"), options);
    chart.render();

    var minichart2Colors = getChartColorsArray("#idm-ike");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm[0]->ike) ? $idm2thsblm[0]->ike : 0 ?>, <?= isset($idmthsblm[0]->ike) ? $idmthsblm[0]->ike : 0 ?>, <?= isset($idmnowgrafik[0]->ike) ? $idmnowgrafik[0]->ike : NULL ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value;
                }
            },
        },
        xaxis: {
            categories: [<?= date("Y") - 2 ?>, <?= date("Y") - 1 ?>, <?= date("Y") ?>],
            labels: {
                formatter: function(value) {
                    return "Tahun: " + value;
                }
            }
        },
        chart: {
            type: 'line',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        colors: minichart2Colors,
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: true
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#idm-ike"), options);
    chart.render();

    var minichart3Colors = getChartColorsArray("#idm-ikl");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm[0]->ikl) ? $idm2thsblm[0]->ikl : 0 ?>, <?= isset($idmthsblm[0]->ikl) ? $idmthsblm[0]->ikl : 0 ?>, <?= isset($idmnowgrafik[0]->ikl) ? $idmnowgrafik[0]->ikl : NULL ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value;
                }
            },
        },
        xaxis: {
            categories: [<?= date("Y") - 2 ?>, <?= date("Y") - 1 ?>, <?= date("Y") ?>],
            labels: {
                formatter: function(value) {
                    return "Tahun: " + value;
                }
            }
        },
        chart: {
            type: 'line',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        colors: minichart3Colors,
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: true
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#idm-ikl"), options);
    chart.render();

    var minichart4Colors = getChartColorsArray("#idm-nilai");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm[0]->nilai_idm) ? $idm2thsblm[0]->nilai_idm : 0 ?>, <?= isset($idmthsblm[0]->nilai_idm) ? $idmthsblm[0]->nilai_idm : 0 ?>, <?= isset($idmnowgrafik[0]->nilai_idm) ? $idmnowgrafik[0]->nilai_idm : NULL ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value;
                }
            },
        },
        xaxis: {
            categories: [<?= date("Y") - 2 ?>, <?= date("Y") - 1 ?>, <?= date("Y") ?>],
            labels: {
                formatter: function(value) {
                    return "Tahun: " + value;
                }
            }
        },
        chart: {
            type: 'line',
            height: 50,
            sparkline: {
                enabled: true
            }
        },
        colors: minichart4Colors,
        stroke: {
            curve: 'smooth',
            width: 2,
        },
        tooltip: {
            fixed: {
                enabled: false
            },
            x: {
                show: true
            },
            y: {
                title: {
                    formatter: function(seriesName) {
                        return ''
                    }
                }
            },
            marker: {
                show: false
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#idm-nilai"), options);
    chart.render();
</script>

</body>

</html>
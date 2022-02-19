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
    var minichart1Colors = getChartColorsArray("#idm-mandiri");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm['MANDIRI']) ? $idm2thsblm['MANDIRI'] : 0 ?>, <?= isset($idmthsblm['MANDIRI']) ? $idmthsblm['MANDIRI'] : 0 ?>, <?= isset($idmnowgrafik['MANDIRI']) ? $idmnowgrafik['MANDIRI'] : 0 ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value + " Desa";
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

    var chart = new ApexCharts(document.querySelector("#idm-mandiri"), options);
    chart.render();

    var minichart2Colors = getChartColorsArray("#idm-maju");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm['MAJU']) ? $idm2thsblm['MAJU'] : 0 ?>, <?= isset($idmthsblm['MAJU']) ? $idmthsblm['MAJU'] : 0 ?>, <?= isset($idmnowgrafik['MAJU']) ? $idmnowgrafik['MAJU'] : 0 ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value + " Desa";
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

    var chart = new ApexCharts(document.querySelector("#idm-maju"), options);
    chart.render();

    var minichart3Colors = getChartColorsArray("#idm-berkembang");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm['BERKEMBANG']) ? $idm2thsblm['BERKEMBANG'] : 0 ?>, <?= isset($idmthsblm['BERKEMBANG']) ? $idmthsblm['BERKEMBANG'] : 0 ?>, <?= isset($idmnowgrafik['BERKEMBANG']) ? $idmnowgrafik['BERKEMBANG'] : 0 ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value + " Desa";
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

    var chart = new ApexCharts(document.querySelector("#idm-berkembang"), options);
    chart.render();

    var minichart4Colors = getChartColorsArray("#idm-tertinggal");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm['TERTINGGAL']) ? $idm2thsblm['TERTINGGAL'] : 0 ?>, <?= isset($idmthsblm['TERTINGGAL']) ? $idmthsblm['TERTINGGAL'] : 0 ?>, <?= isset($idmnowgrafik['TERTINGGAL']) ? $idmnowgrafik['TERTINGGAL'] : 0 ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value + " Desa";
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

    var chart = new ApexCharts(document.querySelector("#idm-tertinggal"), options);
    chart.render();

    // mini-4
    var minichart4Colors = getChartColorsArray("#idm-sangattertinggal");
    var options = {
        series: [{
            data: [
                <?= isset($idm2thsblm['SANGAT TERTINGGAL']) ? $idm2thsblm['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idmthsblm['SANGAT TERTINGGAL']) ? $idmthsblm['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idmnowgrafik['SANGAT TERTINGGAL']) ? $idmnowgrafik['SANGAT TERTINGGAL'] : 0 ?>
            ]
        }],
        yaxis: {
            labels: {
                formatter: function(value) {
                    return value + " Desa";
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

    var chart = new ApexCharts(document.querySelector("#idm-sangattertinggal"), options);
    chart.render();
</script>

</body>

</html>
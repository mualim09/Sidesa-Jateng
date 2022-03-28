<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa DISPERMADESDUKCAPIL Prov JATENG</span>
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
                <?= isset($idm2019['MANDIRI']) ? $idm2019['MANDIRI'] : 0 ?>, <?= isset($idm2020['MANDIRI']) ? $idm2020['MANDIRI'] : 0 ?>, <?= isset($idm2021['MANDIRI']) ? $idm2021['MANDIRI'] : 0 ?>
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
            categories: [2019, 2020, 2021],
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
                <?= isset($idm2019['MAJU']) ? $idm2019['MAJU'] : 0 ?>, <?= isset($idm2020['MAJU']) ? $idm2020['MAJU'] : 0 ?>, <?= isset($idm2021['MAJU']) ? $idm2021['MAJU'] : 0 ?>
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
            categories: [2019, 2020, 2021],
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
                <?= isset($idm2019['BERKEMBANG']) ? $idm2019['BERKEMBANG'] : 0 ?>, <?= isset($idm2020['BERKEMBANG']) ? $idm2020['BERKEMBANG'] : 0 ?>, <?= isset($idm2021['BERKEMBANG']) ? $idm2021['BERKEMBANG'] : 0 ?>
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
            categories: [2019, 2020, 2021],
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
                <?= isset($idm2019['TERTINGGAL']) ? $idm2019['TERTINGGAL'] : 0 ?>, <?= isset($idm2020['TERTINGGAL']) ? $idm2020['TERTINGGAL'] : 0 ?>, <?= isset($idm2021['TERTINGGAL']) ? $idm2021['TERTINGGAL'] : 0 ?>
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
            categories: [2019, 2020, 2021],
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
                <?= isset($idm2019['SANGAT TERTINGGAL']) ? $idm2019['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idm2020['SANGAT TERTINGGAL']) ? $idm2020['SANGAT TERTINGGAL'] : 0 ?>, <?= isset($idm2021['SANGAT TERTINGGAL']) ? $idm2021['SANGAT TERTINGGAL'] : 0 ?>
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
            categories: [2019, 2020, 2021],
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
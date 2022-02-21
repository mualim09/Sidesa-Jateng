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

<!-- Sweet alert init js-->
<script src="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.js'); ?>"></script>
<!-- App js -->
<script src="<?= base_url('minia/js/app.js'); ?>"></script>

<!-- Punya highchart -->
<script src="<?= base_url(); ?>/highchart/code/highcharts.js"></script>
<script src="<?= base_url(); ?>/highchart/code/highcharts-more.js"></script>
<script src="<?= base_url(); ?>/highchart/code/modules/data.js"></script>
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

    // pie gradient penduduk_jns_kelamin
    Highcharts.chart('penduduk_jns_kelamin', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Tahun 2020'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y:,.0f}</b>'
        },
        accessibility: {
            point: {
                valueSuffix: ''
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.y:,.0f}',
                    connectorColor: 'silver'
                }
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Total',
            data: [{
                    name: 'Wanita',
                    y: <?= $jenisKelamin->wanita ?>
                },
                {
                    name: 'Pria',
                    y: <?= $jenisKelamin->pria ?>
                },
            ]
        }]
    });

    // fixed columns penduduk_kepemilikan_kk
    Highcharts.chart('penduduk_kepemilikan_kk', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Tahun 2020'
        },
        xAxis: {
            categories: [
                ''
            ]
        },
        yAxis: [{
            min: 0,
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
            title: {
                text: 'Populasi (jiwa)'
            }
        }],
        legend: {
            shadow: false
        },
        tooltip: {
            shared: true
        },
        plotOptions: {
            column: {
                grouping: false,
                shadow: false,
                borderWidth: 0
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Kepemilikan KK Pria',
            color: 'rgba(165,170,217,1)',
            data: [<?= $kk->kep_kk_pria ?>],
            pointPadding: 0.3,
            pointPlacement: -0.2
        }, {
            name: 'Kepemilikan KK Wanita',
            color: 'rgba(248,161,63,1)',
            data: [<?= $kk->kep_kk_wanita ?>],
            tooltip: {},
            pointPadding: 0.3,
            pointPlacement: 0.2,
        }, {
            name: 'Kepala Keluarga Pria',
            color: 'rgba(126,86,134,.9)',
            data: [<?= $kk->kk_pria ?>],
            pointPadding: 0.4,
            pointPlacement: -0.2
        }, {
            name: 'Kepala Keluarga Wanita',
            color: 'rgba(186,60,61,.9)',
            data: [<?= $kk->kk_wanita ?>],
            tooltip: {},
            pointPadding: 0.4,
            pointPlacement: 0.2,
        }]
    });

    // bar negative stack penduduk_kelompok_usia
    var categories = [
        '0-4', '5-9', '10-14', '15-19',
        '20-24', '25-29', '30-34', '35-39', '40-44',
        '45-49', '50-54', '55-59', '60-64', '65-69',
        '70-74', '75 ++ '
    ];

    Highcharts.chart('penduduk_kelompok_usia', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Tahun 2020'
        },
        subtitle: {
            text: ''
        },
        accessibility: {
            point: {
                valueDescriptionFormat: '{index}. Usia {xDescription}, {value}'
            }
        },
        xAxis: [{
            categories: categories,
            reversed: false,
            labels: {
                step: 1
            },
            accessibility: {
                description: 'Usia (pria)'
            }
        }, { // mirror axis on right side
            opposite: true,
            reversed: false,
            categories: categories,
            linkedTo: 0,
            labels: {
                step: 1
            },
            accessibility: {
                description: 'Usia (wanita)'
            }
        }],
        yAxis: {
            title: {
                text: null
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },

        plotOptions: {
            series: {
                stacking: 'normal'
            }
        },

        tooltip: {
            formatter: function() {
                return '<b>' + this.series.name + ', usia ' + this.point.category + '</b><br/>' +
                    'Populasi: ' + Highcharts.numberFormat(Math.abs(this.point.y), 0);
            }
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Pria',
            color: 'rgba(126,86,134,.9)',
            data: [
                <?= -$usia->p0_4 ?>, <?= -$usia->p5_9 ?>, <?= -$usia->p10_14 ?>, <?= -$usia->p15_19 ?>, <?= -$usia->p20_24 ?>,
                <?= -$usia->p25_29 ?>, <?= -$usia->p30_34 ?>, <?= -$usia->p35_39 ?>, <?= -$usia->p40_44 ?>, <?= -$usia->p45_49 ?>,
                <?= -$usia->p50_54 ?>, <?= -$usia->p55_59 ?>, <?= -$usia->p60_64 ?>, <?= -$usia->p65_69 ?>, <?= -$usia->p70_74 ?>,
                <?= -$usia->p75_up ?>
            ]
        }, {
            name: 'Wanita',
            color: 'rgba(186,60,61,.9)',
            data: [
                <?= $usia->w0_4 ?>, <?= $usia->w5_9 ?>, <?= $usia->w10_14 ?>, <?= $usia->w15_19 ?>, <?= $usia->w20_24 ?>,
                <?= $usia->w25_29 ?>, <?= $usia->w30_34 ?>, <?= $usia->w35_39 ?>, <?= $usia->w40_44 ?>, <?= $usia->w45_49 ?>,
                <?= $usia->w50_54 ?>, <?= $usia->w55_59 ?>, <?= $usia->w60_64 ?>, <?= $usia->w65_69 ?>, <?= $usia->w70_74 ?>,
                <?= $usia->w75_up ?>
            ]
        }]
    });

    // basicbar penduduk_pendidikan
    Highcharts.chart('penduduk_pendidikan', {
        chart: {
            type: 'bar'
        },
        title: {
            text: 'Tahun 2020'
        },
        xAxis: {
            categories: ['S3', 'S2', 'S1', 'D3', 'D1/D2', 'SLTA', 'SLTP', 'SD', 'Belum tamat SD', 'Blm/tdk Sekolah'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Populasi (jiwa)',
                align: 'high'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },
        tooltip: {
            valueSuffix: ' jiwa'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -5,
            y: 50,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
            shadow: false
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Wanita',
            data: [<?= $pendidikan->s3_perempuan ?>, <?= $pendidikan->s2_perempuan ?>, <?= $pendidikan->s1_perempuan ?>, <?= $pendidikan->d3_perempuan ?>, <?= $pendidikan->d1_d2_perempuan ?>, <?= $pendidikan->sma_perempuan ?>, <?= $pendidikan->smp_perempuan ?>, <?= $pendidikan->sd_perempuan ?>, <?= $pendidikan->belum_tamat_perempuan ?>, <?= $pendidikan->tidak_sekolah_perempuan ?>]
        }, {
            name: 'Pria',
            data: [<?= $pendidikan->s3_pria ?>, <?= $pendidikan->s2_pria ?>, <?= $pendidikan->s1_pria ?>, <?= $pendidikan->d3_pria ?>, <?= $pendidikan->d1_d2_pria ?>, <?= $pendidikan->sma_pria ?>, <?= $pendidikan->smp_pria ?>, <?= $pendidikan->sd_pria ?>, <?= $pendidikan->belum_tamat_pria ?>, <?= $pendidikan->tidak_sekolah_pria ?>]
        }]
    });

    // responsievclm penduduk_agama
    Highcharts.chart('penduduk_agama', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Tahun 2020'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -5,
            y: 50,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: ['Islam', 'Kristen', 'Katholik', 'Hindu', 'Budha', 'Konghucu', 'Kepercayaan'],
        },
        yAxis: {
            title: {
                text: 'Populasi (jiwa)'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },
        tooltip: {
            shared: true,
            valueSuffix: ' jiwa'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.4
            }
        },
        series: [{
            name: 'Wanita',
            color: 'rgba(255, 2, 106, 0.6)',
            data: [<?= $agama->islam_perempuan; ?>, <?= $agama->kristen_perempuan; ?>, <?= $agama->katholik_perempuan; ?>, <?= $agama->hindu_perempuan; ?>, <?= $agama->budha_perempuan; ?>, <?= $agama->konghucu_perempuan; ?>, <?= $agama->alirankepercayaan_perempuan; ?>]
        }, {
            name: 'Pria',
            color: 'rgba(0, 160, 0, 0.8)',
            data: [<?= $agama->islam_pria; ?>, <?= $agama->kristen_pria; ?>, <?= $agama->katholik_pria; ?>, <?= $agama->hindu_pria; ?>, <?= $agama->budha_pria; ?>, <?= $agama->konghucu_pria; ?>, <?= $agama->alirankepercayaan_pria; ?>]
        }],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        align: 'center',
                        verticalAlign: 'bottom',
                        layout: 'horizontal'
                    },
                    yAxis: {
                        labels: {
                            align: 'left',
                            x: 0,
                            y: -5
                        },
                        title: {
                            text: null
                        }
                    },
                    subtitle: {
                        text: null
                    },
                    credits: {
                        enabled: false
                    }
                }
            }]
        }
    });

    // areaspline penduduk_pekerjaan
    Highcharts.chart('penduduk_pekerjaan', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Tahun 2020'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -5,
            y: 50,
            floating: true,
            borderWidth: 1,
            backgroundColor: Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: [
                'Pengangguran',
                'Rumah Tangga',
                'Pelajar',
                'Pensiunan',
                'PNS',
                'TNI',
                'POLRI',
                'Pedagang',
                'Petani',
                'Peternak',
            ],
            // plotBands: [{ // visualize the weekend
            //   from: 4.5,
            //   to: 6.5,
            //   color: 'rgba(68, 170, 213, .2)'
            // }]
        },
        yAxis: {
            title: {
                text: 'Populasi (jiwa)'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
        },
        tooltip: {
            shared: true,
            valueSuffix: ' jiwa'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.4
            }
        },
        series: [{
            name: 'Wanita',
            color: 'rgba(0, 61, 255, 0.5)',
            data: [<?= $pekerjaan->nojob_perempuan ?>, <?= $pekerjaan->rt_perempuan ?>, <?= $pekerjaan->pelajarmhs_perempuan ?>, <?= $pekerjaan->pensiun_perempuan ?>, <?= $pekerjaan->pns_perempuan ?>, <?= $pekerjaan->tni_perempuan ?>, <?= $pekerjaan->polri_perempuan ?>, <?= $pekerjaan->pedagang_perempuan ?>, <?= $pekerjaan->tani_perempuan ?>, <?= $pekerjaan->peternak_perempuan ?>]
        }, {
            name: 'Pria',
            color: 'rgba(0, 0, 0, 0.6)',
            data: [<?= $pekerjaan->nojob_pria ?>, <?= $pekerjaan->rt_pria ?>, <?= $pekerjaan->pelajarmhs_pria ?>, <?= $pekerjaan->pensiun_pria ?>, <?= $pekerjaan->pns_pria ?>, <?= $pekerjaan->tni_pria ?>, <?= $pekerjaan->polri_pria ?>, <?= $pekerjaan->pedagang_pria ?>, <?= $pekerjaan->tani_pria ?>, <?= $pekerjaan->peternak_pria ?>]
        }]
    });

    // radialbarchart penduduk_gol_darah
    Highcharts.chart('penduduk_gol_darah', {
        chart: {
            type: 'column',
            inverted: true,
            polar: true
        },
        title: {
            text: 'Tahun 2020'
        },
        tooltip: {
            outside: true
        },
        pane: {
            size: '100%',
            innerSize: '20%',
            endAngle: 270
        },
        xAxis: {
            tickInterval: 1,
            labels: {
                align: 'right',
                useHTML: true,
                allowOverlap: true,
                step: 1,
                y: 3,
                style: {
                    fontSize: '10px'
                }
            },
            lineWidth: 0,
            categories: [
                '<span style="color: red;"><i class="fas fa-tint"></i></span> A',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> B',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> AB',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> O',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> A+',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> A-',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> B+',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> B-',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> AB+',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> AB-',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> O+',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> O-',
                '<span style="color: red;"><i class="fas fa-tint"></i></span> ?',
            ]
        },
        yAxis: {
            crosshair: {
                enabled: true,
                color: '#333'
            },
            labels: {
                formatter: function() {
                    return Highcharts.numberFormat(Math.abs(this.value), 0);
                }
            },
            lineWidth: 0,
            // tickInterval: 2000000,
            reversedStacks: false,
            endOnTick: true,
            showLastLabel: true
        },
        tooltip: {
            shared: true,
            valueSuffix: ' jiwa'
        },
        plotOptions: {
            column: {
                stacking: 'normal',
                borderWidth: 0,
                pointPadding: 0,
                groupPadding: 0.15
            }
        },
        credits: {
            enabled: false
        },
        legend: {
            layout: 'horizontal',
            align: 'left',
            verticalAlign: 'bottom',
        },
        series: [{
            name: 'Wanita',
            data: [<?= $goldar->goldar_a_perempuan ?>, <?= $goldar->goldar_b_perempuan ?>, <?= $goldar->goldar_ab_perempuan ?>, <?= $goldar->goldar_o_perempuan ?>, <?= $goldar->goldar_a_plus_perempuan ?>, <?= $goldar->goldar_a_minus_perempuan ?>, <?= $goldar->goldar_b_plus_perempuan ?>, <?= $goldar->goldar_b_minus_perempuan ?>, <?= $goldar->goldar_ab_plus_perempuan ?>, <?= $goldar->goldar_ab_minus_perempuan ?>, <?= $goldar->goldar_o_plus_perempuan ?>, <?= $goldar->goldar_o_minus_perempuan ?>, <?= $goldar->goldar_tidaktau_perempuan ?>]
        }, {
            name: 'Pria',
            data: [<?= $goldar->goldar_a_pria ?>, <?= $goldar->goldar_b_pria ?>, <?= $goldar->goldar_ab_pria ?>, <?= $goldar->goldar_o_pria ?>, <?= $goldar->goldar_a_plus_pria ?>, <?= $goldar->goldar_a_minus_pria ?>, <?= $goldar->goldar_b_plus_pria ?>, <?= $goldar->goldar_b_minus_pria ?>, <?= $goldar->goldar_ab_plus_pria ?>, <?= $goldar->goldar_ab_minus_pria ?>, <?= $goldar->goldar_o_plus_pria ?>, <?= $goldar->goldar_o_minus_pria ?>, <?= $goldar->goldar_tidaktau_pria ?>]
        }]
    });
</script>

</body>

</html>
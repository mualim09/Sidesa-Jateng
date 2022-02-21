<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="text-center">
        <p>Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Catatan Sipil Provinsi Jawa Tengah</p>
    </div>
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2020 - <?= date('Y'); ?> Sistem Informasi Desa</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('js/geodesa/jquery.min.js'); ?>"></script>
<script src="<?= base_url('js/geodesa/bootstrap.bundle.min.js'); ?>"></script>
<!-- Core plugin JavaScript-->
<script src="<?= base_url('js/geodesa/jquery.easing.min.js'); ?>"></script>
<!-- Custom scripts for all pages-->
<script src="<?= base_url('sbadmin2/sb-admin-2.min.js'); ?>"></script>
<!-- leaflet -->
<script src="<?= base_url('leaflet/leaflet.js'); ?>"></script>

<script type="text/javascript">
    var map = L.map('mapid').setView([-7.2007295, 110.0806558, 16], 7.5);
    var base_url = "<?= base_url() ?>";
    var geoLayer = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}); // buat ngakalin kondisi radiobutton

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {}).addTo(map);

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'normal') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_normal_7797.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 11015 ? '#124500' :
                        d >= 8273 ? '#228500' :
                        d >= 5530 ? '#2eb300' :
                        d >= 2788 ? '#b4ff52' :
                        d >= 45 ? '#e6ffa1' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tdk_cacat)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tdk_cacat = feature.properties.tdk_cacat;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tidak Cacat</td>
                                            <td>` + tdk_cacat + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e6ffa1;"></i> 45 - 2787</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b4ff52;"></i> 2788 - 5529</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #2eb300;"></i> 5530 - 8272</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #228500;"></i> 8273 - 11014</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #124500;"></i> 11015 - 13758</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'daksa') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunadaksa_7340.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 97 ? '#b31200' :
                        d >= 73 ? '#f2d024' :
                        d >= 49 ? '#e1eb8f' :
                        d >= 25 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_daksa)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_daksa = feature.properties.tuna_daksa;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Daksa</td>
                                            <td>` + tuna_daksa + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 24</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 25 - 48</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 49 - 72</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 73 - 96</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 97 - 121</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'netra') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunanetra_6475.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 31 ? '#b31200' :
                        d >= 24 ? '#f2d024' :
                        d >= 16 ? '#e1eb8f' :
                        d >= 9 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_netra)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_netra = feature.properties.tuna_netra;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Netra</td>
                                            <td>` + tuna_netra + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 8</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 9 - 15</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 16 - 23</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 24 - 30</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 31 - 39</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'rungu') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunarungu_5397.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 96 ? '#b31200' :
                        d >= 72 ? '#f2d024' :
                        d >= 49 ? '#e1eb8f' :
                        d >= 25 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_rungu)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_rungu = feature.properties.tuna_rungu;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Rungu</td>
                                            <td>` + tuna_rungu + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 24</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 25 - 48</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 49 - 71</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 72 - 95</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 96 - 120</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'wicara') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunawicara_5033.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 21 ? '#b31200' :
                        d >= 16 ? '#f2d024' :
                        d >= 11 ? '#e1eb8f' :
                        d >= 6 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_wicar)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_wicar = feature.properties.tuna_wicar;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Wicara</td>
                                            <td>` + tuna_wicar + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 5</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 6 - 10</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 11 - 15</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 16 - 20</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 21 - 26</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'runguwicara') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunarunguwicara_4379.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 10 ? '#b31200' :
                        d >= 7 ? '#f2d024' :
                        d >= 5 ? '#e1eb8f' :
                        d >= 3 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_rw)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_rw = feature.properties.tuna_rw;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Rungu-Wicara</td>
                                            <td>` + tuna_rw + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 2</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 3 - 4</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 5 - 6</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 7 - 9</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 10 - 13</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'netradaksa') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunanetradaksa_2376.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 12 ? '#b31200' :
                        d >= 9 ? '#f2d024' :
                        d >= 7 ? '#e1eb8f' :
                        d >= 4 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_nct)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_nct = feature.properties.tuna_nct;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Netra-Daksa</td>
                                            <td>` + tuna_nct + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 3</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 4 - 6</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 7 - 8</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 9 - 11</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 12 - 15</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'netrarunguwicara') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunarnetrarunguwicara_1340.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 6 ? '#b31200' :
                        d >= 4 ? '#f2d024' :
                        d >= 2 ? '#b2f041' :
                        d = 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_nrw)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_nrw = feature.properties.tuna_nrw;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Netra-Rungu-Wicara</td>
                                            <td>` + tuna_nrw + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 2 - 3</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 4 - 5</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 6 - 7</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'runguwicaradaksa') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunarunguwicaradaksa_2268.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 33 ? '#b31200' :
                        d >= 25 ? '#f2d024' :
                        d >= 17 ? '#e1eb8f' :
                        d >= 9 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tuna_rwct)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tuna_rwct = feature.properties.tuna_rwct;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Rungu-Wicara-Daksa</td>
                                            <td>` + tuna_rwct + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 8</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 9 - 16</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 17 - 24</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 25 - 32</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 33 - 41</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'rungunetrawicaradaksa') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_tunarungunetrawicaradaksa_1728.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 12 ? '#b31200' :
                        d >= 9 ? '#f2d024' :
                        d >= 6 ? '#e1eb8f' :
                        d >= 3 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.tunarwnct)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var tunarwnct = feature.properties.tunarwnct;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Rungu-Wicara-Netra-Daksa</td>
                                            <td>` + tunarwnct + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 2</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 3 - 5</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 6 - 8</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 9 - 11</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 12 - 15</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'daksamental') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_daksamental_5779.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 26 ? '#b31200' :
                        d >= 20 ? '#f2d024' :
                        d >= 13 ? '#e1eb8f' :
                        d >= 7 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.cacat_fm)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var cacat_fm = feature.properties.cacat_fm;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Daksa-Mental</td>
                                            <td>` + cacat_fm + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 6</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 7 - 12</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 13 - 19</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 20 - 25</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 26 - 33</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'mentalreterdasi') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_cacatmentalreterdasi_7251.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 39 ? '#b31200' :
                        d >= 29 ? '#f2d024' :
                        d >= 20 ? '#e1eb8f' :
                        d >= 10 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.cacat_mtl_)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var cacat_mtl_ = feature.properties.cacat_mtl_;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Tuna Mental Reterdasi</td>
                                            <td>` + cacat_mtl_ + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 9</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 10 - 19</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 20 - 28</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 29 - 38</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 39 - 49</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'ekspsikotik') {
            $.getJSON(base_url + "/data/geodesa/geojson/disabilitas_ekspsikotik_5500.geojson", function(result) {
                geoLayer.remove(map);

                function getColor(d) {
                    return d >= 23 ? '#b31200' :
                        d >= 17 ? '#f2d024' :
                        d >= 12 ? '#e1eb8f' :
                        d >= 6 ? '#b2f041' :
                        d >= 1 ? '#1b850b' :
                        '#FFEDA0';
                }

                function style(feature) {
                    return {
                        weight: 1,
                        opacity: 1,
                        color: '#424242',
                        fillOpacity: 0.7,
                        fillColor: getColor(feature.properties.eks_psikot)
                    };
                }

                geoLayer = L.geoJson(result, {
                    style: style,
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var eks_psikot = feature.properties.eks_psikot;
                        var sumber = feature.properties.sumber_dat;
                        var info_bidang = "<h5 style = 'text-align: center' ><b>INFORMASI</b></h5>";
                        info_bidang += "<hr>";
                        info_bidang += `<div margin-top: 10px;'>
                                    <table class="table table-borderless">
                                    <style type="text/css">
                                        .table-borderless tbody {
                                            height:300px;
                                            overflow:auto;
                                            float:left;
                                            width:100%;
                                        }
                                        .table-borderless tbody tr {
                                            width:100%;
                                        }
                                    </style>
                                        <tbody>
                                            <tr>
                                            <td>kode_dagri</td>
                                            <td>` + kode_dagri + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kabupaten</td>
                                            <td>` + kabupaten + `</td>
                                            </tr>
                                            <tr>
                                            <td>Kecamatan</td>
                                            <td>` + kecamatan + `</td>
                                            </tr>
                                            <tr>
                                            <td>Desa</td>
                                            <td>` + desa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Populasi Eks Psikotik</td>
                                            <td>` + eks_psikot + ` jiwa</td>
                                            </tr>
                                            <td>Sumber</td>
                                            <td>` + sumber + `</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>`;

                        layer.bindPopup(info_bidang, {
                            maxWidth: 2000,
                            closeButton: true,
                            offset: L.point(0, 0)
                        });

                        layer.on('click', function() {
                            layer.openPopup();
                        });
                    }
                }).addTo(map);
                $('#sidebarlegend').html(``);
                $('#sidebarlegend').append(
                    `<h6 class="collapse-header">Legenda:</h6>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #1b850b;"></i> 1 - 5</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b2f041;"></i> 6 - 11</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #e1eb8f;"></i> 12 - 16</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #f2d024;"></i> 17 - 22</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #b31200;"></i> 23 - 29</a>`
                );
            });
        }
    });
</script>
<!-- End map -->


</body>

</html>
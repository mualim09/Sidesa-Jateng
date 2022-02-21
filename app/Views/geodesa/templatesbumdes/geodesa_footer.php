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
        if ($(this).val() === 'bumdes2020') {
            $.getJSON(base_url + "/data/geodesa/geojson/bumdes5533.geojson", function(result) {
                geoLayer.remove(map);
                geoLayer = L.geoJson(result, {
                    style: function(feature) {
                        var klasifikas = feature.properties.klasifikas;
                        if (klasifikas == "TUMBUH") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#d90b15",
                                weight: 1,
                                opacity: 1,
                                color: "#4e524f"
                            };
                        } else if (klasifikas == "BERKEMBANG") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#d9ff00",
                                weight: 1,
                                opacity: 1,
                                color: "#4e524f"
                            };
                        } else if (klasifikas == "MAJU") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#00e038",
                                weight: 1,
                                opacity: 1,
                                color: "#4e524f"
                            };
                        } else if (klasifikas == "DASAR") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#008cff",
                                weight: 1,
                                opacity: 0.3,
                                color: "#4e524f"
                            };
                        }
                    },
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var bumdes = feature.properties.bumdes;
                        var skor_kelem = feature.properties.skor_kelem;
                        var skor_atura = feature.properties.skor_atura;
                        var skor_usaha = feature.properties.skor_usaha;
                        var skor_dampa = feature.properties.skor_dampa;
                        var total_skor = feature.properties.total_skor;
                        var klasifikas = feature.properties.klasifikas;
                        var tahun = feature.properties.tahun;
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
                                            <td>BUMDES</td>
                                            <td>` + bumdes + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor kelembagaan</td>
                                            <td>` + skor_kelem + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor aturan</td>
                                            <td>` + skor_atura + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor usaha</td>
                                            <td>` + skor_usaha + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor dampak</td>
                                            <td>` + skor_dampa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Total skor</td>
                                            <td>` + total_skor + `</td>
                                            </tr>
                                            <td>klasifikasi</td>
                                            <td>` + klasifikas + `</td>
                                            </tr>
                                            <td>Tahun</td>
                                            <td>` + tahun + `</td>
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
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #00e038;"></i> Maju</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #d90b15;"></i> Tumbuh</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #d9ff00;"></i> Berkembang</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #008cff;"></i> Dasar</a>`
                );
            });
        }
    });

    $('input:radio[name="customRadio"]').change(function() {
        if ($(this).val() === 'bumdes2019') {
            geoLayer.remove(map);
            $.getJSON(base_url + "/data/geodesa/geojson/bumdes4494.geojson", function(result) {
                geoLayer = L.geoJson(result, {
                    style: function(feature) {
                        var klasifikas = feature.properties.klasifikas;
                        if (klasifikas == "TUMBUH") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#d90b15",
                                weight: 1,
                                opacity: 1,
                                color: "#4e524f"
                            };
                        } else if (klasifikas == "BERKEMBANG") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#d9ff00",
                                weight: 1,
                                opacity: 1,
                                color: "#4e524f"
                            };
                        } else if (klasifikas == "MAJU") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#00e038",
                                weight: 1,
                                opacity: 1,
                                color: "#4e524f"
                            };
                        } else if (klasifikas == "DASAR") {
                            return {
                                fillOpacity: 0.8,
                                fillColor: "#008cff",
                                weight: 1,
                                opacity: 0.3,
                                color: "#4e524f"
                            };
                        }
                    },
                    onEachFeature: function(feature, layer) {
                        var kode_dagri = feature.properties.kode_dagri;
                        var kabupaten = feature.properties.kabupaten;
                        var kecamatan = feature.properties.kecamatan;
                        var desa = feature.properties.desa;
                        var bumdes = feature.properties.bumdes;
                        var skor_kelem = feature.properties.skor_kelem;
                        var skor_atura = feature.properties.skor_atura;
                        var skor_usaha = feature.properties.skor_usaha;
                        var skor_dampa = feature.properties.skor_dampa;
                        var total_skor = feature.properties.total_skor;
                        var klasifikas = feature.properties.klasifikas;
                        var tahun = feature.properties.tahun;
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
                                            <td>BUMDES</td>
                                            <td>` + bumdes + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor kelembagaan</td>
                                            <td>` + skor_kelem + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor aturan</td>
                                            <td>` + skor_atura + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor usaha</td>
                                            <td>` + skor_usaha + `</td>
                                            </tr>
                                            <tr>
                                            <td>Skor dampak</td>
                                            <td>` + skor_dampa + `</td>
                                            </tr>
                                            <tr>
                                            <td>Total skor</td>
                                            <td>` + total_skor + `</td>
                                            </tr>
                                            <td>klasifikasi</td>
                                            <td>` + klasifikas + `</td>
                                            </tr>
                                            <td>Tahun</td>
                                            <td>` + tahun + `</td>
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
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #00e038;"></i> Maju</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #d90b15;"></i> Tumbuh</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #d9ff00;"></i> Berkembang</a>
                    <a class="collapse-item" href="#"><i class="fas fa-square" style="color: #008cff;"></i> Dasar</a>`
                );
            });
        }
    });
</script>
<!-- End map -->


</body>

</html>
<?= $this->extend('sidesa/layout/sidesa'); ?>
<?= $this->section('content'); ?>

<!-- navigation -->
<nav class="pages-nav">
    <div class="pages-nav__item"><a class="link link--page" href="#page-home">Home</a></div>
    <div class="pages-nav__item"><a class="link link--page" href="#page-pemprov">Data Informasi Provinsi</a></div>
    <div class="pages-nav__item"><a class="link link--page" href="#page-download">Download</a></div>
    <div class="pages-nav__item"><a class="link link--page" href="#page-software">Fitur Layanan</a></div>
    <div class="pages-nav__item"><a class="link link--page" href="#page-pemkab">Data Informasi Kabupaten</a></div>
    <div class="pages-nav__item"><a class="link link--page" href="#page-pencarian">Pencarian</a></div>
    <div class="pages-nav__item pages-nav__item--small"><a class="link link--page link--faded" href="#page-login">Pengelolaan Data</a></div>
    <div class="pages-nav__item pages-nav__item--small"><a class="link link--page link--faded" href="#page-statistik">Statistik Pengunjung</a></div>
    <div class="pages-nav__item pages-nav__item--small"><a class="link link--page link--faded" href="#page-kontak">Kontak</a></div>
    <div class="pages-nav__item pages-nav__item--small"><a class="link link--faded" href="https://esurya.organisasi.jatengprov.go.id/sidesadispermadesdukcapil" target="_blank">Survey E-SURYA</a></div>
    <div class="pages-nav__item pages-nav__item--social">
        <a class="link link--social link--faded" href="https://twitter.com/DISPERMADES_JTG" target="_blank"><i class="fab fa-twitter"></i></a>
        <a class="link link--social link--faded" href="https://www.instagram.com/dispermadesdukcapil_jtg/" target="_blank"><i class="fab fa-instagram"></i></a>
        <a class="link link--social link--faded" href="https://youtube.com/channel/UCk3kh5WTXeaBrvYNmDYGL1A" target="_blank"><i class="fab fa-youtube"></i></a>
    </div>
    <div class="pages-nav__copyright">
        <p class="atas">Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Pencatatan Sipil Provinsi Jawa Tengah</p>
        <p class="bawah">DISPERMADESDUKCAPIL Provinsi Jawa Tengah</p>
        <p class="copy">Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa</p>
    </div>
</nav>
<!-- /navigation-->

<!-- pages stack -->
<div class="pages-stack">
    <!-- page -->
    <div class="page" id="page-home">
        <!-- Blueprint header -->
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <img src="<?= base_url('img/onscreen/home/logov.png'); ?>">
            <p class="info">Layanan Sistem Informasi Desa Provinsi Jawa Tengah. Bergotong royong membangun Desa Jawa Tengah menjadi Desa Tangguh dan Berdikari.</p>
            <p class="info" style="font-size: 0.85em;">Sistem Informasi Desa Provinsi Jawa Tengah diberi nama SIDesa Jateng. SIDesa Jateng berpedoman pada Peraturan Gubernur Jawa Tengah Nomor 47 Tahun 2016 tentang Pedoman Pengembangan Sistem Informasi Desa di Provinsi Jawa Tengah. Sesuai amanat Pergub Jateng 47/2016 bahwa maksud dan tujuan SID adalah meningkatkan perencanaan dan perumusan kebijakan pembangunan. Selain itu, manfaat SID sesuai Pergub Jateng 47/2016 yaitu meningkatkan pengelolaan data desa yang akurat dan terbarukan serta meningkatkan aspek akuntabilitas dan transparansi pemerintahan. Dengan demikian dapat mendukung terwujudnya Satu Data Jawa Tengah melalui Satu Data Desa Jawa Tengah.</p>
        </header>
        <img class="poster" src="<?= base_url('img/onscreen/home/pemimpin.png'); ?>" />
    </div>

    <!-- Data Informasi Provinsi -->
    <div class="page" id="page-pemprov">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Data Informasi Provinsi</h1>
            <p class="bp-header__desc">Layanan Data dan Informasi Desa di Provinsi Jawa Tengah</p>
            <div class="row mt-4">
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-money-bill fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/danadesa') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Dana Desa</strong></h6>
                                <p style="font-size: 13px;">Online Monitoring SPAN Dana Desa</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-file-invoice-dollar fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/keuangan') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Keuangan</strong></h6>
                                <p style="font-size: 13px;">keuangan desa sumber Siskeudes</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-people-carry fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/bankeu') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Bantuan Keuangan</strong></h6>
                                <p style="font-size: 13px;">Data informasi bantuan keuangan Pemerintahan Desa</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-store-alt fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/bumdes') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>BUMDes</strong></h6>
                                <p style="font-size: 13px;">Badan Usaha Milik Desa sumber Dispermadesdukcapil</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-house-damage fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/rtlh') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>RTLH</strong></h6>
                                <p style="font-size: 13px;">Rumah Tidak Layak Huni sumber Simperum</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-hard-hat fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/idm') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>IDM</strong></h6>
                                <p style="font-size: 13px;">indeks desa membangun sumber IDM</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-users fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/kependudukan') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Kependudukan</strong></h6>
                                <p style="font-size: 13px;">Kependudukan desa sumber SIAK</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-chart-line fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/kesejahteraan') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Kesejahteraan Sosial</strong></h6>
                                <p style="font-size: 13px;">Kesejahteraan Sosial desa sumber DTKS</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-wheelchair fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/disabilitas') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Disabilitas</strong></h6>
                                <p style="font-size: 13px;">Disabilitas pada desa sumber DTKS</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-laptop-medical fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/kesehatan') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Kesehatan</strong></h6>
                                <p style="font-size: 13px;">Data Lingkup Kesehatan di Jawa Tengah</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow text-muted" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-seedling fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank">
                                <h6 class="card-title" style="font-size: small;"><strong>Pertanian</strong></h6>
                                <p style="font-size: 13px;">Data pertanian desa sumber Simtan</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card mb-4 box-shadow" style="height: 220px;">
                        <div class="text-center text-info" style="margin: 30px 0 0 0;">
                            <i class="fas fa-user-shield fa-2x"></i>
                        </div>
                        <div class="card-body text-center">
                            <a target="_blank" href="<?= base_url('pemprov/sosialbudaya') ?>">
                                <h6 class="card-title" style="font-size: small;"><strong>Sosial Budaya</strong></h6>
                                <p style="font-size: 13px;">Data sosial budaya sumber Satgas Adat Desa</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>

    <!-- Download -->
    <div class="page" id="page-download">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Download</h1>
            <p class="bp-header__desc">Data dan Informasi yang berada pada <a target="_blank" href="<?= base_url('pemprov/muatandata'); ?>">muatan SIDesa Provinsi Jawa Tengah</a></p>

            <div class="row align-items-center mt-2">
                <div class="col-md-6">
                    <div class="mb-3">
                        <h5 class="card-title">Total File<span class="text-muted fw-normal ms-2"> (<?= $totaldata; ?>)</span></h5>
                    </div>
                </div>
            </div>
            <!-- end row -->
            <div class="table-responsive mb-4">
                <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Diupload Tanggal</th>
                            <th scope="col">Tahun Data</th>
                            <th scope="col">Nama Data</th>
                            <th scope="col">Total Row</th>
                            <th scope="col">Diupload Oleh</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sidesareview as $sr) : ?>
                            <tr>
                                <td><?= format_indo_home($sr['created']); ?></td>
                                <td><?= $sr['tahundata']; ?></td>
                                <td><?= $sr['nm_data']; ?></td>
                                <td><?= $sr['totalrow']; ?></td>
                                <td>
                                    <img src="<?= base_url('img/user/profile/' . $sr['image']); ?>" class="avatar-sm rounded-circle me-2">
                                    <a href="#" class="text-body"><?= $sr['upload_by']; ?></a>
                                </td>
                                <td style="vertical-align: middle;">
                                    <div class="d-flex gap-2 ml-3">
                                        <a href="<?= base_url('sidesa/download/' . $sr['nm_data'] . '/' . $sr['tahundata']); ?>" class="badge badge-warning"><i class="fas fa-download"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- end table -->
            </div>
            <!-- end table responsive -->
        </header>
    </div>

    <!-- ADM PEMDES -->
    <div class="page" id="page-software">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Fitur Layanan Elektronik</h1>
            <p class="bp-header__desc">Portal Layanan Elektronik DISPERMADESDUKCAPIL PROV. JATENG.</p>
            <div class="flex" style="margin-top: 6%;">
                <div class="kartu">
                    <i class="fab fa-leanpub fa-4x logo1" style="position: absolute; margin-bottom: 140px;"></i>
                    <h1 class="sitkd">SITKD</h1>
                    <p>Aplikasi yang digunakan untuk fasilitasi pengelolaan aset desa di Provinsi Jawa Tengah.</p>
                    <a target="_blank" href="<?= base_url('sitkd'); ?>" class="btn btn-outline-primary">Pilih</a>
                </div>
                <div class="kartu">
                    <i class="fas fa-file-signature fa-4x logo2" style="position: absolute; margin-bottom: 140px;"></i>
                    <h1 class="bankeupemdes mt-3">BANKEU PEMDES</h1>
                    <p>Aplikasi yang digunakan untuk fasilitasi proses verifikasi Bantuan Keuangan Pemerintah Desa di Provinsi Jawa Tengah.</p>
                    <a target="_blank" href="http://abang-ndes.dispermadesdukcapil.jatengprov.go.id/admin/auth" class="btn btn-outline-warning">Pilih</a>
                </div>
                <div class="kartu">
                    <i class="fas fa-map-marked-alt fa-4x logo3" style="position: absolute; margin-bottom: 140px;"></i>
                    <h1 class="geodesa">GEODESA</h1>
                    <p>Aplikasi yang menyajikan informasi geospasial Desa di Provinsi Jawa Tengah.</p>
                    <a target="_blank" href="<?= base_url('geodesa/tematik'); ?>" class="btn btn-outline-danger">Pilih</a>
                </div>
            </div>
        </header>
    </div>

    <!-- Data Informasi Kabupaten -->
    <div class="page" id="page-pemkab">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Data Informasi Kabupaten</h1>
            <p class="bp-header__desc">Layanan Data dan Informasi di Kabupaten Provinsi Jawa Tengah</p>
            <div class="flex mt-3">
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.01'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="Cilacap" height="85px" /></a>
                    <br>
                    <span>Cilacap</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.02'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="Banyumas" height="85px" /></a>
                    <br>
                    <span>Banyumas</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.03'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="Purbalingga" height="85px" /></a>
                    <br>
                    <span>Purbalingga</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.04'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="Banjarnegara" height="85px" /></a>
                    <br>
                    <span>Banjarnegara</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.05'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="Kebumen" height="85px" /></a>
                    <br>
                    <span>Kebumen</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.06'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="Purworejo" height="85px" /></a>
                    <br>
                    <span>Purworejo</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.07'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="Wonosobo" height="85px" /></a>
                    <br>
                    <span>Wonosobo</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.08'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="Magelang" height="85px" /></a>
                    <br>
                    <span>Magelang</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.09'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="Boyolali" height="85px" /></a>
                    <br>
                    <span>Boyolali</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.10'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="Klaten" height="85px" /></a>
                    <br>
                    <span>Klaten</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.11'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="Sukoharjo" height="85px" /></a>
                    <br>
                    <span>Sukoharjo</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.12'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="Wonogiri" height="85px" /></a>
                    <br>
                    <span>Wonogiri</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.13'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="Karanganyar" height="85px" /></a>
                    <br>
                    <span>Karanganyar</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.14'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="Sragen" height="85px" /></a>
                    <br>
                    <span>Sragen</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.15'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="Grobogan" height="85px" /></a>
                    <br>
                    <span>Grobogan</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.16'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="Blora" height="85px" /></a>
                    <br>
                    <span>Blora</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.17'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="Rembang" height="85px" /></a>
                    <br>
                    <span>Rembang</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.18'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="Pati" height="85px" /></a>
                    <br>
                    <span>Pati</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.19'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="Kudus" height="85px" /></a>
                    <br>
                    <span>Kudus</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.20'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="Jepara" height="85px" /></a>
                    <br>
                    <span>Jepara</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.21'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="Demak" height="85px" /></a>
                    <br>
                    <span>Demak</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.22'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="Semarang" height="85px" /></a>
                    <br>
                    <span>Semarang</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.23'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="Temanggung" height="85px" /></a>
                    <br>
                    <span>Temanggung</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.24'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="Kendal" height="85px" /></a>
                    <br>
                    <span>Kendal</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.25'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="Batang" height="85px" /></a>
                    <br>
                    <span>Batang</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.26'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="Pekalongan" height="85px" /></a>
                    <br>
                    <span>Pekalongan</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.27'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="Pemalang" height="85px" /></a>
                    <br>
                    <span>Pemalang</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.28'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="Tegal" height="85px" /></a>
                    <br>
                    <span>Tegal</span>
                </div>
                <div class="text-center" style="float: left;width: 125px;padding: 10px 5px;">
                    <a target="_blank" href="<?= base_url('pemkab/kabupaten/33.29'); ?>"><img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="Brebes" height="85px" /></a>
                    <br>
                    <span>Brebes</span>
                </div>
            </div>
        </header>
    </div>

    <!-- Kontak us -->
    <div class="page" id="page-kontak">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url(); ?>/img/thumbnail/fav.ico" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Kontak Kami</h1>
            <hr>
            <div class="row mt-5">
                <div class="col-md-6">
                    <strong>
                        <h5>Pengelola Sistem Informasi Desa (SID) Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Pencatatan Sipil Provinsi Jawa Tengah</h5><br>Jl. Menteri Supeno No.17, Kota Semarang, Jawa Tengah, 50249<br>Telp : (024) 8311621, <br>Fax : (024) 8318492, <br>Email: ifranmahargya@asn.jatengprov.go.id
                    </strong>
                </div>
                <div class="col-md-6">
                    <div id="map" class="map map-home" style="width:100%; height:350px;"></div>
                </div>
            </div>
        </header>
    </div>

    <!-- Login -->
    <div class="page" id="page-login">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url(); ?>/img/thumbnail/fav.ico" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Pengelolaan Data dan Informasi Desa</h1>
            <p class="bp-header__desc">Media Pengelolaan Data dan Informasi SIDesa Provinsi Jawa Tengah</a></p>
            <p class="info mb-4">
                <!-- Admin panel SIDesa merupakan fitur yang memungkinkan seluruh Desa di Provinsi Jawa Tengah mengembangkan berbagai data yang dikemas melalui teknologi informasi. Sehingga dengan adanya fitur ini, setiap Desa yang berada di seluruh Provinsi Jawa Tengah akan menjadi Desa yang sangat informatif, mandiri, dan penuh dengan inovasi. -->
                Media elektronik pengelolaan data dan informasi desa memungkinkan para pengelola untuk mengembangkan berbagai data dan informasi. Sehingga Desa Provinsi Jawa Tengah menjadi informatif dan akuntabel.
            </p>
            <a class="btn btn-primary" target="_blank" href="<?= base_url('user/panel'); ?>" role="button">Masuk</a>
        </header>
    </div>

    <!-- Pencarian -->
    <div class="page" id="page-pencarian">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url(); ?>/img/thumbnail/fav.ico" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Pencarian</h1>
            <p class="bp-header__desc">Kode wilayah Provinsi Jawa Tengah sumber <a target="_blank" href="https://www.kemendagri.go.id/files/2019-05/Kode&Data%20Wilayah/33._jateng.fix.pdf">https://www.kemendagri.go.id</a></p>

            <div class="table-responsive mb-4 mt-5">
                <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                    <thead>
                        <tr>
                            <th scope="col">Kode Wilayah</th>
                            <th scope="col">Nama Kabupaten</th>
                            <th scope="col">Nama Kecamatan</th>
                            <th scope="col">Nama Desa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pencarian as $pr) : ?>
                            <tr>
                                <!-- <td><?= $pr['id_desa']; ?></td>
                                <td><?= $pr['nm_kab']; ?></td>
                                <td><?= $pr['nm_kec']; ?></td>
                                <td><?= $pr['nm_desa']; ?></td> -->

                                <td><?= $pr['id_desa']; ?></td>
                                <td><a target="_blank" href="<?= base_url('pemkab/kabupaten/' . substr($pr['id_desa'], 0, 5)); ?>" style="text-decoration: none; color: #1266F1;"><?= $pr['nm_kab']; ?></a></td>
                                <td><?= $pr['nm_kec']; ?></td>
                                <td><a target="_blank" href="<?= base_url('pemkab/desa/' . $pr['id_desa']); ?>" style="text-decoration: none; color: #1266F1;"><?= $pr['nm_desa']; ?></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- end table -->
            </div>
            <!-- end table responsive -->

        </header>
    </div>

    <!-- Statistik Pengunjung-->
    <div class="page" id="page-statistik">
        <div class="logojudul">
            <div class="row">
                <div class="col logo-aplikasi">
                    <img src="<?= base_url(); ?>/img/thumbnail/fav.ico" style="height: 50px; width:auto">
                    <span style="font-size:12px; color:rgb(84, 80, 80);"><b>DISPERMADESDUKCAPIL PROV. JATENG</b></span>
                </div>
            </div>
        </div>
        <header class="bp-header cf">
            <h1 class="bp-header__title">Statistik Pengunjung</h1>
            <p class="bp-header__desc">Statistik pengunjung website SIDesa Provinsi Jawa Tengah</a></p>
            <div class="row">
                <div class="col-md-6">
                    <div class="media-body">
                        <figure class="highcharts-figure">
                            <div id="statistikbulanan"></div>
                        </figure>
                        <div style="display:none">
                            <table id="freq" border="0" cellspacing="0" cellpadding="0">
                                <tbody>
                                    <tr>
                                        <th colspan="9" class="hdr">Rekapan bulanan data pengunjung tahun <?= date("Y"); ?></th>
                                    </tr>
                                    <tr>
                                        <th class="freq">Direction</th>
                                        <th class="freq">Pengunjung</th>
                                        <th class="freq">Akses</th>
                                    </tr>
                                    <tr>
                                        <td class="dir">Januari</td>
                                        <td class="data"><?= $januari; ?></td>
                                        <td class="data"><?= $aksesjanuari->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Februari</td>
                                        <td class="data"><?= $februari; ?></td>
                                        <td class="data"><?= $aksesfebruari->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Maret</td>
                                        <td class="data"><?= $maret; ?></td>
                                        <td class="data"><?= $aksesmaret->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">April</td>
                                        <td class="data"><?= $april; ?></td>
                                        <td class="data"><?= $aksesapril->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Mei</td>
                                        <td class="data"><?= $mei; ?></td>
                                        <td class="data"><?= $aksesmei->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Juni</td>
                                        <td class="data"><?= $juni; ?></td>
                                        <td class="data"><?= $aksesjuni->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Juli</td>
                                        <td class="data"><?= $juli; ?></td>
                                        <td class="data"><?= $aksesjuli->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Agustus</td>
                                        <td class="data"><?= $agustus; ?></td>
                                        <td class="data"><?= $aksesagustus->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">September</td>
                                        <td class="data"><?= $september; ?></td>
                                        <td class="data"><?= $aksesseptember->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Oktober</td>
                                        <td class="data"><?= $oktober; ?></td>
                                        <td class="data"><?= $aksesoktober->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">November</td>
                                        <td class="data"><?= $november; ?></td>
                                        <td class="data"><?= $aksesnovember->hits; ?></td>
                                    </tr>
                                    <tr>
                                        <td class="dir">Desember</td>
                                        <td class="data"><?= $desember; ?></td>
                                        <td class="data"><?= $aksesdesember->hits; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="media-body">
                        <figure class="highcharts-figure">
                            <div id="statistiktahunan"></div>
                        </figure>
                    </div>
                </div>
                <hr>
            </div>
            <hr />
            <div class="mt-3">
                <table id="foot-table-list" style="width: 320px;">
                    <tr>
                        <td style="width: 145px;">Pengunjung hari ini</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td style="width: 145px;"><?= $pengunjunghariini; ?> orang</td>
                    </tr>
                    <tr>
                        <td>Pengunjung Online</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $pengunjungonline; ?> orang</td>
                    </tr>
                    <tr>
                        <td>Total Pengunjung</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $totalpengunjung; ?> orang</td>
                    </tr>
                    <tr>
                        <td>Total Akses</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td><?= $totalakses->hits; ?> orang</td>
                    </tr>
                    <!-- <tr>
                        <td>Detail</td>
                        <td>&nbsp;&nbsp;:&nbsp;&nbsp;</td>
                        <td style="vertical-align: middle;">
                            <div id="histats_counter"></div> -->
                    <!-- Histats.com  START  (sync)-->
                    <!-- <script type="text/javascript">
                                var _Hasync = _Hasync || [];
                                _Hasync.push(['Histats.start', '1,4580962,4,501,95,18,00000000']);
                                _Hasync.push(['Histats.fasi', '1']);
                                _Hasync.push(['Histats.track_hits', '']);
                                (function() {
                                    var hs = document.createElement('script');
                                    hs.type = 'text/javascript';
                                    hs.async = true;
                                    hs.src = ('//s10.histats.com/js15_as.js');
                                    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
                                })();
                            </script>
                            <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4580962&101" alt="" border="0"></a></noscript>
                        </td>
                    </tr> -->
                </table>
            </div>
        </header>
    </div>
</div>
<button class="menu-button" style="outline: none;"><span>Menu</span></button>
<!-- /pages-stack -->

<?= $this->endSection(); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Informasi Desa Provinsi Jawa Tengah" />
    <meta name="keywords" content="SIDesa, SITKD, GEODESA, JATENG, PROV JATENG, Provinsi Jawa Tengah" />
    <meta name="author" content="zakezone" />
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/logodata.ico'); ?>">

    <title>Access Blocked</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" type="text/css" href="<?= base_url('fontawesome-free/css/all.css') ?>">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('sbadmin2/sb-admin-2.css') ?>" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper header-->
    <div id="wrapper">

        <!-- Content Wrapper topbar-->
        <div id="content-wrapper" class="d-flex flex-column" style="position:relative; min-height: 600px;">

            <!-- Begin Page Content -->
            <div class="container-fluid mt-5">

                <!-- 404 Error Text -->
                <div class="col-lg-12">
                    <div class="text-center mb-12">
                        <div class="error mx-auto" data-text="403">403</div>
                        <p class="lead text-gray-800 mb-5">Access Forbidden</p>

                        <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Cilacap</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Banyumas</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Purbalingga</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Banjarnegara</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Kebumen</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Purworejo</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Wonosobo</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Magelang</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Boyolali</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Klaten</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Sukoharjo</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Wonogiri</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Karanganyar</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Sragen</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Grobogan</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Blora</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Rembang</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Pati</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Kudus</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Jepara</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Demak</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Semarang</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Temanggung</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Kendal</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Batang</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Pekalongan</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Pemalang</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Tegal</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                            <span class="logo-lg">
                                <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="60">
                                <div class="logo-txt">Kab. Brebes</div>
                                <div class="logo-txt">Kec. <?= $namakec; ?></div>
                                <div class="logo-txt">Desa <?= $namades; ?></div>
                            </span>
                        <?php endif; ?>
                        <p class="text-gray-500 mt-4">Akses anda tidak dapat diproses</p>
                        <a data-dialog="somedialog" class="btn btn-primary selected trigger mt-4" style="color: white;" onclick="goBack()">Kembali</a>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <footer class="sticky-footer bg-white" style="width: 100%; position: absolute; bottom: 0px;">
        <div class="text-center">
            <p>Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Catatan Sipil Provinsi Jawa Tengah</p>
        </div>
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa Provinsi Jawa Tengah</span>
            </div>
        </div>
    </footer>


</body>

</html>
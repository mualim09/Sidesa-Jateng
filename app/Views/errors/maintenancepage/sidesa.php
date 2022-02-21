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
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/logodata.ico'); ?>">
    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Abril+Fatface|Raleway:400,700' rel='stylesheet' type='text/css'>
    <!-- Stylesheets -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/maintenancepage/bootstrap.min.css'); ?>"> <!-- ini bootstrap 4 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('fontawesome-free/css/all.css'); ?>"> <!-- ini paket icon sidesa -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/maintenancepage/maintenancepage.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/maintenancepage/skin-alizarin.css'); ?>" id="style-colors">
    <script src="<?= base_url('js/maintenancepage/modernizr-custom.js'); ?>"></script>
</head>

<body>
    <div id="wrap" class="coming-soon">
        <!-- Coming Soon Page -->
        <section class="coming-soon-section" style="background: url(<?= base_url('img/bg/maintenance/1.jpg'); ?>); background-size: 1920px 800px;">
            <canvas id="constellation"></canvas>
            <div class="overlay-cSoon"></div>
            <div class="vcenter">
                <div class="centrize">
                    <div class="col-md-10">
                        <img src="<?= base_url('img/onscreen/home/logo2.png'); ?>">
                    </div>
                    <div class="col-md-10" style="margin-top: 25px;">
                        <h1>Dalam Pengembangan</h1>
                        <p>"Model data sedang dalam proses pengembangan <br /> untuk memberikan pengalaman terbaik"</p>
                        <hr>
                    </div>
                    <!-- START COUNTDOWN -->
                    <!-- <div id="countdown_dashboard">
                        <div class="col-md-3 col-sm-3 col-xs-6 animated">
                            <div class="dash days_dash">
                                <div class="digit">0</div>
                                <div class="digit">0</div>
                                <div class="digit">0</div>
                                <span class="dash_title">Days</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 animated">
                            <div class="dash hours_dash">
                                <div class="digit">0</div>
                                <div class="digit">0</div>
                                <span class="dash_title">Hours</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 animated">
                            <div class="dash minutes_dash">
                                <div class="digit">0</div>
                                <div class="digit">0</div>
                                <span class="dash_title">Minutes</span>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6 animated">
                            <div class="dash seconds_dash">
                                <div class="digit">0</div>
                                <div class="digit">0</div>
                                <span class="dash_title">Seconds</span>
                            </div>
                        </div>
                    </div> -->
                    <!-- END COUNTDOWN -->
                    <div class="col-md-10" style="margin-top: 20px;">
                        <?php
                        $request = \Config\Services::request();
                        $url = $request->uri->getSegment(1);
                        ?>
                        <?php if ($url === "pemprov") : ?>
                            <a href="<?= base_url(); ?>" data-dialog="somedialog" class="btn btn-dark selected trigger">Kembali</a>
                        <?php elseif ($url === "pemkab") : ?>
                            <a data-dialog="somedialog" class="btn btn-dark selected trigger" onclick="goBack()">Kembali</a>
                            <script>
                                function goBack() {
                                    window.history.back();
                                }
                            </script>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Coming Soon Page -->
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-6 col-sm-6" style="margin-left: 50px;">
                    <span class="copyright">DINAS PEMBERDAYAAN MASYARAKAT, DESA, KEPENDUDUKAN DAN PENCATATAN SIPIL PROVINSI JAWA TENGAH</span>
                    <span class="copyright">Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa</span>
                </div>
                <div class="col-lg-5 col-sm-6">
                    <ul id="footer-social">
                        <li><a href="https://twitter.com/DISPERMADES_JTG" target="_blank"><i class="fab fa-twitter"></i></a> </li>
                        <li><a href="https://www.instagram.com/dispermadesdukcapil_jtg/" target="_blank"><i class="fab fa-instagram"></i></a> </li>
                        <li><a href="https://youtube.com/channel/UCk3kh5WTXeaBrvYNmDYGL1A" target="_blank"><i class="fab fa-youtube"></i></a> </li>
                    </ul>
                </div>
            </div>
        </footer>
        <!-- End Footer -->
    </div>

    <!-- Main.js File -->
    <script src="<?= base_url('js/maintenancepage/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('js/maintenancepage/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('js/maintenancepage/jquery.appear.js'); ?>"></script>
    <script src="<?= base_url('js/maintenancepage/constellation-2.js'); ?>"></script>
    <!-- <script src="<?= base_url(); ?>/js/maintenancepage/jquery.lwtCountdown-1.0.js"></script> -->
    <!-- <script src="<?= base_url(); ?>/js/maintenancepage/main.js"></script> -->
</body>

</html>
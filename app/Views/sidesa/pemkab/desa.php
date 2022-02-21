<?= $this->include('sidesa/layout/pemkab/header') ?>
<?= $this->include('sidesa/layout/pemkab/topbar_desa') ?>
<?= $this->include('sidesa/layout/pemkab/sidebar_desa') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>

        <style>
            .bgkabupaten {
                background: linear-gradient(rgba(0, 0, 0, 0.6),
                        rgba(0, 0, 0, 0.6)), url(<?= isset($datades['bghome']) ? base_url("img/bg/sidesa/desa/" . $datades['bghome']) : base_url("img/bg/sidesa/desa/default.jpg"); ?>);
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }
        </style>
        <div class="row">
            <div class="col-xl-12">
                <!-- card -->
                <div class="card text-white shadow-primary card-h-100 bgkabupaten">
                    <!-- card body -->
                    <div class="card-body p-0">
                        <div id="carouselExampleCaptions" class="carousel slide text-center widget-carousel" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Desa</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datades['news1']) ? nl2br($datades['news1']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datades['news1']) ? $datades['input_by'] : NULL; ?> &mdash; <?= isset($datades['news1']) ? timeAgo($datades['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Desa</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datades['news2']) ? nl2br($datades['news2']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datades['news2']) ? $datades['input_by'] : NULL; ?> &mdash; <?= isset($datades['news2']) ? timeAgo($datades['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Desa</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datades['news3']) ? nl2br($datades['news3']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datades['news3']) ? $datades['input_by'] : NULL; ?> &mdash; <?= isset($datades['news3']) ? timeAgo($datades['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Desa</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datades['news4']) ? nl2br($datades['news4']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datades['news4']) ? $datades['input_by'] : NULL; ?> &mdash; <?= isset($datades['news4']) ? timeAgo($datades['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Desa</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datades['news5']) ? nl2br($datades['news5']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datades['news5']) ? $datades['input_by'] : NULL; ?> &mdash; <?= isset($datades['news5']) ? timeAgo($datades['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                            </div>
                            <!-- end carousel-inner -->

                            <div class="carousel-indicators carousel-indicators-rounded">
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            </div>
                            <!-- end carousel-indicators -->
                        </div>
                        <!-- end carousel -->
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end col -->
        </div> <!-- end row-->

        <div class="text-center mb-4" style="font-weight: bold;">
            <p>INDEKS DESA MEMBANGUN (IDM)</p>
            <p><?= "STATUS : " . $status; ?></p>
        </div>

        <div class="row" style="justify-content: center;">
            <div class="col-xl-4 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Indeks Ketahanan Sosial</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatiniiks; ?>"></span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-iks" data-colors='["#39bca0"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">Selisih indeks <?php if ($hasiliks < 0) : ?> <?= number_format($hasiliks, 4); ?> <?php elseif ($hasiliks == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . number_format($hasiliks, 4); ?> <?php endif; ?></span>
                            <span class="ms-1 text-muted font-size-13">Tahun <?= $idmtahun != null ? date("Y") : date("Y") - 1; ?></span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col-->

            <div class="col-xl-4 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Indeks Ketahanan Ekonomi</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatiniike; ?>"></span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-ike" data-colors='["#60a9f0"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-info text-info">Selisih indeks <?php if ($hasilike < 0) : ?> <?= number_format($hasilike, 4); ?> <?php elseif ($hasilike == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . number_format($hasilike, 4); ?> <?php endif; ?></span>
                            <span class="ms-1 text-muted font-size-13">Tahun <?= $idmtahun != null ? date("Y") : date("Y") - 1; ?></span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col-->

            <div class="col-xl-4 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Indeks Ketahanan Lingkungan</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatiniikl; ?>"></span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-ikl" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-primary text-primary">Selisih indeks <?php if ($hasilikl < 0) : ?> <?= number_format($hasilikl, 4); ?> <?php elseif ($hasilikl == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . number_format($hasilikl, 4); ?> <?php endif; ?></span>
                            <span class="ms-1 text-muted font-size-13">Tahun <?= $idmtahun != null ? date("Y") : date("Y") - 1; ?></span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

            <div class="col-xl-4 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-2 d-block text-truncate">Nilai IDM</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatininilaiidm; ?>"></span>
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-nilai" data-colors='["#ffc055"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-warning text-warning">Selisih indeks <?php if ($hasilnilaiidm < 0) : ?> <?= number_format($hasilnilaiidm, 4); ?> <?php elseif ($hasilnilaiidm == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . number_format($hasilnilaiidm, 4); ?> <?php endif; ?></span>
                            <span class="ms-1 text-muted font-size-13">Tahun <?= $idmtahun != null ? date("Y") : date("Y") - 1; ?></span>
                        </div>
                    </div><!-- end card body -->
                </div><!-- end card -->
            </div><!-- end col -->

        </div><!-- end row-->



    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->

<?= $this->include('sidesa/layout/pemkab/footer-desa') ?>
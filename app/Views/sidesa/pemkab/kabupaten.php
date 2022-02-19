<?= $this->include('sidesa/layout/pemkab/header') ?>
<?= $this->include('sidesa/layout/pemkab/topbar') ?>
<?= $this->include('sidesa/layout/pemkab/sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>

        <style>
            .bgkabupaten {
                background: linear-gradient(rgba(0, 0, 0, 0.6),
                        rgba(0, 0, 0, 0.6)), url(<?= isset($datakab['bghome']) ? base_url("img/bg/sidesa/kabupaten/" . $datakab['bghome']) : base_url("img/bg/sidesa/kabupaten/default.jpg"); ?>);
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
                                                <?php if (substr($kodekab, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Kabupaten</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datakab['news1']) ? nl2br($datakab['news1']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datakab['news1']) ? $datakab['input_by'] : NULL; ?> &mdash; <?= isset($datakab['news1']) ? timeAgo($datakab['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodekab, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Kabupaten</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datakab['news2']) ? nl2br($datakab['news2']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datakab['news2']) ? $datakab['input_by'] : NULL; ?> &mdash; <?= isset($datakab['news2']) ? timeAgo($datakab['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodekab, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Kabupaten</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datakab['news3']) ? nl2br($datakab['news3']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datakab['news3']) ? $datakab['input_by'] : NULL; ?> &mdash; <?= isset($datakab['news3']) ? timeAgo($datakab['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodekab, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Kabupaten</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datakab['news4']) ? nl2br($datakab['news4']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datakab['news4']) ? $datakab['input_by'] : NULL; ?> &mdash; <?= isset($datakab['news4']) ? timeAgo($datakab['update_at']) . ' yang lalu' : NULL; ?></i></p>
                                    </div>
                                </div>
                                <!-- end carousel-item -->
                                <div class="carousel-item">
                                    <div class="text-center p-4">
                                        <i class="widget-box-1-icon mt-4"><img src="<?= base_url('img/thumbnail/fav.ico'); ?>" alt="" height="150"></i>
                                        <div>
                                            <span>
                                                <?php if (substr($kodekab, 0, 5) == "33.01") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.02") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.03") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.04") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.05") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.06") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.07") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.08") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.09") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.10") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.11") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.12") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.13") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.14") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.15") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.16") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.17") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.18") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.19") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.20") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.21") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.22") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.23") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.24") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.25") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.26") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.27") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.28") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="100">
                                                <?php elseif (substr($kodekab, 0, 5) == "33.29") : ?>
                                                    <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="100">
                                                <?php endif; ?>
                                            </span>
                                        </div>
                                        <h4 class="mt-3 lh-base fw-normal text-white">Informasi <b>Kabupaten</b></h4>
                                        <p class="text-white-50 font-size-15"><?= isset($datakab['news5']) ? nl2br($datakab['news5']) : "Belum ada info"; ?></p>
                                        <p class="text-white-50 font-size-10"><i><?= isset($datakab['news5']) ? $datakab['input_by'] : NULL; ?> &mdash; <?= isset($datakab['news5']) ? timeAgo($datakab['update_at']) . ' yang lalu' : NULL; ?></i></p>
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

        <div class="div mb-3 text-center" style="font-weight: bold;">
            INDEKS DESA MEMBANGUN (IDM)
        </div>

        <div class="row" style="justify-content: center;">
            <div class="col-xl-4 col-md-6">
                <!-- card -->
                <div class="card card-h-100">
                    <!-- card body -->
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">MANDIRI</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatinimandiri; ?>"></span>
                                    Desa
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-mandiri" data-colors='["#39bca0"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-success text-success">Selisih indeks <?php if ($hasilmandiri < 0) : ?> <?= $hasilmandiri; ?> <?php elseif ($hasilmandiri == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . $hasilmandiri; ?> <?php endif; ?></span>
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
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">MAJU</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatinimaju; ?>"></span>
                                    Desa
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-maju" data-colors='["#60a9f0"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-info text-info">Selisih indeks <?php if ($hasilmaju < 0) : ?> <?= $hasilmaju; ?> <?php elseif ($hasilmaju == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . $hasilmaju; ?> <?php endif; ?></span>
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
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">BERKEMBANG</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatiniberkembang; ?>"></span>
                                    Desa
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-berkembang" data-colors='["#5156be"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-primary text-primary">Selisih indeks <?php if ($hasilberkembang < 0) : ?> <?= $hasilberkembang; ?> <?php elseif ($hasilberkembang == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . $hasilberkembang; ?> <?php endif; ?></span>
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
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">TERTINGGAL</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatinitertinggal; ?>"></span>
                                    Desa
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-tertinggal" data-colors='["#ffc055"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-warning text-warning">Selisih indeks <?php if ($hasiltertinggal < 0) : ?> <?= $hasiltertinggal; ?> <?php elseif ($hasiltertinggal == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . $hasiltertinggal; ?> <?php endif; ?></span>
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
                                <span class="text-muted mb-3 lh-1 d-block text-truncate">SANGAT TERTINGGAL</span>
                                <h4 class="mb-3">
                                    <span class="counter-value" data-target="<?= $datasaatinisangattertinggal; ?>"></span>
                                    Desa
                                </h4>
                            </div>
                            <div class="col-6">
                                <div id="idm-sangattertinggal" data-colors='["#fd636e"]' class="apex-charts mb-2"></div>
                            </div>
                        </div>
                        <div class="text-nowrap">
                            <span class="badge bg-soft-danger text-danger">Selisih indeks <?php if ($hasilsangattertinggal < 0) : ?> <?= $hasilsangattertinggal; ?> <?php elseif ($hasilsangattertinggal == 0) : ?> <?= 0; ?> <?php else : ?> <?= "+" . $hasilsangattertinggal; ?> <?php endif; ?></span>
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

<?= $this->include('sidesa/layout/pemkab/footer-dashboard') ?>
<header id="page-topbar">
    <?php
    $this->db = \Config\Database::connect();
    ?>
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Cilacap</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Banyumas</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Purbalingga</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Banjarnegara</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Kebumen</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Purworejo</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Wonosobo</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Magelang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Boyolali</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Klaten</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Sukoharjo</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Wonogiri</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Karanganyar</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Sragen</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Grobogan</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Blora</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Rembang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Pati</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Kudus</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Jepara</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Demak</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Semarang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Temanggung</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Kendal</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Batang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Pekalongan</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Pemalang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Tegal</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Brebes</span>
                        </span>
                    <?php endif; ?>
                </a>

                <a href="#" class="logo logo-light">
                    <?php if (substr($kodedes, 0, 5) == "33.01") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3301.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Cilacap</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.02") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3302.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Banyumas</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.03") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3303.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Purbalingga</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.04") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3304.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Banjarnegara</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.05") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3305.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Kebumen</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.06") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3306.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Purworejo</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.07") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3307.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Wonosobo</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.08") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3308.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Magelang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.09") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3309.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Boyolali</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.10") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3310.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Klaten</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.11") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3311.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Sukoharjo</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.12") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3312.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Wonogiri</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.13") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3313.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Karanganyar</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.14") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3314.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Sragen</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.15") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3315.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Grobogan</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.16") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3316.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Blora</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.17") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3317.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Rembang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.18") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3318.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Pati</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.19") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3319.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Kudus</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.20") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3320.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Jepara</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.21") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3321.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Demak</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.22") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3322.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Semarang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.23") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3323.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Temanggung</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.24") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3324.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Kendal</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.25") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3325.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Batang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.26") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3326.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Pekalongan</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.27") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3327.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Pemalang</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.28") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3328.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Tegal</span>
                        </span>
                    <?php elseif (substr($kodedes, 0, 5) == "33.29") : ?>
                        <span class="logo-sm">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="24">
                        </span>
                        <span class="logo-lg">
                            <img src="<?= base_url('img/onscreen/pemerintahkabupaten/logo_kab/3329.png'); ?>" alt="" height="50"> <span class="logo-txt">Kab. Brebes</span>
                        </span>
                    <?php endif; ?>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <!-- <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>...">
                    <button class="btn btn-primary" type="button"><i class="bx bx-search-alt align-middle"></i></button>
                </div>
            </form> -->
        </div>

        <div class="d-flex">

            <!-- <div class="dropdown d-inline-block d-lg-none ms-2">
                <button type="button" class="btn header-item" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="search" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">

                    <form class="p-3">
                        <div class="form-group m-0">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="<?= lang('Files.Search') ?>..." aria-label="Search Result">

                                <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div> -->

            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            <!-- <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="grid" class="icon-lg"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <div class="p-2">
                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="<?= base_url('minia/images/brands/github.png'); ?>" alt="Github">
                                    <span>GitHub</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="<?= base_url('minia/images/brands/bitbucket.png'); ?>" alt="bitbucket">
                                    <span>Bitbucket</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="<?= base_url('minia/images/brands/dribbble.png'); ?>" alt="dribbble">
                                    <span>Dribbble</span>
                                </a>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="<?= base_url('minia/images/brands/dropbox.png'); ?>" alt="dropbox">
                                    <span>Dropbox</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="<?= base_url('minia/images/brands/mail_chimp.png'); ?>" alt="mail_chimp">
                                    <span>Mail Chimp</span>
                                </a>
                            </div>
                            <div class="col">
                                <a class="dropdown-icon-item" href="#">
                                    <img src="<?= base_url('minia/images/brands/slack.png'); ?>" alt="slack">
                                    <span>Slack</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->



            <!-- <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item right-bar-toggle me-2">
                    <i data-feather="settings" class="icon-lg"></i>
                </button>
            </div> -->

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?= base_url('img/user/profile/' . $user['image']); ?>" alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?= $user['nama'] ?></span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <a class="dropdown-item" href="<?= base_url('user/logout') ?>"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
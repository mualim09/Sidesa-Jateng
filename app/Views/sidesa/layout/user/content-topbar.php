<header id="page-topbar">
    <?php
    $this->db = \Config\Database::connect();
    ?>
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="#" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="<?= base_url('img/thumbnail/logodata.ico'); ?>" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('img/onscreen/home/logov.png'); ?>" alt="" height="50">
                    </span>
                </a>

                <a href="#" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="<?= base_url('img/thumbnail/logodata.ico'); ?>" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="<?= base_url('img/onscreen/home/logo2.png'); ?>" alt="" height="50">
                    </span>
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

            <?php if ($user['role_id'] == 1) : ?>
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="icon-lg"></i>
                        <?php
                        $query = "SELECT `read`, COUNT(`read`) AS `total` FROM `sidesa_notifikasi` WHERE `read` = 'N' AND `target` = 1 GROUP BY `read`";
                        $totalnotif = $this->db->query($query)->getResult('array');
                        ?>
                        <?php foreach ($totalnotif as $tn) : ?>
                            <span class="badge bg-danger rounded-pill"><?= $tn['total']; ?></span>
                        <?php endforeach; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifikasi</h6>
                                </div>
                            </div>
                        </div>

                        <?php
                        $query = "SELECT `id`, `jenis_file`, `nama_notif`, `image_user`, `nm_desa`, `tanggal` FROM `sidesa_notifikasi` LEFT JOIN `wilayah_33` ON `sidesa_notifikasi`.`kd_wilayah` = `wilayah_33`.`id_desa` WHERE `read` = 'N' AND `target` = 1 ORDER BY `tanggal` DESC -- LIMIT 5";
                        $listnotif = $this->db->query($query)->getResult('array');
                        ?>

                        <div data-simplebar style="max-height: 230px;">
                            <?php foreach ($listnotif as $ln) : ?>
                                <a <?php if ($ln['jenis_file'] == "Import Data") : ?> href="<?= base_url('user/notifikasi/import/' . $ln['id']) ?>" <?php elseif ($ln['jenis_file'] == "Input Data" && substr($ln['nama_notif'], 5, 1) != '.') : ?> id="refetch" target="_blank" href="<?= base_url('user/notifikasi/inputdata/' . $ln['id'] . '/' . substr($ln['nama_notif'], 0, 5)); ?>" <?php elseif ($ln['jenis_file'] == "Input Data" && substr($ln['nama_notif'], 13, 1) != '.') : ?> id="refresh" target="_blank" href="<?= base_url('user/notifikasi/inputdata/' . $ln['id'] . '/' . substr($ln['nama_notif'], 0, 13)); ?>" <?php elseif ($ln['jenis_file'] == "Role Akses" || $ln['jenis_file'] == "Hapus User") : ?> href="<?= base_url('user/notifikasi/rolemanagement/' . $ln['id'] . '/' . $user['role_id']); ?>" <?php endif; ?> class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="<?= base_url('img/user/profile/' . $ln['image_user']); ?>" class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?= $ln['nm_desa'] ?> : <?= $ln['jenis_file'] ?></h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1"><?= $ln['nama_notif'] ?></p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= timeAgo($ln['tanggal']) . ' yang lalu'; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= base_url('user/notifikasi/allnotif') ?>">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>Tampilkan semua notifikasi</span>
                            </a>
                        </div>
                    </div>
                </div>

            <?php elseif ($user['role_id'] == 2) : ?>
                <!-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="icon-lg"></i>
                        <?php
                        $query = "SELECT `read`, COUNT(`read`) AS `total` FROM `sidesa_notifikasi` WHERE `read` = 'N' AND `target` = 2 GROUP BY `read`";
                        $totalnotif = $this->db->query($query)->getResult('array');
                        ?>
                        <?php foreach ($totalnotif as $tn) : ?>
                            <span class="badge bg-danger rounded-pill"><?= $tn['total']; ?></span>
                        <?php endforeach; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifikasi</h6>
                                </div>
                            </div>
                        </div>

                        <?php
                        $query = "SELECT `id`, `jenis_file`, `nama_notif`, `image_user`, `nm_desa`, `tanggal` FROM `sidesa_notifikasi` LEFT JOIN `wilayah_33` ON `sidesa_notifikasi`.`kd_wilayah` = `wilayah_33`.`id_desa` WHERE `read` = 'N' AND `target` = 2 ORDER BY `tanggal` DESC -- LIMIT 5";
                        $listnotif = $this->db->query($query)->getResult('array');
                        ?>

                        <div data-simplebar style="max-height: 230px;">
                            <?php foreach ($listnotif as $ln) : ?>
                                <a <?php if ($ln['jenis_file'] == "Import Data") : ?> href="<?= base_url('user/notifikasi/import/' . $ln['id']) ?>" <?php elseif ($ln['jenis_file'] == "Input Data" && substr($ln['nama_notif'], 5, 1) != '.') : ?> id="refetch" target="_blank" href="<?= base_url('user/notifikasi/inputdata/' . $ln['id'] . '/' . substr($ln['nama_notif'], 0, 5)); ?>" <?php elseif ($ln['jenis_file'] == "Input Data" && substr($ln['nama_notif'], 13, 1) != '.') : ?> id="refresh" target="_blank" href="<?= base_url('user/notifikasi/inputdata/' . $ln['id'] . '/' . substr($ln['nama_notif'], 0, 13)); ?>" <?php elseif ($ln['jenis_file'] == "Role Akses" || $ln['jenis_file'] == "Hapus User") : ?> href="<?= base_url('user/notifikasi/rolemanagement/' . $ln['id'] . '/' . $user['role_id']); ?>" <?php endif; ?> class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="<?= base_url('img/user/profile/' . $ln['image_user']); ?>" class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?= $ln['nm_desa'] ?> : <?= $ln['jenis_file'] ?></h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1"><?= $ln['nama_notif'] ?></p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= timeAgo($ln['tanggal']) . ' yang lalu'; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= base_url('user/notifikasi/allnotif') ?>">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>Tampilkan semua notifikasi</span>
                            </a>
                        </div>
                    </div>
                </div> -->

            <?php elseif ($user['role_id'] == 3) : ?>
                <!-- <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="bell" class="icon-lg"></i>
                        <?php
                        $query = "SELECT `read`, COUNT(`read`) AS `total` FROM `sidesa_notifikasi` WHERE `read` = 'N' AND `target` = 3 GROUP BY `read`";
                        $totalnotif = $this->db->query($query)->getResult('array');
                        ?>
                        <?php foreach ($totalnotif as $tn) : ?>
                            <span class="badge bg-danger rounded-pill"><?= $tn['total']; ?></span>
                        <?php endforeach; ?>
                    </button>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                        <div class="p-3">
                            <div class="row align-items-center">
                                <div class="col">
                                    <h6 class="m-0"> Notifikasi</h6>
                                </div>
                            </div>
                        </div>

                        <?php
                        $query = "SELECT `id`, `jenis_file`, `nama_notif`, `image_user`, `nm_desa`, `tanggal` FROM `sidesa_notifikasi` LEFT JOIN `wilayah_33` ON `sidesa_notifikasi`.`kd_wilayah` = `wilayah_33`.`id_desa` WHERE `read` = 'N' AND `target` = 3 ORDER BY `tanggal` DESC -- LIMIT 5";
                        $listnotif = $this->db->query($query)->getResult('array');
                        ?>

                        <div data-simplebar style="max-height: 230px;">
                            <?php foreach ($listnotif as $ln) : ?>
                                <a <?php if ($ln['jenis_file'] == "Import Data") : ?> href="<?= base_url('user/notifikasi/import/' . $ln['id']) ?>" <?php elseif ($ln['jenis_file'] == "Input Data" && substr($ln['nama_notif'], 5, 1) != '.') : ?> id="refetch" target="_blank" href="<?= base_url('user/notifikasi/inputdata/' . $ln['id'] . '/' . substr($ln['nama_notif'], 0, 5)); ?>" <?php elseif ($ln['jenis_file'] == "Input Data" && substr($ln['nama_notif'], 13, 1) != '.') : ?> id="refresh" target="_blank" href="<?= base_url('user/notifikasi/inputdata/' . $ln['id'] . '/' . substr($ln['nama_notif'], 0, 13)); ?>" <?php elseif ($ln['jenis_file'] == "Role Akses" || $ln['jenis_file'] == "Hapus User") : ?> href="<?= base_url('user/notifikasi/rolemanagement/' . $ln['id'] . '/' . $user['role_id']); ?>" <?php endif; ?> class="text-reset notification-item">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 me-3">
                                            <img src="<?= base_url('img/user/profile/' . $ln['image_user']); ?>" class="rounded-circle avatar-sm" alt="user-pic">
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-1"><?= $ln['nm_desa'] ?> : <?= $ln['jenis_file'] ?></h6>
                                            <div class="font-size-13 text-muted">
                                                <p class="mb-1"><?= $ln['nama_notif'] ?></p>
                                                <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?= timeAgo($ln['tanggal']) . ' yang lalu'; ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>

                        <div class="p-2 border-top d-grid">
                            <a class="btn btn-sm btn-link font-size-14 text-center" href="<?= base_url('user/notifikasi/allnotif') ?>">
                                <i class="mdi mdi-arrow-right-circle me-1"></i> <span>Tampilkan semua notifikasi</span>
                            </a>
                        </div>
                    </div>
                </div> -->
            <?php endif; ?>

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
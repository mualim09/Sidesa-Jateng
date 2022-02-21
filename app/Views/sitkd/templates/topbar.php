<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>

            <!-- Topbar Search -->
            <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <!-- <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a> -->
                <!-- Dropdown - Messages -->
                <!-- <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li> -->

                <!-- Nav Item - Alerts -->
                <link rel="stylesheet" href="<?= base_url('css/sitkd/notifscrollable.css') ?>">
                <?php if ($user['role_id'] <= 2) : ?>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <?php
                            $query = "SELECT `read`, COUNT(`read`) AS `total`
                                    FROM `sitkd_notifikasi`
                                    WHERE `read` = 'N' AND `target` = 2
                                    GROUP BY `read`
                                    ";
                            $totalnotif = $this->db->query($query)->getResult('array');
                            ?>

                            <?php foreach ($totalnotif as $tn) : ?>
                                <span class="badge badge-danger badge-counter"><?= $tn['total']; ?></span>
                            <?php endforeach; ?>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">

                            <h6 class="dropdown-header topnotif">
                                <dl class="row">
                                    <dd class="col">Notifikasi</dd>
                                    <!-- <dd class="col text-right"><a class="card-text panah2" href="notifikasi/allnotif" style="text-decoration: none;"><i>show all<i class="fas fa-angle-double-right ml-2"></i></i></a></dd> -->
                                </dl>
                            </h6>

                            <?php
                            $query = "SELECT *
                            FROM `sitkd_notifikasi` LEFT JOIN `sitkd_dispermades`
                            ON `sitkd_notifikasi`.`permendagri_id` = `sitkd_dispermades`.`permendagri_id`
                            WHERE `read` = 'N' AND `target` = 2
                            ORDER BY `tanggal` DESC
                            -- LIMIT 5
                            ";
                            $listnotif = $this->db->query($query)->getResult('array');
                            ?>

                            <div class="overflow-auto">
                                <?php foreach ($listnotif as $ln) : ?>
                                    <a class="dropdown-item d-flex align-items-center" <?php if ($ln['jenis'] == "Dokumen baru!") : ?> href="<?= base_url('sitkd/notifikasi/dokumenbaru') ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 1 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 2 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 3 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 4 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 5 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 6 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 7 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 8 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 9 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 10 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 11 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 12 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 13 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 14 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 15 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 16 review") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 1 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 2 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 3 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 4 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 5 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 6 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 7 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 8 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 9 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 10 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 11 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 12 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 13 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 14 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 15 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 16 peninjauan") : ?> href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 1 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 2 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 3 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 4 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 5 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 6 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 7 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 8 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 9 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 10 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 11 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 12 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 13 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 14 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 15 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Persyaratan 16 baru!") : ?> href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 1 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 2 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 3 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 4 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 5 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 6 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 7 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 8 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 9 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 10 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 11 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 12 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 13 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 14 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 15 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 16 baru!") : ?> href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php endif; ?>>
                                        <div class="mr-3">
                                            <div <?php if ($ln['jenis'] == "Dokumen baru!") : ?>class="icon-circle bg-primary" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 1 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 2 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 3 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 4 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 5 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 6 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 7 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 8 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 9 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 10 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 11 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 12 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 13 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 14 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 15 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 16 review") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 1 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 2 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 3 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 4 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 5 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 6 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 7 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 8 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 9 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 10 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 11 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 12 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 13 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 14 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 15 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil Revisi Persyaratan 16 peninjauan") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Dokumen segera direvisi!") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "File Persyaratan 1 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 2 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 3 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 4 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 5 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 6 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 7 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 8 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 9 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 10 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 11 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 12 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 13 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 14 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 15 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Persyaratan 16 baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 1 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 2 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 3 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 4 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 5 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 6 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 7 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 8 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 9 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 10 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 11 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 12 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 13 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 14 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 15 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "File Revisi Persyaratan 16 baru!") : ?>class="icon-circle bg-warning" <?php endif; ?>>
                                                <i class="<?= $ln['icon']; ?>"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?= timeAgo($ln['tanggal']) . ' yang lalu'; ?></div>
                                            <span class="font-weight-bold"><?= $ln['jenis']; ?></span>
                                            <?php if ($ln['kabupaten'] == "Pemerintah Provinsi") : ?>
                                                <div class="small" style="color: crimson;"><?= $ln['kabupaten']; ?></div>
                                            <?php elseif ($ln['kabupaten'] == "Admin") : ?>
                                                <div class="small" style="color: crimson;"><?= $ln['kabupaten']; ?></div>
                                            <?php else : ?>
                                                <div class="small text-gray-500"><?= $ln['kabupaten']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <a class="dropdown-item text-center small text-gray-500 panah2" href="<?= base_url('sitkd/notifikasi/allnotif') ?>" style="text-decoration: none;">Tampilkan semua notifikasi</a>
                        </div>
                    </li>

                <?php elseif ($user['role_id'] == 3) : ?>
                    <li class="nav-item dropdown no-arrow mx-1">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <?php
                            $permendagri_id = session()->get('permendagri_id');
                            $query =   "SELECT `read`, COUNT(`read`) AS `total`
                                    FROM `sitkd_notifikasi`
                                    WHERE `read` = 'N' AND `target` = $permendagri_id
                                    GROUP BY `read`
                                    ";
                            $totalnotif = $this->db->query($query)->getResult('array');
                            ?>

                            <?php foreach ($totalnotif as $tn) : ?>
                                <span class="badge badge-danger badge-counter"><?= $tn['total']; ?></span>
                            <?php endforeach; ?>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">

                            <h6 class="dropdown-header topnotif">
                                <dl class="row">
                                    <dd class="col">Notifikasi</dd>
                                    <!-- <dd class="col text-right"><a class="card-text panah2" href="notifikasi/allnotif" style="text-decoration: none;"><i>show all<i class="fas fa-angle-double-right ml-2"></i></i></a></dd> -->
                                </dl>
                            </h6>

                            <?php
                            $permendagri_id = session()->get('permendagri_id');
                            $query = "SELECT *
                                        FROM `sitkd_notifikasi` LEFT JOIN `sitkd_dispermades`
                                        ON `sitkd_notifikasi`.`permendagri_id` = `sitkd_dispermades`.`permendagri_id`
                                        WHERE `read` = 'N' AND `target` = $permendagri_id
                                        ORDER BY `tanggal` DESC
                                        -- LIMIT 5
                                        ";
                            $listnotif = $this->db->query($query)->getResult('array');
                            ?>

                            <div class="overflow-auto">
                                <?php foreach ($listnotif as $ln) : ?>
                                    <a class="dropdown-item d-flex align-items-center" <?php if ($ln['jenis'] == "Perubahan status dokumen!") : ?> href="<?= base_url('sitkd/notifikasi/perubahanstatus') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Berkas Persetujuan Baru!") : ?> href="<?= base_url('sitkd/notifikasi/persetujuan') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Catatan dokumen baru!") : ?> href="<?= base_url('sitkd/notifikasi/catatanpemprov') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 1 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 2 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 3 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 4 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 5 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 6 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 7 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 8 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 9 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 10 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 11 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 12 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 13 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 14 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 15 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 16 baru!") : ?> href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $ln['file_id']; ?>/<?= $ln['id']; ?>" <?php endif; ?>>
                                        <div class="mr-3">
                                            <div <?php if ($ln['jenis'] == "Perubahan status dokumen!") : ?>class="icon-circle bg-primary" <?php elseif ($ln['jenis'] == "Berkas Persetujuan Baru!") : ?>class="icon-circle bg-success" <?php elseif ($ln['jenis'] == "Catatan dokumen baru!") : ?>class="icon-circle bg-danger" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 1 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 2 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 3 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 4 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 5 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 6 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 7 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 8 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 9 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan10 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 11 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 12 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 13 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 14 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 15 baru!") : ?>class="icon-circle bg-warning" <?php elseif ($ln['jenis'] == "Hasil verifikasi Persyaratan 16 baru!") : ?>class="icon-circle bg-warning" <?php endif; ?>>
                                                <i class="<?= $ln['icon']; ?>"></i>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="small text-gray-500"><?= timeAgo($ln['tanggal']) . ' yang lalu'; ?></div>
                                            <span class="font-weight-bold"><?= $ln['jenis']; ?></span>
                                            <?php if ($ln['kabupaten'] == "Pemerintah Provinsi") : ?>
                                                <div class="small" style="color: crimson;"><?= $ln['kabupaten']; ?></div>
                                            <?php elseif ($ln['kabupaten'] == "Admin") : ?>
                                                <div class="small" style="color: crimson;"><?= $ln['kabupaten']; ?></div>
                                            <?php else : ?>
                                                <div class="small text-gray-500"><?= $ln['kabupaten']; ?></div>
                                            <?php endif; ?>
                                        </div>
                                    </a>
                                <?php endforeach; ?>
                            </div>
                            <a class="dropdown-item text-center small text-gray-500 panah2" href="<?= base_url('sitkd/notifikasi/allnotif') ?>" style="text-decoration: none;">Tampilkan semua notifikasi</a>
                        </div>
                    </li>
                <?php endif; ?>

                <!-- Nav Item - Messages -->
                <!-- <li class="nav-item dropdown no-arrow mx-1">
                <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-envelope fa-fw"></i> -->
                <!-- Counter - Messages -->
                <!-- <span class="badge badge-danger badge-counter">7</span>
                </a> -->
                <!-- Dropdown - Messages -->
                <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                    <h6 class="dropdown-header">
                        Message Center
                    </h6>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60" alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div class="font-weight-bold">
                            <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been having.</div>
                            <div class="small text-gray-500">Emily Fowler · 58m</div>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://source.unsplash.com/AU4VPcFN4LE/60x60" alt="">
                            <div class="status-indicator"></div>
                        </div>
                        <div>
                            <div class="text-truncate">I have the photos that you ordered last month, how would you like them sent to you?</div>
                            <div class="small text-gray-500">Jae Chun · 1d</div>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://source.unsplash.com/CS2uCrpNzJY/60x60" alt="">
                            <div class="status-indicator bg-warning"></div>
                        </div>
                        <div>
                            <div class="text-truncate">Last month's report looks great, I am very happy with the progress so far, keep up the good work!</div>
                            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                        </div>
                    </a>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="dropdown-list-image mr-3">
                            <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60" alt="">
                            <div class="status-indicator bg-success"></div>
                        </div>
                        <div>
                            <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people say this to all dogs, even if they aren't good...</div>
                            <div class="small text-gray-500">Chicken the Dog · 2w</div>
                        </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                </div>
            </li> -->

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $user['nama']; ?></span>
                        <img class="img-profile rounded-circle" src="<?= base_url('/img/profile/' . $user['image']); ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a> -->
                        <!-- <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                    </a> -->
                        <a class="dropdown-item" href="<?= base_url('sitkd/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->
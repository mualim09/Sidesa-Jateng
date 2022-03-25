<!-- ========== Left Sidebar Start ========== -->
<?php
$this->db = \Config\Database::connect();
?>
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <?php
            $kd_wilayah = substr(session()->get('kd_wilayah'), 0, 5);
            $queryMenu = "SELECT `pemdes_user_menu`.`id`, `menu`
                    FROM `pemdes_user_menu` JOIN `pemdes_user_access_menu` 
                    ON `pemdes_user_menu`.`id` = `pemdes_user_access_menu`.`menu_id`
                    WHERE `pemdes_user_access_menu`.`kd_wilayah` =  $kd_wilayah
                    ORDER BY `pemdes_user_access_menu`.`menu_id` ASC
                ";
            $menu = $this->db->query($queryMenu)->getResult('array');
            ?>
            <!-- LOOPING SI MENU HEADING-->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php foreach ($menu as $m) : ?>
                    <?php if ($m['menu'] == "Desa") : ?>
                        <li class="menu-title" data-key="t-menu"><?= $m['menu'] . ' ' . $namades; ?></li>
                    <?php else : ?>
                        <li class="menu-title" data-key="t-menu"><?= $m['menu']; ?></li>
                    <?php endif; ?>
                    <!-- SIAPKAN SUB-MENU YANG ADA DIDALAM MENU HEADING-->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                            FROM `pemdes_user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->getResult('array');
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <li>
                            <?php if ($sm['title'] == "SUKET Usaha Petani") : ?>
                                <a href="<?= base_url('pemdes/member/sk_usahapetani/' . $kodedes); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-SKP"><?= $sm['title']; ?></span>
                                </a>
                            <?php elseif ($sm['title'] == "SUKET Harga Tanah") : ?>
                                <a href="<?= base_url('pemdes/member/sk_hargatanah/' . $kodedes); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-SKHT"><?= $sm['title']; ?></span>
                                </a>
                            <?php elseif ($sm['title'] == "SUKET Domisili Lembaga") : ?>
                                <a href="<?= base_url('pemdes/member/sk_domisililembaga/' . $kodedes); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-SKHT"><?= $sm['title']; ?></span>
                                </a>
                            <?php elseif ($sm['title'] == "Layanan Online Desa") : ?>
                                <a href="<?= base_url('pemdes/member/layanan_online_desa/' . $kodedes); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-SKHT"><?= $sm['title']; ?></span>
                                </a>
                            <?php else : ?>
                                <a href="<?= base_url($sm['url'] . '/' . $kodedes . '/' . $nik_ktp); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <hr class="sidebar-divider mt-3">
                <?php endforeach; ?>
                <hr class="sidebar-divider mt-3">
            </ul>
        </div>
        <div class="logogayeng border-0 text-center mx-4 mb-5">
            <img src="<?= base_url('img/thumbnail/jatenggayeng.png'); ?>" width="170">
        </div>
        <hr class="sidebar-divider mt-3">
        <hr class="sidebar-divider">
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
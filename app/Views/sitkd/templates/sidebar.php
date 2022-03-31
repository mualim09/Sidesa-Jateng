<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <?php
    $this->db = \Config\Database::connect();
    $builder = $this->db->table('sitkd_role');
    $role = $builder->getWhere(['id' => session()->get('role_id')])->getRowArray();
    ?>
    <?php if ($role['id'] == 1) : ?>
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("sitkd/admin") ?>">
        <?php elseif ($role['id'] == 2) : ?>
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("sitkd/moderator") ?>">
            <?php else : ?>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("sitkd/member") ?>">
                <?php endif; ?>
                <div class="sidebar-brand-icon">
                    <img src="<?= base_url('img/thumbnail/fav.ico') ?>" style="height: 50px; width: auto;">
                </div>
                <div class="sidebar-brand-text mx-1 mr-2" style="font-size: 23px;">SITKD<sup>JATENG</sup>
                </div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- disini tempat kita akan melakukan query untuk manajemen MENU -->
                <?php
                $role_id = session()->get('role_id');
                $queryMenu = "SELECT `sitkd_user_menu`.`id`, `menu`
                    FROM `sitkd_user_menu` JOIN `sitkd_user_access_menu` 
                    ON `sitkd_user_menu`.`id` = `sitkd_user_access_menu`.`menu_id`
                    WHERE `sitkd_user_access_menu`.`role_id` =  $role_id
                    ORDER BY `sitkd_user_access_menu`.`menu_id` ASC
                ";
                $menu = $this->db->query($queryMenu)->getResult('array');
                ?>

                <!-- LOOPING SI MENU HEADING-->
                <?php foreach ($menu as $m) : ?>
                    <?php if ($m['menu'] == "Notifikasi") : ?>
                        <div hidden class="sidebar-heading">
                            <?= $m['menu']; ?>
                        </div>
                    <?php elseif ($m['menu'] == "Excel") : ?>
                        <div hidden class="sidebar-heading">
                            <?= $m['menu']; ?>
                        </div>
                    <?php else : ?>
                        <div class="sidebar-heading">
                            <?= $m['menu']; ?>
                        </div>
                        <!-- SIAPKAN SUB-MENU YANG ADA DIDALAM MENU HEADING-->
                        <?php
                        $menuId = $m['id'];
                        $querySubMenu = "SELECT *
                            FROM `sitkd_user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
                        $subMenu = $this->db->query($querySubMenu)->getResult('array');
                        ?>
                        <?php foreach ($subMenu as $sm) : ?>
                            <?php if ($myprofile == $sm['title']) : ?>
                                <li class="nav-item active">
                                <?php else : ?>
                                <li class="nav-item">
                                <?php endif; ?>
                                <?php if ($sm['title'] == "All Notification") : ?>
                                    <a hidden class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                                        <i hidden class="<?= $sm['icon']; ?>"></i>
                                        <span hidden><?= $sm['title']; ?></span></a>
                                    <!-- koding dibawah ini nanti dihapus kalo sudah upgrade CI4-->
                                <?php elseif ($sm['title'] == "Dokumen disetujui") : ?>
                                    <a hidden class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                                        <i hidden class="<?= $sm['icon']; ?>"></i>
                                        <span hidden><?= $sm['title']; ?></span></a>
                                    <!-- batas sampe sini kalo sudah upgrade CI4-->
                                <?php elseif ($sm['title'] == "SURVEY E-SURYA") : ?>
                                    <a hidden class="nav-link pb-0" href="https://esurya.organisasi.jatengprov.go.id/sitkddispermadesdukcapil">
                                        <i hidden class="<?= $sm['icon']; ?>"></i>
                                        <span hidden><?= $sm['title']; ?></span></a>
                                <?php else : ?>
                                    <a class="nav-link pb-0" href="<?= base_url($sm['url']); ?>">
                                        <i class="<?= $sm['icon']; ?>"></i>
                                        <span><?= $sm['title']; ?></span></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                        <hr class="sidebar-divider mt-3">
                    <?php endif; ?>
                <?php endforeach; ?>

                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sitkd/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        <span>Logout</span></a>
                </li>
                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-fw fa-cog"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html">Buttons</a>
            <a class="collapse-item" href="cards.html">Cards</a>
        </div>
    </div>
</li> -->

                <!-- Nav Item - Utilities Collapse Menu -->
                <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
        </div>
    </div>
</li> -->

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <!-- <div class="sidebar-heading">
    Addons
</div> -->

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item active">
    <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-fw fa-folder"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse show" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item active" href="blank.html">Blank Page</a>
        </div>
    </div>
</li> -->

                <!-- Nav Item - Charts -->
                <!-- <li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
</li> -->

                <!-- Nav Item - Tables -->
                <!-- <li class="nav-item">
    <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
</li> -->

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

</ul>
<!-- End of Sidebar -->
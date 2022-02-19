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
            $role_id = session()->get('role_id_sidesa');
            $queryMenu = "SELECT `sidesa_user_menu`.`id`, `menu`
                    FROM `sidesa_user_menu` JOIN `sidesa_user_access_menu` 
                    ON `sidesa_user_menu`.`id` = `sidesa_user_access_menu`.`menu_id`
                    WHERE `sidesa_user_access_menu`.`role_id` =  $role_id
                    ORDER BY `sidesa_user_access_menu`.`menu_id` ASC
                ";
            $menu = $this->db->query($queryMenu)->getResult('array');
            ?>
            <!-- LOOPING SI MENU HEADING-->
            <ul class="metismenu list-unstyled" id="side-menu">
                <?php foreach ($menu as $m) : ?>
                    <?php if ($m['menu'] == "Notifikasi") : ?>
                        <li hidden class="menu-title" data-key="t-menu"><?= $m['menu']; ?></li>
                    <?php else : ?>
                        <li class="menu-title" data-key="t-menu"><?= $m['menu']; ?></li>
                    <?php endif; ?>

                    <!-- SIAPKAN SUB-MENU YANG ADA DIDALAM MENU HEADING-->
                    <?php
                    $menuId = $m['id'];
                    $querySubMenu = "SELECT *
                            FROM `sidesa_user_sub_menu`
                            WHERE `menu_id` = $menuId
                            AND `is_active` = 1
                        ";
                    $subMenu = $this->db->query($querySubMenu)->getResult('array');
                    ?>
                    <?php foreach ($subMenu as $sm) : ?>
                        <li>
                            <?php if ($sm['title'] == "All Notifikasi") : ?>
                                <a hidden href="<?= base_url($sm['url']); ?>">
                                    <i hidden data-feather="<?= $sm['icon']; ?>"></i>
                                    <span hidden data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                            <?php elseif ($sm['title'] == "BANKEU") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-BANKEU"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url('user/import/bankeusalur'); ?>">
                                            <span data-key="t-dashboard">Tersalurkan</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('user/import/bankeujenis'); ?>">
                                            <span data-key="t-dashboard">Perkegiatan</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Dana Desa") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-DD"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url('user/menu5a/salur'); ?>">
                                            <span data-key="t-salur">Salur</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-realisasi">Realisasi</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/menu5a/reguler'); ?>">
                                                    <span data-key="t-reguler">Reguler</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/menu5a/bltdd'); ?>">
                                                    <span data-key="t-bltdd">BLTDD</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/menu5a/kph'); ?>">
                                                    <span data-key="t-kph">KPH</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/menu5a/covid'); ?>">
                                                    <span data-key="t-covid">Covid-19</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Dana Desa Prov") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-DDP"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url('user/admin5A/jml_anggaran'); ?>">
                                            <span data-key="t-dashboard">Anggaran</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('user/admin5A/prioritas_penggunaan'); ?>">
                                            <span data-key="t-dashboard">Prioritas Penggunaan</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "BUMDES") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-BUMDES"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url('user/menu5b/penilaian'); ?>">
                                            <span data-key="t-dashboard">Penilaian</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Kependudukan") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-kependudukan"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">Agama</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_agama_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_agama_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key=" t-dashboard">Golongan Darah</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_gol_darah_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_gol_darah_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">Jenis Kelamin</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_jns_kelamin_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_jns_kelamin_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">Kelompok Usia</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_kelompok_usia_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_kelompok_usia_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">Kepemilikan KK</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_kepemilikan_kk_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_kepemilikan_kk_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">Pekerjaan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_pekerjaan_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_pekerjaan_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">Pendidikan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_pendidikan_I'); ?>">
                                                    <span data-key="t-dashboard">Semester I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/penduduk_pendidikan_II'); ?>">
                                                    <span data-key="t-dashboard">Semester II</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Kesejahteraan Sosial") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS BAB</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_bab_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_bab_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_bab_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_bab_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS Desilart</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilart_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilart_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilart_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilart_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS Desilkrt</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilkrt_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilkrt_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilkrt_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_desilkrt_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS Masak</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_masak_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_masak_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_masak_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_masak_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS Minum</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_minum_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_minum_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_minum_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_minum_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS Penerangan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_penerangan_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_penerangan_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_penerangan_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_penerangan_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <span data-key="t-dashboard">DTKS Tempat tinggal</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_tinggal_I'); ?>">
                                                    <span data-key="t-dashboard">Penetapan I</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_tinggal_II'); ?>">
                                                    <span data-key="t-dashboard">Penetapan II</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_tinggal_III'); ?>">
                                                    <span data-key="t-dashboard">Penetapan III</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('user/import/dtks_tinggal_IV'); ?>">
                                                    <span data-key="t-dashboard">Penetapan IV</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Disabilitas") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="<?= base_url('user/import/dtks_disabilitas_I'); ?>">
                                            <span data-key="t-dashboard">Penetapan I</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('user/import/dtks_disabilitas_II'); ?>">
                                            <span data-key="t-dashboard">Penetapan II</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('user/import/dtks_disabilitas_III'); ?>">
                                            <span data-key="t-dashboard">Penetapan III</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?= base_url('user/import/dtks_disabilitas_IV'); ?>">
                                            <span data-key="t-dashboard">Penetapan IV</span>
                                        </a>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Cilacap") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.01'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.01'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.01') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Banyumas") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.02'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.02'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.02') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Purbalingga") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.03'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.03'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.03') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Banjarnegara") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.04'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.04'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.04') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Kebumen") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.05'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.05'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.05') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Purworejo") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.06'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.06'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.06') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Wonosobo") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.07'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.07'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.07') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `nm_desa`, `id_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Magelang") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.08'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.08'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.08') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Boyolali") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.09'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.09'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.09') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Klaten") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.10'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.10'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.10') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Sukoharjo") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.11'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.11'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.11') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Wonogiri") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.12'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.12'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.12') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Karanganyar") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.13'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.13'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.13') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Sragen") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.14'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.14'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.14') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Grobogan") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.15'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.15'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.15') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Blora") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.16'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.16'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.16') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Rembang") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.17'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.17'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.17') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Pati") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.18'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.18'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.18') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Kudus") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.19'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.19'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.19') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Jepara") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.20'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.20'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.20') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Demak") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.21'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.21'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.21') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Semarang") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.22'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.22'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.22') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Temanggung") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.23'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.23'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.23') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Kendal") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.24'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.24'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.24') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Batang") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.25'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.25'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.25') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Pekalongan") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.26'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.26'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.26') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Pemalang") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.27'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.27'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.27') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Tegal") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.28'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.28'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.28') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php elseif ($sm['title'] == "Brebes") : ?>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <?php
                                    $querySubMenu = "SELECT `nm_kec`, `id_kec` FROM `kd_kecamatan` WHERE `id_kab` = '33.29'";
                                    $listkec = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <li>
                                        <a href="<?= base_url('user/inputdata/pemkab/33.29'); ?>">
                                            <i data-feather="plus-circle"></i>
                                            <span data-key="t-namakecamatan">Input Kabupaten</span>
                                        </a>
                                    </li>
                                    <?php
                                    $request = \Config\Services::request();
                                    $url = substr($request->uri->getSegment(4), 0, 5);
                                    ?>
                                    <li <?php if ($url === '33.29') : ?> class="mm-active" <?php endif; ?>>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                                            <span data-key="t-namakecamatan">Kecamatan</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($listkec as $list) : ?>
                                                <li>
                                                    <a href="javascript: void(0);" class="has-arrow">
                                                        <i data-feather="radio"></i>
                                                        <span data-key="t-namakecamatan"><?= $list['nm_kec']; ?></span>
                                                    </a>
                                                    <ul class="sub-menu" aria-expanded="false">
                                                        <?php
                                                        $kd_kec = $list['id_kec'];
                                                        $querySubMenu = "SELECT `id_desa`, `nm_desa` FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                                        $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                                        ?>
                                                        <?php foreach ($namadesa as $nmdes) : ?>
                                                            <li>
                                                                <a href="<?= base_url('user/inputdata/desa/' . $nmdes['id_desa']); ?>">
                                                                    <i data-feather="image"></i>
                                                                    <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                                    $namdes = ucwords($hurufawal); ?>
                                                                    <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                                </a>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            <?php else : ?>
                                <a href="<?= base_url($sm['url']); ?>">
                                    <i data-feather="<?= $sm['icon']; ?>"></i>
                                    <span data-key="t-dashboard"><?= $sm['title']; ?></span>
                                </a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    <hr class="sidebar-divider mt-3">
                <?php endforeach; ?>
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
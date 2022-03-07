<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('pemkab/kabupaten/' . substr($kodekab, 0, 5)); ?>">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Home</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="codesandbox"></i>
                        <span data-key="t-datakabupaten">Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('pemkab/kependudukan/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-kependudukankab">Kependudukan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/kesejahteraan/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-kesejahteraan-sosialkab">Kesejahteraan Sosial</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/keuangan/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-keuangankab">Keuangan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/disabilitas/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-disabilitaskab">Disabilitas</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/danadesa/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-danadesakab">Dana Desa</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/rtlh/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-rtlhkab">RTLH</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/idm/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-idmkab">IDM</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/bumdes/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-bumdeskab">Bumdes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/kesehatan/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-kesehatankab">Kesehatan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/pertanian/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-pertaniankab">Pertanian</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/bankeu/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-bankeukab">BANKEU</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/sosialbudaya/' . substr($kodekab, 0, 5)); ?>">
                                <span data-key="t-sosialbudayakab">Sosial Budaya</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <?php foreach ($urlkab as $url) : ?>
                        <?php if ($url->url != "") : ?>
                            <a href="<?= $url->url; ?>" target="_blank">
                                <i data-feather="monitor"></i>
                                <span data-key="t-dashboard">SID Kabupaten</span>
                            </a>
                        <?php else : ?>
                            <a class="disabled text-muted" aria-disabled="true">
                                <i class="disabled text-muted" aria-disabled="true" data-feather="monitor"></i>
                                <span class="disabled text-muted" aria-disabled="true" disabled>SID Kabupaten</span>
                            </a>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </li>

                <li class="menu-title mt-2" data-key="t-componentskecamatan">Elemen</li>

                <?php
                $request = \Config\Services::request();
                $url = strlen($request->uri->getSegment(3));
                ?>
                <li <?php if ($url === 8) : ?> class="mm-active" <?php endif; ?>>
                    <a href="javascript: void(0);">
                        <i data-feather="layers"></i>
                        <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($listkec); ?></span>
                        <span data-key="t-kecamatan">Kecamatan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <?php foreach ($listkec as $list) : ?>
                            <li>
                                <a href="javascript: void(0);" class="has-arrow">
                                    <i data-feather="radio"></i>
                                    <span data-key="t-namakecamatan"><?= $list->nm_kec; ?></span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li>
                                        <a href="javascript: void(0);" class="has-arrow">
                                            <i data-feather="codesandbox"></i>
                                            <span data-key="t-datakecamatan">Data</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <li>
                                                <a href="<?= base_url('pemkab/kependudukankec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-kependudukankec">Kependudukan</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/kesejahteraankec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-kesejahteraan-sosialkec">Kesejahteraan Sosial</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/keuangankec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-keuangankec">Keuangan</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/disabilitaskec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-disabilitaskec">Disabilitas</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/danadesakec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-danadesakec">Dana Desa</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/rtlhkec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-rtlhkec">RTLH</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/idmkec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-idmkec">IDM</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/bumdeskec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-bumdeskec">Bumdes</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/kesehatankec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-kesehatankec">Kesehatan</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/pertaniankec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-pertaniankec">Pertanian</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?= base_url('pemkab/sosialbudayakec/' . substr($list->id_kec, 0, 8)); ?>">
                                                    <span data-key="t-sosialbudayakec">Sosial Budaya</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <?php
                                    $this->db = \Config\Database::connect();
                                    $kd_kec = $list->id_kec;
                                    $querySubMenu = "SELECT * FROM `wilayah_33` WHERE `id_kec` = '$kd_kec'";
                                    $namadesa = $this->db->query($querySubMenu)->getResult('array');
                                    ?>
                                    <!-- ini solusi terbaik sementara -->
                                    <li>
                                        <a href="javascript: void(0);">
                                            <i data-feather="layers"></i>
                                            <span class="badge rounded-pill bg-soft-danger text-danger float-end"><?= count($namadesa); ?></span>
                                            <span data-key="t-desa">Desa</span>
                                        </a>
                                        <ul class="sub-menu" aria-expanded="false">
                                            <?php foreach ($namadesa as $nmdes) : ?>
                                                <li>
                                                    <a target="_blank" href="<?= base_url('pemkab/desa/' . substr($nmdes['id_desa'], 0, 13)); ?>">
                                                        <i data-feather="image"></i>
                                                        <?php $hurufawal = strtolower($nmdes['nm_desa']);
                                                        $namdes = ucwords($hurufawal); ?>
                                                        <span data-key="t-namadesa"><?= $namdes; ?></span>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        <?php endforeach; ?>
                        <!-- /allmenu -->
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
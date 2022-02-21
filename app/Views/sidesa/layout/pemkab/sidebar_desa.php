<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <li>
                    <a href="<?= base_url('pemkab/desa/' . substr($kodedes, 0, 13)); ?>">
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
                            <a href="<?= base_url('pemkab/kependudukandes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-kependudukankab">Kependudukan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/kesejahteraandes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-kesejahteraan-sosialkab">Kesejahteraan Sosial</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/keuangandes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-keuangankab">Keuangan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/disabilitasdes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-disabilitaskab">Disabilitas</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/danadesades/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-danadesakab">Dana Desa</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/rtlhdes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-rtlhkab">RTLH</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/idmdes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-idmdes">IDM</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/bumdesdes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-bumdeskab">Bumdes</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/kesehatandes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-kesehatankab">Kesehatan</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/pertaniandes/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-pertaniankab">Pertanian</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?= base_url('pemkab/sosialbudayades/' . substr($kodedes, 0, 13)); ?>">
                                <span data-key="t-sosialbudayakab">Sosial Budaya</span>
                            </a>
                        </li>
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
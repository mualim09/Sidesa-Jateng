<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <img src="<?= base_url('img/thumbnail/fav.ico'); ?>" style="height: 50px; width:auto">
        </div>
        <div class="sidebar-brand-text mx-1 mr-2" style="font-size: 15px;">GEODESA <sup>JATENG</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('geodesa/tematik'); ?>">
            <i class="fas fa-fw fa-dice-d6"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item" style="z-index: 1001;">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse show" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Data:</h6>
                <div class="collapse-item">
                    <input type="radio" id="normal" name="customRadio" style="vertical-align: -2px;" value="normal"> Normal</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="daksa" name="customRadio" style="vertical-align: -2px;" value="daksa"> Tuna Daksa</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="netra" name="customRadio" style="vertical-align: -2px;" value="netra"> Tuna Netra</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="rungu" name="customRadio" style="vertical-align: -2px;" value="rungu"> Tuna Rungu</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="wicara" name="customRadio" style="vertical-align: -2px;" value="wicara"> Tuna Wicara</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="runguwicara" name="customRadio" style="vertical-align: -2px;" value="runguwicara"> Tuna Rungu-Wicara</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="netradaksa" name="customRadio" style="vertical-align: -2px;" value="netradaksa"> Tuna Netra-Daksa</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="netrarunguwicara" name="customRadio" style="vertical-align: -2px;" value="netrarunguwicara"> Tuna Netra-Rungu-<br><text style="margin-left: 17px;">Wicara</text></input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="runguwicaradaksa" name="customRadio" style="vertical-align: -2px;" value="runguwicaradaksa"> Tuna Rungu-Wicara-<br><text style="margin-left: 17px;">Daksa</text></input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="rungunetrawicaradaksa" name="customRadio" style="vertical-align: -2px;" value="rungunetrawicaradaksa">
                    <text>Tuna Rungu-Netra-</text><br><text style="margin-left: 17px;">Wicara-Daksa</text></input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="daksamental" name="customRadio" style="vertical-align: -2px;" value="daksamental"> Tuna Daksa-Mental</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="mentalreterdasi" name="customRadio" style="vertical-align: -2px;" value="mentalreterdasi"> Tuna Mental Reterdasi</input>
                </div>
                <div class="collapse-item">
                    <input type="radio" id="ekspsikotik" name="customRadio" style="vertical-align: -2px;" value="ekspsikotik"> Eks Psikotik</input>
                </div>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Layer
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item" style="z-index: 1001;">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fab fa-fw fa-pushed"></i>
            <span>Polygon</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded" id="sidebarlegend">
            </div>
        </div>
    </li>
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

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar)
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

</ul>
<!-- End of Sidebar -->
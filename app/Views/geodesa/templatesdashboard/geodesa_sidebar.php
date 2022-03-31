<!-- Sidebar -->
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
    <li class="nav-item active">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-dice-d6"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="https://esurya.organisasi.jatengprov.go.id/geodesadispermadesdukcapil" target="_blank">
            <i class="fas fa-fw fa-poll"></i>
            <span>SURVEY E-SURYA</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <li class="nav-item ml-3">
        <!-- Histats.com  (div with counter) -->
        <div id="histats_counter"></div>
        <!-- Histats.com  START  (aync)-->
        <script type="text/javascript">
            var _Hasync = _Hasync || [];
            _Hasync.push(['Histats.start', '1,4581009,4,300,113,63,00011001']);
            _Hasync.push(['Histats.fasi', '1']);
            _Hasync.push(['Histats.track_hits', '']);
            (function() {
                var hs = document.createElement('script');
                hs.type = 'text/javascript';
                hs.async = true;
                hs.src = ('//s10.histats.com/js15_as.js');
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
            })();
        </script>
        <noscript><a href="/" target="_blank"><img src="//sstatic1.histats.com/0.gif?4581009&101" alt="" border="0"></a></noscript>
        <!-- Histats.com  END  -->
    </li>
    <!-- Sidebar Toggler (Sidebar)
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div> -->

</ul>
<!-- End of Sidebar -->
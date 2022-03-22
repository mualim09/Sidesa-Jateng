<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Sidesa');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// SIDesa KONTEN
$routes->get('/', 'Sidesa::index');
$routes->match(['get', 'post'], 'sidesa/download/(:any)/(:any)', 'Sidesa::download/$1/$2');

// SIDesa Maintenance
$routes->get('/pemprov/rtlh', 'Panel::maintenancepagesidesa');
// $routes->get('/pemprov/danadesaprepare', 'Panel::maintenancepagesidesa');
$routes->get('/pemprov/keuangan', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/keuangan/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/keuangankec/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/keuangandes/(:any)', 'Panel::maintenancepagesidesa');
// $routes->get('/pemkab/danadesa/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/danadesakec/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/danadesades/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/rtlh/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/rtlhkec/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/rtlhdes/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/pertanian/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/pertaniankec/(:any)', 'Panel::maintenancepagesidesa');
$routes->get('/pemkab/pertaniandes/(:any)', 'Panel::maintenancepagesidesa');

// SIDESA OTENTIKASI
// $routes->get('/user/auth/blockedakses', 'User\Auth::blockedakses');
$routes->get('/user/blocked', 'User\Auth::blocked');
$routes->get('/user/logout', 'User\Auth::logout');
$routes->add('/user/login', 'User\Auth::index', ['filter' => 'noauthsidesa']);
$routes->add('/user/verify', 'User\Auth::verify');
$routes->add('/user/resetpassword', 'User\Auth::resetpassword');
$routes->add('/user/konfirmasi-email', 'User\Auth::confirm_email');
$routes->add('/user/konfirmasi-resetpass', 'User\Auth::confirm_resetpass');
$routes->match(['get', 'post'], '/user/registrasi', 'User\Auth::registration', ['filter' => 'noauthsidesa']);
$routes->match(['get', 'post'], '/user/auth/registration', 'User\Auth::registration', ['filter' => 'noauthsidesa']);
$routes->match(['get', 'post'], '/user/lupa-password', 'User\Auth::forgotpassword', ['filter' => 'noauthsidesa']);
$routes->match(['get', 'post'], '/user/auth/forgotpassword', 'User\Auth::forgotpassword', ['filter' => 'noauthsidesa']);
$routes->match(['get', 'post'], '/user/auth/changepassword', 'User\Auth::changepassword', ['filter' => 'noauthsidesa']);
$routes->match(['get', 'post'], '/user/ganti-password', 'User\Auth::changepassword', ['filter' => 'noauthsidesa']);
$routes->get('/user/panel/(:any)', 'User\Auth::$1', ['filter' => 'noauthsidesa']);
$routes->get('/user/panel', 'User\Auth::index', ['filter' => 'noauthsidesa']);
$routes->add('/user/(:any)', 'User\Auth::index', ['filter' => 'noauthsidesa']);
$routes->add('/user', 'User\Auth::index', ['filter' => 'noauthsidesa']);

// SIDESA USER ADMIN KONTEN
$routes->delete('/user/admin/hapususer/(:num)/(:any)', 'Sitkd\Admin::hapususer/$1/$2', ['filter' => 'authusersidesa']);
$routes->delete('/user/admin/hapususerapi/(:num)', 'Sitkd\Admin::hapususerapi/$1', ['filter' => 'authusersidesa']);
$routes->put('/user/admin/role_access/(:num)', 'User\Admin::role_access/$1', ['filter' => 'authusersidesa']);
$routes->put('/user/admin/role_edit/(:any)/(:any)', 'User\Admin::role_edit/$1/$2', ['filter' => 'authusersidesa']);
$routes->post('/user/admin/registrasi_api', 'User\Admin::registrasi_api', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/admin/(:any)', 'User\Admin::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/admin/dashboard', 'User\Admin::dashboard', ['filter' => 'authusersidesa']);
$routes->get('/user/admin', 'User\Admin::dashboard', ['filter' => 'authusersidesa']);

// SIDESA USER ADMINISTRATOR KONTEN
$routes->delete('/user/administrator/hapususer/(:num)/(:any)', 'Sitkd\Administrator::hapusUser/$1', ['filter' => 'authusersidesa']);
$routes->put('/user/administrator/role_accessadm/(:num)', 'User\Administrator::role_accessadm/$1', ['filter' => 'authusersidesa']);
$routes->put('/user/administrator/role_edit/(:any)/(:any)', 'User\Administrator::role_edit/$1/$2', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/administrator/(:any)', 'User\Administrator::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/administrator/dashboard', 'User\Administrator::dashboard', ['filter' => 'authusersidesa']);
$routes->get('/user/administrator', 'User\Administrator::dashboard', ['filter' => 'authusersidesa']);

// SIDESA USER MODERATOR KONTEN
$routes->delete('/user/moderator/hapususer/(:num)/(:any)', 'Sitkd\Moderator::hapusUser/$1', ['filter' => 'authusersidesa']);
$routes->put('/user/moderator/role_accessm/(:num)', 'User\Moderator::role_accessm/$1', ['filter' => 'authusersidesa']);
$routes->put('/user/moderator/role_edit/(:any)/(:any)', 'User\Moderator::role_edit/$1/$2', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/moderator/(:any)', 'User\Moderator::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/moderator/dashboard', 'User\Moderator::dashboard', ['filter' => 'authusersidesa']);
$routes->get('/user/moderator', 'User\Moderator::dashboard', ['filter' => 'authusersidesa']);

// SIDESA USER MEMBER (DESA) KONTEN
$routes->match(['get', 'post'], '/user/member/(:any)', 'User\Member::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/member', 'User\member::dashboard', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/desa/infodesa', 'User\Desa::infodesa', ['filter' => 'authusersidesa']);

// SIDESA USER KABUPATEN5A KONTEN
$routes->match(['get', 'post'], '/user/kabupaten5a/(:any)', 'User\Kabupaten5a::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/kabupaten5a', 'User\kabupaten5a::dashboard', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/kabupaten5a/infokabupaten', 'User\Kabupaten5a::infokabupaten', ['filter' => 'authusersidesa']);

// SIDESA USER PROVINSI5A KONTEN
$routes->match(['get', 'post'], 'sidesa/provinsi5a/download', 'User\Provinsi5a::download', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/provinsi5a/(:any)', 'User\Provinsi5a::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/provinsi5a', 'User\provinsi5a::dashboard', ['filter' => 'authusersidesa']);

// SIDESA USER PROVINSI5B KONTEN
$routes->match(['get', 'post'], '/user/provinsi5b/(:any)', 'User\Provinsi5b::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/provinsi5b', 'User\provinsi5b::dashboard', ['filter' => 'authusersidesa']);

// SIDESA USER admin5A KONTEN
$routes->match(['get', 'post'], '/user/admin5A/(:any)', 'User\Admin5a::$1', ['filter' => 'authusersidesa']);

// SIDESA USER admin5B KONTEN
$routes->match(['get', 'post'], '/user/admin5A/(:any)', 'User\Admin5b::$1', ['filter' => 'authusersidesa']);

// SIDESA USER menu5a KONTEN
$routes->match(['get', 'post'], '/user/menu5a/(:any)', 'User\Menu5a::$1', ['filter' => 'authusersidesa']);

// SIDESA USER menu5b KONTEN
$routes->match(['get', 'post'], '/user/menu5b/(:any)', 'User\Menu5b::$1', ['filter' => 'authusersidesa']);

// SIDESA USER BELUMASSIGN KONTEN
$routes->match(['get', 'post'], '/user/belumassign/(:any)', 'User\belumassign::$1', ['filter' => 'authusersidesa']);
$routes->get('/user/belumassign', 'User\belumassign::index', ['filter' => 'authusersidesa']);

// SIDESA KONTEN NOTIFIKASI
$routes->get('/user/notifikasi/(:any)', 'User\Notifikasi::$1', ['filter' => 'authusersidesa']);

// SIDESA IMPORT KONTEN KEPENDUDUKAN
$routes->get('/user/import/penduduk_agama_(:any)', 'User\Import::penduduk_agamanas', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukagama', 'User\Import::importpendudukagamanas', ['filter' => 'authusersidesa']);
$routes->get('/user/import/penduduk_gol_darah_(:any)', 'User\Import::penduduk_goldarah', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukgoldar', 'User\Import::importpendudukdarah', ['filter' => 'authusersidesa']);
$routes->get('/user/import/penduduk_jns_kelamin_(:any)', 'User\Import::penduduk_jnskelamin', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukjnskel', 'User\Import::importpendudukkelamin', ['filter' => 'authusersidesa']);
$routes->get('/user/import/penduduk_kelompok_usia_(:any)', 'User\Import::penduduk_klpusia', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukklpusia', 'User\Import::importpendudukusia', ['filter' => 'authusersidesa']);
$routes->get('/user/import/penduduk_kepemilikan_kk_(:any)', 'User\Import::penduduk_kk', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukkepemilikankk', 'User\Import::importpendudukkk', ['filter' => 'authusersidesa']);
$routes->get('/user/import/penduduk_pekerjaan_(:any)', 'User\Import::penduduk_kerja', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukpekerjaan', 'User\Import::importpendudukkerja', ['filter' => 'authusersidesa']);
$routes->get('/user/import/penduduk_pendidikan_(:any)', 'User\Import::penduduk_didik', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importpendudukpendidikan', 'User\Import::importpendudukdidik', ['filter' => 'authusersidesa']);
// SIDESA IMPORT KONTEN DTKS
$routes->get('/user/import/dtks_bab_(:any)', 'User\Import::dtks_berak', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtksbab', 'User\Import::importdtksberak', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_desilart_(:any)', 'User\Import::dtks_desilarts', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtksdesilart', 'User\Import::importdtksdesilarts', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_desilkrt_(:any)', 'User\Import::dtks_desilkrts', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtksdesilkrt', 'User\Import::importdtksdesilkrts', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_masak_(:any)', 'User\Import::dtks_masaks', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtksmasak', 'User\Import::importdtksmasaks', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_minum_(:any)', 'User\Import::dtks_minums', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtksminum', 'User\Import::importdtksminums', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_penerangan_(:any)', 'User\Import::dtks_penerangans', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtkspenerangan', 'User\Import::importdtkspenerangans', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_tinggal_(:any)', 'User\Import::dtks_tinggals', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtkstinggal', 'User\Import::importdtkstinggals', ['filter' => 'authusersidesa']);
$routes->get('/user/import/dtks_disabilitas_(:any)', 'User\Import::dtks_disabilitass', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importdtksdisabilitas', 'User\Import::importdtksdisabilitass', ['filter' => 'authusersidesa']);
// SIDESA IMPORT KONTEN BUMDES
$routes->get('/user/import/bumdes', 'User\Import::bumdesa', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importbumdes', 'User\Import::importbumdesa', ['filter' => 'authusersidesa']);
// SIDESA IMPORT KONTEN IDM
$routes->get('/user/import/idm', 'User\Import::idms', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importidm', 'User\Import::importidms', ['filter' => 'authusersidesa']);
// SIDESA IMPORT KONTEN KESEHATAN POSYANDU
$routes->get('/user/import/kesehatan', 'User\Import::kesehatans', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importkesehatan', 'User\Import::importkesehatans', ['filter' => 'authusersidesa']);
// SIDESA IMPORT KONTEN BANKEU
$routes->get('/user/import/bankeusalur', 'User\Import::bankeusalurs', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importbankeusalur', 'User\Import::importbankeusalurs', ['filter' => 'authusersidesa']);
// SIDESA IMPORT KONTEN SOSIAL BUDAYA SATGAS
$routes->get('/user/import/sosialbudaya', 'User\Import::sosial_budayas', ['filter' => 'authusersidesa']);
$routes->post('/user/import/importsosialbudaya', 'User\Import::importsosialbudayas', ['filter' => 'authusersidesa']);

// SIDESA REVIEW DATA KONTERN
$routes->get('/user/datasidesa/review', 'User\Datasidesa::review', ['filter' => 'authusersidesa']);
$routes->get('/user/datasidesa/download/(:any)/(:any)', 'User\Datasidesa::download/$1/$2', ['filter' => 'authusersidesa']);
$routes->get('/user/datasidesa/delete_data/(:any)', 'User\Datasidesa::deletedata/$1', ['filter' => 'deletedatasidesa', 'authusersidesa']);

// SIDESA INPUT DATA MODERATOR KONTEN
$routes->match(['get', 'post'], '/user/inputdata/pemkab/(:any)', 'User\Inputdata::pemkab/$1', ['filter' => 'authusersidesa']);
$routes->match(['get', 'post'], '/user/inputdata/desa/(:any)', 'User\Inputdata::desa/$1', ['filter' => 'authusersidesa']);

// API SIDESA
$routes->group('api', ['namespace' => 'App\Controller\Api'], function ($routes) {
    $routes->resource('Auth');
    $routes->resource('Bumdes');
    $routes->resource('Dtks_bab');
    $routes->resource('Dtks_desilart');
    $routes->resource('Dtks_desilkrt');
    $routes->resource('Dtks_disabilitas');
    $routes->resource('Dtks_masak');
    $routes->resource('Dtks_minum');
    $routes->resource('Dtks_penerangan');
    $routes->resource('Dtks_tinggal');
    $routes->resource('Idm');
    $routes->resource('Ksht_posyandu');
    $routes->resource('Penduduk_agama');
    $routes->resource('Penduduk_gol_darah');
    $routes->resource('Penduduk_jns_kelamin');
    $routes->resource('Penduduk_kelompok_usia');
    $routes->resource('Penduduk_kepemilikan_kk');
    $routes->resource('Penduduk_pekerjaan');
    $routes->resource('Penduduk_pendidikan');
    $routes->resource('Sosbud_satgas');
    $routes->resource('Wilayah_desa');
    $routes->resource('Wilayah_kab');
    $routes->resource('Wilayah_kec');
});

// PEMDES USER OTENTIKASI
$routes->get('/pemdes/auth/blocked/(:any)', 'Pemdes\Auth::blocked/$1'); //belum
$routes->get('/pemdes/auth/logout/(:any)', 'Pemdes\Auth::logout/$1');
$routes->add('/pemdes/auth/login/(:any)', 'Pemdes\Auth::loginpage/$1', ['filter' => 'noauthpemdes']);
$routes->add('/pemdes/auth/verify/(:any)', 'Pemdes\Auth::verify_wa/$1');
$routes->add('/pemdes/auth/resetpassword/(:any)', 'Pemdes\Auth::resetpassword/$1'); // belum
$routes->add('/pemdes/auth/konfirmasi-whatsapp/(:any)', 'Pemdes\Auth::confirm_wa/$1');
$routes->add('/pemdes/auth/konfirmasi-resetpass/(:any)', 'Pemdes\Auth::confirm_resetpass/$1');
$routes->match(['get', 'post'], '/pemdes/auth/registrasi/(:any)', 'Pemdes\Auth::registration/$1', ['filter' => 'noauthpemdes']);
$routes->match(['get', 'post'], '/pemdes/auth/registration/(:any)', 'Pemdes\Auth::registration/$1', ['filter' => 'noauthpemdes']);
$routes->match(['get', 'post'], '/pemdes/auth/lupa-password/(:any)', 'Pemdes\Auth::forgotpass/$1', ['filter' => 'noauthpemdes']);
$routes->match(['get', 'post'], '/pemdes/auth/forgotpass/(:any)', 'Pemdes\Auth::forgotpass/$1', ['filter' => 'noauthpemdes']);
$routes->match(['get', 'post'], '/pemdes/auth/ganti-password/(:any)', 'Pemdes\Auth::changepassword/$1', ['filter' => 'noauthpemdes']);
$routes->match(['get', 'post'], '/pemdes/auth/auth/changepassword/(:any)', 'Pemdes\Auth::changepassword/$1', ['filter' => 'noauthpemdes']);

// Geodesa KONTEN
$routes->get('/geodesa/tematik', 'Geodesa\Tematik::index');
$routes->get('/geodesa/tematik/bumdes', 'Geodesa\Tematik::bumdes');
$routes->get('/geodesa/tematik/disabilitas', 'Geodesa\Tematik::disabilitas');

// SITKD OTENTIKASI
$routes->get('/sitkd/auth/blockedakses', 'Sitkd\Auth::blockedakses');
$routes->get('/sitkd/auth/blocked', 'Sitkd\Auth::blocked');
$routes->get('/sitkd/logout', 'Sitkd\Auth::logout');
$routes->add('/sitkd/login', 'Sitkd\Auth::index', ['filter' => 'noauthsitkd']);
$routes->add('/sitkd/verify', 'Sitkd\Auth::verify');
$routes->add('/sitkd/resetpassword', 'Sitkd\Auth::resetpassword');
$routes->match(['get', 'post'], '/sitkd/registrasi', 'Sitkd\Auth::registration', ['filter' => 'noauthsitkd']);
$routes->match(['get', 'post'], '/sitkd/auth/registration', 'Sitkd\Auth::registration', ['filter' => 'noauthsitkd']);
$routes->match(['get', 'post'], '/sitkd/lupapassword', 'Sitkd\Auth::forgotpassword', ['filter' => 'noauthsitkd']);
$routes->match(['get', 'post'], '/sitkd/auth/forgotpassword', 'Sitkd\Auth::forgotpassword', ['filter' => 'noauthsitkd']);
$routes->match(['get', 'post'], '/sitkd/auth/changepassword', 'Sitkd\Auth::changepassword', ['filter' => 'noauthsitkd']);
$routes->match(['get', 'post'], '/sitkd/gantipassword', 'Sitkd\Auth::changepassword', ['filter' => 'noauthsitkd']);
$routes->get('/sitkd/auth/(:any)', 'Sitkd\Auth::$1', ['filter' => 'noauthsitkd']);
$routes->get('/sitkd/auth', 'Sitkd\Auth::index', ['filter' => 'noauthsitkd']);
$routes->add('/sitkd/(:any)', 'Sitkd\Auth::index', ['filter' => 'noauthsitkd']);
$routes->add('/sitkd', 'Sitkd\Auth::index', ['filter' => 'noauthsitkd']);

// SITKD KONTEN ADMIN
$routes->delete('/sitkd/admin/hapususer/(:num)', 'Sitkd\Admin::hapususer/$1', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/admin/roleaccess/(:num)', 'Sitkd\Admin::roleaccess/$1', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/admin/roleedit/(:num)', 'Sitkd\Admin::roleedit/$1', ['filter' => 'authusersitkd']);
$routes->match(['get', 'post'], '/sitkd/admin/(:any)', 'Sitkd\Admin::$1', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/admin', 'Sitkd\Admin::index', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/administrator', 'Panel::maintenancepagesitkd', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/administrator/(:any)', 'Panel::maintenancepagesitkd1', ['filter' => 'authusersitkd']);

// SITKD KONTEN MODERATOR
$routes->delete('/sitkd/moderator/hapususer/(:num)', 'Sitkd\moderator::hapususer/$1', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/moderator/roleaccess/(:num)', 'Sitkd\Moderator::roleaccess/$1', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/moderator/roleedit/(:num)', 'Sitkd\moderator::roleedit/$1', ['filter' => 'authusersitkd']);
$routes->match(['get', 'post'], '/sitkd/moderator/(:any)', 'Sitkd\Moderator::$1', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/moderator', 'Sitkd\Moderator::index', ['filter' => 'authusersitkd']);

// SITKD KONTEN CONFIG ADMIN & MODERATOR
$routes->get('/sitkd/accmenu/detailfile(:num)/(:num)', 'Sitkd\Accmenu::detailfile$1/$2', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/accmenu/reviewfile(:num)/(:num)', 'Sitkd\Accmenu::reviewfile$1/$2', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/accmenu/tracking/(:num)', 'Sitkd\Accmenu::tracking/$1', ['filter' => 'authusersitkd']);
$routes->match(['get', 'post'], '/sitkd/accmenu/uploadpersetujuan/(:num)/(:num)', 'Sitkd\Accmenu::uploadpersetujuan/$1/$2', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/accmenu/viewpersetujuan/(:num)', 'Sitkd\Accmenu::viewpersetujuan/$1', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/accmenu/detailuraian/(:num)/(:num)', 'Sitkd\Accmenu::detailuraian/$1/$2', ['filter' => 'authusersitkd']);
$routes->match(['get', 'post'], '/sitkd/accmenu/(:any)', 'Sitkd\Accmenu::$1', ['filter' => 'authusersitkd']);

// SITKD KONTEN CONFIG ADMIN & MODERATOR
$routes->get('/sitkd/menu/detailfile(:num)/(:num)', 'Sitkd\Menu::detailfile$1/$2', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/menu/reviewfile(:num)/(:num)', 'Sitkd\Menu::reviewfile$1/$2', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/menu/tracking/(:num)', 'Sitkd\Menu::tracking/$1', ['filter' => 'authusersitkd']);
$routes->put('/sitkd/menu/detailuraian/(:num)/(:num)', 'Sitkd\Menu::detailuraian/$1/$2', ['filter' => 'authusersitkd']);
$routes->match(['get', 'post'], '/sitkd/menu/(:any)', 'Sitkd\Menu::$1', ['filter' => 'authusersitkd']);

// SITKD KONTEN CONFIG ADMIN & MODERATOR
$routes->get('/sitkd/excel/rekap', 'Sitkd\Excel::rekap', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/excel/rekapadmin', 'Sitkd\Excel::rekapadmin', ['filter' => 'authusersitkd']);

// SITKD KONTEN MEMBER
$routes->get('/sitkd/member/revisifile(:num)/(:num)', 'Sitkd\Member::revisifile$1/$2', ['filter' => 'sistemmember']);
$routes->get('/sitkd/member/detailfile(:num)/(:num)', 'Sitkd\Member::detailfile$1/$2', ['filter' => 'sistemmember']);
$routes->match(['get', 'post'], '/sitkd/member/uploadfile(:num)/(:num)', 'Sitkd\Member::uploadfile$1/$2', ['filter' => 'sistemmember']);
$routes->get('/sitkd/member/viewpersetujuan/(:num)', 'Sitkd\Member::viewpersetujuan/$1', ['filter' => 'sistemmember']);
$routes->get('/sitkd/member/hapusdata/(:num)', 'Sitkd\Member::hapusdata/$1', ['filter' => 'sistemmember']);
$routes->get('/sitkd/member/tracking/(:num)', 'Sitkd\Member::tracking/$1', ['filter' => 'sistemmember']);
$routes->get('/sitkd/member/detailuraian/(:num)', 'Sitkd\Member::detailuraian/$1', ['filter' => 'sistemmember']);
$routes->match(['get', 'post'], '/sitkd/member/(:any)', 'Sitkd\Member::$1', ['filter' => 'authusersitkd']);
$routes->get('/sitkd/member', 'Sitkd\Member::index', ['filter' => 'authusersitkd']);

// SITKD KONTEN ADMIN MODERATOR MEMBER
$routes->get('/sitkd/notifikasi/(:any)', 'Sitkd\Notifikasi::$1', ['filter' => 'authusersitkd']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

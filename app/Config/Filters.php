<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use App\Filters\Noauthsitkd;
use App\Filters\Authusersitkd;
use App\Filters\Authusersidesa;
use App\Filters\Sistemmember;
use App\Filters\FilterJWT;
use App\Filters\Noauthsidesa;
use App\Filters\Deletedatasidesa;
use App\Filters\Noauthpemdes;

class Filters extends BaseConfig
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array
     */
    public $aliases = [
        'csrf'     => CSRF::class,
        'toolbar'  => DebugToolbar::class,
        'honeypot' => Honeypot::class,
        'authusersitkd' => Authusersitkd::class,
        'authusersidesa' => Authusersidesa::class,
        'noauthsitkd' => Noauthsitkd::class,
        'noauthsidesa' => Noauthsidesa::class,
        'noauthpemdes' => Noauthpemdes::class,
        'sistemmember' => Sistemmember::class,
        'deletedatasidesa' => Deletedatasidesa::class,
        'otentikasi' => FilterJWT::class
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     *
     * @var array
     */
    public $globals = [
        'before' => [
            // 'honeypot',
            'csrf' => ['except' => ['Api/*']],
        ],
        'after' => [
            'toolbar',
            // 'honeypot',
        ],
    ];

    /**
     * List of filter aliases that works on a
     * particular HTTP method (GET, POST, etc.).
     *
     * Example:
     * 'post' => ['csrf', 'throttle']
     *
     * @var array
     */
    public $methods = [];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     *
     * Example:
     * 'isLoggedIn' => ['before' => ['account/*', 'profiles/*']]
     *
     * @var array
     */
    public $filters = [
        'otentikasi' => [
            'before' => [
                'Api/Bumdes/*',
                'Api/Bumdes',
                'Api/Dtks_bab/*',
                'Api/Dtks_bab',
                'Api/Dtks_desilart/*',
                'Api/Dtks_desilart',
                'Api/Dtks_desilkrt/*',
                'Api/Dtks_desilkrt',
                'Api/Dtks_disabilitas/*',
                'Api/Dtks_disabilitas',
                'Api/Dtks_masak/*',
                'Api/Dtks_masak',
                'Api/Dtks_minum/*',
                'Api/Dtks_minum',
                'Api/Dtks_penerangan/*',
                'Api/Dtks_penerangan',
                'Api/Dtks_tinggal/*',
                'Api/Dtks_tinggal',
                'Api/Idm/*',
                'Api/Idm',
                'Api/Penduduk_agama/*',
                'Api/Penduduk_agama',
                'Api/Penduduk_gol_darah/*',
                'Api/Penduduk_gol_darah',
                'Api/Penduduk_jns_kelamin/*',
                'Api/Penduduk_jns_kelamin',
                'Api/Penduduk_kelompok_usia/*',
                'Api/Penduduk_kelompok_usia',
                'Api/Penduduk_kepemilikan_kk/*',
                'Api/Penduduk_kepemilikan_kk',
                'Api/Penduduk_pekerjaan/*',
                'Api/Penduduk_pekerjaan',
                'Api/Penduduk_pendidikan/*',
                'Api/Penduduk_pendidikan',
                'Api/Wilayah_desa/*',
                'Api/Wilayah_desa',
                'Api/Wilayah_kab/*',
                'Api/Wilayah_kab',
                'Api/Wilayah_kec/*',
                'Api/Wilayah_kec',
            ]
        ]
    ];
}

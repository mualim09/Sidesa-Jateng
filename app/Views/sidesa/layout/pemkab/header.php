<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php $request = \Config\Services::request(); ?>
    <title><?= $title ?><?php if ($request->uri->getSegment(2) === "desa") : ?> | Tingkat desa <?php else : ?> | Tingkat Kabupaten <?php endif; ?></title>
    <meta name="description" content="Sistem Informasi Desa Provinsi Jawa Tengah" />
    <meta name="keywords" content="SIDesa, SITKD, GEODESA, JATENG, PROV JATENG, Provinsi Jawa Tengah" />
    <meta name="author" content="zakezone" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/fav.ico'); ?>">

    <link href="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url('minia/css/preloader.min.css') ?>" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="<?= base_url('minia/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('minia/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('minia/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
    <!-- pace js -->
    <script src="<?= base_url('minia/libs/jquery/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('minia/libs/pace-js/pace.min.js'); ?>"></script>

    <!-- highchart style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>/highchart/css/basicliner.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/piegradients.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/fixedplacementcolumn.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/barnegativestacks.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/basicbars.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/responsiveclms.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/areasplines.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/radialbarcharts.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/bankeu.css">
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper">
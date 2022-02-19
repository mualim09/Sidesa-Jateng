<!doctype html>
<html lang="en">
<?php $request = \Config\Services::request(); ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | Panel SIDesa </title>
    <meta name="description" content="Sistem Informasi Desa Provinsi Jawa Tengah" />
    <meta name="keywords" content="SIDesa, SITKD, GEODESA, JATENG, PROV JATENG, Provinsi Jawa Tengah" />
    <meta name="author" content="zakezone" />
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/logodata.ico'); ?>">

    <!-- Efek kalo keluar aplikasi lewat dropdown topbar -->
    <link href="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- css dashboard untuk kalender etc-->
    <?php if ($request->uri->getSegment(3) === "dashboard") : ?>
        <link href="<?= base_url('minia/css/main.css') ?>" rel="stylesheet" type="text/css" />

    <?php elseif ($request->uri->getSegment(3) === "role_edit") : ?>
        <link href="<?= base_url('minia/libs/choices.js/public/assets/styles/choices.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('minia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('minia/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('minia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />

    <?php elseif ($request->uri->getSegment(2) === "datasidesa" || $request->uri->getSegment(2) === "notifikasi") : ?>
        <!-- DataTables -->
        <link href="<?= base_url('minia/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="<?= base_url('minia/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') ?>" rel="stylesheet" type="text/css" />
    <?php endif; ?>

    <?php if ($request->uri->getSegment(2) == "provinsi5a" && $request->uri->getSegment(3) == "dashboard") : ?>
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/dashboard_provinsi5a.css">
    <?php endif; ?>

    <?php if ($request->uri->getSegment(2) == "kabupaten5a" && $request->uri->getSegment(3) == "dashboard") : ?>
        <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/highchart/css/dashboard_kabupaten5a.css">
    <?php endif; ?>

    <!-- jquery full -->
    <script src="<?= base_url('minia/libs/jquery/jquery.min.js'); ?>"></script>
    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url('minia/css/preloader.css') ?>" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?= base_url('minia/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('minia/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <?php if ($user['role_id'] == 1 || $user['role_id'] == 2 || $user['role_id'] == 3 || $user['role_id'] == 4 || $user['role_id'] == 5 || $user['role_id'] == 6 || $user['role_id'] == 7) : ?>
        <link href="<?= base_url('minia/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
    <?php else : ?>
        <link href="<?= base_url('minia/css/appsidesa.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />
    <?php endif; ?>
    <!-- pace js -->
    <script src="<?= base_url('minia/libs/pace-js/pace.min.js'); ?>"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper pace pace-inactive">
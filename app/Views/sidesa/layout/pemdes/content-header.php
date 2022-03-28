<!doctype html>
<html lang="en">
<?php $request = \Config\Services::request(); ?>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> | <?= $nik_ktp ?> </title>
    <meta name="description" content="Sistem Informasi Desa Provinsi Jawa Tengah" />
    <meta name="keywords" content="SIDesa, SITKD, GEODESA, Layanan Mandiri Desa, JATENG, PROV JATENG, Provinsi Jawa Tengah" />
    <meta name="author" content="zakezone" />
    <link rel="shortcut icon" href="<?= base_url('img/thumbnail/logodata.ico'); ?>">

    <!-- Efek kalo keluar aplikasi lewat dropdown topbar -->
    <link href="<?= base_url('minia/libs/sweetalert2/sweetalert2.min.css') ?>" rel="stylesheet" type="text/css" />

    <!-- css dashboard untuk kalender etc-->
    <link href="<?= base_url('minia/css/main.css') ?>" rel="stylesheet" type="text/css" />

    <!-- jquery full -->
    <script src="<?= base_url('minia/libs/jquery/jquery.min.js'); ?>"></script>
    <!-- preloader css -->
    <link rel="stylesheet" href="<?= base_url('minia/css/preloader.css') ?>" type="text/css" />
    <!-- Bootstrap Css -->
    <link href="<?= base_url('minia/css/bootstrap.min.css') ?>" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="<?= base_url('minia/css/icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="<?= base_url('minia/css/app.min.css') ?>" id="app-style" rel="stylesheet" type="text/css" />

    <!-- pace js -->
    <script src="<?= base_url('minia/libs/pace-js/pace.min.js'); ?>"></script>
</head>

<body>
    <!-- Begin page -->
    <div id="layout-wrapper pace pace-inactive">
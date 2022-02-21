<!DOCTYPE html>
<html lang="en">

<head>
	<link rel="shortcut icon" href="<?= base_url(); ?>/img/thumbnail/favicon.ico">
	<?php if (!empty($message) && $message !== '(null)') : ?>
		<meta charset="utf-8">
		<title>404 Page Not Found</title>

		<style>
			div.logo {
				height: 200px;
				width: 155px;
				display: inline-block;
				opacity: 0.08;
				position: absolute;
				top: 2rem;
				left: 50%;
				margin-left: -73px;
			}

			body {
				height: 100%;
				background: #fafafa;
				font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
				color: #777;
				font-weight: 300;
			}

			h1 {
				font-weight: lighter;
				letter-spacing: 0.8;
				font-size: 3rem;
				margin-top: 0;
				margin-bottom: 0;
				color: #222;
			}

			.wrap {
				max-width: 1024px;
				margin: 5rem auto;
				padding: 2rem;
				background: #fff;
				text-align: center;
				border: 1px solid #efefef;
				border-radius: 0.5rem;
				position: relative;
			}

			pre {
				white-space: normal;
				margin-top: 1.5rem;
			}

			code {
				background: #fafafa;
				border: 1px solid #efefef;
				padding: 0.5rem 1rem;
				border-radius: 5px;
				display: block;
			}

			p {
				margin-top: 1.5rem;
			}

			.footer {
				margin-top: 2rem;
				border-top: 1px solid #efefef;
				padding: 1em 2em 0 2em;
				font-size: 85%;
				color: #999;
			}

			a:active,
			a:link,
			a:visited {
				color: #dd4814;
			}
		</style>
	<?php else : ?>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Sistem Informasi Desa Provinsi Jawa Tengah" />
		<meta name="keywords" content="SIDesa, SITKD, GEODESA, JATENG, PROV JATENG, Provinsi Jawa Tengah" />
		<meta name="author" content="zakezone" />
		<link rel="shortcut icon" href="<?= base_url(); ?>/img/thumbnail/favicon.ico">

		<title>404</title>

		<!-- Custom fonts for this template-->
		<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/fontawesome-free/css/all.css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="<?= base_url() ?>/sbadmin2/sb-admin-2.css" rel="stylesheet">
	<?php endif ?>
</head>

<?php if (!empty($message) && $message !== '(null)') : ?>

	<body>
		<div class="wrap">
			<h1>404 - File Not Found</h1>

			<p>
				<?= nl2br(esc($message)) ?>
			</p>
		</div>
	</body>
<?php else : ?>

	<body id="page-top">

		<!-- Page Wrapper header-->
		<div id="wrapper">

			<!-- Content Wrapper topbar-->
			<div id="content-wrapper" class="d-flex flex-column" style="position:relative; min-height: 600px;">

				<!-- Begin Page Content -->
				<div class="container-fluid mt-5">

					<!-- 404 Error Text -->
					<div class="col-lg-12">
						<div class="text-center mb-12">
							<div class="error mx-auto" data-text="404">404</div>
							<p class="lead text-gray-800 mb-5">Page Not Found</p>
							<p class="text-gray-500 mb-0">Halaman tidak dapat ditemukan...</p>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Content Wrapper -->

		</div>
		<!-- End of Page Wrapper -->

		<footer class="sticky-footer bg-white" style="width: 100%; position: absolute; bottom: 0px;">
			<div class="text-center">
				<p>Dinas Pemberdayaan Masyarakat, Desa, Kependudukan Dan Catatan Sipil Provinsi Jawa Tengah</p>
			</div>
			<div class="container my-auto">
				<div class="copyright text-center my-auto">
					<span>Copyright &copy; 2020 - <?= date("Y"); ?> Sistem Informasi Desa</span>
				</div>
			</div>
		</footer>

		<!-- Bootstrap core JavaScript-->
		<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
		<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

		<!-- Core plugin JavaScript-->
		<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

		<!-- Custom scripts for all pages-->
		<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

	</body>
<?php endif ?>

</html>
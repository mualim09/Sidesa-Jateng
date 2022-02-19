        <!-- Begin Page Content -->
        <div class="container-fluid">
            <style>
                #content {
                    background: url(<?= base_url("img/bg/sitkd/bg-body.png") ?>);
                    background-position: center;
                }
            </style>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $myprofile; ?></h1>
            <div style="max-width: 785px;"><?= session()->getFlashdata('message'); ?></div>
            <div class="card mb-3" style="max-width: 785px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= htmlspecialchars(base_url('img/profile/' . $user['image']), ENT_QUOTES) ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <?php foreach ($kab as $k) : ?>
                                <h5 class="card-title"><?= htmlspecialchars($user['nama'], ENT_QUOTES); ?></h5>
                                <p class="card-text"><?= htmlspecialchars($user['nip'], ENT_QUOTES); ?></p>
                                <p class="card-text"><?= htmlspecialchars($user['email'], ENT_QUOTES); ?></p>
                                <p class="card-text"><?= htmlspecialchars($user['hp'], ENT_QUOTES); ?></p>
                                <p class="card-text"><?= htmlspecialchars($k->kabupaten, ENT_QUOTES); ?></p>
                                <p class="card-text"><small class="text-muted">Member sejak, <?= htmlspecialchars(date('d F Y', $user['tanggal']), ENT_QUOTES); ?></small></p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
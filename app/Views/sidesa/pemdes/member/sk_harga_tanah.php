<?= $this->include('sidesa/layout/pemdes/content-header') ?>
<?= $this->include('sidesa/layout/pemdes/content-topbar') ?>
<?= $this->include('sidesa/layout/pemdes/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>
        <div class="row">
            <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="col-lg-4 col-md-6">
                    <div class="form-group mt-3">
                        <label for="choices-single-no-sorting" class="form-label col-form-label">Bukti Kepemilikan</label>
                        <select class="form-control" name="bukti_kepemilikan" id="choices-single-no-sorting">
                            <option value="sertifikat">Sertifikat</option>
                            <option value="letter_c">Letter C</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg-8 col-md-6">
                    <div class="form-group mt-3">
                        <label for="nomor" class="col-sm-5 col-form-label">Nomor</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor Sertifikat / Letter C...">
                            <small class="form-text text-danger"><?= $validation->getError('nomor'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="luas_tanah" class="col-sm-5 col-form-label">Luas Tanah (m²)</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="m2" name="luas_tanah" placeholder="Dalam m²...">
                            <small class="form-text text-danger"><?= $validation->getError('luas_tanah'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nilai_harga_tanah" class="col-sm-5 col-form-label">Nilai Harga Tanah</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="rupiah" name="nilai_harga_tanah" placeholder="Harga Tanah...">
                            <small class="form-text text-danger"><?= $validation->getError('nilai_harga_tanah'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="luas_bangunan" class="col-sm-5 col-form-label">Luas Bangunan (m²)</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="m21" name="luas_bangunan" placeholder="Dalam m²...">
                            <small class="form-text text-danger"><?= $validation->getError('luas_bangunan'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nilai_harga_bangunan" class="col-sm-5 col-form-label">Nilai Harga Bangunan</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="rupiah1" name="nilai_harga_bangunan" placeholder="Harga Bangunan...">
                            <small class="form-text text-danger"><?= $validation->getError('nilai_harga_bangunan'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nama_pemegang_hak" class="col-sm-5 col-form-label">Nama Pemegang Hak</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="nama_pemegang_hak" name="nama_pemegang_hak" placeholder="Nama Pemilik...">
                            <small class="form-text text-danger"><?= $validation->getError('nama_pemegang_hak'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="persyaratan" class="col-sm-5 col-form-label">Upload Persyaratan (format .pdf)</label>
                        <div class="col-sm-6 mb-3">
                            <input type="file" class="form-control mb-3" id="persyaratan" name="persyaratan" accept=".pdf">
                            <small class="form-text text-danger"><?= $validation->getError('image'); ?></small>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="col-sm-6 mt-5 mb-5 btn btn-primary">AJUKAN SURAT KETERANGAN HARGA TANAH</button>
                </div>
            </form>
        </div>
    </div>




    <!-- <div class="section-title text-center">
            <h3 style="text-transform: uppercase;">Dashboard</h3>
        </div> -->
</div>
</div>
<?= $this->include('sidesa/layout/pemdes/content-footer') ?>
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
                <div class="col-lg-8 col-md-6">
                    <div class="form-group mt-3">
                        <label for="namalembaga" class="col-sm-5 col-form-label">Nama Lembaga</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="namalembaga" name="namalembaga" placeholder="Nama Sekolah/Usaha/Pemberdayaan/...">
                            <small class="form-text text-danger"><?= $validation->getError('namalembaga'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-4">
                        <label class="col-sm-5 col-form-label">Alamat</label>
                        <div class="col-sm-6 mb-3">
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Dusun</label>
                                <div class="col-sm-7 mb-3">
                                    <input type="text" class="form-control" id="dusun" name="dusun" placeholder="Nama Dusun...">
                                    <small class="form-text text-danger"><?= $validation->getError('alamat'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">RT</label>
                                <div class="col-sm-7 mb-3">
                                    <input type="text" class="form-control" id="rt" name="rt" placeholder="Nomor RT..." W>
                                    <small class="form-text text-danger"><?= $validation->getError('rt'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">RW</label>
                                <div class="col-sm-7 mb-3">
                                    <input type="text" class="form-control" id="rw" name="rw" placeholder="Nomor RW..." W>
                                    <small class="form-text text-danger"><?= $validation->getError('rw'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Kelurahan/Desa</label>
                                <div class="col-sm-7 mb-3">
                                    <input type="text" disabled class="form-control" id="keldesa" name="keldesa" value="<?= htmlspecialchars($namades, ENT_QUOTES); ?>">
                                    <small class="form-text text-danger"><?= $validation->getError('keldesa'); ?></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-5 col-form-label">Kecamatan</label>
                                <div class="col-sm-7 mb-3">
                                    <input type="text" disabled class="form-control" id="kecamatan" name="kecamatan" value="<?= htmlspecialchars($namakec, ENT_QUOTES); ?>">
                                    <small class="form-text text-danger"><?= $validation->getError('kecamatan'); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tahun_didirikan" class="col-sm-5 col-form-label">Berdiri Tahun</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="tahun_didirikan" name="tahun_didirikan" placeholder="Tahun Didirikannya Lembaga...">
                            <small class="form-text text-danger"><?= $validation->getError('tahun_didirikan'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="pimpinan_lembaga" class="col-sm-5 col-form-label">Pimpinan Lembaga</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="pimpinan_lembaga" name="pimpinan_lembaga" placeholder="Pimpinan Lembaga Sekarang...">
                            <small class="form-text text-danger"><?= $validation->getError('pimpinan_lembaga'); ?></small>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="persyaratan" class="col-sm-5 col-form-label">Upload Persyaratan (format .pdf)</label>
                        <div class="col-sm-6 mb-3">
                            <input type="file" class="form-control mb-3" id="persyaratan" name="persyaratan" accept=".pdf">
                            <small class="form-text text-danger"><?= $validation->getError('image'); ?></small>
                        </div>
                    </div>
                    <button type="submit" name="submit" class="col-sm-6 mt-5 mb-5 btn btn-primary">AJUKAN SURAT KETERANGAN DOMISILI LEMBAGA</button>
                </div>
            </form>
        </div>
    </div>

</div>
</div>
<?= $this->include('sidesa/layout/pemdes/content-footer') ?>
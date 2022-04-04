<?= $this->include('sidesa/layout/pemdes/content-header') ?>
<?= $this->include('sidesa/layout/pemdes/content-topbar') ?>
<?= $this->include('sidesa/layout/pemdes/content-sidebar') ?>

<div class="page-content" id="content">
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
        <div class="col-md-12 col-xl-12"><?= session()->getFlashdata('message'); ?></div>
        <div class="row">
            <div class="col-lg-12">
                <form class="needs-validation" action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user['nama'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('nama'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= htmlspecialchars($user['tempat_lahir'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('tempat_lahir'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="datepicker-basic" name="tanggal_lahir" value="<?= htmlspecialchars($user['tanggal_lahir'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('tanggal_lahir'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-6 mb-1">
                            <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Tuliskan nama Dukuh/Dusun/Jalan sesuai KTP" value="<?= htmlspecialchars($user['alamat'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('alamat'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">RT</label>
                        <div class="col-sm-6 mb-1">
                            <input type="text" class="form-control" id="rt" name="rt" placeholder="Tuliskan RT sesuai KTP" value="<?= htmlspecialchars($user['rt'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('rt'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">RW</label>
                        <div class="col-sm-6 mb-1">
                            <input type="text" class="form-control" id="rw" name="rw" placeholder="Tuliskan RW sesuai KTP" value="<?= htmlspecialchars($user['rw'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('rw'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kelurahan/Desa</label>
                        <div class="col-sm-6 mb-1">
                            <input type="text" class="form-control" id="keldesa" name="keldesa" placeholder="Tuliskan Desa sesuai KTP" value="<?= htmlspecialchars($user['keldesa'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('keldesa'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Kecamatan</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="kecamatan" name="kecamatan" placeholder="Tuliskan Kecamatan sesuai KTP" value="<?= htmlspecialchars($user['kecamatan'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('kecamatan'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Pekerjaan</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" placeholder="Tuliskan pekerjaan sesuai KTP" value="<?= htmlspecialchars($user['pekerjaan'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('pekerjaan'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="phone-mask" name="hp" placeholder="Contoh: 85234567890 (tanpa angka 0 didepan)" value="<?= htmlspecialchars($user['hp'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('hp'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-2">Gambar Profile</div>
                        <div class="col-sm-6 mb-3">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('img/user/profile/' . $user['image']) ?>" class="img-thumbnail img-preview">
                                </div>
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label for="image">Gambar yang akan diupload</label>
                                        <input type="hidden" name="imagelama" value="<?= htmlspecialchars($user['image'], ENT_QUOTES); ?>">
                                        <input type="file" class="form-control mb-3" id="image" name="image" onchange="previewImgUser()" accept=".jpg,.JPG,.jpeg,.png">
                                        <small class="form-text text-danger"><?= $validation->getError('image'); ?></small>
                                        <button type="submit" name="submit" class="btn btn-primary">Edit Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</div>
<?= $this->include('sidesa/layout/pemdes/content-footer') ?>
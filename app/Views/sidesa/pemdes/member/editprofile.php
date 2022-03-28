<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

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
        <div class="row">
            <div class="col-lg-12">
                <form class="needs-validation" novalidate action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user['nama'], ENT_QUOTES); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('nama'); ?></small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" readonly class="form-control" id="nip" name="nip" value="<?= htmlspecialchars($user['nip'], ENT_QUOTES); ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                        <div class="col-sm-6 mb-3">
                            <input type="text" class="form-control" id="hp" name="hp" value="<?= htmlspecialchars($user['hp'], ENT_QUOTES); ?>">
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
                                        <input type="file" class="form-control mb-3" id="image" name="image" onchange="previewImgUser()">
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
<?= $this->include('sidesa/layout/user/content-footer') ?>
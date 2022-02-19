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
            <div class="row">
                <div class="col-lg-12">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($user['nama'], ENT_QUOTES); ?>">
                                <?= $validation->getError('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="nip" name="nip" value="<?= htmlspecialchars($user['nip'], ENT_QUOTES); ?>">
                                <?= $validation->getError('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="hp" name="hp" value="<?= htmlspecialchars($user['hp'], ENT_QUOTES); ?>">
                                <?= $validation->getError('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2">Gambar Profile</div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?= base_url('img/profile/' . $user['image']) ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group">
                                            <label for="image">Gambar yang akan diupload</label>
                                            <input type="hidden" name="imagelama" value="<?= htmlspecialchars($user['image'], ENT_QUOTES); ?>">
                                            <!-- <input type="file" class="form-control-file" id="image" name="image" onchange="previewImg()"> buat pas upgrade CI4 aja-->
                                            <input type="file" class="form-control-file" id="image" name="image">
                                            <small class="form-text text-danger"><?= $validation->getError('image'); ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
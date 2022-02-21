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
                <div class="col-lg-6">
                    <?= session()->getFlashdata('message'); ?>
                    <form action="<?= base_url('sitkd/menu/gantipassword'); ?>" method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="form-group">
                            <label for="current_password">Password saat ini</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" value="<?= old('current_password'); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('current_password'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="new_password1">Password baru</label>
                            <input type="password" class="form-control" id="new_password1" name="new_password1" value="<?= old('new_password1'); ?>">
                            <small class="form-text text-danger"><?= $validation->getError('new_password1'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="new_password2">Password baru (verifikasi)</label>
                            <input type="password" class="form-control" id="new_password2" name="new_password2">
                            <small class="form-text text-danger"><?= $validation->getError('new_password2'); ?></small>
                        </div>
                        <div class="form-group mt-5">
                            <button type="submit" name="submit" class="btn btn-primary">Ganti password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <style>
                #content {
                    background: url(<?= base_url("/img/bg/sitkd/bg-body.png") ?>);
                    background-position: center;
                }
            </style>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $myprofile; ?></h1>
            <div class="row">
                <div class="col-lg-6">
                    <?= session()->getFlashdata('message'); ?>

                    <h5>Nama: <?= $edit['nama']; ?></h5>

                    <form action="" method="post">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <input type="hidden" name="id" value="<?= $edit['user_id']; ?>">
                        <div class="form-group mt-4">
                            <label for="idpermendagri">ID PERMENDAGRI</label>
                            <select class="custom-select" id="idpermendagri" name="idpermendagri">
                                <?php foreach ($permendagri as $p) : ?>
                                    <?php if ($p['permendagri_id'] == $edit['permendagri_id']) : ?>
                                        <option value="<?= $p['permendagri_id']; ?>" selected><?= $p['permendagri_id'] . "-" . $p['kabupaten']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $p['permendagri_id']; ?>"><?= $p['permendagri_id'] . "-" . $p['kabupaten']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="role">ROLE</label>
                            <select class="custom-select" id="role" name="role">
                                <?php foreach ($tabrole as $t) : ?>
                                    <?php if ($t['id'] == $edit['role_id']) : ?>
                                        <option value="<?= $t['id']; ?>" selected><?= $t['id'] . "-" . $t['role_akses']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $t['id']; ?>"><?= $t['id'] . "-" . $t['role_akses']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="is_active">Status aktivasi</label>
                            <select class="custom-select" id="is_active" name="is_active">
                                <?php foreach ($tabactive as $ta) : ?>
                                    <?php if ($ta['id'] == $edit['is_active']) : ?>
                                        <option value="<?= $ta['id']; ?>" selected><?= $ta['id'] . "-" . $ta['is_active']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $ta['id']; ?>"><?= $ta['id'] . "-" . $ta['is_active']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
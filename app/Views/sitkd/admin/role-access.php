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

                    <h5>Role: <?= $role['role_akses']; ?></h5>

                    <table class="table table-hover mt-4">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Menu</th>
                                <th scope="col" style="text-align: center;">Access menu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $m['menu']; ?></td>
                                    <td style="text-align: center;">
                                        <div class="form-check">
                                            <input type="hidden" class="txt_csrfname" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                                            <input class="form-check-input-admin" type="checkbox" <?= check_access($role['id'], $m['id']); ?> data-role="<?= $role['id']; ?>" data-menu="<?= $m['id']; ?>">
                                        </div>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
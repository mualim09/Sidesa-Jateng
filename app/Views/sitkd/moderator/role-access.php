        <!-- Begin Page Content -->
        <div class="container-fluid">
            <style>
                #content {
                    background: url(<?= base_url("/img/bg/sitkd/bg-body.png") ?>);
                    background-position: center;
                }
            </style>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center">Role Access Menu</h1>
            <div class="row">
                <div class="col-lg-6">
                    <?= session()->getFlashdata('message'); ?>

                    <h5>Role: <?= $role['role_akses']; ?></h5>

                    <table class="table table-hover mt-2">
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
                                            <input class="form-check-input-moderator" type="checkbox" <?= check_accessm($role['id'], $m['id']); ?> data-rolem="<?= $role['id']; ?>" data-menum="<?= $m['id']; ?>">
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
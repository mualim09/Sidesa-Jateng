<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>

        <h4 class="mb-4 text-gray text-center">Daftar user Sistem Informasi Desa Provinsi Jawa Tengah</h4>
        <div class="row justify-content-center mb-4">
            <div class="col-md-6">
                <form action="<?= base_url('user/moderator/role_management'); ?>" method="POST">
                    <?= csrf_field() ?>
                    <div class="input-group mt-2">
                        <input type="text" class="form-control" placeholder="Cari data user.." name="keyword" autocomplete="off" autofocus>
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" name="tombolcari">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col table-responsive">
            <table>
                <tr>
                    <td>
                        Hasil pencarian : <?= $total_rows; ?>
                    </td>
                    <td>
                        <a class="nav-link" href="<?= base_url('user/moderator/hapussessionkeyword'); ?>">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="table-responsive">
            <?= session()->getFlashdata('message'); ?>

            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th scope="row">No</th>
                        <th scope="row">Petugas</th>
                        <th scope="row">NIP</th>
                        <!-- <th scope="row">Kecamatan</th> -->
                        <th scope="row" style="text-align: center;">Kabupaten</th>
                        <th scope="row" style="text-align: center;">Akses</th>
                        <th scope="row" style="text-align: center;">Role</th>
                        <th scope="row" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 1 + (5 * ($start - 1)); ?>
                    <?php foreach ($getrole as $gr) : ?>
                        <tr userid="<?= $gr['user_id']; ?>" nip="<?= $gr['nip']; ?>">
                            <th style="vertical-align: middle;" scope="row"><?= $start++; ?></th>
                            <td style="vertical-align: middle;"><?= $gr['nama']; ?></td>
                            <td style="vertical-align: middle;"><?= $gr['nip']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?= $gr['nm_kab']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?= $gr['nm_desa']; ?></td>
                            <td align="center" style="vertical-align: middle;"><?= $gr['role_akses']; ?></td>
                            <td align="center" style="vertical-align: middle;">
                                <a href="<?= base_url('user/moderator/role_edit/' . $gr['user_id']) . '/' . $gr['kd_wilayah'] ?>" class="badge bg-info">Edit</a>
                                <a href="<?= base_url('user/moderator/role_accessm/' . $gr['role_id']) ?>" class="badge bg-warning">Configure</a>
                                <a href="#" class="badge bg-danger" id="sa-parameter">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <?php if (empty($getrole)) : ?>
                    <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                        <i class="mdi mdi-block-helper label-icon"></i>Data tidak ditemukan!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </table>
            <?php if ($total_rows > 5) : ?>
                <?= $pager->links('sidesa_user', 'searching_pagination'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->include('sidesa/layout/user/content-footer') ?>
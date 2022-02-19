<div class="container-fluid">
    <style>
        #content {
            background: url(<?= base_url("/img/bg/sitkd/bg-body.png") ?>);
            background-position: center;
        }
    </style>
    <!-- Page Heading -->
    <h4 class="mb-4 text-gray text-center">Daftar user Sistem Informasi Pengelolaan Aset Desa Provinsi Jawa Tengah</h4>
    <div class="row justify-content-center mb-4">
        <div class="col-md-6">
            <form action="<?= base_url('sitkd/moderator/role/'); ?>" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="Cari data user.." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="tombolcari">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col table-responsive">
            <?= session()->getFlashdata('message'); ?>
            <table>
                <tr>
                    <td>
                        Hasil pencarian : <?= $total_rows; ?>
                    </td>
                    <td>
                        <a class="nav-link" href="<?= base_url('sitkd/moderator/hapussessionkeyword'); ?>">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                    </td>
                </tr>
            </table>
            <table class="table table-hover table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Petugas</th>
                        <th scope="col">NIP</th>
                        <!-- <th scope="col">Kecamatan</th> -->
                        <th scope="col" style="text-align: center;">Kabupaten</th>
                        <th scope="col" style="text-align: center;">Role</th>
                        <th scope="col" style="text-align: center;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $start = 1 + (5 * ($start - 1)); ?>
                    <?php foreach ($getrole as $gr) : ?>
                        <tr>
                            <th scope="row"><?= $start++; ?></th>
                            <td><?= $gr['nama']; ?></td>
                            <td><?= $gr['nip']; ?></td>
                            <td align="center"><?= $gr['kabupaten']; ?></td>
                            <td align="center"><?= $gr['role_akses']; ?></td>
                            <td align="center">
                                <a href="<?= base_url('sitkd/moderator/roleedit/' . $gr['user_id']) ?>" class="badge badge-info">Edit</a>
                                <a href="<?= base_url('sitkd/moderator/roleaccess/' . $gr['role_id']) ?>" class="badge badge-warning">Permission</a>
                                <a href="<?= base_url('sitkd/moderator/hapususer/' . $gr['user_id']) ?>" class="badge badge-danger" onclick="return confirm('Konfirmasi user akan dihapus dari SITKD?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <?php if (empty($getrole)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>
            </table>
            <?php if ($total_rows > 5) : ?>
                <?= $pager->links('sitkd_user', 'searching_pagination'); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

</div>
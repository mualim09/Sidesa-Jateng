<div class="container-fluid table-responsive">
    <style>
        #content {
            background: url(<?= base_url("/img/bg/sitkd/bg-body.png") ?>);
            background-position: center;
        }
    </style>
    <h1 class="h3 text-gray-800 mb-4">Daftar verifikasi dokumen dan tinjauan lapangan</h1>
    <div class="row mt-3 justify-content-center mb-4">
        <div class="col-md-6">
            <form action="<?= base_url('sitkd/member/verifikasidokumen') ?>" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari data dokumen.." name="keyword" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="tombolcari">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="<?= base_url('sitkd/member/prepareuploadfile/'); ?>" class="btn btn-primary">Upload file</a>
        </div>
    </div>
    <table>
        <tr>
            <td>
                Hasil pencarian : <?= $total_rows; ?>
            </td>
            <td>
                <a class="nav-link" href="<?= base_url('sitkd/member/hapussessionkeyword'); ?>">
                    <i class="fas fa-sync-alt"></i>
                </a>
            </td>
        </tr>
    </table>
    <?= session()->getFlashdata('message'); ?>
    <?php if (empty($uploadfile)) : ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan!
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-hover table-sm mt-3">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" width="250px">Peruntukan</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Luas TKD</th>
                    <th style="text-align: center;" scope="col">Petugas</th>
                    <th style="text-align: center;" scope="col">Status</th>
                    <th style="text-align: center;" scope="col">Tanggal</th>
                    <th style="text-align: center;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $start = 1 + (5 * ($start - 1)); ?>
                <?php foreach ($uploadfile as $uf) : ?>
                    <tr>
                        <th style="vertical-align: middle;" scope="row"><?= $start++; ?></th>
                        <td style="vertical-align: middle;"><?= $uf['nama_trans']; ?></td>
                        <td style="vertical-align: middle;"><?= $uf['kategori']; ?></label></td>
                        <td style="vertical-align: middle;"><?= $uf['luas_tkd']; ?></label></td>
                        <td align="center" style="vertical-align: middle;"><?= $uf['petugas']; ?></td>
                        <td align="center" <?php if ($uf['status_laporan'] == "sukses") : ?>style="color: #00cc00; vertical-align: middle;" <?php else : ?>style="vertical-align: middle;" <?php endif; ?>><?= $uf['status_laporan']; ?></label></td>
                        <td align="center" style="vertical-align: middle;"><?= date("d/m/Y", $uf['tanggal']); ?></td>
                        <td align="center" style="vertical-align: middle;">
                            <a href="<?= base_url('sitkd/member/detailuraian'); ?>/<?= $uf['file_id']; ?>" class="badge badge-primary">detail</a>
                            <a href="<?= base_url('sitkd/member/tracking'); ?>/<?= $uf['file_id']; ?>" class="badge badge-dark">tracking</a>
                            <?php if ($uf['status_laporan'] == "pending") : ?>
                                <a href="<?= base_url('sitkd/member/hapusdata'); ?>/<?= $uf['file_id']; ?>/<?= $uf['tanggal']; ?>" class="badge badge-danger" onclick="return confirm('yakin?');">hapus</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php if ($total_rows > 5) : ?>
            <?= $pager->links('sitkd_dokumen_laporan', 'searching_pagination'); ?>
        <?php endif; ?>
    </div>
</div>

<!-- jangan dihapus biar footer tetep di paling bawah coeg -->
</div>
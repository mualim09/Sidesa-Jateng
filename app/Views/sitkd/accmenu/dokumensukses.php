<div class="container-fluid table-responsive">
    <style>
        #content {
            background: url(<?= base_url("/img/bg/sitkd/bg-body.png") ?>);
            background-position: center;
        }
    </style>
    <h1 class="h4 text-gray text-center">Daftar sukses dokumen dan tinjauan lapangan TMTKD Provinsi Jawa Tengah</h1>
    <div class="row justify-content-center mb-4 mt-4">
        <div class="col-md-6">
            <form action="<?= base_url('sitkd/accmenu/dokumensukses') ?>" method="post">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <div class="input-group mt-2">
                    <input type="text" class="form-control" placeholder="Cari data dokumen disetujui.." name="keywordsukses" autocomplete="off" autofocus>
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit" name="tombolcari">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <table>
        <tr>
            <td>
                Hasil pencarian : <?= $total_rows; ?>
            </td>
            <td>
                <a class="nav-link" href="<?= base_url('sitkd/accmenu/hapussessionkey'); ?>">
                    <i class="fas fa-sync-alt"></i>
                </a>
            </td>
        </tr>
    </table>
    <?= session()->getFlashdata('message'); ?>
    <?php if (empty($get_sukses)) : ?>
        <div class="alert alert-danger" role="alert">
            Data tidak ditemukan!
        </div>
    <?php endif; ?>
    <div class="table-responsive">
        <table class="table table-hover table-sm mt-3">
            <thead>
                <tr>
                    <th style="text-align: left;" scope="col"></th>
                    <th style="text-align: left;" scope="col">No</th>
                    <th scope="col" width="230px">Peruntukan</th>
                    <th style="text-align: center;" scope="col">Kabupaten</th>
                    <th style="text-align: center;" scope="col">Desa</th>
                    <th style="text-align: center;" scope="col">Luas TKD</th>
                    <th style="text-align: center;" scope="col">Kategori</th>
                    <th style="text-align: center;" scope="col">Status</th>
                    <th style="text-align: center;" scope="col">Tanggal</th>
                    <th style="text-align: center;" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($get_sukses as $v) : ?>
                    <tr>
                        <td style="vertical-align: text-top;">
                            <?php if ($v['read'] == "N") : ?>
                                <span class="badge badge-danger badge-pill" style="text-align: center;">!</i></span>
                            <?php endif; ?>
                        </td>
                        <th style="vertical-align: middle;"><?= ++$start; ?></th>
                        <td style="vertical-align: middle;"><?= $v['nama_trans']; ?></td>
                        <td style="vertical-align: middle;" align="center"><?= $v['kabupaten']; ?></td>
                        <td style="vertical-align: middle;" align="center"><?= $v['desa']; ?></td>
                        <td style="vertical-align: middle;" align="center"><?= $v['luas_tkd']; ?></label></td>
                        <td style="vertical-align: middle;" align="center"><?= $v['kategori']; ?></label></td>
                        <td align="center" <?php if ($v['status_laporan'] == "sukses") : ?>style="color: #00cc00; vertical-align: middle;" <?php else : ?>style="vertical-align: middle;" <?php endif; ?>><?= $v['status_laporan']; ?></td>
                        <td style="vertical-align: middle;" align="center"><?= date("d/m/Y", $v['tanggal']); ?></td>
                        <td style="vertical-align: middle;" align="center">
                            <a href="<?= base_url('sitkd/accmenu/detailuraian'); ?>/<?= $v['file_id']; ?>/<?= $v['tanggal']; ?>" class="badge badge-primary">detail</a>
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
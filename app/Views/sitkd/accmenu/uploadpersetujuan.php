<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h2 style="text-transform: capitalize;"><?= $myprofile; ?></h2>
            <a href="<?= base_url('sitkd/accmenu/detailuraian'); ?>/<?= $dokumen['file_id']; ?>/<?= $dokumen['tanggal']; ?>" class="float-right mt-1"><i class="fas fa-fast-backward"> <em>Back to detail uraian</em></i></a>
            <p class="lead">
                <strong>Diupload oleh : </strong>
                <a href="#"><?= $dokumen['verifikator']; ?></a>
            </p>
            <hr>
            <table class="table table-borderless table-sm">
                <?php foreach ($geturaian as $gu) : ?>
                    <tr>
                        <td width="150px">Desa</td>
                        <td width="10px">:</td>
                        <td><?= $gu['desa']; ?></td>
                        <td align="right">Dibuat pada tanggal <?= date("d/m/Y", $dokumen['tanggal']); ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Kecamatan</td>
                        <td width="10px">:</td>
                        <td><?= $gu['kecamatan']; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Kabupaten</td>
                        <td width="10px">:</td>
                        <td><?= $gu['kabupaten']; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Peruntukan</td>
                        <td width="10px">:</td>
                        <td><?= $gu['nama_trans']; ?></td>
                    </tr>
                    <tr>
                        <td width="150px">Luas TKD</td>
                        <td width="10px">:</td>
                        <td><?= $gu['luas_tkd']; ?></td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php endif; ?>>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td width="150px">Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td width="150px">Pengganti Tahap I</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td width="150px">Luas Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td width="150px">Pengganti</td>
                        <?php endif; ?>
                        <td width="10px">:</td>
                        <td><?= $gu['pengganti']; ?></td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td width="150px">UGR</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td width="150px">UGR</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td width="150px">UGR</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td width="150px">Nilai TKD</td>
                        <?php endif; ?>
                        <td width="10px">:</td>
                        <td><?= $gu['ugr']; ?></td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td width="150px">Sisa UGR</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td width="150px">Sisa UGR</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td width="150px">Nilai Pengganti</td>
                        <?php endif; ?>
                        <td width="10px">:</td>
                        <td><?= $gu['sisa_ugr']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <hr>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <dl class="row">
                        <dt class="col">Upload file</dt>
                        <dt class="col" style=" text-align: right;">Persetujuan ini diupload Pemprov pada tanggal <?= date("d/m/Y"); ?></dt>
                    </dl>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <input type="file" class="form-control-file mt-4 mb-5" id="upload_persetujuan" name="upload_persetujuan">
                        <small class="form-text text-danger"><?= $validation->getError('upload_persetujuan'); ?></small>
                        <input type="hidden" readonly name="file_id" class="form-control" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <small class="form-text text-danger"><?= $validation->getError('file_id'); ?></small>
                        <!-- Notifikasi -->
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="targetnotif" id="targetnotif" value="<?= $dokumen['permendagri_id']; ?>">
                            <small class="form-text text-danger"><?= $validation->getError('targetnotif'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="readnotif" id="readnotif" value="N">
                            <small class="form-text text-danger"><?= $validation->getError('readnotif'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="tanggalnotif" id="tanggalnotif" value=<?= time() ?>>
                            <small class="form-text text-danger"><?= $validation->getError('tanggalnotif'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="keterangannotif" id="keterangannotif" value="waiting">
                            <small class="form-text text-danger"><?= $validation->getError('keterangannotif'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Berkas Persetujuan Baru!">
                            <small class="form-text text-danger"><?= $validation->getError('jenisnotif'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-file-upload text-white">
                            <small class="form-text text-danger"><?= $validation->getError('iconnotif'); ?></small>
                        </div>
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="permendagri_id" id="permendagri_id" value="<?= $user['permendagri_id']; ?>">
                            <small class="form-text text-danger"><?= $validation->getError('permendagri_id'); ?></small>
                        </div>
                        <button type="submit" name="proses" class="btn btn-primary float-right mt-2">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile1; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile2; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile3; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile4; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile5; ?></h2>
            <?php endif; ?>
            <a href="<?= base_url('sitkd/member/detailuraian'); ?>/<?= $dokumen['file_id']; ?>" class="float-right mt-1"><i class="fas fa-fast-backward"> <em>Back to detail uraian</em></i></a>
            <p class="lead">
                <strong>Verifikator Kabupaten : </strong>
                <a href="#"><?= $dokumen['petugas']; ?></a>
            </p>
            <hr>
            <table class="table table-borderless table-sm">
                <?php foreach ($geturaian as $gu) : ?>
                    <tr>
                        <th width="68%">Diupload dari Pemkab pada tanggal <?= date("d/m/Y", $dokumen['tanggal']); ?></th>
                        <th style=" text-align: left;" width="30px">Desa</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['desa']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Direvisi dari PEMKAB pada tanggal <?php if ($tanggal_revisi[6] != "") : ?><?= date("d/m/Y", $tanggal_revisi[6]); ?><?php else : ?> - <?php endif; ?></th>
                        <th style=" text-align: left;" width="30px">Kecamatan</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['kecamatan']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Diperiksa dari PEMPROV pada tanggal <?php if ($tanggal_review[6] != "") : ?><?= date("d/m/Y", $tanggal_review[6]); ?><?php else : ?> - <?php endif; ?></th>
                        <th style=" text-align: left;" width="30px">Kabupaten</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['kabupaten']; ?></th>
                    </tr>
                <?php endforeach; ?>
            </table>
            <hr>
        </div>

        <div class="col-lg-8">
            <div class="embed-responsive embed-responsive-16by9" style="height:800px;">
                <iframe class="pdf-preview" <?php if ($dokumen['file7'] != null) : ?>src="<?= base_url('data/sitkd/file/laporanpdf/' . $pdf) ?>" <?php else : ?> src="<?= base_url('sitkd/auth/blockedakses') ?>" <?php endif; ?> allowfullscreen></iframe>
            </div>
            <hr>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <dl class="row">
                        <dt class="col">Revisi file</dt>
                        <dd class="col text-right" style="<?php if ($statusuraian[6] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[6] == "revisi") : ?> color:red <?php else : ?> color:black <?php endif; ?>" class="text-right"><i><?= $statusuraian[6]; ?></i>
                        </dd>
                    </dl>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Pemeriksa : </label>
                        <a href="#"><?= $pemeriksa[6]; ?></a>
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="" readonly class="form-control" value="<?= $keteranganexp[6]; ?>">
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <?php if ($dokumen['file7'] != null && $statusuraian[6] == "revisi") : ?>
                            <input type="file" class="form-control-file mt-4 mb-5" id="file7" name="file7">
                            <!-- <input type="file" class="form-control-file mt-4 mb-5" id="file" name="file7" onchange="previewPDF()"> buat pas upgrade CI4 saja> -->
                            <small class="form-text text-danger"><?= $validation->getError('file7'); ?></small>
                            <div class="form-group">
                                <label for="catatan">Catatan dari Kabupaten</label>
                                <textarea class="form-control" hidden name="catatan1" id="catatan1" rows="4"><?= $catatan_member[0]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan2" id="catatan2" rows="4"><?= $catatan_member[1]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan3" id="catatan3" rows="4"><?= $catatan_member[2]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan4" id="catatan4" rows="4"><?= $catatan_member[3]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan5" id="catatan5" rows="4"><?= $catatan_member[4]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan6" id="catatan6" rows="4"><?= $catatan_member[5]; ?></textarea>
                                <textarea class="form-control" name="catatan7" id="catatan7" rows="4"><?= $catatan_member[6]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan8" id="catatan8" rows="4"><?= $catatan_member[7]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan9" id="catatan9" rows="4"><?= $catatan_member[8]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan10" id="catatan10" rows="4"><?= $catatan_member[9]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan11" id="catatan11" rows="4"><?= $catatan_member[10]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan12" id="catatan12" rows="4"><?= $catatan_member[11]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan13" id="catatan13" rows="4"><?= $catatan_member[12]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan14" id="catatan14" rows="4"><?= $catatan_member[13]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan15" id="catatan15" rows="4"><?= $catatan_member[14]; ?></textarea>
                                <textarea class="form-control" hidden name="catatan16" id="catatan16" rows="4"><?= $catatan_member[15]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="tanggal_revisi1" name="tanggal_revisi1" value=<?= $tanggal_revisi[0]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi2" name="tanggal_revisi2" value=<?= $tanggal_revisi[1]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi3" name="tanggal_revisi3" value=<?= $tanggal_revisi[2]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi4" name="tanggal_revisi4" value=<?= $tanggal_revisi[3]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi5" name="tanggal_revisi5" value=<?= $tanggal_revisi[4]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi6" name="tanggal_revisi6" value=<?= $tanggal_revisi[5]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi7" name="tanggal_revisi7" value=<?= time(); ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi8" name="tanggal_revisi8" value=<?= $tanggal_revisi[7]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi9" name="tanggal_revisi9" value=<?= $tanggal_revisi[8]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi10" name="tanggal_revisi10" value=<?= $tanggal_revisi[9]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi11" name="tanggal_revisi11" value=<?= $tanggal_revisi[10]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi12" name="tanggal_revisi12" value=<?= $tanggal_revisi[11]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi13" name="tanggal_revisi13" value=<?= $tanggal_revisi[12]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi14" name="tanggal_revisi14" value=<?= $tanggal_revisi[13]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi15" name="tanggal_revisi15" value=<?= $tanggal_revisi[14]; ?>>
                                <input type="hidden" class="form-control" id="tanggal_revisi16" name="tanggal_revisi16" value=<?= $tanggal_revisi[15]; ?>>
                            </div>
                            <div class="form-group">
                                <input type="hidden" class="form-control" id="status_uraian1" name="status_uraian1" value=<?= $statusuraian[0]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian2" name="status_uraian2" value=<?= $statusuraian[1]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian3" name="status_uraian3" value=<?= $statusuraian[2]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian4" name="status_uraian4" value=<?= $statusuraian[3]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian5" name="status_uraian5" value=<?= $statusuraian[4]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian6" name="status_uraian6" value=<?= $statusuraian[5]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian7" name="status_uraian7" value="pending">
                                <input type="hidden" class="form-control" id="status_uraian8" name="status_uraian8" value=<?= $statusuraian[7]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian9" name="status_uraian9" value=<?= $statusuraian[8]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian10" name="status_uraian10" value=<?= $statusuraian[9]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian11" name="status_uraian11" value=<?= $statusuraian[10]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian12" name="status_uraian12" value=<?= $statusuraian[11]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian13" name="status_uraian13" value=<?= $statusuraian[12]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian14" name="status_uraian14" value=<?= $statusuraian[13]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian15" name="status_uraian15" value=<?= $statusuraian[14]; ?>>
                                <input type="hidden" class="form-control" id="status_uraian16" name="status_uraian16" value=<?= $statusuraian[15]; ?>>
                            </div>
                            <div class="form-group">
                                <input type="hidden" id="keterangan1" name="keterangan1" value="<?= $keteranganexp[0]; ?>">
                                <input type="hidden" id="keterangan2" name="keterangan2" value="<?= $keteranganexp[1]; ?>">
                                <input type="hidden" id="keterangan3" name="keterangan3" value="<?= $keteranganexp[2]; ?>">
                                <input type="hidden" id="keterangan4" name="keterangan4" value="<?= $keteranganexp[3]; ?>">
                                <input type="hidden" id="keterangan5" name="keterangan5" value="<?= $keteranganexp[4]; ?>">
                                <input type="hidden" id="keterangan6" name="keterangan6" value="<?= $keteranganexp[5]; ?>">
                                <input type="hidden" class="form-control" id="keterangan7" name="keterangan7" value="sesuai">
                                <input type="hidden" id="keterangan8" name="keterangan8" value="<?= $keteranganexp[7]; ?>">
                                <input type="hidden" id="keterangan9" name="keterangan9" value="<?= $keteranganexp[8]; ?>">
                                <input type="hidden" id="keterangan10" name="keterangan10" value="<?= $keteranganexp[9]; ?>">
                                <input type="hidden" id="keterangan11" name="keterangan11" value="<?= $keteranganexp[10]; ?>">
                                <input type="hidden" id="keterangan12" name="keterangan12" value="<?= $keteranganexp[11]; ?>">
                                <input type="hidden" id="keterangan13" name="keterangan13" value="<?= $keteranganexp[12]; ?>">
                                <input type="hidden" id="keterangan14" name="keterangan14" value="<?= $keteranganexp[13]; ?>">
                                <input type="hidden" id="keterangan15" name="keterangan15" value="<?= $keteranganexp[14]; ?>">
                                <input type="hidden" id="keterangan16" name="keterangan16" value="<?= $keteranganexp[15]; ?>">
                                <input type="hidden" readonly name="file_id" class="form-control" id="file_id" value="<?= $dokumen['file_id']; ?>">
                            </div>
                            <!-- Notifikasi -->
                            <div class="form-group">
                                <input type="hidden" readonly class="form-control-plaintext" name="targetnotif" id="targetnotif" value="2">
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
                                <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                    <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="File Revisi Persyaratan 7 baru!">
                                <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                    <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Hasil Revisi Persyaratan 7 review">
                                <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                    <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Hasil Revisi Persyaratan 7 peninjauan">
                                <?php endif; ?>
                                <small class="form-text text-danger"><?= $validation->getError('jenisnotif'); ?></small>
                            </div>
                            <div class="form-group">
                                <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                    <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-exclamation-triangle text-white">
                                <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                    <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-file-signature text-white">
                                <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                    <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-file-signature text-white">
                                <?php endif; ?>
                                <small class="form-text text-danger"><?= $validation->getError('iconnotif'); ?></small>
                            </div>
                            <div class="form-group">
                                <input type="hidden" readonly class="form-control-plaintext" name="permendagri_id" id="permendagri_id" value="<?= $user['permendagri_id']; ?>">
                                <small class="form-text text-danger"><?= $validation->getError('permendagri_id'); ?></small>
                            </div>
                            <button type="submit" name="proses" class="btn btn-primary float-right mt-2">Save</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
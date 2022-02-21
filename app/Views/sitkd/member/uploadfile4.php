<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile1; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile2; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                <h2 style="text-transform: capitalize;"><?= $myprofile3; ?></h2>
            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2017") : ?>
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
                        <th scope="col" style=" text-align: left;" width="100px">Desa</th>
                        <th scope="col" style=" text-align: left;" width="10px">:</th>
                        <th scope="col" style=" text-align: left;"><?= $gu['desa']; ?></th>
                    </tr>
                    <tr>
                        <th scope="col" style=" text-align: left;">Kecamatan</th>
                        <th scope="col" style=" text-align: left;">:</th>
                        <th scope="col" style=" text-align: left;"><?= $gu['kecamatan']; ?></th>
                    </tr>
                    <tr>
                        <th scope="col" style=" text-align: left;">Kabupaten</th>
                        <th scope="col" style=" text-align: left;">:</th>
                        <th scope="col" style=" text-align: left;"><?= $gu['kabupaten']; ?></th>
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
                        <dt class="col" style=" text-align: right;">Diupload dari Pemkab pada tanggal <?= date("d/m/Y"); ?></dt>
                    </dl>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <input type="file" class="form-control-file mt-4 mb-5" id="file4" name="file4">
                        <small class="form-text text-danger"><?= $validation->getError('file4'); ?></small>
                        <div class="form-group">
                            <label for="catatan">Catatan dari Kabupaten</label>
                            <textarea class="form-control" hidden name="catatan1" id="catatan1" rows="4"><?= $catatan_member[0]; ?></textarea>
                            <textarea class="form-control" hidden name="catatan2" id="catatan2" rows="4"><?= $catatan_member[1]; ?></textarea>
                            <textarea class="form-control" hidden name="catatan3" id="catatan3" rows="4"><?= $catatan_member[2]; ?></textarea>
                            <textarea class="form-control" name="catatan4" id="catatan4" rows="4"><?= $catatan_member[3]; ?></textarea>
                            <textarea class="form-control" hidden name="catatan5" id="catatan5" rows="4"><?= $catatan_member[4]; ?></textarea>
                            <textarea class="form-control" hidden name="catatan6" id="catatan6" rows="4"><?= $catatan_member[5]; ?></textarea>
                            <textarea class="form-control" hidden name="catatan7" id="catatan7" rows="4"><?= $catatan_member[6]; ?></textarea>
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
                            <input type="hidden" class="form-control" id="tanggalupload1" name="tanggalupload1" value=<?= $tanggalupload[0]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload2" name="tanggalupload2" value=<?= $tanggalupload[1]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload3" name="tanggalupload3" value=<?= $tanggalupload[2]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload4" name="tanggalupload4" value=<?= time(); ?>>
                            <input type="hidden" class="form-control" id="tanggalupload5" name="tanggalupload5" value=<?= $tanggalupload[4]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload6" name="tanggalupload6" value=<?= $tanggalupload[5]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload7" name="tanggalupload7" value=<?= $tanggalupload[6]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload8" name="tanggalupload8" value=<?= $tanggalupload[7]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload9" name="tanggalupload9" value=<?= $tanggalupload[8]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload10" name="tanggalupload10" value=<?= $tanggalupload[9]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload11" name="tanggalupload11" value=<?= $tanggalupload[10]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload12" name="tanggalupload12" value=<?= $tanggalupload[11]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload13" name="tanggalupload13" value=<?= $tanggalupload[12]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload14" name="tanggalupload14" value=<?= $tanggalupload[13]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload15" name="tanggalupload15" value=<?= $tanggalupload[14]; ?>>
                            <input type="hidden" class="form-control" id="tanggalupload16" name="tanggalupload16" value=<?= $tanggalupload[15]; ?>>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="keterangan1" name="keterangan1" value=<?= $keteranganexp[0]; ?>>
                            <input type="hidden" class="form-control" id="keterangan2" name="keterangan2" value=<?= $keteranganexp[1]; ?>>
                            <input type="hidden" class="form-control" id="keterangan3" name="keterangan3" value=<?= $keteranganexp[2]; ?>>
                            <input type="hidden" class="form-control" id="keterangan4" name="keterangan4" value="sesuai">
                            <input type="hidden" class="form-control" id="keterangan5" name="keterangan5" value=<?= $keteranganexp[4]; ?>>
                            <input type="hidden" class="form-control" id="keterangan6" name="keterangan6" value=<?= $keteranganexp[5]; ?>>
                            <input type="hidden" class="form-control" id="keterangan7" name="keterangan7" value=<?= $keteranganexp[6]; ?>>
                            <input type="hidden" class="form-control" id="keterangan8" name="keterangan8" value=<?= $keteranganexp[7]; ?>>
                            <input type="hidden" class="form-control" id="keterangan9" name="keterangan9" value=<?= $keteranganexp[8]; ?>>
                            <input type="hidden" class="form-control" id="keterangan10" name="keterangan10" value=<?= $keteranganexp[9]; ?>>
                            <input type="hidden" class="form-control" id="keterangan11" name="keterangan11" value=<?= $keteranganexp[10]; ?>>
                            <input type="hidden" class="form-control" id="keterangan12" name="keterangan12" value=<?= $keteranganexp[11]; ?>>
                            <input type="hidden" class="form-control" id="keterangan13" name="keterangan13" value=<?= $keteranganexp[12]; ?>>
                            <input type="hidden" class="form-control" id="keterangan14" name="keterangan14" value=<?= $keteranganexp[13]; ?>>
                            <input type="hidden" class="form-control" id="keterangan15" name="keterangan15" value=<?= $keteranganexp[14]; ?>>
                            <input type="hidden" class="form-control" id="keterangan16" name="keterangan16" value=<?= $keteranganexp[15]; ?>>
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
                            <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="File Persyaratan 4 baru!">
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
                        <?php if ($dokumen['file4'] == null) : ?>
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
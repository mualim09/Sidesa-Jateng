<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <h2 style="text-transform: capitalize;"><?= $myprofile1; ?></h2>
            <a href="<?= base_url('sitkd/accmenu/detailuraian'); ?>/<?= $dokumen['file_id']; ?>/<?= $dokumen['tanggal']; ?>" class="float-right mt-1"><i class="fas fa-fast-backward"> <em>Back to detail uraian</em></i></a>
            <p class="lead">
                <strong>Verifikator Kabupaten : </strong>
                <a href="#"><?= $dokumen['petugas']; ?></a>
            </p>
            <hr>
            <table class="table table-borderless table-sm" style="overflow-x:auto;">
                <?php foreach ($geturaian as $gu) : ?>
                    <tr>
                        <th width="68%">Diupload dari Pemkab pada tanggal <?= $tanggal_upload[13] != '' ? date("d/m/Y", $tanggal_upload[13]) : '-'; ?></th>
                        <th style=" text-align: left;" width="30px">Desa</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['desa']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Direvisi dari PEMKAB pada tanggal <?= $tanggal_upload[13] != '' ? date("d/m/Y", $tanggal_upload[13]) : '-'; ?></th>
                        <th style=" text-align: left;" width="30px">Kecamatan</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['kecamatan']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%"></th>
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
                <iframe src="<?= base_url('/data/sitkd/file/laporanpdf/' . $pdf) ?>" allowfullscreen></iframe>
            </div>
            <hr>
        </div>

        <div class="col">
            <div class="card">
                <div class="card-header">
                    <dl class="row">
                        <dt class="col">Review</dt>
                        <dd class="col text-right" style="<?php if ($statusuraian[13] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[13] == "revisi") : ?> color:red <?php else : ?> color:black <?php endif; ?>" class="text-right"><i><?= $statusuraian[13]; ?></i>
                        </dd>
                    </dl>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <div class="form-group">
                            <label for="nama">Pemeriksa</label>
                            <input type="hidden" readonly class="form-control" id="pemeriksa1" name="pemeriksa1" value="<?= $pemeriksa[0]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa2" name="pemeriksa2" value="<?= $pemeriksa[1]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa3" name="pemeriksa3" value="<?= $pemeriksa[2]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa4" name="pemeriksa4" value="<?= $pemeriksa[3]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa5" name="pemeriksa5" value="<?= $pemeriksa[4]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa6" name="pemeriksa6" value="<?= $pemeriksa[5]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa7" name="pemeriksa7" value="<?= $pemeriksa[6]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa8" name="pemeriksa8" value="<?= $pemeriksa[7]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa9" name="pemeriksa9" value="<?= $pemeriksa[8]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa10" name="pemeriksa10" value="<?= $pemeriksa[9]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa11" name="pemeriksa11" value="<?= $pemeriksa[10]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa12" name="pemeriksa12" value="<?= $pemeriksa[11]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa13" name="pemeriksa13" value="<?= $pemeriksa[12]; ?>">
                            <input type="text" readonly class="form-control" id="pemeriksa14" name="pemeriksa14" value="<?= $user['nama']; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa15" name="pemeriksa15" value="<?= $pemeriksa[14]; ?>">
                            <input type="hidden" readonly class="form-control" id="pemeriksa16" name="pemeriksa16" value="<?= $pemeriksa[15]; ?>">
                        </div>
                        <div class="form-group mb-5">
                            <label>Keterangan</label>
                            <div class="input-group input-group-sm">
                                <?php if ($dokumen['file14'] != null) : ?>
                                    <input type="text" readonly class="form-control text-center" id="keterangan14" name="keterangan14" placeholder="..." value="<?= set_value('keterangan14'); ?>">
                                    <input type="text" readonly class="form-control text-center" id="statusuraian14" name="statusuraian14" placeholder="..." value="<?= set_value('statusuraian14'); ?>">
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#KeteranganModal"><i class="fas fa-fw fa-caret-square-up text-white"></i></button>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <small class="form-text text-danger"><?= $validation->getError('keterangan14'); ?></small>
                            <input type="hidden" id="keterangan1" name="keterangan1" value="<?= $keteranganexp[0]; ?>">
                            <input type="hidden" id="keterangan2" name="keterangan2" value="<?= $keteranganexp[1]; ?>">
                            <input type="hidden" id="keterangan3" name="keterangan3" value="<?= $keteranganexp[2]; ?>">
                            <input type="hidden" id="keterangan4" name="keterangan4" value="<?= $keteranganexp[3]; ?>">
                            <input type="hidden" id="keterangan5" name="keterangan5" value="<?= $keteranganexp[4]; ?>">
                            <input type="hidden" id="keterangan6" name="keterangan6" value="<?= $keteranganexp[5]; ?>">
                            <input type="hidden" id="keterangan7" name="keterangan7" value="<?= $keteranganexp[6]; ?>">
                            <input type="hidden" id="keterangan8" name="keterangan8" value="<?= $keteranganexp[7]; ?>">
                            <input type="hidden" id="keterangan9" name="keterangan9" value="<?= $keteranganexp[8]; ?>">
                            <input type="hidden" id="keterangan10" name="keterangan10" value="<?= $keteranganexp[9]; ?>">
                            <input type="hidden" id="keterangan11" name="keterangan11" value="<?= $keteranganexp[10]; ?>">
                            <input type="hidden" id="keterangan12" name="keterangan12" value="<?= $keteranganexp[11]; ?>">
                            <input type="hidden" id="keterangan13" name="keterangan13" value="<?= $keteranganexp[12]; ?>">
                            <input type="hidden" id="keterangan15" name="keterangan15" value="<?= $keteranganexp[14]; ?>">
                            <input type="hidden" id="keterangan16" name="keterangan16" value="<?= $keteranganexp[15]; ?>">

                            <input type="hidden" id="statusuraian1" name="statusuraian1" value=<?= $statusuraian[0]; ?>>
                            <input type="hidden" id="statusuraian2" name="statusuraian2" value=<?= $statusuraian[1]; ?>>
                            <input type="hidden" id="statusuraian3" name="statusuraian3" value=<?= $statusuraian[2]; ?>>
                            <input type="hidden" id="statusuraian4" name="statusuraian4" value=<?= $statusuraian[3]; ?>>
                            <input type="hidden" id="statusuraian5" name="statusuraian5" value=<?= $statusuraian[4]; ?>>
                            <input type="hidden" id="statusuraian6" name="statusuraian6" value=<?= $statusuraian[5]; ?>>
                            <input type="hidden" id="statusuraian7" name="statusuraian7" value=<?= $statusuraian[6]; ?>>
                            <input type="hidden" id="statusuraian8" name="statusuraian8" value=<?= $statusuraian[7]; ?>>
                            <input type="hidden" id="statusuraian9" name="statusuraian9" value=<?= $statusuraian[8]; ?>>
                            <input type="hidden" id="statusuraian10" name="statusuraian10" value=<?= $statusuraian[9]; ?>>
                            <input type="hidden" id="statusuraian11" name="statusuraian11" value=<?= $statusuraian[10]; ?>>
                            <input type="hidden" id="statusuraian12" name="statusuraian12" value=<?= $statusuraian[11]; ?>>
                            <input type="hidden" id="statusuraian13" name="statusuraian13" value=<?= $statusuraian[12]; ?>>
                            <input type="hidden" id="statusuraian15" name="statusuraian15" value=<?= $statusuraian[14]; ?>>
                            <input type="hidden" id="statusuraian16" name="statusuraian16" value=<?= $statusuraian[15]; ?>>
                        </div>
                        <div class="form-group" <?php if ($catatan_member[13] == "") : ?> hidden <?php endif; ?>>
                            <label for="catatan">Catatan dari Kabupaten</label>
                            <textarea class="form-control" disabled name="catatan_member" id="catatan_member" style="font-style: italic;" rows="4"><?= $catatan_member[13]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="tanggal_review1" name="tanggal_review1" value=<?= $tanggal_review[0]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review2" name="tanggal_review2" value=<?= $tanggal_review[1]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review3" name="tanggal_review3" value=<?= $tanggal_review[2]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review4" name="tanggal_review4" value=<?= $tanggal_review[3]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review5" name="tanggal_review5" value=<?= $tanggal_review[4]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review6" name="tanggal_review6" value=<?= $tanggal_review[5]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review7" name="tanggal_review7" value=<?= $tanggal_review[6]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review8" name="tanggal_review8" value=<?= $tanggal_review[7]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review9" name="tanggal_review9" value=<?= $tanggal_review[8]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review10" name="tanggal_review10" value=<?= $tanggal_review[9]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review11" name="tanggal_review11" value=<?= $tanggal_review[10]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review12" name="tanggal_review12" value=<?= $tanggal_review[11]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review13" name="tanggal_review13" value=<?= $tanggal_review[12]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review14" name="tanggal_review14" value=<?= time(); ?>>
                            <input type="hidden" class="form-control" id="tanggal_review15" name="tanggal_review15" value=<?= $tanggal_review[14]; ?>>
                            <input type="hidden" class="form-control" id="tanggal_review16" name="tanggal_review16" value=<?= $tanggal_review[15]; ?>>
                            <input type="hidden" readonly name="file_id" class="form-control" id="file_id" value="<?= $dokumen['file_id']; ?>">
                            <small class="form-text text-danger"><?= $validation->getError('file_id'); ?></small>
                        </div>
                        <!-- Notifikasi -->
                        <div class="form-group">
                            <input type="hidden" readonly class="form-control-plaintext" name="targetnotif" id="targetnotif" value="<?= $dokumen['permendagri_id']; ?>">
                            <small class="form-text text-danger"><?= $validation->getError('targetnotif'); ?></small>
                            <input type="hidden" readonly class="form-control-plaintext" name="readnotif" id="readnotif" value="N">
                            <small class="form-text text-danger"><?= $validation->getError('readnotif'); ?></small>
                            <input type="hidden" readonly class="form-control-plaintext" name="tanggalnotif" id="tanggalnotif" value=<?= time() ?>>
                            <small class="form-text text-danger"><?= $validation->getError('tanggalnotif'); ?></small>
                            <input type="hidden" readonly class="form-control-plaintext" name="keterangannotif" id="keterangannotif" value="waiting">
                            <small class="form-text text-danger"><?= $validation->getError('keterangannotif'); ?></small>
                            <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Hasil verifikasi Persyaratan 14 baru!">
                            <small class="form-text text-danger"><?= $validation->getError('jenisnotif'); ?></small>
                            <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-exclamation-triangle text-white">
                            <small class="form-text text-danger"><?= $validation->getError('iconnotif'); ?></small>
                            <input type="hidden" readonly class="form-control-plaintext" name="permendagri_id" id="permendagri_id" value="<?= $user['permendagri_id']; ?>">
                            <small class="form-text text-danger"><?= $validation->getError('permendagri_id'); ?></small>
                        </div>
                        <?php if ($dokumen['file14'] != null) : ?>
                            <button type="submit" name="proses" class="btn btn-primary float-right mt-2">Save</button>
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal buat pilih keterangan dan statusuraian -->
<div class="modal fade" id="KeteranganModal" tabindex="-1" aria-labelledby="KeteranganModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KeteranganModalLabel"><strong>Keterangan berdasarkan hasil pemeriksaan</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover table-bordered table-sm" id="reviewfiles14">
                    <thead>
                        <th style="text-align: center;">KETERANGAN</th>
                        <th style="text-align: center;">STATUS URAIAN</th>
                    </thead>
                    <tbody>
                        <?php foreach ($rfiles as $rf) : ?>
                            <tr id="reviewers14" data-ket="<?= $rf['atrketerangan']; ?>" data-sta="<?= $rf['atrstatusuraian']; ?>">
                                <td align="center"><?= $rf['atrketerangan']; ?></td>
                                <td align="center"><?= $rf['atrstatusuraian']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
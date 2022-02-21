<div class="container-fluid table-responsive">
    <div class="row">
        <div class="col">
            <?php if ($dokumen['status_laporan'] == "sukses") : ?>
                <p style="color:#00cc00" class="text-right"><i><?= $dokumen['status_laporan']; ?></i>
                </p>
            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                <p style="color:#DAA520" class="text-right"><i><?= $dokumen['status_laporan']; ?></i>
                </p>
            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                <p style="color:#0000FF" class="text-right"><i><?= $dokumen['status_laporan']; ?></i>
                </p>
            <?php else : ?>
                <p style="<?php if ($keteranganstatus == "ready") : ?> color:#DAA520 <?php elseif ($keteranganstatus == "revisi") : ?> color:red <?php else : ?> color:black <?php endif; ?>" class="text-right"><i><?= $keteranganstatus; ?></i>
                </p>
            <?php endif; ?>
            <h5 class="text-center">VERIFIKASI DOKUMEN DAN TINJAUAN LAPANGAN</h5>
            <h5 class="text-center mb-4">TUKAR MENUKAR TANAH KAS DESA</h5>
            <table class="table table-borderless table-sm mt-3">
                <?php foreach ($geturaian as $gu) : ?>
                    <tbody>
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
                    </tbody>
                <?php endforeach; ?>
            </table>
            <div class="text-center">
                <a href="<?= base_url('sitkd/menu/tracking'); ?>/<?= $dokumen['file_id']; ?>" class="btn btn-dark col-lg-2 mb-3">Tracking</a>
            </div>
            <hr>

            <table class="table table-borderless table-sm mb-3">
                <tr>
                    <th>Kategori : <?= $dokumen['kategori']; ?></th>
                    <th style="text-align: right;">Sub Kategori : <?= $dokumen['subkategori']; ?></th>
                </tr>
            </table>

            <?= session()->getFlashdata('message'); ?>

            <table class="table table-hover table-sm mt-3">
                <thead>
                    <tr>
                        <th scope="col" width="4%">No</th>
                        <th scope="col" width="61%">URAIAN PERSYARATAN</th>
                        <th scope="col" width="80px">Sesuai</th>
                        <th scope="col" width="120px">Tidak sesuai</th>
                        <th scope="col" style="text-align: center;" width="120px">Status File</th>
                        <th scope="col" style="text-align: center;" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan1" id="keterangan1" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[0] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[0] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[0] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan1" id="keterangan1" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[0] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[0] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[0] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[0] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[0] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file1'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[0]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[0] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[0] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[0] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[0] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[0] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Ijin Bupati</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan2" id="keterangan2" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[1] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[1] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[1] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan2" id="keterangan2" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[1] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[1] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[1] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[1] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[1] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file2'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[1]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[1] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[1] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[1] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[1] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[1] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Peraturan Desa UGR Tahap I</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan3" id="keterangan3" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[2] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[2] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[2] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan3" id="keterangan3" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[2] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[2] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[2] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[2] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[2] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file3'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[2]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[2] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[2] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[2] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[2] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[2] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Rancangan Peraturan Desa Terbaru</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Persetujuan BPD</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan4" id="keterangan4" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[3] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[3] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[3] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan4" id="keterangan4" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[3] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[3] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[3] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[3] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[3] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file4'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[3]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[3] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[3] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[3] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[3] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[3] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan5" id="keterangan5" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[4] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[4] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[4] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan5" id="keterangan5" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[4] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[4] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[4] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[4] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[4] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file5'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[4]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[4] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[4] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[4] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[4] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[4] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Tanah Pengganti</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan6" id="keterangan6" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[5] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[5] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[5] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan6" id="keterangan6" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[5] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[5] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[5] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[5] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[5] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file6'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[5]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[5] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[5] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[5] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[5] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[5] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">7</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Hasil perhitungan Appraisal Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Hasil perhitungan Appraisal TKD</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Alas Hak Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan7" id="keterangan7" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[6] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[6] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[6] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan7" id="keterangan7" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[6] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[6] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[6] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[6] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[6] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file7'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[6]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[6] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[6] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[6] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[6] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[6] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">8</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">SK Tim Panitia Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                            <td style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan8" id="keterangan8" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[7] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[7] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[7] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan8" id="keterangan8" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[7] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[7] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[7] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[7] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[7] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file8'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[7]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[7] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[7] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[7] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[7] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[7] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php endif; ?>>
                        <th scope="row">9</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Hasil perhitungan Appraisal TKD</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Hasil perhitungan Appraisal TKD</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan9" id="keterangan9" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[8] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[8] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[8] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan9" id="keterangan9" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[8] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[8] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[8] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[8] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[8] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file9'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[8]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[8] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[8] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[8] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[8] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[8] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php endif; ?>>
                        <th scope="row">10</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Hasil perhitungan Appraisal Tanah Pengganti</td>
                        <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                            <td style="vertical-align: middle;">Berita Acara Tanah Pengganti di Luar Desa</td>
                        <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                            <td style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Hasil perhitungan Appraisal Tanah Pengganti</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan10" id="keterangan10" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[9] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[9] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[9] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan10" id="keterangan10" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[9] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[9] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[9] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[9] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[9] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file10'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[9]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[9] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[9] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[9] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[9] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[9] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                        <th scope="row">11</th>
                        <td style="vertical-align: middle;">SK Tim Panitia Desa</td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan11" id="keterangan11" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[10] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[10] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[10] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan11" id="keterangan11" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[10] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[10] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[10] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[10] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[10] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file11'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[10]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[10] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[10] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[10] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[10] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[10] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                        <th scope="row">12</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa Kepada Bupati</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">SK Tim kajian Kabupaten</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan12" id="keterangan12" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[11] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[11] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[11] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan12" id="keterangan12" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[11] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[11] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[11] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[11] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[11] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file12'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[11]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[11] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[11] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[11] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[11] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[11] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                        <th scope="row">13</th>
                        <?php if ($dokumen['subkategori'] == "Umum") : ?>
                            <td style="vertical-align: middle;">Dokumen Pendukung Lainnya</td>
                        <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                            <td style="vertical-align: middle;">Kesesuaian RTRW</td>
                        <?php endif; ?>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan13" id="keterangan13" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[12] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[12] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[12] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan13" id="keterangan13" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[12] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[12] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[12] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[12] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[12] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file13'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[12]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[12] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[12] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[12] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[12] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[12] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Umum") : ?> hidden <?php endif; ?>>
                        <th scope="row">14</th>
                        <td style="vertical-align: middle;">Ijin Bupati</td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan14" id="keterangan14" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[13] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[13] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[13] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan14" id="keterangan14" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[13] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[13] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[13] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[13] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[13] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file14'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[13]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[13] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[13] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[13] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[13] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[13] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Umum") : ?> hidden <?php endif; ?>>
                        <th scope="row">15</th>
                        <td style="vertical-align: middle;">Kajian Tim Kabupaten</td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan15" id="keterangan15" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[14] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[14] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[14] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan15" id="keterangan15" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[14] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[14] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[14] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[14] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[14] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file15'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[14]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[14] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[14] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[14] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[14] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[14] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Umum") : ?> hidden <?php endif; ?>>
                        <th scope="row">16</th>
                        <td style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan16" id="keterangan16" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[15] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[15] == "tidak sesuai") : ?> disabled <?php elseif ($keteranganexp[15] == "") : ?> disabled <?php endif; ?> value="sesuai">
                        </td>
                        <td align="center">
                            <input class="form-check-input" type="radio" name="keterangan16" id="keterangan16" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[15] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[15] == "sesuai") : ?> disabled <?php elseif ($keteranganexp[15] == "") : ?> disabled <?php endif; ?> value="tidak sesuai">
                        </td>
                        <td align="center" style="<?php if ($statusuraian[15] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[15] == "revisi") : ?><?php else : ?>color:red<?php endif; ?>">
                            <?php if ($dokumen['file16'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[15]; ?> <?php endif; ?>
                        </td>
                        <td align="center">
                            <?php if ($keteranganexp[15] == "") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($keteranganexp[15] == "tidak sesuai") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php elseif ($statusuraian[15] == "sukses") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[15] == "pending") : ?>
                                <a href="<?= base_url('sitkd/menu/reviewfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-warning">verifikasi</a>
                            <?php elseif ($statusuraian[15] == "revisi") : ?>
                                <a href="<?= base_url('sitkd/menu/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> class="badge badge-primary">detail</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-borderless table-sm mt-5 mb-5">
                <tbody>
                    <td>
                        <form action="" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <div class="form-group">
                                <!-- input post tabel notifikasi -->
                                <input type="hidden" readonly class="form-control-plaintext" name="permendagri_id" id="permendagri_id" value="<?= $user['permendagri_id']; ?>">
                                <input type="hidden" readonly class="form-control-plaintext" name="targetnotif" id="targetnotif" value="<?= $dokumen['permendagri_id']; ?>">
                                <input type="hidden" readonly class="form-control-plaintext" name="readnotif" id="readnotif" value="N">
                                <input type="hidden" readonly class="form-control-plaintext" name="tanggalnotif" id="tanggalnotif" value=<?= time() ?>>
                                <input type="hidden" readonly class="form-control-plaintext" name="keterangannotif" id="keterangannotif" value="waiting">
                                <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Catatan dokumen baru!">
                                <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-file-signature text-white">
                                <!-- end notif form -->
                                <input type="hidden" name="status_laporan" id="status_laporan" value="pending">
                                <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                                <label for="catatanverifikator">Catatan dari PEMPROV</label>
                                <?php if ($keteranganstatus == "ready") : ?>
                                    <button type="submit" name="submit" hidden class="badge badge-primary float-right">Save</button>
                                    <textarea class="form-control mb-2" readonly name="catatanverifikator" id="catatanverifikator" rows="10"><?= $dokumen['catatan_verifikator']; ?></textarea>
                                <?php else : ?>
                                    <button type="submit" name="submit" class="badge badge-primary float-right">Save</button>
                                    <textarea class="form-control mb-2" name="catatanverifikator" id="catatanverifikator" rows="10"><?= $dokumen['catatan_verifikator']; ?></textarea>
                                <?php endif; ?>
                            </div>
                        </form>
                        <?php if ($dokumen['status_laporan'] == "sukses") : ?>
                            <strong>Mengetahui Petugas Pengelolaan Aset Desa PROV JATENG : </strong>
                            <a href="#"><?= $dokumen['verifikator']; ?></a>
                        <?php endif; ?>
                    </td>
                </tbody>
            </table>
            <div>
                <dl class="row">
                    <dd class="col text-center">
                        <form action="" method="POST">
                            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                            <!-- input post tabel notifikasi -->
                            <input type="hidden" readonly class="form-control-plaintext" name="permendagri_id" id="permendagri_id" value="<?= $user['permendagri_id']; ?>">
                            <input type="hidden" readonly class="form-control-plaintext" name="targetnotif" id="targetnotif" value="<?= $dokumen['permendagri_id']; ?>">
                            <input type="hidden" readonly class="form-control-plaintext" name="readnotif" id="readnotif" value="N">
                            <input type="hidden" readonly class="form-control-plaintext" name="tanggalnotif" id="tanggalnotif" value=<?= time() ?>>
                            <input type="hidden" readonly class="form-control-plaintext" name="keterangannotif" id="keterangannotif" value="waiting">
                            <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Perubahan status dokumen!">
                            <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-file-signature text-white">
                            <!-- end notif form -->
                            <input type="hidden" name="status_laporan" id="status_laporan" value="review">
                            <input type="hidden" name="penanggungjawab" id="penanggungjawab" value="<?= $user['nama']; ?>">
                            <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                            <textarea class="form-control mb-2" hidden name="catatanverifikator" id="catatanverifikator" rows="10"><?= $dokumen['catatan_verifikator']; ?></textarea>
                            <?php if ($dokumen['tanggalmulaireview'] != null) : ?>
                                <input type="hidden" name="tanggalmulaireview" id="tanggalmulaireview" value=<?= $dokumen['tanggalmulaireview']; ?>>
                            <?php else : ?>
                                <input type="hidden" name="tanggalmulaireview" id="tanggalmulaireview" value=<?= time(); ?>>
                            <?php endif; ?>
                            <?php if ($dokumen['status_laporan'] == "review") : ?>
                                <button type="submit" name="submit" disabled class="btn btn-warning mb-5 col-lg-2">Review</button>
                            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                                <button type="submit" name="submit" disabled class="btn btn-warning mb-5 col-lg-2">Review</button>
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <button type="submit" name="submit" disabled class="btn btn-warning mb-5 col-lg-2">Review</button>
                            <?php elseif ($keteranganstatus == "revisi") : ?>
                                <button type="submit" name="submit" disabled hidden class="btn btn-warning mb-5 col-lg-2">Review</button>
                            <?php elseif ($keteranganstatus == "pending") : ?>
                                <button type="submit" name="submit" disabled hidden class="btn btn-warning mb-5 col-lg-2">Review</button>
                            <?php elseif ($keteranganstatus == "ready") : ?>
                                <button type="submit" name="submit" class="btn btn-warning mb-5 col-lg-2">Review</button>
                            <?php endif; ?>
                        </form>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
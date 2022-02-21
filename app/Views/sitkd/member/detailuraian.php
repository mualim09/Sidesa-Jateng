<div class="container-fluid table-responsive">

    <div class="row">
        <div class="col">
            <p style="<?php if ($dokumen['status_laporan'] == "sukses") : ?> color:#00cc00 <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?> color:#0000FF <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?> color:#7d32a8 <?php elseif ($dokumen['status_laporan'] == "review") : ?> color:#DAA520 <?php else : ?> color:black <?php endif; ?>" class="text-right"><i><?= $dokumen['status_laporan']; ?></i>
            </p>
            <h5 class="text-center">VERIFIKASI DOKUMEN DAN TINJAUAN LAPANGAN</h5>
            <h5 class="text-center mb-4">TUKAR MENUKAR TANAH KAS DESA</h5>

            <table class="table table-borderless table-sm mt-3">
                <?php foreach ($geturaian as $gu) : ?>
                    <tbody>
                        <tr>
                            <td width="150px">Desa</td>
                            <td width="10px">:</td>
                            <td><?= $dokumen['desa']; ?></td>
                            <td align="right">Dibuat pada tanggal <?= date("d/m/Y", $dokumen['tanggal']); ?></td>
                        </tr>
                        <tr>
                            <td width="150px">Kecamatan</td>
                            <td width="10px">:</td>
                            <td><?= $dokumen['kecamatan']; ?></td>
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
                <a href="<?= base_url('sitkd/member/tracking'); ?>/<?= $dokumen['file_id']; ?>" class="btn btn-dark col-lg-2 mb-3">tracking</a>
            </div>
            <hr>

            <table class="table table-borderless table-sm mb-3">
                <tr>
                    <th><i>Kategori : <?= $dokumen['kategori']; ?></i></th>
                    <th style="text-align: right;"><i>Sub Kategori : <?= $dokumen['subkategori']; ?></i></th>
                </tr>
            </table>

            <?= session()->getFlashdata('message'); ?>

            <form action="" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <table class="table table-hover table-sm mt-3">
                    <thead>
                        <tr>
                            <th scope="col" width="4%">No</th>
                            <th scope="col" width="30%">URAIAN PERSYARATAN</th>
                            <th></th>
                            <th scope="col" style="text-align: left;" width="350px">Keterangan</th>
                            <th scope="col" style="text-align: left;" width="80px">Sesuai</th>
                            <th scope="col" style="text-align: left;" width="120px">Tidak sesuai</th>
                            <th scope="col" style="text-align: center;" width="120px">Status File</th>
                            <th scope="col" style="text-align: center;" scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="1">
                            <th scope="row" style="vertical-align: middle;">1</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan TMTKD dari Instansi pemohon</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file1'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update1"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file1'] == null && $keteranganfile[0] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update1"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update1" data-keteranganfile1="<?= "" . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file1'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile1" name="keteranganfile1" <?php if ($keteranganfile[0] != "") : ?> readonly value="<?= $keteranganfile[0]; ?>" <?php else : ?> value="<?= old('keteranganfile1'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile1'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan1'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile1" name="tanggalketeranganfile1" <?php if ($keteranganfile[0] != "" && $tanggalketeranganfile[0] != "") : ?> value="<?= $tanggalketeranganfile[0]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan1" id="keterangan1" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[0] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[0] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan1" id="keterangan1" <?php if ($dokumen['file1'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[0] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[0] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[0] == "-") : ?>
                                <input type="hidden" name="keterangan1" id="keterangan1" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[0] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[0] == "revisi") : ?> color:red <?php endif; ?>">
                                <?php if ($dokumen['file1'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[0]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file1'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile1'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[0] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[0] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile1'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[0] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile1'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[0] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile1'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="2">
                            <th scope="row" style="vertical-align: middle;">2</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Ijin Bupati</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file2'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update2"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file2'] == null && $keteranganfile[1] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update2"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update2" data-keteranganfile2="<?= $keteranganfile[0] . "^" . "" . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file2'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile2" name="keteranganfile2" <?php if ($keteranganfile[1] != "") : ?> readonly value="<?= $keteranganfile[1]; ?>" <?php else : ?> value="<?= old('keteranganfile2'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile2'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan2'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile2" name="tanggalketeranganfile2" <?php if ($keteranganfile[1] != "" && $tanggalketeranganfile[1] != "") : ?> value="<?= $tanggalketeranganfile[1]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan2" id="keterangan2" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[1] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[1] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan2" id="keterangan2" <?php if ($dokumen['file2'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[1] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[1] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[1] == "-") : ?>
                                <input type="hidden" name="keterangan2" id="keterangan2" value="-">
                            <?php endif; ?>
                            <!-- NILAI DEFAULT KETERANGAN 2 "-" -->
                            <td align="center" style="<?php if ($statusuraian[1] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[1] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file2'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[1]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file2'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile2'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[1] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[1] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile2'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[1] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile2'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[1] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile2'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="3">
                            <th scope="row" style="vertical-align: middle;">3</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Peraturan Desa UGR Tahap I</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Musyawarah Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Persetujuan BPD</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file3'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update3"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file3'] == null && $keteranganfile[2] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update3"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update3" data-keteranganfile3="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . "" . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file3'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile3" name="keteranganfile3" <?php if ($keteranganfile[2] != "") : ?> readonly value="<?= $keteranganfile[2]; ?>" <?php else : ?> value="<?= old('keteranganfile3'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile3'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan3'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile3" name="tanggalketeranganfile3" <?php if ($keteranganfile[2] != "" && $tanggalketeranganfile[2] != "") : ?> value="<?= $tanggalketeranganfile[2]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan3" id="keterangan3" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[2] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[2] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan3" id="keterangan3" <?php if ($dokumen['file3'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[2] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[2] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[2] == "-") : ?>
                                <input type="hidden" name="keterangan3" id="keterangan3" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[2] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[2] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file3'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[2]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file3'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile3'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[2] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[2] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile3'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[2] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile3'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[2] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile3'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="4">
                            <th scope="row" style="vertical-align: middle;">4</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Rancangan Peraturan Desa Terbaru</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Persetujuan BPD</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file4'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update4"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file4'] == null && $keteranganfile[3] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update4"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update4" data-keteranganfile4="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . "" . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file4'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile4" name="keteranganfile4" <?php if ($keteranganfile[3] != "") : ?> readonly value="<?= $keteranganfile[3]; ?>" <?php else : ?> value="<?= old('keteranganfile4'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile4'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan4'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile4" name="tanggalketeranganfile4" <?php if ($keteranganfile[3] != "" && $tanggalketeranganfile[3] != "") : ?> value="<?= $tanggalketeranganfile[3]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan4" id="keterangan4" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[3] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[3] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan4" id="keterangan4" <?php if ($dokumen['file4'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[3] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[3] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[3] == "-") : ?>
                                <input type="hidden" name="keterangan4" id="keterangan4" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[3] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[3] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file4'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[3]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file4'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile4'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[3] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[3] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile4'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[3] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile4'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[3] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile4'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="5">
                            <th scope="row" style="vertical-align: middle;">5</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Rancangan Peraturan Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file5'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update5"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file5'] == null && $keteranganfile[4] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update5"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update5" data-keteranganfile5="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . "" . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file5'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile5" name="keteranganfile5" <?php if ($keteranganfile[4] != "") : ?> readonly value="<?= $keteranganfile[4]; ?>" <?php else : ?> value="<?= old('keteranganfile5'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile5'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan5'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile5" name="tanggalketeranganfile5" <?php if ($keteranganfile[4] != "" && $tanggalketeranganfile[4] != "") : ?> value="<?= $tanggalketeranganfile[4]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan5" id="keterangan5" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[4] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[4] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan5" id="keterangan5" <?php if ($dokumen['file5'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[4] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[4] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[4] == "-") : ?>
                                <input type="hidden" name="keterangan5" id="keterangan5" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[4] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[4] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file5'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[4]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file5'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile5'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[4] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[4] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile5'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[4] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile5'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[4] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile5'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="6">
                            <th scope="row" style="vertical-align: middle;">6</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Kas Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Tanah Pengganti</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file6'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update6"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file6'] == null && $keteranganfile[5] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update6"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update6" data-keteranganfile6="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . "" . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file6'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile6" name="keteranganfile6" <?php if ($keteranganfile[5] != "") : ?> readonly value="<?= $keteranganfile[5]; ?>" <?php else : ?> value="<?= old('keteranganfile6'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile6'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan6'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile6" name="tanggalketeranganfile6" <?php if ($keteranganfile[5] != "" && $tanggalketeranganfile[5] != "") : ?> value="<?= $tanggalketeranganfile[5]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan6" id="keterangan6" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[5] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[5] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan6" id="keterangan6" <?php if ($dokumen['file6'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[5] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[5] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[5] == "-") : ?>
                                <input type="hidden" name="keterangan6" id="keterangan6" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[5] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[5] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file6'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[5]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file6'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile6'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[5] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[5] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile6'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[5] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile6'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[5] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile6'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="7">
                            <th scope="row" style="vertical-align: middle;">7</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Hasil perhitungan Appraisal Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Hasil perhitungan Appraisal TKD</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Alas Hak Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file7'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update7"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file7'] == null && $keteranganfile[6] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update7"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update7" data-keteranganfile7="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . "" . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file7'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile7" name="keteranganfile7" <?php if ($keteranganfile[6] != "") : ?> readonly value="<?= $keteranganfile[6]; ?>" <?php else : ?> value="<?= old('keteranganfile7'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile7'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan7'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile7" name="tanggalketeranganfile7" <?php if ($keteranganfile[6] != "" && $tanggalketeranganfile[6] != "") : ?> value="<?= $tanggalketeranganfile[6]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan7" id="keterangan7" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[6] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[6] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan7" id="keterangan7" <?php if ($dokumen['file7'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[6] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[6] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[6] == "-") : ?>
                                <input type="hidden" name="keterangan7" id="keterangan7" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[6] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[6] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file7'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[6]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file7'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile7'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[6] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[6] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile7'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[6] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile7'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[6] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile7'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="8">
                            <th scope="row" style="vertical-align: middle;">8</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">SK Tim Panitia Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Kas Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file8'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update8"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file8'] == null && $keteranganfile[7] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update8"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update8" data-keteranganfile8="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . "" . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file8'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile8" name="keteranganfile8" <?php if ($keteranganfile[7] != "") : ?> readonly value="<?= $keteranganfile[7]; ?>" <?php else : ?> value="<?= old('keteranganfile8'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile8'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan8'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile8" name="tanggalketeranganfile8" <?php if ($keteranganfile[7] != "" && $tanggalketeranganfile[7] != "") : ?> value="<?= $tanggalketeranganfile[7]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan8" id="keterangan8" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[7] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[7] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan8" id="keterangan8" <?php if ($dokumen['file8'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[7] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[7] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[7] == "-") : ?>
                                <input type="hidden" name="keterangan8" id="keterangan8" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[7] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[7] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file8'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[7]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file8'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile8'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[7] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[7] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile8'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[7] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile8'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[7] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile8'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="9" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">9</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Hasil perhitungan Appraisal TKD</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Ukur Peta Bidang Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Hasil perhitungan Appraisal TKD</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file9'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update9"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file9'] == null && $keteranganfile[8] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update9"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update9" data-keteranganfile9="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . "" . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file9'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile9" name="keteranganfile9" <?php if ($keteranganfile[8] != "") : ?> readonly value="<?= $keteranganfile[8]; ?>" <?php else : ?> value="<?= old('keteranganfile9'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile9'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan9'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile9" name="tanggalketeranganfile9" <?php if ($keteranganfile[8] != "" && $tanggalketeranganfile[8] != "") : ?> value="<?= $tanggalketeranganfile[8]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan9" id="keterangan9" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[8] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[8] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan9" id="keterangan9" <?php if ($dokumen['file9'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[8] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[8] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[8] == "-") : ?>
                                <input type="hidden" name="keterangan9" id="keterangan9" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[8] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[8] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file9'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[8]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file9'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile9'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[8] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[8] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile9'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[8] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile9'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[8] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile9'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="10" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">10</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Hasil perhitungan Appraisal Tanah Pengganti</td>
                            <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                <td class="small" style="vertical-align: middle;">Berita Acara Tanah Pengganti di Luar Desa</td>
                            <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Hasil perhitungan Appraisal Tanah Pengganti</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file10'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update10"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file10'] == null && $keteranganfile[9] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update10"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update10" data-keteranganfile10="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . "" . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file10'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile10" name="keteranganfile10" <?php if ($keteranganfile[9] != "") : ?> readonly value="<?= $keteranganfile[9]; ?>" <?php else : ?> value="<?= old('keteranganfile10'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile10'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan10'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile10" name="tanggalketeranganfile10" <?php if ($keteranganfile[9] != "" && $tanggalketeranganfile[9] != "") : ?> value="<?= $tanggalketeranganfile[9]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan10" id="keterangan10" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[9] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[9] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan10" id="keterangan10" <?php if ($dokumen['file10'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[9] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[9] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[9] == "-") : ?>
                                <input type="hidden" name="keterangan10" id="keterangan10" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[9] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[9] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file10'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[9]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file10'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile10'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[9] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[9] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile10'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[9] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile10'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[9] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile10'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="11" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">11</th>
                            <td class="small" style="vertical-align: middle;">SK Tim Panitia Desa</td>
                            <td align="center">
                                <?php if ($dokumen['file11'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update11"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file11'] == null && $keteranganfile[10] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update11"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update11" data-keteranganfile11="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . "" . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file11'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile11" name="keteranganfile11" <?php if ($keteranganfile[10] != "") : ?> readonly value="<?= $keteranganfile[10]; ?>" <?php else : ?> value="<?= old('keteranganfile11'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile11'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan11'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile11" name="tanggalketeranganfile11" <?php if ($keteranganfile[10] != "" && $tanggalketeranganfile[10] != "") : ?> value="<?= $tanggalketeranganfile[10]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan11" id="keterangan11" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[10] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[10] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan11" id="keterangan11" <?php if ($dokumen['file11'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[10] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[10] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[10] == "-") : ?>
                                <input type="hidden" name="keterangan11" id="keterangan11" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[10] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[10] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file11'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[10]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file11'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile11'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[10] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[10] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile11'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[10] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile11'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[10] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile11'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="12" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">12</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa Kepada Bupati</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">SK Tim kajian Kabupaten</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file12'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update12"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file12'] == null && $keteranganfile[11] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update12"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update12" data-keteranganfile12="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . "" . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file12'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile12" name="keteranganfile12" <?php if ($keteranganfile[11] != "") : ?> readonly value="<?= $keteranganfile[11]; ?>" <?php else : ?> value="<?= old('keteranganfile12'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile12'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan12'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile12" name="tanggalketeranganfile12" <?php if ($keteranganfile[11] != "" && $tanggalketeranganfile[11] != "") : ?> value="<?= $tanggalketeranganfile[11]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan12" id="keterangan12" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[11] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[11] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan12" id="keterangan12" <?php if ($dokumen['file12'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[11] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[11] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[11] == "-") : ?>
                                <input type="hidden" name="keterangan12" id="keterangan12" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[11] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[11] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file12'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[11]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file12'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile12'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[11] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[11] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile12'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[11] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile12'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[11] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile12'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="13" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">13</th>
                            <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                <td class="small" style="vertical-align: middle;">Dokumen Pendukung Lainnya</td>
                            <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                <td class="small" style="vertical-align: middle;">Kesesuaian RTRW</td>
                            <?php endif; ?>
                            <td align="center">
                                <?php if ($dokumen['file13'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update13"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file13'] == null && $keteranganfile[12] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update13"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update13" data-keteranganfile13="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . "" . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file13'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile13" name="keteranganfile13" <?php if ($keteranganfile[12] != "") : ?> readonly value="<?= $keteranganfile[12]; ?>" <?php else : ?> value="<?= old('keteranganfile13'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile13'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan13'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile13" name="tanggalketeranganfile13" <?php if ($keteranganfile[12] != "" && $tanggalketeranganfile[12] != "") : ?> value="<?= $tanggalketeranganfile[12]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan13" id="keterangan13" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[12] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[12] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan13" id="keterangan13" <?php if ($dokumen['file13'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[12] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[12] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[12] == "-") : ?>
                                <input type="hidden" name="keterangan13" id="keterangan13" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[12] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[12] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file13'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[12]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file13'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile13'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[12] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[12] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile13'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[12] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile13'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[12] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile13'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="14" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Umum") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">14</th>
                            <td class="small" style="vertical-align: middle;">Ijin Bupati</td>
                            <td align="center">
                                <?php if ($dokumen['file14'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update14"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file14'] == null && $keteranganfile[13] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update14"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update14" data-keteranganfile14="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . "" . "^" . $keteranganfile[14] . "^" . $keteranganfile[15]; ?>; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file14'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile14" name="keteranganfile14" <?php if ($keteranganfile[13] != "") : ?> readonly value="<?= $keteranganfile[13]; ?>" <?php else : ?> value="<?= old('keteranganfile14'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile14'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan14'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile14" name="tanggalketeranganfile14" <?php if ($keteranganfile[13] != "" && $tanggalketeranganfile[13] != "") : ?> value="<?= $tanggalketeranganfile[13]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan14" id="keterangan14" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[13] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[13] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan14" id="keterangan14" <?php if ($dokumen['file14'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[13] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[13] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[13] == "-") : ?>
                                <input type="hidden" name="keterangan14" id="keterangan14" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[13] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[13] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file14'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[13]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file14'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile14'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[13] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[13] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile14'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[13] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile14'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[13] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile14'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="15" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Umum") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">15</th>
                            <td class="small" style="vertical-align: middle;">Kajian Tim Kabupaten</td>
                            <td align="center">
                                <?php if ($dokumen['file15'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update15"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file15'] == null && $keteranganfile[14] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update15"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update15" data-keteranganfile15="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . "" . "^" . $keteranganfile[15]; ?>; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file15'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile15" name="keteranganfile15" <?php if ($keteranganfile[14] != "") : ?> readonly value="<?= $keteranganfile[14]; ?>" <?php else : ?> value="<?= old('keteranganfile15'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile15'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan15'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile15" name="tanggalketeranganfile15" <?php if ($keteranganfile[14] != "" && $tanggalketeranganfile[14] != "") : ?> value="<?= $tanggalketeranganfile[14]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan15" id="keterangan15" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[14] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[14] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan15" id="keterangan15" <?php if ($dokumen['file15'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[14] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[14] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[14] == "-") : ?>
                                <input type="hidden" name="keterangan15" id="keterangan15" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[14] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[14] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file15'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[14]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file15'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile15'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[14] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[14] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile15'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[14] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile15'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[14] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile15'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr class="16" <?php if ($dokumen['subkategori'] == "Ganti rugi uang") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?> hidden <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?> hidden <?php elseif ($dokumen['subkategori'] == "Umum") : ?> hidden <?php endif; ?>>
                            <th scope="row" style="vertical-align: middle;">16</th>
                            <td class="small" style="vertical-align: middle;">Permohonan tukar menukar Kepala Desa kepada Bupati</td>
                            <td align="center">
                                <?php if ($dokumen['file16'] != null) : ?>
                                    <button type="submit" hidden class="btn btn-info btn-sm" id="update16"><i class="fas fa-edit"></i></button>
                                <?php elseif ($dokumen['file16'] == null && $keteranganfile[15] == "") : ?>
                                    <button type="submit" disabled class="btn btn-info btn-sm" id="update16"><i class="fas fa-edit"></i></button>
                                <?php else : ?>
                                    <a type="submit" class="btn btn-info btn-sm" id="update16" data-keteranganfile16="<?= $keteranganfile[0] . "^" . $keteranganfile[1] . "^" . $keteranganfile[2] . "^" . $keteranganfile[3] . "^" . $keteranganfile[4] . "^" . $keteranganfile[5] . "^" . $keteranganfile[6] . "^" . $keteranganfile[7] . "^" . $keteranganfile[8] . "^" . $keteranganfile[9] . "^" . $keteranganfile[10] . "^" . $keteranganfile[11] . "^" . $keteranganfile[12] . "^" . $keteranganfile[13] . "^" . $keteranganfile[14] . "^" . ""; ?>" data-fileid="<?= $dokumen['file_id']; ?>"><i class="fas fa-edit"></i></a>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="input-group input-group-sm small" <?php if ($dokumen['file16'] != null) : ?> hidden <?php endif; ?>>
                                    <input class="form-control" type="text" id="keteranganfile16" name="keteranganfile16" <?php if ($keteranganfile[15] != "") : ?> readonly value="<?= $keteranganfile[15]; ?>" <?php else : ?> value="<?= old('keteranganfile16'); ?>" <?php endif; ?>>
                                </div>
                                <small class="form-text text-danger"><?= $validation->getError('keteranganfile16'); ?></small>
                                <small class="form-text text-danger text-right"><?= $validation->getError('keterangan16'); ?></small>
                                <div class="input-group input-group-sm small" hidden>
                                    <input class="form-control" type="text" id="tanggalketeranganfile16" name="tanggalketeranganfile16" <?php if ($keteranganfile[15] != "" && $tanggalketeranganfile[15] != "") : ?> value="<?= $tanggalketeranganfile[15]; ?>" <?php else : ?> value="<?= time(); ?>" <?php endif; ?>>
                                </div>
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan16" id="keterangan16" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[15] == "sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[15] == "tidak sesuai") : ?> disabled <?php endif; ?> value="sesuai">
                            </td>
                            <td align="center">
                                <input class="form-check-input" type="radio" name="keterangan16" id="keterangan16" <?php if ($dokumen['file16'] == null) : ?> hidden <?php endif; ?> <?php if ($keteranganexp[15] == "tidak sesuai") : ?> checked="checked" <?php elseif ($keteranganexp[15] == "sesuai") : ?> disabled <?php endif; ?> value="tidak sesuai">
                            </td>
                            <?php if ($keteranganexp[15] == "-") : ?>
                                <input type="hidden" name="keterangan16" id="keterangan16" value="-">
                            <?php endif; ?>
                            <td align="center" style="<?php if ($statusuraian[15] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[15] == "revisi") : ?>color:red<?php else : ?><?php endif; ?>">
                                <?php if ($dokumen['file16'] == null) : ?> <?= ""; ?> <?php else : ?> <?= $statusuraian[15]; ?> <?php endif; ?>
                            </td>
                            <td align="center" style="vertical-align: middle;">
                                <?php if ($dokumen['file16'] == null) : ?>
                                    <a href="<?= base_url('sitkd/member/uploadfile16'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-warning">Upload</a>
                                <?php elseif ($statusuraian[15] == "sukses") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($keteranganexp[15] == "tidak sesuai") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile16'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
                                <?php elseif ($statusuraian[15] == "pending") : ?>
                                    <a href="<?= base_url('sitkd/member/detailfile16'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-primary">detail</a>
                                <?php elseif ($statusuraian[15] == "revisi") : ?>
                                    <a href="<?= base_url('sitkd/member/revisifile16'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-danger">revisi</a>
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
                            <td></td>
                            <td></td>
                        </tr>
                        <tr <?php if ($dokumen['status_laporan'] != "sukses") : ?> hidden <?php endif; ?>>
                            <td>*</td>
                            <td>Dokumen persetujuan</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td align="center" style="<?php if ($dokumen['upload_persetujuan'] == null) : ?> color:red <?php elseif ($dokumen['upload_persetujuan'] != null) : ?> color:#00cc00 <?php endif; ?>">
                                <?php if ($dokumen['upload_persetujuan'] == null) : ?> <?= "Kosong"; ?> <?php else : ?> <?= "Ada"; ?> <?php endif; ?>
                            </td>
                            <td align="center">
                                <?php if ($dokumen['upload_persetujuan'] != null) : ?>
                                    <a href="<?= base_url('sitkd/member/viewpersetujuan'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-success">View</a>
                                <?php endif; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table <?php if ($dokumen['status_laporan'] == "sukses") : ?> hidden <?php endif; ?> class="table table-borderless table-sm mt-5 mb-5">
                    <tbody>
                        <td width="500px">
                            <label for="catatanverifikator">Catatan dari PEMPROV</label>
                            <textarea class="form-control mb-2" readonly name="catatanverifikator" id="catatanverifikator" style="font-style: italic; color:crimson; font-weight:bold;" rows="10"><?= $dokumen['catatan_verifikator']; ?></textarea>
                            <?php if ($dokumen['status_laporan'] == "sukses") : ?>
                                <strong>Mengetahui Petugas Pengelolaan Aset Desa PROV JATENG : </strong>
                                <a href="#"><?= $dokumen['verifikator']; ?></a>
                            <?php endif; ?>
                        </td>
                    </tbody>
                </table>
                <div <?php if ($dokumen['status_laporan'] == "sukses") : ?> hidden <?php endif; ?> class="text-center">
                    <?php if ($dokumen['status_laporan'] == "pending" && $keteranganfile[0] == "" && $dokumen['file1'] == null && $statusuraian[0] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[0] == "" && $statusuraian[0] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[1] == "" && $dokumen['file2'] == null && $statusuraian[1] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[1] == "" && $statusuraian[1] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[2] == "" && $dokumen['file3'] == null && $statusuraian[2] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[2] == "" && $statusuraian[2] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[3] == "" && $dokumen['file4'] == null && $statusuraian[3] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[3] == "" && $statusuraian[3] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[4] == "" && $dokumen['file5'] == null && $statusuraian[4] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[4] == "" && $statusuraian[4] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[5] == "" && $dokumen['file6'] == null && $statusuraian[5] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[5] == "" && $statusuraian[5] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[6] == "" && $dokumen['file7'] == null && $statusuraian[6] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[6] == "" && $statusuraian[6] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[7] == "" && $dokumen['file8'] == null && $statusuraian[7] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[7] == "" && $statusuraian[7] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[8] == "" && $dokumen['file9'] == null && $statusuraian[8] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[8] == "" && $statusuraian[8] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[9] == "" && $dokumen['file10'] == null && $statusuraian[9] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[9] == "" && $statusuraian[9] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[10] == "" && $dokumen['file11'] == null && $statusuraian[10] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[10] == "" && $statusuraian[10] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[11] == "" && $dokumen['file12'] == null && $statusuraian[11] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[11] == "" && $statusuraian[11] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[12] == "" && $dokumen['file13'] == null && $statusuraian[12] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[12] == "" && $statusuraian[12] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[13] == "" && $dokumen['file14'] == null && $statusuraian[13] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[13] == "" && $statusuraian[13] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[14] == "" && $dokumen['file15'] == null && $statusuraian[14] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[14] == "" && $statusuraian[14] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganfile[15] == "" && $dokumen['file16'] == null && $statusuraian[15] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php elseif ($dokumen['status_laporan'] == "pending" && $keteranganexp[15] == "" && $statusuraian[15] != "sukses") : ?>
                        <input type="hidden" name="file_id" id="file_id" value="<?= $dokumen['file_id']; ?>">
                        <button type="submit" name="submit" class="btn btn-primary mb-5 col-lg-2">Save</button>
                    <?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
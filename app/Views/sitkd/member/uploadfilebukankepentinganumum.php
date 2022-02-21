<div class="container-fluid table-responsive">

    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <div class="row">
            <div class="col">
                <h5 class="text-center">VERIFIKASI DOKUMEN DAN TINJAUAN LAPANGAN</h5>
                <h5 class="text-center mb-4">TUKAR MENUKAR TANAH KAS DESA</h5>
                <table class="table table-borderless table-sm mt-3">
                    <tbody>
                        <tr>
                            <td width="12%">Kecamatan</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="kecamatan" name="kecamatan" value="<?= set_value('kecamatan'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('kecamatan'); ?></small>
                            </td>
                            <td></td>
                            <td align="right">Dibuat pada tanggal <?= date("d/m/Y"); ?></td>
                        </tr>
                        <tr>
                            <td width="12%">Desa</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="desa" name="desa" value="<?= set_value('desa'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('desa'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td width="12%">Peruntukan</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="nama_trans" name="nama_trans" value="<?= set_value('nama_trans'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('nama_trans'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <td width="12%">Luas TKD</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="m2" name="luas_tkd" value="<?= set_value('luas_tkd'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('luas_tkd'); ?></small>
                                <input type="text" hidden class="form-control form-control-sm" id="luas_tkd1" name="luas_tkd1" value="m²">
                            </td>
                            <td>m²</td>
                        </tr>
                        <tr>
                            <td width="12%">Pengganti</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="m21" name="pengganti" value="<?= set_value('pengganti'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('pengganti'); ?></small>
                                <input type="text" hidden class="form-control form-control-sm" id="pengganti1" name="pengganti1" value="m²">
                            </td>
                            <td>m²</td>
                        </tr>
                        <tr>
                            <!-- nilai TKD dimasukan ke atribut ugr sementara -->
                            <td width="12%">Nilai TKD</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="rupiah" name="ugr" value="<?= set_value('ugr'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('ugr'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <!-- nilai pengganti dimasukan ke atribut sisa_ugr sementara -->
                            <td width="12%">Nilai Pengganti</td>
                            <td width="2%">:</td>
                            <td width="40%">
                                <input type="text" class="form-control form-control-sm" id="rupiah1" name="sisa_ugr" value="<?= set_value('sisa_ugr'); ?>">
                                <small class="form-text text-danger"><?= $validation->getError('sisa_ugr'); ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table class="table table-hover table-sm mt-3 mb-5">
                    <thead>
                        <tr>
                            <th>Kategori : Bukan kepentingan umum</th>
                            <th style="text-align: right;">Sub Kategori : Bukan kepentingan umum</th>
                        </tr>
                    </thead>
                </table>
                <strong>Penanggung jawab PEMKAB : </strong>
                <a href="#"><?= $user['nama']; ?></a>
                <div class="form-group">
                    <input type="hidden" readonly name="permendagri_id" class="form-control" id="permendagri_id" value=<?= $user['permendagri_id']; ?>>
                    <small class="form-text text-danger"><?= $validation->getError('permendagri_id'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly name="kategori" class="form-control" id="kategori" value="Bukan kepentingan umum">
                    <small class="form-text text-danger"><?= $validation->getError('kategori'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly name="subkategori" class="form-control" id="subkategori" value="Bukan kepentingan umum">
                    <small class="form-text text-danger"><?= $validation->getError('subkategori'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly name="petugas" class="form-control" id="petugas" value="<?= $user['nama']; ?>">
                    <small class="form-text text-danger"><?= $validation->getError('petugas'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly name="status_laporan" class="form-control" id="status_laporan" value="pending">
                    <small class="form-text text-danger"><?= $validation->getError('status_laporan'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggal" id="tanggal" value=<?= time(); ?>>
                    <small class="form-text text-danger"><?= $validation->getError('tanggal'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="tahun_upload" id="tahun_upload" value=<?= date("Y"); ?>>
                    <small class="form-text text-danger"><?= $validation->getError('tahun_upload'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload1" id="tanggalupload1" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload2" id="tanggalupload2" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload3" id="tanggalupload3" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload4" id="tanggalupload4" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload5" id="tanggalupload5" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload6" id="tanggalupload6" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload7" id="tanggalupload7" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload8" id="tanggalupload8" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload9" id="tanggalupload9" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload10" id="tanggalupload10" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload11" id="tanggalupload11" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload12" id="tanggalupload12" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload13" id="tanggalupload13" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload14" id="tanggalupload14" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload15" id="tanggalupload15" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalupload16" id="tanggalupload16" value="<?= time(); ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile1" id="tanggalketeranganfile1" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile2" id="tanggalketeranganfile2" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile3" id="tanggalketeranganfile3" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile4" id="tanggalketeranganfile4" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile5" id="tanggalketeranganfile5" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile6" id="tanggalketeranganfile6" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile7" id="tanggalketeranganfile7" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile8" id="tanggalketeranganfile8" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile9" id="tanggalketeranganfile9" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile10" id="tanggalketeranganfile10" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile11" id="tanggalketeranganfile11" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile12" id="tanggalketeranganfile12" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile13" id="tanggalketeranganfile13" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile14" id="tanggalketeranganfile14" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile15" id="tanggalketeranganfile15" value="<?= time(); ?>">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalketeranganfile16" id="tanggalketeranganfile16" value="<?= time(); ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="tanggalrevisi" id="tanggalrevisi" value="^^^^^^^^^^^^^^^">
                    <small class="form-text text-danger"><?= $validation->getError('tanggalrevisi'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="catatanmember" id="catatanmember" value="^^^^^^^^^^^^^^^">
                    <small class="form-text text-danger"><?= $validation->getError('catatanmember'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="statusfile" id="statusfile" value="pending^pending^pending^pending^pending^pending^pending^pending^pending^pending^pending^pending^pending^pending^pending^pending">
                    <small class="form-text text-danger"><?= $validation->getError('statusfile'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="keteranganfile" id="keteranganfile" value="^^^^^^^^^^^^^^^">
                    <small class="form-text text-danger"><?= $validation->getError('keteranganfile'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="keterangan" id="keterangan" value="-^-^-^-^-^-^-^-^-^-^-^-^-^-^-^-">
                    <small class="form-text text-danger"><?= $validation->getError('keterangan'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="read" id="read" value="N">
                    <small class="form-text text-danger"><?= $validation->getError('read'); ?></small>
                </div>
                <!-- input post tabel notifikasi -->
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
                    <input type="hidden" readonly class="form-control-plaintext" name="jenisnotif" id="jenisnotif" value="Dokumen baru!">
                    <small class="form-text text-danger"><?= $validation->getError('jenisnotif'); ?></small>
                </div>
                <div class="form-group">
                    <input type="hidden" readonly class="form-control-plaintext" name="iconnotif" id="iconnotif" value="fas fa-fw fa-file-alt text-white">
                    <small class="form-text text-danger"><?= $validation->getError('iconnotif'); ?></small>
                </div>
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mb-5">Upload</button>
    </form>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
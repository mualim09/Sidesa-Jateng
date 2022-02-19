<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <!-- Title -->
            <h2 style="text-transform: capitalize;"><?= $myprofile; ?></h2>
            <a href="<?= base_url('sitkd/member/detailuraian'); ?>/<?= $dokumen['file_id']; ?>" class="float-right mt-1"><i class="fas fa-fast-backward"> <em>Back to detail uraian</em></i></a>
            <!-- Author -->
            <p class="lead">
                <strong>Diupload oleh : </strong>
                <a href="#"><?= $dokumen['verifikator']; ?></a>
            </p>
            <hr>
            <!-- Date/Time -->
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
            <div class="embed-responsive embed-responsive-16by9" style="height:800px; position:relative">
                <iframe <?php if ($dokumen['file2'] != null) : ?>src="<?= base_url('data/sitkd/file/persetujuanpdf/' . $pdf) ?>" <?php else : ?> src="<?= base_url('sitkd/auth/blockedakses') ?>" <?php endif; ?> allowfullscreen></iframe>
            </div>
            <hr>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
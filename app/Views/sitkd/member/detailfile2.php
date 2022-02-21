<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <!-- Title -->
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
            <a href="<?= base_url('sitkd/member/detailuraian'); ?>/<?= $dokumen['file_id']; ?>" class="float-right mt-1"><i class="fas fa-step-backward"> <em>Back to detail uraian</em></i></a>
            <!-- Author -->
            <p class="lead">
                <strong>Verifikator Kabupaten : </strong>
                <a href="#"><?= $dokumen['petugas']; ?></a>
            </p>
            <hr>
            <!-- Date/Time -->
            <table class="table table-borderless table-sm">
                <?php foreach ($geturaian as $gu) : ?>
                    <tr>
                        <th width="68%">Diupload dari Pemkab pada tanggal <?= date("d/m/Y", $tanggal_upload[1]); ?></th>
                        <th style=" text-align: left;" width="30px">Desa</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['desa']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Direvisi dari PEMKAB pada tanggal <?php if ($tanggal_revisi[1] != "") : ?><?= date("d/m/Y", $tanggal_revisi[1]); ?><?php else : ?> - <?php endif; ?></th>
                        <th style=" text-align: left;" width="30px">Kecamatan</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['kecamatan']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Diperiksa dari PEMPROV pada tanggal <?php if ($tanggal_review[1] != "") : ?><?= date("d/m/Y", $tanggal_review[1]); ?><?php else : ?> - <?php endif; ?></th>
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
                <iframe <?php if ($dokumen['file2'] != null) : ?>src="<?= base_url('data/sitkd/file/laporanpdf/' . $pdf) ?>" <?php else : ?> src="<?= base_url('sitkd/auth/blockedakses') ?>" <?php endif; ?> allowfullscreen></iframe>
            </div>
            <hr>
        </div>
        <!-- kolom side Widget -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <dl class="row">
                        <dt class="col">Detail</dt>
                        <dd class="col text-right" style="<?php if ($statusuraian[1] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[1] == "revisi") : ?> color:red <?php else : ?> color:black <?php endif; ?>" class="text-right"><i><?= $statusuraian[1]; ?></i>
                        </dd>
                    </dl>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Pemeriksa</label>
                        <input type="text" readonly class="form-control" value="<?php if ($pemeriksa[1] != "") : ?><?= $pemeriksa[1]; ?><?php else : ?> Belum diperiksa PEMPROV <?php endif; ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Keterangan</label>
                        <input type="text" readonly class="form-control" value="<?php if ($keteranganexp[1] != "") : ?><?= $keteranganexp[1]; ?><?php else : ?> Belum diverifikasi PEMKAB <?php endif; ?>">
                    </div>
                    <div class="form-group" <?php if ($catatan_member[1] == "") : ?> hidden <?php endif; ?>>
                        <label for="catatan">Catatan dari Kabupaten</label>
                        <textarea class="form-control" disabled name="catatan_member" id="catatan_member" style="font-style: italic;" rows="4"><?= $catatan_member[1]; ?></textarea>
                    </div>
                    <div class="row mt-3 float-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
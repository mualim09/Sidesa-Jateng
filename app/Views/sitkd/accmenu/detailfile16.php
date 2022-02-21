<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            <!-- Title -->
            <h2 style="text-transform: capitalize;"><?= $myprofile1; ?></h2>
            <a href="<?= base_url('sitkd/accmenu/detailuraian'); ?>/<?= $dokumen['file_id']; ?>/<?= $dokumen['tanggal']; ?>" class="float-right mt-1"><i class="fas fa-step-backward"> <em>Back to detail uraian</em></i></a>
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
                        <th width="68%">Diupload dari Pemkab pada tanggal <?= date("d/m/Y", $tanggal_upload[15]); ?></th>
                        <th style=" text-align: left;" width="30px">Desa</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['desa']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Direvisi dari PEMKAB pada tanggal <?php if ($tanggal_revisi[15] != "") : ?><?= date("d/m/Y", $tanggal_revisi[15]); ?><?php else : ?> - <?php endif; ?></th>
                        <th style=" text-align: left;" width="30px">Kecamatan</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['kecamatan']; ?></th>
                    </tr>
                    <tr>
                        <th width="68%">Diperiksa dari PEMPROV pada tanggal <?php if ($tanggal_review[15] != "") : ?><?= date("d/m/Y", $tanggal_review[15]); ?><?php else : ?> - <?php endif; ?></th>
                        <th style=" text-align: left;" width="30px">Kabupaten</th>
                        <th style=" text-align: left;" width="10px">:</th>
                        <th style=" text-align: left;"><?= $gu['kabupaten']; ?></th>
                    </tr>
                <?php endforeach; ?>
            </table>
            <hr>
        </div>
        <!-- Preview pdf -->
        <div class="col-lg-8">
            <div class="embed-responsive embed-responsive-16by9" style="height:800px;">
                <iframe src="<?= base_url('/data/sitkd/file/laporanpdf/' . $dokumen['file16']) ?>" allowfullscreen></iframe>
            </div>
            <hr>
        </div>
        <!-- kolom side Widget -->
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <dl class="row">
                        <dt class="col">Detail</dt>
                        <dd class="col text-right" style="<?php if ($statusuraian[15] == "sukses") : ?> color:#00cc00 <?php elseif ($statusuraian[15] == "revisi") : ?> color:red <?php else : ?> color:black <?php endif; ?>" class="text-right"><i><?= $statusuraian[15]; ?></i>
                        </dd>
                    </dl>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama">Pemeriksa</label>
                        <input type="text" readonly class="form-control" value="<?php if ($pemeriksa[15] != "") : ?><?= $pemeriksa[15]; ?><?php else : ?> Belum diverifikasi PEMKAB <?php endif; ?>">
                    </div>
                    <div class="form-group">
                        <label for="status">Keterangan</label>
                        <input type="text" readonly class="form-control" value="<?php if ($keteranganexp[15] != "") : ?><?= $keteranganexp[15]; ?><?php else : ?> Belum diverifikasi PEMKAB <?php endif; ?>">
                    </div>
                    <div class="form-group" <?php if ($catatan_member[15] == "") : ?> hidden <?php endif; ?>>
                        <label for="catatan">Catatan dari Kabupaten</label>
                        <textarea class="form-control" disabled style="font-style: italic;" rows="4"><?= $catatan_member[15]; ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
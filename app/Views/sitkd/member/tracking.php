<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h2 style="text-transform: capitalize; text-align:center;"><?= $myprofile1 . " " . $dokumen['nama_trans']; ?></h2>
            <div class="table-responsive mt-5">
                <table class="table table-borderless mb-5">
                    <thead>
                        <tr>
                            <th style="text-align: center;" scope="col">
                                PEMKAB
                            </th>
                            <th>
                            </th>
                            <th style="text-align: center;" scope="col">
                                PEMPROV
                            </th>
                            <th>
                            </th>
                            <th style="text-align: center;" scope="col">
                                FINISHING
                            </th>
                        </tr>
                        <tr>
                    </thead>
                    <tbody>
                        <td align="center" style="vertical-align: middle;">
                            <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackinges.gif'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php endif; ?>
                        </td>
                        <td align="center" style="vertical-align: middle;">
                            <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garismati.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garis.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garis.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garis.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garis.png'); ?>">
                            <?php endif; ?>
                        </td>
                        <td align="center" style="vertical-align: middle;">
                            <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                <img class=" embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/waitinges.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackinges.gif'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackinges.gif'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php endif; ?>
                        </td>
                        <td align="center" style="vertical-align: middle;">
                            <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garismati.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garismati.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garismati.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garis.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:120px; width:190px" src="<?= base_url('img/tracking/garis.png'); ?>">
                            <?php endif; ?>
                        </td>
                        <td align="center" style="vertical-align: middle;">
                            <?php if ($dokumen['status_laporan'] == "pending") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/waitinges.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "review") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/waitinges.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "peninjauan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/waitinges.png'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "diajukan") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackinges.gif'); ?>">
                            <?php elseif ($dokumen['status_laporan'] == "sukses") : ?>
                                <img class="embed-responsive embed-responsive-16by9" style="height:55px; width:58px" src="<?= base_url('img/tracking/trackingsukseses.png'); ?>">
                            <?php endif; ?>
                        </td>
                    </tbody>
                    </tr>
                </table>
                <div class="card mb-5">
                    <?php if ($dokumen['status_laporan'] == 'pending') : ?>
                        <h3 class="card-header text-left" style="text-transform: capitalize; color:black"><strong><?= "Status dokumen : " ?></strong><i><?= $dokumen['status_laporan']; ?></i></h3>
                        <div class="card-body">
                            <blockquote class="blockquote" <?php if ($tanggal_upload[0] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Permohonan TMTKD dari Instansi pemohon</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Berita Acara Musyawarah Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Permohonan TMTKD dari Instansi pemohon</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Permohonan TMTKD dari Instansi pemohon</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Permohonan TMTKD dari Instansi pemohon</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[0] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[0]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-2">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[0] == "sukses" && $tanggal_revisi[0] != "") : ?><s><?= timeAgo($tanggal_revisi[0]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[0] == "sukses" && $tanggal_revisi[0] == "") : ?><s><?= timeAgo($tanggalketeranganfile[0]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[0]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[0] != "") : ?><?= timeAgo($tanggal_revisi[0]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file1'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[0]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file1'] == null) : ?><?= timeAgo($tanggalketeranganfile[0]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[0] != "") : ?> <?= timeAgo($tanggal_review[0]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[0] == "sukses" && $catatan_member[0] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[0]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[0] == "sukses" && $catatan_member[0] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[0]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[0] == "revisi" && $catatan_member[0] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[0]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[0] == "revisi" && $catatan_member[0] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[0]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[0] == "pending" && $tanggal_review[0] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[0] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[0]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[0]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file1'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[0]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[0]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[0] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[0]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[1] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Berita Acara Musyawarah Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Berita Acara Persetujuan BPD</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Berita Acara Musyawarah Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Ijin Bupati</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Berita Acara Musyawarah Desa</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[1] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[1]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-2">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[1] == "sukses" && $tanggal_revisi[1] != "") : ?><s><?= timeAgo($tanggal_revisi[1]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[1] == "sukses" && $tanggal_revisi[1] == "") : ?><s><?= timeAgo($tanggalketeranganfile[1]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[1]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[1] != "") : ?><?= timeAgo($tanggal_revisi[1]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file2'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[1]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file2'] == null) : ?><?= timeAgo($tanggalketeranganfile[1]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[1] != "") : ?> <?= timeAgo($tanggal_review[1]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[1] == "sukses" && $catatan_member[1] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[1]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[1] == "sukses" && $catatan_member[1] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[1]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[1] == "revisi" && $catatan_member[1] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[1]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[1] == "revisi" && $catatan_member[1] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[1]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[1] == "pending" && $tanggal_review[1] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[1] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[1]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[1]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file2'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[1]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[1]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[1] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[1]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[2] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Berita Acara Persetujuan BPD</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Peraturan Desa UGR Tahap I</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Berita Acara Persetujuan BPD</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Berita Acara Musyawarah Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Berita Acara Persetujuan BPD</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[2] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[2]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-2">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[2] == "sukses" && $tanggal_revisi[2] != "") : ?><s><?= timeAgo($tanggal_revisi[2]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[2] == "sukses" && $tanggal_revisi[2] == "") : ?><s><?= timeAgo($tanggalketeranganfile[2]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[2]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[2] != "") : ?><?= timeAgo($tanggal_revisi[2]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file3'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[2]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file3'] == null) : ?><?= timeAgo($tanggalketeranganfile[2]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[2] != "") : ?> <?= timeAgo($tanggal_review[2]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[2] == "sukses" && $catatan_member[2] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[2]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[2] == "sukses" && $catatan_member[2] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[2]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[2] == "revisi" && $catatan_member[2] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[2]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[2] == "revisi" && $catatan_member[2] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[2]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[2] == "pending" && $tanggal_review[2] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[2] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[2]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[2]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file3'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[2]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[2]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[2] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[2]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[3] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Rancangan Peraturan Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Rancangan Peraturan Desa Terbaru</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Rancangan Peraturan Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Persetujuan BPD</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Rancangan Peraturan Desa</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[3] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[3]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[3] == "sukses" && $tanggal_revisi[3] != "") : ?><s><?= timeAgo($tanggal_revisi[3]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[3] == "sukses" && $tanggal_revisi[3] == "") : ?><s><?= timeAgo($tanggalketeranganfile[3]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[3]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[3] != "") : ?><?= timeAgo($tanggal_revisi[3]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file4'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[3]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file4'] == null) : ?><?= timeAgo($tanggalketeranganfile[3]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[3] != "") : ?> <?= timeAgo($tanggal_review[3]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[3] == "sukses" && $catatan_member[3] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[3]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[3] == "sukses" && $catatan_member[3] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[3]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[3] == "revisi" && $catatan_member[3] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[3]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[3] == "revisi" && $catatan_member[3] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[3]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[3] == "pending" && $tanggal_review[3] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[3] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[3]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[3]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file4'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[3]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[3]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[3] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[3]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[4] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Alas Hak Tanah Kas Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Alas Hak Tanah Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Alas Hak Tanah Kas Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Rancangan Peraturan Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Alas Hak Tanah Kas Desa</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[4] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[4]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[4] == "sukses" && $tanggal_revisi[4] != "") : ?><s><?= timeAgo($tanggal_revisi[4]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[4] == "sukses" && $tanggal_revisi[4] == "") : ?><s><?= timeAgo($tanggalketeranganfile[4]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[4]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[4] != "") : ?><?= timeAgo($tanggal_revisi[4]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file5'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[4]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file5'] == null) : ?><?= timeAgo($tanggalketeranganfile[4]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[4] != "") : ?> <?= timeAgo($tanggal_review[4]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[4] == "sukses" && $catatan_member[4] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[4]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[4] == "sukses" && $catatan_member[4] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[4]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[4] == "revisi" && $catatan_member[4] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[4]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[4] == "revisi" && $catatan_member[4] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[4]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[4] == "pending" && $tanggal_review[4] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[4] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[4]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[4]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file5'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[4]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[4]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[4] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[4]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[5] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Alas Hak Tanah Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Kas Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Alas Hak Tanah Kas Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Alas Hak Tanah Tanah Pengganti</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[5] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[5]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[5] == "sukses" && $tanggal_revisi[5] != "") : ?><s><?= timeAgo($tanggal_revisi[5]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[5] == "sukses" && $tanggal_revisi[5] == "") : ?><s><?= timeAgo($tanggalketeranganfile[5]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[5]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[5] != "") : ?><?= timeAgo($tanggal_revisi[5]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file6'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[5]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file6'] == null) : ?><?= timeAgo($tanggalketeranganfile[5]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[5] != "") : ?> <?= timeAgo($tanggal_review[5]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[5] == "sukses" && $catatan_member[5] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[5]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[5] == "sukses" && $catatan_member[5] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[5]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[5] == "revisi" && $catatan_member[5] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[5]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[5] == "revisi" && $catatan_member[5] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[5]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[5] == "pending" && $tanggal_review[5] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[5] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[5]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[5]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file6'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[5]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[5]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[5] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[5]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[6] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Kas Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Hasil perhitungan Appraisal Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Hasil perhitungan Appraisal TKD</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Alas Hak Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Kas Desa</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[6] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[6]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[6] == "sukses" && $tanggal_revisi[6] != "") : ?><s><?= timeAgo($tanggal_revisi[6]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[6] == "sukses" && $tanggal_revisi[6] == "") : ?><s><?= timeAgo($tanggalketeranganfile[6]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[6]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[6] != "") : ?><?= timeAgo($tanggal_revisi[6]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file7'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[6]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file7'] == null) : ?><?= timeAgo($tanggalketeranganfile[6]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[6] != "") : ?> <?= timeAgo($tanggal_review[6]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[6] == "sukses" && $catatan_member[6] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[6]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[6] == "sukses" && $catatan_member[6] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[6]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[6] == "revisi" && $catatan_member[6] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[6]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[6] == "revisi" && $catatan_member[6] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[6]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[6] == "pending" && $tanggal_review[6] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[6] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[6]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[6]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file7'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[6]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[6]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[6] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[6]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[7] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>SK Tim Panitia Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Ganti rugi uang") : ?>
                                        <h4><strong>Permohonan tukar menukar Kepala Desa kepada Bupati</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Kas Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Pengganti</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[7] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[7]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[7] == "sukses" && $tanggal_revisi[7] != "") : ?><s><?= timeAgo($tanggal_revisi[7]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[7] == "sukses" && $tanggal_revisi[7] == "") : ?><s><?= timeAgo($tanggalketeranganfile[7]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[7]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[7] != "") : ?><?= timeAgo($tanggal_revisi[7]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file8'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[7]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file8'] == null) : ?><?= timeAgo($tanggalketeranganfile[7]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[7] != "") : ?> <?= timeAgo($tanggal_review[7]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[7] == "sukses" && $catatan_member[7] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[7]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[7] == "sukses" && $catatan_member[7] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[7]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[7] == "revisi" && $catatan_member[7] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[7]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[7] == "revisi" && $catatan_member[7] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[7]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[7] == "pending" && $tanggal_review[7] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[7] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[7]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[7]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file8'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[7]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[7]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[7] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[7]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[8] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Hasil perhitungan Appraisal TKD</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Permohonan tukar menukar Kepala Desa kepada Bupati</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Ukur Peta Bidang Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Hasil perhitungan Appraisal TKD</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[8] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[8]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[8] == "sukses" && $tanggal_revisi[8] != "") : ?><s><?= timeAgo($tanggal_revisi[8]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[8] == "sukses" && $tanggal_revisi[8] == "") : ?><s><?= timeAgo($tanggalketeranganfile[8]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[8]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[8] != "") : ?><?= timeAgo($tanggal_revisi[8]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file9'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[8]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file9'] == null) : ?><?= timeAgo($tanggalketeranganfile[8]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[8] != "") : ?> <?= timeAgo($tanggal_review[8]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[8] == "sukses" && $catatan_member[8] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[8]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[8] == "sukses" && $catatan_member[8] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[8]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[8] == "revisi" && $catatan_member[8] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[8]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[8] == "revisi" && $catatan_member[8] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[8]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[8] == "pending" && $tanggal_review[8] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[8] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[8]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[8]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file9'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[8]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[8]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[8] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[8]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[9] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Hasil perhitungan Appraisal Tanah Pengganti</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Tanah pengganti") : ?>
                                        <h4><strong>Berita Acara Tanah Pengganti di Luar Desa</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "PERMENDAGRI No. 4 / 2007") : ?>
                                        <h4><strong>Permohonan tukar menukar Kepala Desa kepada Bupati</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Hasil perhitungan Appraisal Tanah Pengganti</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[9] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[9]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[9] == "sukses" && $tanggal_revisi[9] != "") : ?><s><?= timeAgo($tanggal_revisi[9]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[9] == "sukses" && $tanggal_revisi[9] == "") : ?><s><?= timeAgo($tanggalketeranganfile[9]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[9]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[9] != "") : ?><?= timeAgo($tanggal_revisi[9]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file10'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[9]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file10'] == null) : ?><?= timeAgo($tanggalketeranganfile[9]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[9] != "") : ?> <?= timeAgo($tanggal_review[9]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[9] == "sukses" && $catatan_member[9] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[9]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[9] == "sukses" && $catatan_member[9] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[9]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[9] == "revisi" && $catatan_member[9] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[9]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[9] == "revisi" && $catatan_member[9] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[9]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[9] == "pending" && $tanggal_review[9] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[9] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[9]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[9]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file10'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[9]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[9]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[9] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[9]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[10] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>SK Tim Panitia Desa</strong></h4>
                                    <?php if ($tanggal_upload[10] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[10]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[10] == "sukses" && $tanggal_revisi[10] != "") : ?><s><?= timeAgo($tanggal_revisi[10]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[10] == "sukses" && $tanggal_revisi[10] == "") : ?><s><?= timeAgo($tanggalketeranganfile[10]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[10]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[10] != "") : ?><?= timeAgo($tanggal_revisi[10]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file11'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[10]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file11'] == null) : ?><?= timeAgo($tanggalketeranganfile[10]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[10] != "") : ?> <?= timeAgo($tanggal_review[10]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[10] == "sukses" && $catatan_member[10] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[10]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[10] == "sukses" && $catatan_member[10] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[10]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[10] == "revisi" && $catatan_member[10] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[10]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[10] == "revisi" && $catatan_member[10] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[10]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[10] == "pending" && $tanggal_review[10] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[10] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[10]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[10]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file11'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[10]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[10]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[10] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[10]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[11] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Permohonan tukar menukar Kepala Desa Kepada Bupati</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>SK Tim kajian Kabupaten</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[11] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[11]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[11] == "sukses" && $tanggal_revisi[11] != "") : ?><s><?= timeAgo($tanggal_revisi[11]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[11] == "sukses" && $tanggal_revisi[11] == "") : ?><s><?= timeAgo($tanggalketeranganfile[11]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[11]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[11] != "") : ?><?= timeAgo($tanggal_revisi[11]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file12'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[11]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file12'] == null) : ?><?= timeAgo($tanggalketeranganfile[11]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[11] != "") : ?> <?= timeAgo($tanggal_review[11]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[11] == "sukses" && $catatan_member[11] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[11]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[11] == "sukses" && $catatan_member[11] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[11]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[11] == "revisi" && $catatan_member[11] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[11]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[11] == "revisi" && $catatan_member[11] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[11]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[11] == "pending" && $tanggal_review[11] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[11] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[11]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[11]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file12'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[11]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[11]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[11] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[11]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[12] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <?php if ($dokumen['subkategori'] == "Umum") : ?>
                                        <h4><strong>Dokumen Pendukung Lainnya</strong></h4>
                                    <?php elseif ($dokumen['subkategori'] == "Bukan kepentingan umum") : ?>
                                        <h4><strong>Kesesuaian RTRW</strong></h4>
                                    <?php endif; ?>
                                    <?php if ($tanggal_upload[12] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[12]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[12] == "sukses" && $tanggal_revisi[12] != "") : ?><s><?= timeAgo($tanggal_revisi[12]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[12] == "sukses" && $tanggal_revisi[12] == "") : ?><s><?= timeAgo($tanggalketeranganfile[12]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[12]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[12] != "") : ?><?= timeAgo($tanggal_revisi[12]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file13'] != null) : ?> <s><?= timeAgo($tanggalketeranganfile[12]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file13'] == null) : ?><?= timeAgo($tanggalketeranganfile[12]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[12] != "") : ?> <?= timeAgo($tanggal_review[12]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[12] == "sukses" && $catatan_member[12] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[12]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[12] == "sukses" && $catatan_member[12] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[12]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[12] == "revisi" && $catatan_member[12] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[12]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[12] == "revisi" && $catatan_member[12] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[12]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[12] == "pending" && $tanggal_review[12] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[12] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[12]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[12]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file13'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[12]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[12]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[12] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[12]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[13] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>Ijin Bupati</strong></h4>
                                    <?php if ($tanggal_upload[13] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[13]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[13] == "sukses" && $tanggal_revisi[13] != "") : ?><s><?= timeAgo($tanggal_revisi[13]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[13] == "sukses" && $tanggal_revisi[13] == "") : ?><s><?= timeAgo($tanggalketeranganfile[13]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[13]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[13] != "") : ?><?= timeAgo($tanggal_revisi[13]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file14'] != null) : ?> <s><?= timeAgo($tanggalketeranganfile[13]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file14'] == null) : ?><?= timeAgo($tanggalketeranganfile[13]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[13] != "") : ?> <?= timeAgo($tanggal_review[13]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[13] == "sukses" && $catatan_member[13] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[13]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[13] == "sukses" && $catatan_member[13] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[13]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[13] == "revisi" && $catatan_member[13] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[13]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[13] == "revisi" && $catatan_member[13] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[13]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[13] == "pending" && $tanggal_review[13] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[13] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[13]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[13]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file14'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[13]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[13]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[13] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[13]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[14] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>Kajian Tim Kabupaten</strong></h4>
                                    <?php if ($tanggal_upload[14] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[14]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[14] == "sukses" && $tanggal_revisi[14] != "") : ?><s><?= timeAgo($tanggal_revisi[14]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[14] == "sukses" && $tanggal_revisi[14] == "") : ?><s><?= timeAgo($tanggalketeranganfile[14]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[14]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[14] != "") : ?><?= timeAgo($tanggal_revisi[14]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file15'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[14]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file15'] == null) : ?><?= timeAgo($tanggalketeranganfile[14]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[14] != "") : ?> <?= timeAgo($tanggal_review[14]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[14] == "sukses" && $catatan_member[14] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[14]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[14] == "sukses" && $catatan_member[14] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[14]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[14] == "revisi" && $catatan_member[14] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[14]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[14] == "revisi" && $catatan_member[14] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[14]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[14] == "pending" && $tanggal_review[14] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[14] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[14]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[14]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file15'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[14]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[14]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[14] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[14]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                            <blockquote class="blockquote" <?php if ($tanggal_upload[15] == "") : ?> hidden <?php endif; ?>>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>Permohonan tukar menukar Kepala Desa kepada Bupati</strong></h4>
                                    <?php if ($tanggal_upload[15] != "") : ?>
                                        <h6 class="small"><?= timeAgo($tanggal_upload[15]) . ' yang lalu'; ?></h6>
                                    <?php endif; ?>
                                </div>
                                <dl class="row small mt-3">
                                    <!-- sebelah kiri card ini pertanggalan tracking dari PEMKAB -->
                                    <dd class="col small text-left"><?php if ($statusuraian[15] == "sukses" && $tanggal_revisi[15] != "") : ?><s><?= timeAgo($tanggal_revisi[15]) . ' yang lalu direvisi'; ?></s><?php elseif ($statusuraian[15] == "sukses" && $tanggal_revisi[15] == "") : ?><s><?= timeAgo($tanggalketeranganfile[15]) . ' yang lalu'; ?></s><?php elseif ($dokumen['status_uraian'] == "revisi") : ?><?= timeAgo($tanggal_revisi[15]) . ' yang lalu direvisi'; ?><?php elseif ($tanggal_revisi[15] != "") : ?><?= timeAgo($tanggal_revisi[15]) . ' yang lalu direvisi'; ?><?php elseif ($dokumen['file16'] != null) : ?><s><?= timeAgo($tanggalketeranganfile[15]) . ' yang lalu'; ?></s><?php elseif ($dokumen['file16'] == null) : ?><?= timeAgo($tanggalketeranganfile[15]) . ' yang lalu'; ?><?php endif; ?></dd>

                                    <!-- sebelah kanan card ini pertanggalan tracking dari PEMPROV -->
                                    <dd class="col small text-right"><?php if ($tanggal_review[15] != "") : ?> <?= timeAgo($tanggal_review[15]) . ' yang lalu'; ?><?php endif; ?></dd>
                                </dl>
                                <?php if ($statusuraian[15] == "sukses" && $catatan_member[15] != "") : ?>
                                    <dl class="row">
                                        <!-- sebelah kiri card ini catatan upload file ke tracking dari PEMKAB -->
                                        <dd class="small col" style="color: crimson;"><i>"<s><?= $catatan_member[15]; ?></s>"</i></dd>

                                        <!-- sebelah kanan card ini berdasarkan status sukses ke tracking dari PEMPROV -->
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[15] == "sukses" && $catatan_member[15] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[15]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: green;"><i>"Terverifikasi"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[15] == "revisi" && $catatan_member[15] != "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[15]; ?>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[15] == "revisi" && $catatan_member[15] == "") : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[15]; ?></s>"</i></dd>
                                        <dd class="small col text-right" style="color: red;"><i>"menunggu hasil revisi dari PEMKAB"</i></dd>
                                    </dl>
                                <?php elseif ($statusuraian[15] == "pending" && $tanggal_review[15] != "") : ?>
                                    <dl class="row">
                                        <?php if ($catatan_member[15] != "") : ?>
                                            <dd class="small col" style="color: crimson;"><i>"<?= $catatan_member[15]; ?>"</i></dd>
                                        <?php else : ?>
                                            <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[15]; ?></s>"</i></dd>
                                        <?php endif; ?>
                                        <dd class="small col text-right" style="color: red;"><i>"sedang memeriksa hasil revisi"</i></dd>
                                    </dl>
                                <?php elseif ($dokumen['file16'] != null) : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<s><?= $keteranganfile[15]; ?></s>"</i></dd>
                                    </dl>
                                <?php else : ?>
                                    <dl class="row">
                                        <dd class="small col" style="color: black;"><i>"<?= $keteranganfile[15]; ?>"</i></dd>
                                    </dl>
                                <?php endif; ?>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Petugas PEMKAB : <cite title="Source Title"><?= $dokumen['petugas']; ?></cite></dd>
                                    <?php if ($pemeriksa[15] != "") : ?>
                                        <dd class="blockquote-footer col text-right">Pemeriksa PEMPROV : <cite title="Source Title"><?= $pemeriksa[15]; ?></cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                        </div>

                    <?php elseif ($dokumen['status_laporan'] == 'review') : ?>
                        <div class="card-header">
                            <h3 class="text-center" style="text-transform: capitalize; color:#DAA520"><strong><?= "Status dokumen : " ?></strong><i><?= $dokumen['status_laporan']; ?></i></h3>
                            <h6 class="small text-center"><?= timeAgo($dokumen['tanggalmulaireview']) . ' yang lalu'; ?></h6>
                        </div>
                        <div class="card-body">
                            <blockquote>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>VERIFIKASI DOKUMEN DAN TINJAUAN LAPANGAN</strong></h4>
                                    <h4><strong>TUKAR MENUKAR TANAH KAS DESA</strong></h4>
                                </div>
                                <table class="table table-borderless table-sm mt-3">
                                    <?php foreach ($geturaian as $gu) : ?>
                                        <tbody>
                                            <tr>
                                                <td width="150px">Desa</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['desa']; ?></td>
                                                <th style="text-align: right;">Kategori : <?= $dokumen['kategori']; ?></th>
                                            </tr>
                                            <tr>
                                                <td width="150px">Kecamatan</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['kecamatan']; ?></td>
                                                <th style="text-align: right;">Sub Kategori : <?= $dokumen['subkategori']; ?></th>
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
                                <hr class="mt-4">
                                <dl class="row mt-4">
                                    <dd class="blockquote-footer col">Pemeriksa Pengelolaan Aset Desa PROV JATENG : <cite title="Source Title"><?= $dokumen['penanggungjawab']; ?></cite></dd>
                                    <?php if ($dokumen['verifikator'] != null) : ?>
                                        <dd class="blockquote-footer col text-right">Mengetahui Pengelola Aset Desa PROV JATENG : <cite title="Source Title"><?= $dokumen['verifikator']; ?></cite></dd>
                                    <?php else : ?>
                                        <dd class="blockquote-footer col text-right">Mengetahui Pengelola Aset Desa PROV JATENG : <cite title="Source Title">(dalam tahap review)</cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                        </div>

                    <?php elseif ($dokumen['status_laporan'] == 'peninjauan') : ?>
                        <div class="card-header">
                            <h3 class="text-center" style="text-transform: capitalize; color:#7d32a8"><strong><?= "Status dokumen : " ?></strong><i><?= $dokumen['status_laporan']; ?> Lapangan</i></h3>
                            <h6 class="small text-center"><?= timeAgo($dokumen['tanggalmulaitinjauan']) . ' yang lalu'; ?></h6>
                        </div>
                        <div class="card-body">
                            <blockquote>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>PROSES TINJAUAN LAPANGAN</strong></h4>
                                    <h4><strong>TUKAR MENUKAR TANAH KAS DESA</strong></h4>
                                </div>
                                <table class="table table-borderless table-sm mt-3">
                                    <?php foreach ($geturaian as $gu) : ?>
                                        <tbody>
                                            <tr>
                                                <td width="150px">Desa</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['desa']; ?></td>
                                                <th style="text-align: right;">Kategori : <?= $dokumen['kategori']; ?></th>
                                            </tr>
                                            <tr>
                                                <td width="150px">Kecamatan</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['kecamatan']; ?></td>
                                                <th style="text-align: right;">Sub Kategori : <?= $dokumen['subkategori']; ?></th>
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
                                <hr class="mt-4">
                                <dl class="row mt-4">
                                    <dd class="blockquote-footer col">Pemeriksa Pengelolaan Aset Desa PROV JATENG : <cite title="Source Title"><?= $dokumen['penanggungjawab']; ?></cite></dd>
                                    <?php if ($dokumen['verifikator'] != null) : ?>
                                        <dd class="blockquote-footer col text-right">Mengetahui Pengelola Aset Desa PROV JATENG : <cite title="Source Title"><?= $dokumen['verifikator']; ?></cite></dd>
                                    <?php else : ?>
                                        <dd class="blockquote-footer col text-right">Mengetahui Pengelola Aset Desa PROV JATENG : <cite title="Source Title">(dalam tahap peninjauan)</cite></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                        </div>

                    <?php elseif ($dokumen['status_laporan'] == 'diajukan') : ?>
                        <div class="card-header">
                            <h3 class="text-right" style="text-transform: capitalize; color: #0000FF;"><strong><?= "Status dokumen : " ?></strong><i><?= $dokumen['status_laporan']; ?></i></h3>
                            <h6 class="small text-right"><?= timeAgo($dokumen['tanggalmulaidiajukan']) . ' yang lalu'; ?></h6>
                        </div>
                        <div class="card-body">
                            <blockquote>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>PENGAJUAN PERSETUJUAN GUBERNUR PROVINSI JAWA TENGAH</strong></h4>
                                    <h4><strong>TUKAR MENUKAR TANAH KAS DESA</strong></h4>
                                </div>
                                <table class="table table-borderless table-sm mt-3">
                                    <?php foreach ($geturaian as $gu) : ?>
                                        <tbody>
                                            <tr>
                                                <td width="150px">Desa</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['desa']; ?></td>
                                                <th style="text-align: right;">Kategori : <?= $dokumen['kategori']; ?></th>
                                            </tr>
                                            <tr>
                                                <td width="150px">Kecamatan</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['kecamatan']; ?></td>
                                                <th style="text-align: right;">Sub Kategori : <?= $dokumen['subkategori']; ?></th>
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
                                <hr class="mt-4">
                                <dl class="row mt-4">
                                    <dd class="blockquote-footer col">Pemeriksa Pengelolaan Aset Desa PROV JATENG : <cite title="Source Title"><?= $dokumen['penanggungjawab']; ?></cite></dd>
                                    <?php if ($dokumen['kategori'] == "Bukan kepentingan umum") : ?>
                                        <dd class="blockquote-footer col text-right">Menunggu Persetujuan : <cite title="Source Title">DISPERMADES Provinsi Jawa Tengah</cite></dd>
                                    <?php else : ?>
                                        <dd class="blockquote-footer col text-right">Menunggu Persetujuan : <cite title="Source Title">Wakil Gubernur dan Gubernur Provinsi Jawa Tengah</cite></dd>
                                    <?php endif ?>
                                </dl>
                                <dl class="row">
                                    <dd class="blockquote-footer col">Mengetahui Pengelola Aset Desa PROV JATENG : <cite title="Source Title"><?= $dokumen['verifikator']; ?></cite></dd>
                                </dl>
                            </blockquote>
                        </div>

                    <?php elseif ($dokumen['status_laporan'] == 'sukses') : ?>
                        <div class="card-header">
                            <h3 class="text-center" style="text-transform: capitalize; color:#00cc00"><strong><?= "Status : " ?></strong><i><?= $dokumen['status_laporan']; ?></i></h3>
                            <h6 class="small text-center"><?= $dokumen['tanggal_clicksukses']; ?></h6>
                        </div>
                        <div class="card-body">
                            <blockquote>
                                <div class="card-footer text-center mt-3">
                                    <h4><strong>VERIFIKASI DOKUMEN DAN TINJAUAN LAPANGAN</strong></h4>
                                    <h4><strong>TUKAR MENUKAR TANAH KAS DESA</strong></h4>
                                </div>
                                <table class="table table-borderless table-sm mt-3">
                                    <?php foreach ($geturaian as $gu) : ?>
                                        <tbody>
                                            <tr>
                                                <td width="150px">Desa</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['desa']; ?></td>
                                                <th style="text-align: right;">Kategori : <?= $dokumen['kategori']; ?></th>
                                            </tr>
                                            <tr>
                                                <td width="150px">Kecamatan</td>
                                                <td width="10px">:</td>
                                                <td><?= $gu['kecamatan']; ?></td>
                                                <th style="text-align: right;">Sub Kategori : <?= $dokumen['subkategori']; ?></th>
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
                                <hr class="mt-4">
                                <dl class="row mt-4">
                                    <?php if ($dokumen['kategori'] == "Bukan kepentingan umum") : ?>
                                        <dd class="blockquote-footer col">Menunggu Persetujuan : <cite title="Source Title">Menteri Dalam Negeri Republik Indonesia</cite></dd>
                                    <?php else : ?>
                                        <dd class="blockquote-footer col">Telah disetujui : <cite title="Source Title">Gubernur Provinsi Jawa Tengah</cite></dd>
                                    <?php endif; ?>
                                    <?php if ($dokumen['upload_persetujuan'] != null) : ?>
                                        <dd class="blockquote-small col text-right"><a href="<?= base_url('sitkd/member/viewpersetujuan'); ?>/<?= $dokumen['file_id']; ?>" class="badge badge-success">Dokumen Persetujuan</a></dd>
                                    <?php endif; ?>
                                </dl>
                            </blockquote>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
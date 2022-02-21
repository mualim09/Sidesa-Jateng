<div class="container-fluid">
    <table class="table table-hover table-bordered table-sm" id="allnotifikasi" data-ajaxurl="<?= site_url('sitkd/notifikasi/allnotif'); ?>">
        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
        <thead>
            <th style="text-align: center;" width="5%">No</th>
            <th style="text-align: center;">Notifikasi</th>
            <th style="text-align: center;">User</th>
            <th style="text-align: center;">Keterangan</th>
            <th style="text-align: center;">Tanggal</th>
            <th style="text-align: center;">Tinjau</th>
        </thead>
        <tbody>
            <?php foreach ($notif as $n) : ?>
                <tr>
                    <td align="center" scope="row"><?= ++$start ?></td>
                    <td><?= $n['jenis']; ?></td>
                    <td align="center"><?= $n['kabupaten']; ?></td>
                    <?php if ($n['keterangan'] == "waiting") : ?>
                        <td align="center" style="color: crimson;"><?= $n['keterangan']; ?></td>
                    <?php else : ?>
                        <td align="center"><?= $n['keterangan']; ?></td>
                    <?php endif; ?>
                    <td align="center"><?= date("d/m/Y", $n['tanggal']); ?></td>
                    <?php if ($n['jenis'] == "Dokumen baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/dokumenbaru'); ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Berkas Persetujuan Baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/persetujuan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Catatan dokumen baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/catatanpemprov') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 1 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 2 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 3 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 4 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 5 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 6 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 7 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 8 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 9 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 10 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 11 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 12 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 13 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 14 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 15 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Persyaratan 16 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/uploadfilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 1 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 2 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 3 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 4 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 5 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 6 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 7 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 8 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 9 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 10 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 11 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 12 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 13 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 14 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 15 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "File Revisi Persyaratan 16 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/revisifilebaru') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 1 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 2 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 3 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 4 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 5 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 6 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 7 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 8 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 9 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 10 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 11 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 12 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 13 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 14 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 15 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 16 review") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisireview') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 1 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 2 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 3 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 4 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 5 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 6 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 7 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 8 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 9 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 10 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 11 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 12 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 13 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 14 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 15 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil Revisi Persyaratan 16 peninjauan") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilrevisipeninjauan') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Perubahan status dokumen!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/perubahanstatus') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 1 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 2 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 3 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 4 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 5 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 6 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 7 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 8 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 9 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 10 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 11 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 12 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 13 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 14 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 15 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php elseif ($n['jenis'] == "Hasil verifikasi Persyaratan 16 baru!") : ?>
                        <td align="center"><a href="<?= base_url('sitkd/notifikasi/hasilverifikasi') ?>/<?= $n['file_id']; ?>/<?= $n['id']; ?>"><i class="fas fa-fw fa-search-location"></a></i></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</div>

<!-- JANGAN DIHAPUS BRAH buat footernya selalu dibawah -->
</div>
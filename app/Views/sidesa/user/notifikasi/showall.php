<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <div class="row align-items-center mt-5">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total Notifikasi<span class="text-muted fw-normal ms-2">(<?= $totaldata; ?>)</span></h5>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="table-responsive mb-4">
            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Notifikasi</th>
                        <th scope="col">Notifikasi dari</th>
                        <th scope="col">Role</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($notif as $n) : ?>
                        <tr>
                            <td><?= ++$start ?></td>
                            <td><?= $n['nama_notif']; ?></td>
                            <td><?= $n['upload_by']; ?></td>
                            <td><?= $n['nm_kab']; ?></td>
                            <?php if ($n['keterangan'] == "waiting") : ?>
                                <td style="color: crimson;"><?= $n['keterangan']; ?></td>
                            <?php else : ?>
                                <td><?= $n['keterangan']; ?></td>
                            <?php endif; ?>
                            <td><?= date("d/m/Y", $n['tanggal']); ?></td>
                            <?php if ($n['jenis_file'] == "Import Data") : ?>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?= base_url('user/notifikasi/import/' . $n['id']); ?>"><i class="fas fa-fw fa-search-location"></a></i>
                                    </div>
                                </td>
                            <?php elseif ($n['jenis_file'] == "Input Data" && substr($n['nama_notif'], 5, 1) != '.') : ?>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a id="reload" href="<?= base_url('user/notifikasi/inputdata/' . $n['id'] . '/' . substr($n['nama_notif'], 0, 5)); ?>" target="_blank"><i class="fas fa-fw fa-search-location"></a></i>
                                    </div>
                                </td>
                            <?php elseif ($n['jenis_file'] == "Input Data" && substr($n['nama_notif'], 13, 1) != '.') : ?>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a id="recon" href="<?= base_url('user/notifikasi/inputdata/' . $n['id'] . '/' . substr($n['nama_notif'], 0, 13)); ?>" target="_blank"><i class="fas fa-fw fa-search-location"></a></i>
                                    </div>
                                </td>
                            <?php elseif ($n['jenis_file'] == "Role Akses" || $n['jenis_file'] == "Hapus User") : ?>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="<?= base_url('user/notifikasi/rolemanagement/' . $n['id'] . '/' . $user['role_id']); ?>"><i class="fas fa-fw fa-search-location"></a></i>
                                    </div>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- end table -->
        </div>
        <!-- end table responsive -->

    </div>
</div>
<?= $this->include('sidesa/layout/user/content-footer') ?>
<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>
<?= helper('zakezone'); ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>

        <div class="text-center">
            <?= session()->getFlashdata('message'); ?>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-md-6">
                <div class="mb-3">
                    <h5 class="card-title">Total File Upload<span class="text-muted fw-normal ms-2">(<?= $totaldata; ?>)</span></h5>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="table-responsive mb-4">
            <table class="table align-middle datatable dt-responsive table-check nowrap" style="border-collapse: collapse; border-spacing: 0 8px; width: 100%;">
                <thead>
                    <tr>
                        <th scope="col">Diupload Tanggal</th>
                        <th scope="col">Tahun Data</th>
                        <th scope="col">Nama Data</th>
                        <th scope="col">Total Row</th>
                        <th scope="col">Diupload Oleh</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sidesareview as $sr) : ?>
                        <tr>
                            <td><?= date('Y-m-d H:i', strtotime($sr['created'])); ?></td>
                            <td><?= $sr['tahundata']; ?></td>
                            <td><?= $sr['nm_data']; ?></td>
                            <td><?= $sr['totalrow']; ?></td>
                            <td>
                                <img src="<?= base_url('img/user/profile/' . $sr['image']); ?>" alt="" class="avatar-sm rounded-circle me-2">
                                <a href="#" class="text-body"><?= $sr['upload_by']; ?></a>
                            </td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="<?= base_url('user/datasidesa/download/' . $sr['nm_data'] . '/' . $sr['tahundata']); ?>" class="badge bg-info">Download</a>
                                    <?php if ($user['role_id'] == 1) : ?>
                                        <a href="<?= base_url('user/datasidesa/delete_data/' . $sr['nm_data'] . '/' . $sr['created'] . '/' . $user['kd_wilayah'] . '/' . $sr['tahundata']); ?>" class="badge bg-danger" onclick="return confirm('Konfirmasi data akan dihapus dari SIDESA?');">Delete</a>
                                    <?php endif; ?>
                                </div>
                            </td>
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
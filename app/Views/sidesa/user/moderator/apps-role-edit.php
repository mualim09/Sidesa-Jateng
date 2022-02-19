<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>
        <style>
            body {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }

            body[data-layout-mode=dark] {
                background: url(../../img/bg/sitkd/bg-body.png);
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
                background-attachment: fixed;
                height: 100%;
            }
        </style>

        <div class="col-xl-6">
            <table class="table table-borderless table-responsive mb-0 mt-5" style="font-size: large;">
                <tr>
                    <th width="50px">Nama</th>
                    <th>: <?= $edit['nama']; ?></th>
                </tr>
                <tr>
                    <th width="50px">NIP</th>
                    <th>: <?= $edit['nip']; ?></th>
                </tr>
            </table>
        </div>

        <div class="col-lg-4">
            <?= session()->getFlashdata('message'); ?>
            <form id="sa-params" action="<?= base_url('user/moderator/role_edit/' . $edit['user_id']) . '/' . $edit['kd_wilayah']; ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="id" value="<?= $edit['user_id']; ?>">
                <label for="role" class="form-label font-size-13 text-muted mt-4">ID KEMENDAGRI AKSES</label>
                <div class="input-group">
                    <input type="text" readonly class="form-control text-center" id="idpermendagri" name="idpermendagri" value="<?= $permendagri['id_desa']; ?>">
                    <input type="text" readonly class="form-control text-center" id="namadesa" value="<?= $permendagri['nm_desa']; ?>">
                    <button type="button" class="btn btn-info waves-effect" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg">Browse</button>
                </div>
                <div class="form-group mt-4">
                    <label for="role" class="form-label font-size-13 text-muted">ROLE</label>
                    <select class="form-control" id="role" name="role">
                        <?php foreach ($tabrole as $t) : ?>
                            <?php if ($t['id'] == $edit['role_id']) : ?>
                                <option value="<?= $t['id']; ?>" selected><?= $t['id'] . " - " . $t['role_akses']; ?></option>
                            <?php else : ?>
                                <option value="<?= $t['id']; ?>"><?= $t['id'] . " - " . $t['role_akses']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group mt-4">
                    <label for="is_active" class="form-label font-size-13 text-muted">STATUS</label>
                    <select class="form-control" id="is_active" name="is_active">
                        <?php foreach ($tabactive as $ta) : ?>
                            <?php if ($ta['id'] == $edit['is_active']) : ?>
                                <option value="<?= $ta['id']; ?>" selected><?= $ta['id'] . " - " . $ta['is_active']; ?></option>
                            <?php else : ?>
                                <option value="<?= $ta['id']; ?>"><?= $ta['id'] . " - " . $ta['is_active']; ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary waves-effect waves-light mt-5">Submit</button>
            </form>
        </div>
    </div>
</div>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Pilih kode wilayah yang akan di asign ke <?= $edit['nama']; ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover table-bordered table-sm" id="example">
                    <thead>
                        <th style="text-align: center;">KODE WILAYAH</th>
                        <th style="text-align: center;">KABUPATEN</th>
                        <th style="text-align: center;">KECAMATAN</th>
                        <th style="text-align: center;">DESA</th>
                    </thead>
                    <tbody>
                        <?php foreach ($roleedit as $re) : ?>
                            <tr id="roleedit" data-kode="<?= $re['id_desa']; ?>" data-nama="<?= $re['nm_desa']; ?>">
                                <td align=" center"><?= $re['id_desa']; ?></td>
                                <td align=" center"><?= $re['nm_kab']; ?></td>
                                <td align=" center"><?= $re['nm_kec']; ?></td>
                                <td align=" center"><?= $re['nm_desa']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?= $this->include('sidesa/layout/user/content-footer') ?>
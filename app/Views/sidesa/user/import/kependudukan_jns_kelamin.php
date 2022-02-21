<?= $this->include('sidesa/layout/user/content-header') ?>
<?= $this->include('sidesa/layout/user/content-topbar') ?>
<?= $this->include('sidesa/layout/user/content-sidebar') ?>

<div class="page-content">
    <div class="container-fluid">

        <?= $page_title ?>

        <p class="text-center mb-3 mt-5">IP Public Anda : <?= $_SERVER['REMOTE_ADDR']; ?></p>
        <?php
        $open = 1;
        if ($open == 1 or $_SERVER['REMOTE_ADDR'] == '36.72.214.213' or $_SERVER['REMOTE_ADDR'] == '103.246.107.2') {
            echo form_open_multipart('user/import/importpendudukjnskel');
        ?>
            <table align="center" cellpadding="5">
                <tr>
                    <td>
                        <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                        <input type="file" class="form-control" size="40px" name="importexcel" accept=".xlsx,.xls">
                    </td>
                    <td colspan="5" align="center">
                        <button name="importnow" type="submit" class="btn btn-primary" onclick="return confirm('Konfirmasi data akan di import?');">Import Data</button>
                    </td>
                </tr>
                <tr>
                    <td><small class="form-text text-danger"><?= $validation->getError('importexcel'); ?></small></td>
                </tr>
            </table>
            <hr>
            <div class="form">
                <p class="text-center" style="color: forestgreen;"><i><?= session()->getFlashdata('message'); ?></i></p>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0" style="font-size: medium;">

                            <?php $request = \Config\Services::request(); ?>
                            <?php if ($request->uri->getSegment(3) == "penduduk_jns_kelamin_I") : ?>
                                <input hidden type="text" class="form-control" id="nmdata" name="nmdata" value="Kependudukan Jenis Kelamin I" readonly>
                                <input hidden type="text" class="form-control" id="uploadby" name="uploadby" value="<?= $user['nama']; ?>" readonly>
                                <input hidden type="text" class="form-control" id="image" name="image" value="<?= $user['image']; ?>" readonly>
                                <tr>
                                    <th class="col-xl-2" scope="row">Akan diinput oleh</th>
                                    <th class="col-xl-10">: <?= $user['nama']; ?></th>
                                </tr>
                                <tr>
                                    <th scope="row">Data saat ini</th>
                                    <th>: <?= number_format($getalldataI, 0, ',', '.'); ?></th>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun data</th>
                                    <th>:
                                        <?php foreach ($tahunI as $th) : ?>
                                            <?= $th['tahun']; ?>,
                                        <?php endforeach; ?>
                                    </th>
                                </tr>
                            <?php elseif ($request->uri->getSegment(3) == "penduduk_jns_kelamin_II") : ?>
                                <input hidden type="text" class="form-control" id="nmdata" name="nmdata" value="Kependudukan Jenis Kelamin II" readonly>
                                <input hidden type="text" class="form-control" id="uploadby" name="uploadby" value="<?= $user['nama']; ?>" readonly>
                                <input hidden type="text" class="form-control" id="image" name="image" value="<?= $user['image']; ?>" readonly>
                                <tr>
                                    <th class="col-xl-2" scope="row">Akan diinput oleh</th>
                                    <th class="col-xl-10">: <?= $user['nama']; ?></th>
                                </tr>
                                <tr>
                                    <th scope="row">Data saat ini</th>
                                    <th>: <?= number_format($getalldataII, 0, ',', '.'); ?></th>
                                </tr>
                                <tr>
                                    <th scope="row">Tahun data</th>
                                    <th>:
                                        <?php foreach ($tahunII as $th) : ?>
                                            <?= $th['tahun']; ?>,
                                        <?php endforeach; ?>
                                    </th>
                                </tr>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
            </div>
        <?php
            echo form_close();
        } else {
        ?>
            <h4 class="text-center mb-3">Maintenence</h4>
        <?php
        }
        ?>

    </div>
</div>
<?= $this->include('sidesa/layout/user/content-footer') ?>
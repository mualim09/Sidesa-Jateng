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

        <?= session()->getFlashdata('message'); ?>
        <?php if (isset($danadesa[0]['danadesa'], $danadesa[1]['danadesa'], $danadesa[2]['danadesa'], $danadesa[3]['danadesa'], $danadesa[4]['danadesa'], $danadesa[5]['danadesa'], $danadesa[6]['danadesa'], $danadesa[7]['danadesa'], $danadesa[8]['danadesa'], $danadesa[9]['danadesa'], $danadesa[10]['danadesa'], $danadesa[11]['danadesa'], $danadesa[12]['danadesa'], $danadesa[13]['danadesa'], $danadesa[14]['danadesa'], $danadesa[15]['danadesa'], $danadesa[16]['danadesa'], $danadesa[17]['danadesa'], $danadesa[18]['danadesa'], $danadesa[19]['danadesa'], $danadesa[20]['danadesa'], $danadesa[21]['danadesa'], $danadesa[22]['danadesa'], $danadesa[23]['danadesa'], $danadesa[24]['danadesa'], $danadesa[25]['danadesa'], $danadesa[26]['danadesa'], $danadesa[27]['danadesa'], $danadesa[28]['danadesa'])) : ?>
            <form action="" method="POST">
                <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
                <table class="table table-hover table-sm mt-3">
                    <div class="text-center">
                        <?php if (isset($danadesa[0]['bantuan_per_kpm'])) : ?>
                            <button type="submit" name="update" class="btn btn-dark waves-effect btn-label waves-light"><i class="bx bx-error label-icon"></i>Update</button>
                        <?php else : ?>
                            <button type="submit" name="insert" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-error label-icon"></i>Insert</button>
                        <?php endif; ?>
                    </div>
                    <thead>
                        <hr>
                        <tr>
                            <th scope="col" style="vertical-align: middle; width: 50px">NO</th>
                            <th scope="col" style="vertical-align: middle;">PENGGUNAAN DANA DESA</th>
                            <th scope="col" style="vertical-align: middle; width: 100px"></th>
                            <th scope="col" style="vertical-align: middle; width: 120px"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th style="vertical-align: middle;">1</th>
                            <td scope="col" style="vertical-align: middle;">REGULER</td>
                            <td scope="col" style="vertical-align: middle; text-align: right;">(%)</td>
                            <td scope="col" style="text-align: left;">
                                <input type="text" class="form-control" id="reguler" name="reguler" <?php if (isset($reguler[0]['persentase'])) : ?> value="<?= number_format(htmlspecialchars($reguler[0]['persentase']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('reguler'); ?>" <?php endif; ?> />
                                <small class="form-text text-danger"><?= $validation->getError('reguler'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle;">2</th>
                            <td scope="col" style="vertical-align: middle;">BLT DESA</td>
                            <td scope="col" style="vertical-align: middle; text-align: right;">(%)</td>
                            <td scope="col" style="text-align: left;">
                                <input type="text" class="form-control" id="bltdd" name="bltdd" <?php if (isset($bltdd[0]['persentase'])) : ?> value="<?= number_format(htmlspecialchars($bltdd[0]['persentase']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('bltdd'); ?>" <?php endif; ?> />
                                <small class="form-text text-danger"><?= $validation->getError('bltdd'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle;">3</th>
                            <td scope="col" style="vertical-align: middle;">KETAHANAN PANGAN</td>
                            <td scope="col" style="vertical-align: middle; text-align: right;">(%)</td>
                            <td scope="col" style="text-align: left;">
                                <input type="text" class="form-control" id="kph" name="kph" <?php if (isset($kph[0]['persentase'])) : ?> value="<?= number_format(htmlspecialchars($kph[0]['persentase']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('kph'); ?>" <?php endif; ?> />
                                <small class="form-text text-danger"><?= $validation->getError('kph'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle;">4</th>
                            <td scope="col" style="vertical-align: middle;">PENANGANAN COVID-19</td>
                            <td scope="col" style="vertical-align: middle; text-align: right;">(%)</td>
                            <td scope="col" style="text-align: left;">
                                <input type="text" class="form-control" id="covid" name="covid" <?php if (isset($covid[0]['persentase'])) : ?> value="<?= number_format(htmlspecialchars($covid[0]['persentase']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('covid'); ?>" <?php endif; ?> />
                                <small class="form-text text-danger"><?= $validation->getError('covid'); ?></small>
                            </td>
                        </tr>
                        <tr>
                            <th style="vertical-align: middle;">5</th>
                            <td scope="col" style="vertical-align: middle;">BANTUAN PER KPM</td>
                            <td scope="col" style="vertical-align: middle; text-align: right;">(RP)</td>
                            <td scope="col" style="text-align: left;">
                                <input type="text" class="form-control" id="kpm" name="kpm" <?php if (isset($danadesa[0]['bantuan_per_kpm'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[0]['bantuan_per_kpm']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('kpm'); ?>" <?php endif; ?> />
                                <small class="form-text text-danger"><?= $validation->getError('kpm'); ?></small>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <?php else : ?>
            <div class="text-center mt-4">
                <h3 style="color: crimson;">HARAP MENGISI ANGGARAN TERLEBIH DAHULU</h3>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->include('sidesa/layout/user/content-footer') ?>
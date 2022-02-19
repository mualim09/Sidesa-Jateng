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
        <form action="" method="POST">
            <input type="hidden" name="<?= csrf_token() ?>" value="<?= csrf_hash() ?>" />
            <table class="table table-hover table-sm mt-3">
                <div class="text-center">
                    <?php if ($danadesa != null) : ?>
                        <button type="submit" name="update" class="btn btn-dark waves-effect btn-label waves-light"><i class="bx bx-error label-icon"></i>Update</button>
                    <?php else : ?>
                        <button type="submit" name="insert" class="btn btn-danger waves-effect btn-label waves-light"><i class="bx bx-error label-icon"></i>Insert</button>
                    <?php endif; ?>
                </div>
                <thead>
                    <hr>
                    <tr>
                        <th scope="col" rowspan="2" style="vertical-align: middle;">No</th>
                        <th scope="col" rowspan="2" style="vertical-align: middle;">Kabupaten</th>
                        <th scope="col" rowspan="2" style="text-align: left; vertical-align: middle; width:19%;">Anggaran (Rp)</th>
                        <th scope="col" colspan="10" style="text-align: center; vertical-align: middle;">Laporan Salur - Realisasi (live)</th>
                    </tr>
                    <?php if (isset($danadesa[0]['danadesa']) && isset($realisasi_cilacap) || isset($danadesa[1]['danadesa']) && isset($realisasi_banyumas) || isset($danadesa[2]['danadesa']) && isset($realisasi_purbalingga) || isset($danadesa[3]['danadesa']) && isset($realisasi_banjarnegara) || isset($danadesa[4]['danadesa']) && isset($realisasi_kebumen) || isset($danadesa[5]['danadesa']) && isset($realisasi_purworejo) || isset($danadesa[6]['danadesa']) && isset($realisasi_wonosobo) || isset($danadesa[7]['danadesa']) && isset($realisasi_magelang) || isset($danadesa[8]['danadesa']) && isset($realisasi_boyolali) || isset($danadesa[9]['danadesa']) && isset($realisasi_klaten) || isset($danadesa[10]['danadesa']) && isset($realisasi_sukoharjo) || isset($danadesa[11]['danadesa']) && isset($realisasi_wonogiri) || isset($danadesa[12]['danadesa']) && isset($realisasi_karanganyar) || isset($danadesa[13]['danadesa']) && isset($realisasi_sragen) || isset($danadesa[14]['danadesa']) && isset($realisasi_grobogan) || isset($danadesa[15]['danadesa']) && isset($realisasi_blora) || isset($danadesa[16]['danadesa']) && isset($realisasi_rembang) || isset($danadesa[17]['danadesa']) && isset($realisasi_pati) || isset($danadesa[18]['danadesa']) && isset($realisasi_kudus) || isset($danadesa[19]['danadesa']) && isset($realisasi_jepara) || isset($danadesa[20]['danadesa']) && isset($realisasi_demak) || isset($danadesa[21]['danadesa']) && isset($realisasi_semarang) || isset($danadesa[22]['danadesa']) && isset($realisasi_temanggung) || isset($danadesa[23]['danadesa']) && isset($realisasi_kendal) || isset($danadesa[24]['danadesa']) && isset($realisasi_batang) || isset($danadesa[25]['danadesa']) && isset($realisasi_pekalongan) || isset($danadesa[26]['danadesa']) && isset($realisasi_pemalang) || isset($danadesa[27]['danadesa']) && isset($realisasi_tegal) || isset($danadesa[28]['danadesa']) && isset($realisasi_brebes)) : ?>
                        <tr>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Salur (Rp)</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Realisasi (Rp)</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Persantase Realisasi (%)</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Update</th>
                        </tr>
                    <?php endif; ?>
                </thead>
                <tbody>
                    <tr>
                        <th style="vertical-align: middle;">1</th>
                        <td scope="col" style="vertical-align: middle;">Cilacap</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa1" name="danadesa1" <?php if (isset($danadesa[0]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[0]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa1'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa1'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[0]['danadesa'], $salur_cilacap)) : ?>
                            <td scope="col" <?php if ($danadesa[0]['danadesa'] > $salur_cilacap) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[0]['danadesa'] == $salur_cilacap) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_cilacap, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_cilacap, $realisasi_cilacap)) : ?>
                            <td scope="col" <?php if ($salur_cilacap > $realisasi_cilacap) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_cilacap == $realisasi_cilacap) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_cilacap, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_cilacap, $salur_cilacap)) : ?>
                            <td scope="col" <?php if ($salur_cilacap > $realisasi_cilacap) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_cilacap == $realisasi_cilacap) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_cilacap / $salur_cilacap * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[0]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[0]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">2</th>
                        <td scope="col" style="vertical-align: middle;">Banyumas</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa2" name="danadesa2" <?php if (isset($danadesa[1]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[1]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa2'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa2'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[1]['danadesa'], $salur_banyumas)) : ?>
                            <td scope="col" <?php if ($danadesa[1]['danadesa'] > $salur_banyumas) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[1]['danadesa'] == $salur_banyumas) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_banyumas, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_banyumas, $realisasi_banyumas)) : ?>
                            <td scope="col" <?php if ($salur_banyumas > $realisasi_banyumas) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_banyumas == $realisasi_banyumas) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_banyumas, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_banyumas, $salur_banyumas)) : ?>
                            <td scope="col" <?php if ($salur_banyumas > $realisasi_banyumas) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_banyumas == $realisasi_banyumas) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_banyumas / $salur_banyumas * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[1]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[1]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">3</th>
                        <td scope="col" style="vertical-align: middle;">Purbalingga</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa3" name="danadesa3" <?php if (isset($danadesa[2]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[2]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa3'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa3'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[2]['danadesa'], $salur_purbalingga)) : ?>
                            <td scope="col" <?php if ($danadesa[2]['danadesa'] > $salur_purbalingga) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[2]['danadesa'] == $salur_purbalingga) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_purbalingga, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_purbalingga, $realisasi_purbalingga)) : ?>
                            <td scope="col" <?php if ($salur_purbalingga > $realisasi_purbalingga) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_purbalingga == $realisasi_purbalingga) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_purbalingga, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_purbalingga, $salur_purbalingga)) : ?>
                            <td scope="col" <?php if ($salur_purbalingga > $realisasi_purbalingga) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_purbalingga == $realisasi_purbalingga) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_purbalingga / $salur_purbalingga * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[2]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[2]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">4</th>
                        <td scope="col" style="vertical-align: middle;">Banjarnegara</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa4" name="danadesa4" <?php if (isset($danadesa[3]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[3]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa4'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa4'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[3]['danadesa'], $salur_banjarnegara)) : ?>
                            <td scope="col" <?php if ($danadesa[3]['danadesa'] > $salur_banjarnegara) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[3]['danadesa'] == $salur_banjarnegara) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_banjarnegara, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_banjarnegara, $realisasi_banjarnegara)) : ?>
                            <td scope="col" <?php if ($salur_banjarnegara > $realisasi_banjarnegara) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_banjarnegara == $realisasi_banjarnegara) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_banjarnegara, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_banjarnegara, $salur_banjarnegara)) : ?>
                            <td scope="col" <?php if ($salur_banjarnegara > $realisasi_banjarnegara) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_banjarnegara == $realisasi_banjarnegara) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_banjarnegara / $salur_banjarnegara * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[3]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[3]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">5</th>
                        <td scope="col" style="vertical-align: middle;">Kebumen</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa5" name="danadesa5" <?php if (isset($danadesa[4]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[4]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa5'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa5'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[4]['danadesa'], $salur_kebumen)) : ?>
                            <td scope="col" <?php if ($danadesa[4]['danadesa'] > $salur_kebumen) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[4]['danadesa'] == $salur_kebumen) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_kebumen, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_kebumen, $realisasi_kebumen)) : ?>
                            <td scope="col" <?php if ($salur_kebumen > $realisasi_kebumen) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_kebumen == $realisasi_kebumen) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_kebumen, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_kebumen, $salur_kebumen)) : ?>
                            <td scope="col" <?php if ($salur_kebumen > $realisasi_kebumen) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_kebumen == $realisasi_kebumen) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_kebumen / $salur_kebumen * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[4]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[4]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">6</th>
                        <td scope="col" style="vertical-align: middle;">Purworejo</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa6" name="danadesa6" <?php if (isset($danadesa[5]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[5]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa6'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa6'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[5]['danadesa'], $salur_purworejo)) : ?>
                            <td scope="col" <?php if ($danadesa[5]['danadesa'] > $salur_purworejo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[5]['danadesa'] == $salur_purworejo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_purworejo, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_purworejo, $realisasi_purworejo)) : ?>
                            <td scope="col" <?php if ($salur_purworejo > $realisasi_purworejo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_purworejo == $realisasi_purworejo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_purworejo, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_purworejo, $salur_purworejo)) : ?>
                            <td scope="col" <?php if ($salur_purworejo > $realisasi_purworejo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_purworejo == $realisasi_purworejo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_purworejo / $salur_purworejo * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[5]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[5]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">7</th>
                        <td scope="col" style="vertical-align: middle;">Wonosobo</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa7" name="danadesa7" <?php if (isset($danadesa[6]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[6]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa7'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa7'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[6]['danadesa'], $salur_wonosobo)) : ?>
                            <td scope="col" <?php if ($danadesa[6]['danadesa'] > $salur_wonosobo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[6]['danadesa'] == $salur_wonosobo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_wonosobo, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_wonosobo, $realisasi_wonosobo)) : ?>
                            <td scope="col" <?php if ($salur_wonosobo > $realisasi_wonosobo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_wonosobo == $realisasi_wonosobo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_wonosobo, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_wonosobo, $salur_wonosobo)) : ?>
                            <td scope="col" <?php if ($salur_wonosobo > $realisasi_wonosobo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_wonosobo == $realisasi_wonosobo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_wonosobo / $salur_wonosobo * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[6]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[6]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">8</th>
                        <td scope="col" style="vertical-align: middle;">Magelang</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa8" name="danadesa8" <?php if (isset($danadesa[7]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[7]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa8'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa8'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[7]['danadesa'], $salur_magelang)) : ?>
                            <td scope="col" <?php if ($danadesa[7]['danadesa'] > $salur_magelang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[7]['danadesa'] == $salur_magelang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_magelang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_magelang, $realisasi_magelang)) : ?>
                            <td scope="col" <?php if ($salur_magelang > $realisasi_magelang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_magelang == $realisasi_magelang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_magelang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_magelang, $salur_magelang)) : ?>
                            <td scope="col" <?php if ($salur_magelang > $realisasi_magelang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_magelang == $realisasi_magelang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_magelang / $salur_magelang * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[7]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[7]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">9</th>
                        <td scope="col" style="vertical-align: middle;">Boyolali</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa9" name="danadesa9" <?php if (isset($danadesa[8]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[8]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa9'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa9'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[8]['danadesa'], $salur_boyolali)) : ?>
                            <td scope="col" <?php if ($danadesa[8]['danadesa'] > $salur_boyolali) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[8]['danadesa'] == $salur_boyolali) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_boyolali, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_boyolali, $realisasi_boyolali)) : ?>
                            <td scope="col" <?php if ($salur_boyolali > $realisasi_boyolali) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_boyolali == $realisasi_boyolali) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_boyolali, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_boyolali, $salur_boyolali)) : ?>
                            <td scope="col" <?php if ($salur_boyolali > $realisasi_boyolali) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_boyolali == $realisasi_boyolali) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_boyolali / $salur_boyolali * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[8]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[8]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">10</th>
                        <td scope="col" style="vertical-align: middle;">Klaten</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa10" name="danadesa10" <?php if (isset($danadesa[9]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[9]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa10'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa10'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[9]['danadesa'], $salur_klaten)) : ?>
                            <td scope="col" <?php if ($danadesa[9]['danadesa'] > $salur_klaten) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[9]['danadesa'] == $salur_klaten) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_klaten, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_klaten, $realisasi_klaten)) : ?>
                            <td scope="col" <?php if ($salur_klaten > $realisasi_klaten) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_klaten == $realisasi_klaten) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_klaten, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_klaten, $salur_klaten)) : ?>
                            <td scope="col" <?php if ($salur_klaten > $realisasi_klaten) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_klaten == $realisasi_klaten) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_klaten / $salur_klaten * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[9]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[9]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">11</th>
                        <td scope="col" style="vertical-align: middle;">Sukoharjo</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa11" name="danadesa11" <?php if (isset($danadesa[10]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[10]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa11'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa11'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[10]['danadesa'], $salur_sukoharjo)) : ?>
                            <td scope="col" <?php if ($danadesa[10]['danadesa'] > $salur_sukoharjo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[10]['danadesa'] == $salur_sukoharjo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_sukoharjo, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_sukoharjo, $realisasi_sukoharjo)) : ?>
                            <td scope="col" <?php if ($salur_sukoharjo > $realisasi_sukoharjo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_sukoharjo == $realisasi_sukoharjo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_sukoharjo, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_sukoharjo, $salur_sukoharjo)) : ?>
                            <td scope="col" <?php if ($salur_sukoharjo > $realisasi_sukoharjo) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_sukoharjo == $realisasi_sukoharjo) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_sukoharjo / $salur_sukoharjo * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[10]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[10]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">12</th>
                        <td scope="col" style="vertical-align: middle;">Wonogiri</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa12" name="danadesa12" <?php if (isset($danadesa[11]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[11]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa12'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa12'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[11]['danadesa'], $salur_wonogiri)) : ?>
                            <td scope="col" <?php if ($danadesa[11]['danadesa'] > $salur_wonogiri) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[11]['danadesa'] == $salur_wonogiri) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_wonogiri, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_wonogiri, $realisasi_wonogiri)) : ?>
                            <td scope="col" <?php if ($salur_wonogiri > $realisasi_wonogiri) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_wonogiri == $realisasi_wonogiri) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_wonogiri, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_wonogiri, $salur_wonogiri)) : ?>
                            <td scope="col" <?php if ($salur_wonogiri > $realisasi_wonogiri) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_wonogiri == $realisasi_wonogiri) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_wonogiri / $salur_wonogiri * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[11]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[11]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">13</th>
                        <td scope="col" style="vertical-align: middle;">Karanganyar</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa13" name="danadesa13" <?php if (isset($danadesa[12]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[12]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa13'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa13'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[12]['danadesa'], $salur_karanganyar)) : ?>
                            <td scope="col" <?php if ($danadesa[12]['danadesa'] > $salur_karanganyar) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[12]['danadesa'] == $salur_karanganyar) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_karanganyar, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_karanganyar, $realisasi_karanganyar)) : ?>
                            <td scope="col" <?php if ($salur_karanganyar > $realisasi_karanganyar) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_karanganyar == $realisasi_karanganyar) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_karanganyar, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_karanganyar, $salur_karanganyar)) : ?>
                            <td scope="col" <?php if ($salur_karanganyar > $realisasi_karanganyar) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_karanganyar == $realisasi_karanganyar) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_karanganyar / $salur_karanganyar * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[12]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[12]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">14</th>
                        <td scope="col" style="vertical-align: middle;">Sragen</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa14" name="danadesa14" <?php if (isset($danadesa[13]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[13]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa14'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa14'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[13]['danadesa'], $salur_sragen)) : ?>
                            <td scope="col" <?php if ($danadesa[13]['danadesa'] > $salur_sragen) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[13]['danadesa'] == $salur_sragen) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_sragen, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_sragen, $realisasi_sragen)) : ?>
                            <td scope="col" <?php if ($salur_sragen > $realisasi_sragen) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_sragen == $realisasi_sragen) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_sragen, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_sragen, $salur_sragen)) : ?>
                            <td scope="col" <?php if ($salur_sragen > $realisasi_sragen) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_sragen == $realisasi_sragen) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_sragen / $salur_sragen * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[13]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[13]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">15</th>
                        <td scope="col" style="vertical-align: middle;">Grobogan</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa15" name="danadesa15" <?php if (isset($danadesa[14]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[14]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa15'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa15'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[14]['danadesa'], $salur_grobogan)) : ?>
                            <td scope="col" <?php if ($danadesa[14]['danadesa'] > $salur_grobogan) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[14]['danadesa'] == $salur_grobogan) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_grobogan, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_grobogan, $realisasi_grobogan)) : ?>
                            <td scope="col" <?php if ($salur_grobogan > $realisasi_grobogan) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_grobogan == $realisasi_grobogan) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_grobogan, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_grobogan, $salur_grobogan)) : ?>
                            <td scope="col" <?php if ($salur_grobogan > $realisasi_grobogan) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_grobogan == $realisasi_grobogan) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_grobogan / $salur_grobogan * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[14]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[14]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">16</th>
                        <td scope="col" style="vertical-align: middle;">Blora</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa16" name="danadesa16" <?php if (isset($danadesa[15]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[15]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa16'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa16'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[15]['danadesa'], $salur_blora)) : ?>
                            <td scope="col" <?php if ($danadesa[15]['danadesa'] > $salur_blora) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[15]['danadesa'] == $salur_blora) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_blora, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_blora, $realisasi_blora)) : ?>
                            <td scope="col" <?php if ($salur_blora > $realisasi_blora) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_blora == $realisasi_blora) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_blora, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_blora, $salur_blora)) : ?>
                            <td scope="col" <?php if ($salur_blora > $realisasi_blora) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_blora == $realisasi_blora) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_blora / $salur_blora * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[15]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[15]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">17</th>
                        <td scope="col" style="vertical-align: middle;">Rembang</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa17" name="danadesa17" <?php if (isset($danadesa[16]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[16]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa17'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa17'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[16]['danadesa'], $salur_rembang)) : ?>
                            <td scope="col" <?php if ($danadesa[16]['danadesa'] > $salur_rembang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[16]['danadesa'] == $salur_rembang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_rembang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_rembang, $realisasi_rembang)) : ?>
                            <td scope="col" <?php if ($salur_rembang > $realisasi_rembang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_rembang == $realisasi_rembang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_rembang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_rembang, $salur_rembang)) : ?>
                            <td scope="col" <?php if ($salur_rembang > $realisasi_rembang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_rembang == $realisasi_rembang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_rembang / $salur_rembang * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[16]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[16]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">18</th>
                        <td scope="col" style="vertical-align: middle;">Pati</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa18" name="danadesa18" <?php if (isset($danadesa[17]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[17]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa18'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa18'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[17]['danadesa'], $salur_pati)) : ?>
                            <td scope="col" <?php if ($danadesa[17]['danadesa'] > $salur_pati) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[17]['danadesa'] == $salur_pati) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_pati, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_pati, $realisasi_pati)) : ?>
                            <td scope="col" <?php if ($salur_pati > $realisasi_pati) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_pati == $realisasi_pati) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_pati, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_pati, $salur_pati)) : ?>
                            <td scope="col" <?php if ($salur_pati > $realisasi_pati) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_pati == $realisasi_pati) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_pati / $salur_pati * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[17]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[17]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">19</th>
                        <td scope="col" style="vertical-align: middle;">Kudus</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa19" name="danadesa19" <?php if (isset($danadesa[18]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[18]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa19'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa19'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[18]['danadesa'], $salur_kudus)) : ?>
                            <td scope="col" <?php if ($danadesa[18]['danadesa'] > $salur_kudus) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[18]['danadesa'] == $salur_kudus) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_kudus, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_kudus, $realisasi_kudus)) : ?>
                            <td scope="col" <?php if ($salur_kudus > $realisasi_kudus) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_kudus == $realisasi_kudus) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_kudus, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_kudus, $salur_kudus)) : ?>
                            <td scope="col" <?php if ($salur_kudus > $realisasi_kudus) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_kudus == $realisasi_kudus) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_kudus / $salur_kudus * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[18]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[18]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">20</th>
                        <td scope="col" style="vertical-align: middle;">Jepara</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa20" name="danadesa20" <?php if (isset($danadesa[19]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[19]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa20'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa20'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[19]['danadesa'], $salur_jepara)) : ?>
                            <td scope="col" <?php if ($danadesa[19]['danadesa'] > $salur_jepara) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[19]['danadesa'] == $salur_jepara) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_jepara, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_jepara, $realisasi_jepara)) : ?>
                            <td scope="col" <?php if ($salur_jepara > $realisasi_jepara) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_jepara == $realisasi_jepara) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_jepara, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_jepara, $salur_jepara)) : ?>
                            <td scope="col" <?php if ($salur_jepara > $realisasi_jepara) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_jepara == $realisasi_jepara) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_jepara / $salur_jepara * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[19]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[19]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">21</th>
                        <td scope="col" style="vertical-align: middle;">Demak</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa21" name="danadesa21" <?php if (isset($danadesa[20]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[20]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa21'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa21'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[20]['danadesa'], $salur_demak)) : ?>
                            <td scope="col" <?php if ($danadesa[20]['danadesa'] > $salur_demak) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[20]['danadesa'] == $salur_demak) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_demak, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_demak, $realisasi_demak)) : ?>
                            <td scope="col" <?php if ($salur_demak > $realisasi_demak) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_demak == $realisasi_demak) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_demak, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_demak, $salur_demak)) : ?>
                            <td scope="col" <?php if ($salur_demak > $realisasi_demak) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_demak == $realisasi_demak) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_demak / $salur_demak * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[20]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[20]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">22</th>
                        <td scope="col" style="vertical-align: middle;">Semarang</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa22" name="danadesa22" <?php if (isset($danadesa[21]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[21]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa22'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa22'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[21]['danadesa'], $salur_semarang)) : ?>
                            <td scope="col" <?php if ($danadesa[21]['danadesa'] > $salur_semarang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[21]['danadesa'] == $salur_semarang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_semarang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_semarang, $realisasi_semarang)) : ?>
                            <td scope="col" <?php if ($salur_semarang > $realisasi_semarang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_semarang == $realisasi_semarang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_semarang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_semarang, $salur_semarang)) : ?>
                            <td scope="col" <?php if ($salur_semarang > $realisasi_semarang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_semarang == $realisasi_semarang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_semarang / $salur_semarang * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[21]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[21]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">23</th>
                        <td scope="col" style="vertical-align: middle;">Temanggung</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa23" name="danadesa23" <?php if (isset($danadesa[22]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[22]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa23'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa23'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[22]['danadesa'], $salur_temanggung)) : ?>
                            <td scope="col" <?php if ($danadesa[22]['danadesa'] > $salur_temanggung) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[22]['danadesa'] == $salur_temanggung) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_temanggung, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_temanggung, $realisasi_temanggung)) : ?>
                            <td scope="col" <?php if ($salur_temanggung > $realisasi_temanggung) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_temanggung == $realisasi_temanggung) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_temanggung, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_temanggung, $salur_temanggung)) : ?>
                            <td scope="col" <?php if ($salur_temanggung > $realisasi_temanggung) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_temanggung == $realisasi_temanggung) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_temanggung / $salur_temanggung * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[22]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[22]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">24</th>
                        <td scope="col" style="vertical-align: middle;">Kendal</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa24" name="danadesa24" <?php if (isset($danadesa[23]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[23]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa24'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa24'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[23]['danadesa'], $salur_kendal)) : ?>
                            <td scope="col" <?php if ($danadesa[23]['danadesa'] > $salur_kendal) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[23]['danadesa'] == $salur_kendal) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_kendal, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_kendal, $realisasi_kendal)) : ?>
                            <td scope="col" <?php if ($salur_kendal > $realisasi_kendal) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_kendal == $realisasi_kendal) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_kendal, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_kendal, $salur_kendal)) : ?>
                            <td scope="col" <?php if ($salur_kendal > $realisasi_kendal) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_kendal == $realisasi_kendal) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_kendal / $salur_kendal * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[23]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[23]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">25</th>
                        <td scope="col" style="vertical-align: middle;">Batang</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa25" name="danadesa25" <?php if (isset($danadesa[24]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[24]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa25'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa25'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[24]['danadesa'], $salur_batang)) : ?>
                            <td scope="col" <?php if ($danadesa[24]['danadesa'] > $salur_batang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[24]['danadesa'] == $salur_batang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_batang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_batang, $realisasi_batang)) : ?>
                            <td scope="col" <?php if ($salur_batang > $realisasi_batang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_batang == $realisasi_batang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_batang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_batang, $salur_batang)) : ?>
                            <td scope="col" <?php if ($salur_batang > $realisasi_batang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_batang == $realisasi_batang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_batang / $salur_batang * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[24]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[24]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">26</th>
                        <td scope="col" style="vertical-align: middle;">Pekalongan</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa26" name="danadesa26" <?php if (isset($danadesa[25]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[25]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa26'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa26'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[25]['danadesa'], $salur_pekalongan)) : ?>
                            <td scope="col" <?php if ($danadesa[25]['danadesa'] > $salur_pekalongan) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[25]['danadesa'] == $salur_pekalongan) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_pekalongan, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_pekalongan, $realisasi_pekalongan)) : ?>
                            <td scope="col" <?php if ($salur_pekalongan > $realisasi_pekalongan) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_pekalongan == $realisasi_pekalongan) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_pekalongan, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_pekalongan, $salur_pekalongan)) : ?>
                            <td scope="col" <?php if ($salur_pekalongan > $realisasi_pekalongan) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_pekalongan == $realisasi_pekalongan) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_pekalongan / $salur_pekalongan * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[25]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[25]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">27</th>
                        <td scope="col" style="vertical-align: middle;">Pemalang</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa27" name="danadesa27" <?php if (isset($danadesa[26]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[26]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa27'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa27'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[26]['danadesa'], $salur_pemalang)) : ?>
                            <td scope="col" <?php if ($danadesa[26]['danadesa'] > $salur_pemalang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[26]['danadesa'] == $salur_pemalang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_pemalang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_pemalang, $realisasi_pemalang)) : ?>
                            <td scope="col" <?php if ($salur_pemalang > $realisasi_pemalang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_pemalang == $realisasi_pemalang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_pemalang, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_pemalang, $salur_pemalang)) : ?>
                            <td scope="col" <?php if ($salur_pemalang > $realisasi_pemalang) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_pemalang == $realisasi_pemalang) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_pemalang / $salur_pemalang * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[26]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[26]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">28</th>
                        <td scope="col" style="vertical-align: middle;">Tegal</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa28" name="danadesa28" <?php if (isset($danadesa[27]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[27]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa28'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa28'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[27]['danadesa'], $salur_tegal)) : ?>
                            <td scope="col" <?php if ($danadesa[27]['danadesa'] > $salur_tegal) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[27]['danadesa'] == $salur_tegal) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_tegal, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_tegal, $realisasi_tegal)) : ?>
                            <td scope="col" <?php if ($salur_tegal > $realisasi_tegal) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_tegal == $realisasi_tegal) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_tegal, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_tegal, $salur_tegal)) : ?>
                            <td scope="col" <?php if ($salur_tegal > $realisasi_tegal) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_tegal == $realisasi_tegal) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_tegal / $salur_tegal * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[27]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[27]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <th style="vertical-align: middle;">29</th>
                        <td scope="col" style="vertical-align: middle;">Brebes</td>
                        <td scope="col" style="text-align: left;">
                            <input type="text" class="form-control" id="danadesa29" name="danadesa29" <?php if (isset($danadesa[28]['danadesa'])) : ?> value="<?= number_format(htmlspecialchars($danadesa[28]['danadesa']), 0, '', '.'); ?>" <?php else : ?> value="<?= old('danadesa29'); ?>" <?php endif; ?> />
                            <small class="form-text text-danger"><?= $validation->getError('danadesa29'); ?></small>
                        </td>

                        <!-- salur -->
                        <?php if (isset($danadesa[28]['danadesa'], $salur_brebes)) : ?>
                            <td scope="col" <?php if ($danadesa[28]['danadesa'] > $salur_brebes) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($danadesa[28]['danadesa'] == $salur_brebes) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($salur_brebes, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- realisasi -->
                        <?php if (isset($salur_brebes, $realisasi_brebes)) : ?>
                            <td scope="col" <?php if ($salur_brebes > $realisasi_brebes) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_brebes == $realisasi_brebes) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="color:goldenrod; vertical-align: middle; text-align: center;" <?php endif; ?>><?= number_format($realisasi_brebes, 0, '', '.'); ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- persentase salur - realisasi -->
                        <?php if (isset($realisasi_brebes, $salur_brebes)) : ?>
                            <td scope="col" <?php if ($salur_brebes > $realisasi_brebes) : ?> style="color: red; vertical-align: middle; text-align: center;" <?php elseif ($salur_brebes == $realisasi_brebes) : ?> style="color: green; vertical-align: middle; text-align: center;" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($realisasi_brebes / $salur_brebes * 100, 2, ',', '.'); ?> %</td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>

                        <!-- update laporan live -->
                        <?php if (isset($danadesa[28]['created'])) : ?>
                            <td scope="col" style="vertical-align: middle; text-align: center;" /><?= timeAgo($danadesa[28]['created']) . ' yang lalu'; ?></td>
                        <?php else : ?>
                            <td></td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<?= $this->include('sidesa/layout/user/content-footer') ?>
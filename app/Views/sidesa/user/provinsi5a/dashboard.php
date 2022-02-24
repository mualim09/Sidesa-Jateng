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

        <div class="section-title text-center">
            <h3 style="text-transform: uppercase;">Informasi Dana Desa</h3>
        </div>
        <?php if ($grand_total_anggaran != 0) : ?>
            <div class="row">
                <div class="section-title text-center">
                    <h3 style="text-transform: uppercase;">Rekap Salur dana desa Jawa Tengah</h3>
                </div>
                <form class="needs-validation custom-form pt-2" method="POST" action="<?= base_url('user/provinsi5a'); ?>">
                    <div class="mb-3" style="text-align:right">
                        <button type="submit" name="download" class="btn btn-dark waves-effect btn-label waves-light"><i class="bx bxs-download label-icon"></i>Download</button>
                    </div>
                </form>
                <table class="table table-hover table-sm mt-3 mb-5">
                    <hr>
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="vertical-align: middle;">Kabupaten</th>
                            <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle;">DIPA (Rp)</th>
                            <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle;">Total Salur (Rp)</th>
                            <th scope="col" colspan="20" style="text-align: center; vertical-align: middle;">Laporan Salur - Prioritas (live)</th>
                        </tr>
                        <?php if (isset($cilacap_salur_total) || isset($banyumas_salur_total) || isset($purbalingga_salur_total) || isset($banjarnegara_salur_total) || isset($kebumen_salur_total) || isset($purworejo_salur_total) || isset($wonosobo_salur_total) || isset($magelang_salur_total) || isset($boyolali_salur_total) || isset($klaten_salur_total) || isset($sukoharjo_salur_total) || isset($wonogiri_salur_total) || isset($karanganyar_salur_total) || isset($sragen_salur_total) || isset($grobogan_salur_total) || isset($blora_salur_total) || isset($rembang_salur_total) || isset($pati_salur_total) || isset($kudus_salur_total) || isset($jepara_salur_total) || isset($demak_salur_total) || isset($semarang_salur_total) || isset($temanggung_salur_total) || isset($kendal_salur_total) || isset($batang_salur_total) || isset($pekalongan_salur_total) || isset($pemalang_salur_total) || isset($tegal_salur_total) || isset($brebes_salur_total)) : ?>
                            <tr>
                                <th scope="col" style="vertical-align: middle; text-align: center;">REG (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">BLTDD (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">KPH (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">COVID-19 (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Update</th>
                            </tr>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Cilacap</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[0]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[0]['danadesa'] > $cilacap_salur_total || $cilacap_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[0]['danadesa'] == $cilacap_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($cilacap_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_cilacap_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($cilacap_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_cilacap_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_cilacap_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_cilacap_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($cilacap_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_cilacap_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_cilacap_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_cilacap_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($cilacap_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_cilacap_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_cilacap_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_cilacap_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($cilacap_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_cilacap_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_cilacap_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_cilacap_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[0]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[0]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Banyumas</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[1]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[1]['danadesa'] > $banyumas_salur_total || $banyumas_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[1]['danadesa'] == $banyumas_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banyumas_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_banyumas_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($banyumas_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banyumas_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banyumas_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_banyumas_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banyumas_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banyumas_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banyumas_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_banyumas_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banyumas_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banyumas_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banyumas_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_banyumas_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banyumas_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banyumas_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banyumas_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banyumas_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[1]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[1]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Purbalingga</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[2]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[2]['danadesa'] > $purbalingga_salur_total || $purbalingga_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[2]['danadesa'] == $purbalingga_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purbalingga_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_purbalingga_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($purbalingga_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purbalingga_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purbalingga_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_purbalingga_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purbalingga_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purbalingga_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purbalingga_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_purbalingga_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purbalingga_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purbalingga_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purbalingga_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_purbalingga_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purbalingga_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purbalingga_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purbalingga_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purbalingga_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[2]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[2]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Banjarnegara</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[3]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[3]['danadesa'] > $banjarnegara_salur_total || $banjarnegara_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[3]['danadesa'] == $banjarnegara_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banjarnegara_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($banjarnegara_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banjarnegara_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banjarnegara_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banjarnegara_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banjarnegara_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banjarnegara_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($banjarnegara_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_banjarnegara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_banjarnegara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_banjarnegara_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[3]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[3]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kebumen</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[4]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[4]['danadesa'] > $kebumen_salur_total || $kebumen_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[4]['danadesa'] == $kebumen_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kebumen_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_kebumen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($kebumen_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kebumen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kebumen_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_kebumen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kebumen_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kebumen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kebumen_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_kebumen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kebumen_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kebumen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kebumen_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_kebumen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kebumen_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kebumen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kebumen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kebumen_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[4]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[4]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Purworejo</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[5]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[5]['danadesa'] > $purworejo_salur_total || $purworejo_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[5]['danadesa'] == $purworejo_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purworejo_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_purworejo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($purworejo_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purworejo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purworejo_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_purworejo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purworejo_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purworejo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purworejo_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_purworejo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purworejo_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purworejo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purworejo_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_purworejo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($purworejo_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_purworejo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_purworejo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_purworejo_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[5]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[5]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Wonosobo</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[6]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[6]['danadesa'] > $wonosobo_salur_total || $wonosobo_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[6]['danadesa'] == $wonosobo_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonosobo_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_wonosobo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($wonosobo_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonosobo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonosobo_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_wonosobo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonosobo_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonosobo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonosobo_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_wonosobo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonosobo_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonosobo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonosobo_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_wonosobo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonosobo_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonosobo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonosobo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonosobo_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[6]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[6]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Magelang</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[7]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[7]['danadesa'] > $magelang_salur_total || $magelang_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[7]['danadesa'] == $magelang_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($magelang_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_magelang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($magelang_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_magelang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_magelang_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_magelang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($magelang_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_magelang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_magelang_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_magelang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($magelang_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_magelang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_magelang_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_magelang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($magelang_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_magelang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_magelang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_magelang_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[7]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[7]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Boyolali</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[8]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[8]['danadesa'] > $boyolali_salur_total || $boyolali_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[8]['danadesa'] == $boyolali_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($boyolali_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_boyolali_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($boyolali_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_boyolali_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_boyolali_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_boyolali_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($boyolali_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_boyolali_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_boyolali_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_boyolali_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($boyolali_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_boyolali_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_boyolali_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_boyolali_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($boyolali_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_boyolali_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_boyolali_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_boyolali_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[8]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[8]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Klaten</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[9]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[9]['danadesa'] > $klaten_salur_total || $klaten_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[9]['danadesa'] == $klaten_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($klaten_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_klaten_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($klaten_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_klaten_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_klaten_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_klaten_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($klaten_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_klaten_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_klaten_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_klaten_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($klaten_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_klaten_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_klaten_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_klaten_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($klaten_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_klaten_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_klaten_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_klaten_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[9]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[9]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Sukoharjo</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[10]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[10]['danadesa'] > $sukoharjo_salur_total || $sukoharjo_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[10]['danadesa'] == $sukoharjo_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sukoharjo_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($sukoharjo_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sukoharjo_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sukoharjo_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sukoharjo_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sukoharjo_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sukoharjo_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sukoharjo_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sukoharjo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sukoharjo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sukoharjo_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[10]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[10]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Wonogiri</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[11]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[11]['danadesa'] > $wonogiri_salur_total || $wonogiri_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[11]['danadesa'] == $wonogiri_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonogiri_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_wonogiri_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($wonogiri_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonogiri_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonogiri_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_wonogiri_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonogiri_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonogiri_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonogiri_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_wonogiri_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonogiri_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonogiri_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonogiri_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_wonogiri_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($wonogiri_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_wonogiri_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_wonogiri_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_wonogiri_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[11]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[11]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Karanganyar</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[12]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[12]['danadesa'] > $karanganyar_salur_total || $karanganyar_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[12]['danadesa'] == $karanganyar_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($karanganyar_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_karanganyar_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($karanganyar_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_karanganyar_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_karanganyar_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_karanganyar_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($karanganyar_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_karanganyar_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_karanganyar_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_karanganyar_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($karanganyar_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_karanganyar_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_karanganyar_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_karanganyar_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($karanganyar_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_karanganyar_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_karanganyar_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_karanganyar_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[12]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[12]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Sragen</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[13]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[13]['danadesa'] > $sragen_salur_total || $sragen_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[13]['danadesa'] == $sragen_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sragen_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_sragen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($sragen_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sragen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sragen_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_sragen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sragen_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sragen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sragen_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_sragen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sragen_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sragen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sragen_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_sragen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($sragen_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_sragen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_sragen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_sragen_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[13]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[13]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Grobogan</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[14]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[14]['danadesa'] > $grobogan_salur_total || $grobogan_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[14]['danadesa'] == $grobogan_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($grobogan_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_grobogan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($grobogan_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_grobogan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_grobogan_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_grobogan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($grobogan_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_grobogan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_grobogan_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_grobogan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($grobogan_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_grobogan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_grobogan_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_grobogan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($grobogan_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_grobogan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_grobogan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_grobogan_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[14]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[14]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Blora</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[15]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[15]['danadesa'] > $blora_salur_total || $blora_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[15]['danadesa'] == $blora_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($blora_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_blora_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($blora_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_blora_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_blora_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_blora_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($blora_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_blora_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_blora_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_blora_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($blora_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_blora_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_blora_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_blora_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($blora_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_blora_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_blora_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_blora_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[15]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[15]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Rembang</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[16]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[16]['danadesa'] > $rembang_salur_total || $rembang_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[16]['danadesa'] == $rembang_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($rembang_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_rembang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($rembang_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_rembang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_rembang_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_rembang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($rembang_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_rembang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_rembang_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_rembang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($rembang_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_rembang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_rembang_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_rembang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($rembang_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_rembang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_rembang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_rembang_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[16]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[16]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pati</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[17]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[17]['danadesa'] > $pati_salur_total || $pati_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[17]['danadesa'] == $pati_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pati_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_pati_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($pati_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pati_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pati_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_pati_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pati_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pati_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pati_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_pati_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pati_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pati_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pati_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_pati_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pati_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pati_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pati_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pati_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[17]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[17]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kudus</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[18]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[18]['danadesa'] > $kudus_salur_total || $kudus_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[18]['danadesa'] == $kudus_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kudus_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_kudus_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($kudus_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kudus_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kudus_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_kudus_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kudus_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kudus_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kudus_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_kudus_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kudus_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kudus_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kudus_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_kudus_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kudus_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kudus_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kudus_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kudus_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[18]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[18]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Jepara</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[19]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[19]['danadesa'] > $jepara_salur_total || $jepara_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[19]['danadesa'] == $jepara_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($jepara_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_jepara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($jepara_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_jepara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_jepara_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_jepara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($jepara_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_jepara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_jepara_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_jepara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($jepara_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_jepara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_jepara_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_jepara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($jepara_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_jepara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_jepara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_jepara_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[19]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[19]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Demak</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[20]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[20]['danadesa'] > $demak_salur_total || $demak_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[20]['danadesa'] == $demak_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($demak_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_demak_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($demak_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_demak_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_demak_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_demak_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($demak_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_demak_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_demak_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_demak_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($demak_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_demak_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_demak_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_demak_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($demak_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_demak_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_demak_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_demak_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[20]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[20]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Semarang</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[21]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[21]['danadesa'] > $semarang_salur_total || $semarang_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[21]['danadesa'] == $semarang_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($semarang_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_semarang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($semarang_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_semarang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_semarang_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_semarang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($semarang_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_semarang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_semarang_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_semarang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($semarang_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_semarang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_semarang_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_semarang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($semarang_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_semarang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_semarang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_semarang_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[21]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[21]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Temanggung</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[22]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[22]['danadesa'] > $temanggung_salur_total || $temanggung_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[22]['danadesa'] == $temanggung_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($temanggung_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_temanggung_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($temanggung_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_temanggung_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_temanggung_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_temanggung_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($temanggung_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_temanggung_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_temanggung_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_temanggung_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($temanggung_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_temanggung_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_temanggung_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_temanggung_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($temanggung_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_temanggung_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_temanggung_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_temanggung_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[22]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[22]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kendal</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[23]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[23]['danadesa'] > $kendal_salur_total || $kendal_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[23]['danadesa'] == $kendal_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kendal_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_kendal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($kendal_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kendal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kendal_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_kendal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kendal_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kendal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kendal_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_kendal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kendal_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kendal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kendal_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_kendal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($kendal_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_kendal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_kendal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_kendal_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[23]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[23]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Batang</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[24]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[24]['danadesa'] > $batang_salur_total || $batang_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[24]['danadesa'] == $batang_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($batang_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_batang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($batang_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_batang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_batang_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_batang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($batang_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_batang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_batang_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_batang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($batang_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_batang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_batang_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_batang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($batang_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_batang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_batang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_batang_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[24]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[24]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pekalong</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[25]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[25]['danadesa'] > $pekalongan_salur_total || $pekalongan_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[25]['danadesa'] == $pekalongan_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pekalongan_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_pekalongan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($pekalongan_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pekalongan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pekalongan_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_pekalongan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pekalongan_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pekalongan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pekalongan_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_pekalongan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pekalongan_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pekalongan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pekalongan_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_pekalongan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pekalongan_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pekalongan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pekalongan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pekalongan_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[25]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[25]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pemalang</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[26]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[26]['danadesa'] > $pemalang_salur_total || $pemalang_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[26]['danadesa'] == $pemalang_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pemalang_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_pemalang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($pemalang_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pemalang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pemalang_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_pemalang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pemalang_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pemalang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pemalang_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_pemalang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pemalang_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pemalang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pemalang_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_pemalang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($pemalang_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_pemalang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_pemalang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_pemalang_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[26]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[26]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Tegal</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[27]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[27]['danadesa'] > $tegal_salur_total || $tegal_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[27]['danadesa'] == $tegal_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($tegal_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_tegal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($tegal_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_tegal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_tegal_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_tegal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($tegal_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_tegal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_tegal_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_tegal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($tegal_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_tegal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_tegal_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_tegal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($tegal_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_tegal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_tegal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_tegal_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[27]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[27]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Brebes</td>

                            <!-- laporan salur -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[28]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[28]['danadesa'] > $brebes_salur_total || $brebes_salur_total == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[28]['danadesa'] == $brebes_salur_total) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($brebes_salur_total, 0, '', '.'); ?></td>
                            <!-- reguler -->
                            <td scope="col" <?php if ($capaian_salur_brebes_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($brebes_jumlah_salur_reg, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_brebes_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_brebes_reg; ?></td>
                            <!-- bltdd -->
                            <td scope="col" <?php if ($capaian_salur_brebes_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($brebes_jumlah_salur_bltdd, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_brebes_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_brebes_bltdd; ?></td>
                            <!-- kph -->
                            <td scope="col" <?php if ($capaian_salur_brebes_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($brebes_jumlah_salur_kph, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_brebes_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_brebes_kph; ?></td>
                            <!-- covid -->
                            <td scope="col" <?php if ($capaian_salur_brebes_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($brebes_jumlah_salur_covid, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_salur_brebes_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_salur_brebes_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_salur_brebes_covid; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[28]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[28]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>

                <div class="section-title text-center">
                    <h3 style="text-transform: uppercase;">Rekap Realisasi dana desa Jawa Tengah</h3>
                </div>
                <table class="table table-hover table-sm mt-3 mb-5">
                    <hr>
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="vertical-align: middle;">Kabupaten</th>
                            <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle;">DIPA (Rp)</th>
                            <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle;">Total Realisasi (Rp)</th>
                            <th scope="col" colspan="20" style="text-align: center; vertical-align: middle;">Laporan Realisasi - Prioritas (live)</th>
                        </tr>
                        <?php if (isset($realisasi_cilacap) || isset($realisasi_banyumas) || isset($realisasi_purbalingga) || isset($realisasi_banjarnegara) || isset($realisasi_kebumen) || isset($realisasi_purworejo) || isset($realisasi_wonosobo) || isset($realisasi_magelang) || isset($realisasi_boyolali) || isset($realisasi_klaten) || isset($realisasi_sukoharjo) || isset($realisasi_wonogiri) || isset($realisasi_karanganyar) || isset($realisasi_sragen) || isset($realisasi_grobogan) || isset($realisasi_blora) || isset($realisasi_rembang) || isset($realisasi_pati) || isset($realisasi_kudus) || isset($realisasi_jepara) || isset($realisasi_demak) || isset($realisasi_semarang) || isset($realisasi_temanggung) || isset($realisasi_kendal) || isset($realisasi_batang) || isset($realisasi_pekalongan) || isset($realisasi_pemalang) || isset($realisasi_tegal) || isset($realisasi_brebes)) : ?>
                            <tr>
                                <th scope="col" style="vertical-align: middle; text-align: center;">REG (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">BLTDD (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">KPH (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">COVID-19 (Rp)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Capaian (%)</th>
                                <th scope="col" style="vertical-align: middle; text-align: center;">Update</th>
                            </tr>
                        <?php endif; ?>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Cilacap</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[0]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[0]['danadesa'] > $realisasi_cilacap || $realisasi_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[0]['danadesa'] == $realisasi_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_cilacap, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_cilacap, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_cilacap_reg; ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_cilacap, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_cilacap_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_cilacap, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_cilacap_kph; ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_cilacap, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_cilacap_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_cilacap_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_cilacap_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[0]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[0]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Banyumas</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[1]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[1]['danadesa'] > $realisasi_banyumas || $realisasi_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[1]['danadesa'] == $realisasi_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_banyumas, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_banyumas, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banyumas_reg; ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_banyumas, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banyumas_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_banyumas, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banyumas_kph; ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_banyumas, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banyumas_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banyumas_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banyumas_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[1]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[1]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Purbalingga</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[2]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[2]['danadesa'] > $realisasi_purbalingga || $realisasi_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[2]['danadesa'] == $realisasi_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_purbalingga, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_purbalingga, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purbalingga_reg; ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_purbalingga, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purbalingga_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_purbalingga, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purbalingga_kph; ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_purbalingga, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purbalingga_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purbalingga_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purbalingga_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[2]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[2]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Banjarnegara</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[3]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[3]['danadesa'] > $realisasi_banjarnegara || $realisasi_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[3]['danadesa'] == $realisasi_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_banjarnegara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_banjarnegara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banjarnegara_reg; ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_banjarnegara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banjarnegara_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_banjarnegara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banjarnegara_kph; ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_banjarnegara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_banjarnegara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_banjarnegara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_banjarnegara_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[3]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[3]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kebumen</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[4]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[4]['danadesa'] > $realisasi_kebumen || $realisasi_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[4]['danadesa'] == $realisasi_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kebumen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_kebumen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kebumen_reg; ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_kebumen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kebumen_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_kebumen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kebumen_kph; ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_kebumen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kebumen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kebumen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kebumen_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[4]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[4]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Purworejo</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[5]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[5]['danadesa'] > $realisasi_purworejo || $realisasi_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[5]['danadesa'] == $realisasi_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_purworejo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_purworejo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purworejo_reg; ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_purworejo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purworejo_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_purworejo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purworejo_kph; ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_purworejo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_purworejo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_purworejo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_purworejo_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[5]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[5]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Wonosobo</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[6]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[6]['danadesa'] > $realisasi_wonosobo || $realisasi_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[6]['danadesa'] == $realisasi_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_wonosobo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_wonosobo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonosobo_reg; ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_wonosobo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonosobo_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_wonosobo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonosobo_kph; ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_wonosobo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonosobo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonosobo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonosobo_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[6]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[6]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Magelang</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[7]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[7]['danadesa'] > $realisasi_magelang || $realisasi_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[7]['danadesa'] == $realisasi_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_magelang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_magelang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_magelang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_magelang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_magelang_reg; ?></td>
                            <td scope="col" <?php if ($capaian_magelang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_magelang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_magelang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_magelang_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_magelang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_magelang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_magelang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_magelang_kph; ?></td>
                            <td scope="col" <?php if ($capaian_magelang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_magelang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_magelang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_magelang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_magelang_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[7]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[7]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Boyolali</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[8]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[8]['danadesa'] > $realisasi_boyolali || $realisasi_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[8]['danadesa'] == $realisasi_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_boyolali, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_boyolali, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_boyolali_reg; ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_boyolali, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_boyolali_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_boyolali, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_boyolali_kph; ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_boyolali, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_boyolali_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_boyolali_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_boyolali_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[8]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[8]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Klaten</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[9]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[9]['danadesa'] > $realisasi_klaten || $realisasi_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[9]['danadesa'] == $realisasi_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_klaten, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_klaten_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_klaten, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_klaten_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_klaten_reg; ?></td>
                            <td scope="col" <?php if ($capaian_klaten_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_klaten, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_klaten_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_klaten_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_klaten_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_klaten, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_klaten_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_klaten_kph; ?></td>
                            <td scope="col" <?php if ($capaian_klaten_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_klaten, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_klaten_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_klaten_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_klaten_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[9]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[9]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Sukoharjo</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[10]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[10]['danadesa'] > $realisasi_sukoharjo || $realisasi_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[10]['danadesa'] == $realisasi_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_sukoharjo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_sukoharjo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sukoharjo_reg; ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_sukoharjo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sukoharjo_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_sukoharjo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sukoharjo_kph; ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_sukoharjo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sukoharjo_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sukoharjo_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sukoharjo_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[10]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[10]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Wonogiri</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[11]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[11]['danadesa'] > $realisasi_wonogiri || $realisasi_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[11]['danadesa'] == $realisasi_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_wonogiri, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_wonogiri, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonogiri_reg; ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_wonogiri, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonogiri_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_wonogiri, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonogiri_kph; ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_wonogiri, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_wonogiri_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_wonogiri_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_wonogiri_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[11]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[11]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Karanganyar</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[12]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[12]['danadesa'] > $realisasi_karanganyar || $realisasi_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[12]['danadesa'] == $realisasi_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_karanganyar, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_karanganyar, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_karanganyar_reg; ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_karanganyar, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_karanganyar_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_karanganyar, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_karanganyar_kph; ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_karanganyar, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_karanganyar_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_karanganyar_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_karanganyar_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[12]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[12]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Sragen</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[13]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[13]['danadesa'] > $realisasi_sragen || $realisasi_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[13]['danadesa'] == $realisasi_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_sragen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sragen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_sragen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sragen_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sragen_reg; ?></td>
                            <td scope="col" <?php if ($capaian_sragen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_sragen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sragen_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sragen_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_sragen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_sragen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sragen_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sragen_kph; ?></td>
                            <td scope="col" <?php if ($capaian_sragen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_sragen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_sragen_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_sragen_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_sragen_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[13]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[13]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Grobogan</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[14]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[14]['danadesa'] > $realisasi_grobogan || $realisasi_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[14]['danadesa'] == $realisasi_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_grobogan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_grobogan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_grobogan_reg; ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_grobogan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_grobogan_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_grobogan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_grobogan_kph; ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_grobogan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_grobogan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_grobogan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_grobogan_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[14]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[14]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Blora</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[15]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[15]['danadesa'] > $realisasi_blora || $realisasi_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[15]['danadesa'] == $realisasi_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_blora, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_blora_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_blora, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_blora_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_blora_reg; ?></td>
                            <td scope="col" <?php if ($capaian_blora_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_blora, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_blora_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_blora_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_blora_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_blora, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_blora_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_blora_kph; ?></td>
                            <td scope="col" <?php if ($capaian_blora_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_blora, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_blora_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_blora_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_blora_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[15]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[15]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Rembang</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[16]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[16] > $realisasi_rembang || $realisasi_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[16] == $realisasi_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_rembang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_rembang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_rembang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_rembang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_rembang_reg; ?></td>
                            <td scope="col" <?php if ($capaian_rembang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_rembang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_rembang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_rembang_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_rembang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_rembang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_rembang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_rembang_kph; ?></td>
                            <td scope="col" <?php if ($capaian_rembang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_rembang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_rembang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_rembang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_rembang_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[16]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[16]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pati</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[17]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[17]['danadesa'] > $realisasi_pati || $realisasi_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[17]['danadesa'] == $realisasi_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pati, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pati_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_pati, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pati_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pati_reg; ?></td>
                            <td scope="col" <?php if ($capaian_pati_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_pati, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pati_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pati_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_pati_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_pati, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pati_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pati_kph; ?></td>
                            <td scope="col" <?php if ($capaian_pati_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_pati, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pati_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pati_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pati_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[17]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[17]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kudus</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[18]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[18]['danadesa'] > $realisasi_kudus || $realisasi_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[18]['danadesa'] == $realisasi_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kudus, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kudus_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_kudus, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kudus_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kudus_reg; ?></td>
                            <td scope="col" <?php if ($capaian_kudus_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_kudus, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kudus_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kudus_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_kudus_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_kudus, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kudus_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kudus_kph; ?></td>
                            <td scope="col" <?php if ($capaian_kudus_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_kudus, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kudus_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kudus_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kudus_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[18]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[18]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Jepara</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[19]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[19]['danadesa'] > $realisasi_jepara || $realisasi_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[19]['danadesa'] == $realisasi_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_jepara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_jepara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_jepara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_jepara_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_jepara_reg; ?></td>
                            <td scope="col" <?php if ($capaian_jepara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_jepara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_jepara_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_jepara_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_jepara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_jepara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_jepara_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_jepara_kph; ?></td>
                            <td scope="col" <?php if ($capaian_jepara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_jepara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_jepara_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_jepara_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_jepara_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[19]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[19]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Demak</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[20]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[20]['danadesa'] > $realisasi_demak || $realisasi_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[20]['danadesa'] == $realisasi_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_demak, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_demak_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_demak, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_demak_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_demak_reg; ?></td>
                            <td scope="col" <?php if ($capaian_demak_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_demak, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_demak_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_demak_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_demak_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_demak, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_demak_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_demak_kph; ?></td>
                            <td scope="col" <?php if ($capaian_demak_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_demak, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_demak_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_demak_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_demak_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[20]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[20]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Semarang</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[21]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[21]['danadesa'] > $realisasi_semarang || $realisasi_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[21]['danadesa'] == $realisasi_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_semarang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_semarang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_semarang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_semarang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_semarang_reg; ?></td>
                            <td scope="col" <?php if ($capaian_semarang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_semarang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_semarang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_semarang_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_semarang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_semarang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_semarang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_semarang_kph; ?></td>
                            <td scope="col" <?php if ($capaian_semarang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_semarang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_semarang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_semarang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_semarang_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[21]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[21]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Temanggung</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[22]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[22]['danadesa'] > $realisasi_temanggung || $realisasi_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[22]['danadesa'] == $realisasi_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_temanggung, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_temanggung, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_temanggung_reg; ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_temanggung, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_temanggung_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_temanggung, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_temanggung_kph; ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_temanggung, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_temanggung_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_temanggung_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_temanggung_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[22]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[22]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kendal</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[23]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[23]['danadesa'] > $realisasi_kendal || $realisasi_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[23]['danadesa'] == $realisasi_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kendal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kendal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_kendal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kendal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kendal_reg; ?></td>
                            <td scope="col" <?php if ($capaian_kendal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_kendal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kendal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kendal_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_kendal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_kendal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kendal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kendal_kph; ?></td>
                            <td scope="col" <?php if ($capaian_kendal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_kendal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_kendal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_kendal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_kendal_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[23]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[23]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Batang</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[24]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[24]['danadesa'] > $realisasi_batang || $realisasi_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[24]['danadesa'] == $realisasi_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_batang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_batang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_batang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_batang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_batang_reg; ?></td>
                            <td scope="col" <?php if ($capaian_batang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_batang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_batang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_batang_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_batang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_batang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_batang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_batang_kph; ?></td>
                            <td scope="col" <?php if ($capaian_batang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_batang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_batang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_batang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_batang_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[24]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[24]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pekalongan</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[25]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[25]['danadesa'] > $realisasi_pekalongan || $realisasi_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[25]['danadesa'] == $realisasi_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pekalongan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_pekalongan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pekalongan_reg; ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_pekalongan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pekalongan_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_pekalongan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pekalongan_kph; ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_pekalongan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pekalongan_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pekalongan_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pekalongan_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[25]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[25]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pemalang</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[26]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[26]['danadesa'] > $realisasi_pemalang || $realisasi_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[26]['danadesa'] == $realisasi_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pemalang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_pemalang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pemalang_reg; ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_pemalang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pemalang_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_pemalang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pemalang_kph; ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_pemalang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_pemalang_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_pemalang_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_pemalang_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[26]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[26]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Tegal</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[27]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[27]['danadesa'] > $realisasi_tegal || $realisasi_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[27]['danadesa'] == $realisasi_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_tegal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_tegal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_tegal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_tegal_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_tegal_reg; ?></td>
                            <td scope="col" <?php if ($capaian_tegal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_tegal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_tegal_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_tegal_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_tegal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_tegal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_tegal_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_tegal_kph; ?></td>
                            <td scope="col" <?php if ($capaian_tegal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_tegal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_tegal_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_tegal_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_tegal_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[27]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[27]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Brebes</td>

                            <!-- laporan realisasi -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[28]['danadesa'], 0, '', '.') : 0; ?></td>
                            <td scope="col" <?php if ($danadesa_update[28]['danadesa'] > $realisasi_brebes || $realisasi_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[28]['danadesa'] == $realisasi_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_brebes, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_brebes_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /> <?= number_format($realisasi_reg_brebes, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_brebes_reg < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_reg == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_brebes_reg; ?></td>
                            <td scope="col" <?php if ($capaian_brebes_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_bltdd_brebes, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_brebes_bltdd < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_bltdd == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_brebes_bltdd; ?></td>
                            <td scope="col" <?php if ($capaian_brebes_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kph_brebes, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_brebes_kph < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_kph == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_brebes_kph; ?></td>
                            <td scope="col" <?php if ($capaian_brebes_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_covid_brebes, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($capaian_brebes_covid < 100) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($capaian_brebes_covid == 100) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $capaian_brebes_covid; ?></td>

                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[28]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[28]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                </table>
                <div class="container mt-4" style="margin-bottom:45px;">
                    <div class="col-md-12 col-lg-12">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="postur_danadesa"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4" style="margin-bottom:45px;">
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_reguler"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_bltdd"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-bottom:45px;">
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_kph"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6">
                        <div class="media">
                            <div class="media-body text-center">
                                <figure class="highcharts-figure">
                                    <div id="realisasi_danadesa_covid"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <div class="text-center mt-4">
                <h3 style="color: crimson;">HARAP INPUT DIPA DANA DESA TERLEBIH DAHULU</h3>
            </div>
        <?php endif; ?>

    </div>
</div>
<?= $this->include('sidesa/layout/user/content-footer') ?>
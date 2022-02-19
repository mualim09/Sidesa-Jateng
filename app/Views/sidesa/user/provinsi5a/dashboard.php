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
                    <h3 style="text-transform: uppercase;">Rekap Realisasi - Salur terhadap DIPA dana desa Jawa Tengah</h3>
                </div>
                <table class="table table-hover table-sm mt-3 mb-5">
                    <hr>
                    <thead>
                        <tr>
                            <th scope="col" style="vertical-align: middle;">Kabupaten</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">DIPA (Rp)</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Salur (Rp)</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Persentase Salur (%)</th>
                            <th scope="col" style="text-align: center; vertical-align: middle;">Realisasi (Rp)</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Persentase Realisasi (%)</th>
                            <th scope="col" style="vertical-align: middle; text-align: center;">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Cilacap</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[0]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[0]['danadesa'] == $salur_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[0]['danadesa'] < $salur_cilacap) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_cilacap, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[0]['danadesa'] == $salur_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[0]['danadesa'] < $salur_cilacap) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_cilacap / $danadesa_update[0]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_cilacap > $realisasi_cilacap || $realisasi_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_cilacap == $realisasi_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_cilacap, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[0]['danadesa'] > $realisasi_cilacap || $realisasi_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[0]['danadesa'] == $realisasi_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_cilacap / $danadesa_update[0]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[0]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[0]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Banyumas</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[1]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[1]['danadesa'] == $salur_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[1]['danadesa'] < $salur_banyumas) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_banyumas, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[1]['danadesa'] == $salur_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[1]['danadesa'] < $salur_banyumas) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_banyumas / $danadesa_update[1]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_banyumas > $realisasi_banyumas || $realisasi_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_banyumas == $realisasi_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_banyumas, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[1]['danadesa'] > $realisasi_banyumas || $realisasi_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[1]['danadesa'] == $realisasi_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_banyumas / $danadesa_update[1]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[1]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[1]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Purbalingga</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[2]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[2]['danadesa'] == $salur_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[2]['danadesa'] < $salur_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_purbalingga, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[2]['danadesa'] == $salur_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[2]['danadesa'] < $salur_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_purbalingga / $danadesa_update[2]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_purbalingga > $realisasi_purbalingga || $realisasi_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_purbalingga == $realisasi_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_purbalingga, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[2]['danadesa'] > $realisasi_purbalingga || $realisasi_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[2]['danadesa'] == $realisasi_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_purbalingga / $danadesa_update[2]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[2]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[2]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Banjarnegara</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[3]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[3]['danadesa'] == $salur_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[3]['danadesa'] < $salur_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_banjarnegara, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[3]['danadesa'] == $salur_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[3]['danadesa'] < $salur_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_banjarnegara / $danadesa_update[3]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_banjarnegara > $realisasi_banjarnegara || $realisasi_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_banjarnegara == $realisasi_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_banjarnegara, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[3]['danadesa'] > $realisasi_banjarnegara || $realisasi_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[3]['danadesa'] == $realisasi_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_banjarnegara / $danadesa_update[3]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[3]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[3]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kebumen</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[4]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[4]['danadesa'] == $salur_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[4]['danadesa'] < $salur_kebumen) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_kebumen, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[4]['danadesa'] == $salur_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[4]['danadesa'] < $salur_kebumen) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_kebumen / $danadesa_update[4]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_kebumen > $realisasi_kebumen || $realisasi_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_kebumen == $realisasi_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kebumen, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[4]['danadesa'] > $realisasi_kebumen || $realisasi_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[4]['danadesa'] == $realisasi_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_kebumen / $danadesa_update[4]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[4]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[4]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Purworejo</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[5]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[5]['danadesa'] == $salur_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[5]['danadesa'] < $salur_purworejo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_purworejo, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[5]['danadesa'] == $salur_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[5]['danadesa'] < $salur_purworejo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_purworejo / $danadesa_update[5]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_purworejo > $realisasi_purworejo || $realisasi_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_purworejo == $realisasi_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_purworejo, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[5]['danadesa'] > $realisasi_purworejo || $realisasi_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[5]['danadesa'] == $realisasi_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_purworejo / $danadesa_update[5]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[5]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[5]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Wonosobo</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[6]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[6]['danadesa'] == $salur_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[6]['danadesa'] < $salur_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_wonosobo, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[6]['danadesa'] == $salur_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[6]['danadesa'] < $salur_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_wonosobo / $danadesa_update[6]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_wonosobo > $realisasi_wonosobo || $realisasi_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_wonosobo == $realisasi_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_wonosobo, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[6]['danadesa'] > $realisasi_wonosobo || $realisasi_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[6]['danadesa'] == $realisasi_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_wonosobo / $danadesa_update[6]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[6]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[6]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Magelang</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[7]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[7]['danadesa'] == $salur_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[7]['danadesa'] < $salur_magelang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_magelang, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[7]['danadesa'] == $salur_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[7]['danadesa'] < $salur_magelang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_magelang / $danadesa_update[7]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_magelang > $realisasi_magelang || $realisasi_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_magelang == $realisasi_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_magelang, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[7]['danadesa'] > $realisasi_magelang || $realisasi_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[7]['danadesa'] == $realisasi_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_magelang / $danadesa_update[7]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[7]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[7]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Boyolali</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[8]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[8]['danadesa'] == $salur_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[8]['danadesa'] < $salur_boyolali) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_boyolali, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[8]['danadesa'] == $salur_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[8]['danadesa'] < $salur_boyolali) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_boyolali / $danadesa_update[8]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_boyolali > $realisasi_boyolali || $realisasi_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_boyolali == $realisasi_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_boyolali, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[8]['danadesa'] > $realisasi_boyolali || $realisasi_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[8]['danadesa'] == $realisasi_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_boyolali / $danadesa_update[8]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[8]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[8]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Klaten</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[9]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[9]['danadesa'] == $salur_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[9]['danadesa'] < $salur_klaten) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_klaten, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[9]['danadesa'] == $salur_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[9]['danadesa'] < $salur_klaten) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_klaten / $danadesa_update[9]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_klaten > $realisasi_klaten || $realisasi_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_klaten == $realisasi_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_klaten, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[9]['danadesa'] > $realisasi_klaten || $realisasi_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[9]['danadesa'] == $realisasi_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_klaten / $danadesa_update[9]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[9]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[9]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Sukoharjo</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[10]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[10]['danadesa'] == $salur_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[10]['danadesa'] < $salur_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_sukoharjo, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[10]['danadesa'] == $salur_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[10]['danadesa'] < $salur_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_sukoharjo / $danadesa_update[10]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_sukoharjo > $realisasi_sukoharjo || $realisasi_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_sukoharjo == $realisasi_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_sukoharjo, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[10]['danadesa'] > $realisasi_sukoharjo || $realisasi_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[10]['danadesa'] == $realisasi_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_sukoharjo / $danadesa_update[10]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[10]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[10]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Wonogiri</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[11]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[11]['danadesa'] == $salur_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[11]['danadesa'] < $salur_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_wonogiri, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[11]['danadesa'] == $salur_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[11]['danadesa'] < $salur_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_wonogiri / $danadesa_update[11]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_wonogiri > $realisasi_wonogiri || $realisasi_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_wonogiri == $realisasi_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_wonogiri, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[11]['danadesa'] > $realisasi_wonogiri || $realisasi_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[11]['danadesa'] == $realisasi_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_wonogiri / $danadesa_update[11]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[11]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[11]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Karanganyar</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[12]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[12]['danadesa'] == $salur_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[12]['danadesa'] < $salur_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_karanganyar, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[12]['danadesa'] == $salur_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[12]['danadesa'] < $salur_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_karanganyar / $danadesa_update[12]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_karanganyar > $realisasi_karanganyar || $realisasi_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_karanganyar == $realisasi_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_karanganyar, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[12]['danadesa'] > $realisasi_karanganyar || $realisasi_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[12]['danadesa'] == $realisasi_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_karanganyar / $danadesa_update[12]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[12]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[12]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Sragen</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[13]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[13]['danadesa'] == $salur_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[13]['danadesa'] < $salur_sragen) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_sragen, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[13]['danadesa'] == $salur_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[13]['danadesa'] < $salur_sragen) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_sragen / $danadesa_update[13]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_sragen > $realisasi_sragen || $realisasi_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_sragen == $realisasi_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_sragen, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[13]['danadesa'] > $realisasi_sragen || $realisasi_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[13]['danadesa'] == $realisasi_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_sragen / $danadesa_update[13]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[13]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[13]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Grobogan</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[14]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[14]['danadesa'] == $salur_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[14]['danadesa'] < $salur_grobogan) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_grobogan, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[14]['danadesa'] == $salur_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[14]['danadesa'] < $salur_grobogan) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_grobogan / $danadesa_update[14]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_grobogan > $realisasi_grobogan || $realisasi_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_grobogan == $realisasi_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_grobogan, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[14]['danadesa'] > $realisasi_grobogan || $realisasi_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[14]['danadesa'] == $realisasi_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_grobogan / $danadesa_update[14]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[14]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[14]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Blora</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[15]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[15]['danadesa'] == $salur_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[15]['danadesa'] < $salur_blora) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_blora, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[15]['danadesa'] == $salur_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[15]['danadesa'] < $salur_blora) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_blora / $danadesa_update[15]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_blora > $realisasi_blora || $realisasi_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_blora == $realisasi_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_blora, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[15]['danadesa'] > $realisasi_blora || $realisasi_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[15]['danadesa'] == $realisasi_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_blora / $danadesa_update[15]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[15]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[15]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Rembang</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[16]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[16]['danadesa'] == $salur_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[16]['danadesa'] < $salur_rembang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_rembang, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[16]['danadesa'] == $salur_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[16]['danadesa'] < $salur_rembang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_rembang / $danadesa_update[16]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_rembang > $realisasi_rembang || $realisasi_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_rembang == $realisasi_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_rembang, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[16]['danadesa'] > $realisasi_rembang || $realisasi_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[16]['danadesa'] == $realisasi_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_rembang / $danadesa_update[16]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[16]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[16]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pati</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[17]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[17]['danadesa'] == $salur_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[17]['danadesa'] < $salur_pati) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_pati, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[17]['danadesa'] == $salur_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[17]['danadesa'] < $salur_pati) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_pati / $danadesa_update[17]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_pati > $realisasi_pati || $realisasi_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_pati == $realisasi_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pati, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[17]['danadesa'] > $realisasi_pati || $realisasi_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[17]['danadesa'] == $realisasi_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_pati / $danadesa_update[17]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[17]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[17]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kudus</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[18]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[18]['danadesa'] == $salur_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[18]['danadesa'] < $salur_kudus) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_kudus, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[18]['danadesa'] == $salur_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[18]['danadesa'] < $salur_kudus) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_kudus / $danadesa_update[18]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_kudus > $realisasi_kudus || $realisasi_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_kudus == $realisasi_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kudus, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[18]['danadesa'] > $realisasi_kudus || $realisasi_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[18]['danadesa'] == $realisasi_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_kudus / $danadesa_update[18]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[18]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[18]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Jepara</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[19]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[19]['danadesa'] == $salur_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[19]['danadesa'] < $salur_jepara) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_jepara, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[19]['danadesa'] == $salur_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[19]['danadesa'] < $salur_jepara) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_jepara / $danadesa_update[19]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_jepara > $realisasi_jepara || $realisasi_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_jepara == $realisasi_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_jepara, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[19]['danadesa'] > $realisasi_jepara || $realisasi_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[19]['danadesa'] == $realisasi_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_jepara / $danadesa_update[19]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[19]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[19]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Demak</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[20]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[20]['danadesa'] == $salur_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[20]['danadesa'] < $salur_demak) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_demak, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[20]['danadesa'] == $salur_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[20]['danadesa'] < $salur_demak) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_demak / $danadesa_update[20]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_demak > $realisasi_demak || $realisasi_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_demak == $realisasi_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_demak, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[20]['danadesa'] > $realisasi_demak || $realisasi_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[20]['danadesa'] == $realisasi_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_demak / $danadesa_update[20]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[20]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[20]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Semarang</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[21]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[21]['danadesa'] == $salur_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[21]['danadesa'] < $salur_semarang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_semarang, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[21]['danadesa'] == $salur_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[21]['danadesa'] < $salur_semarang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_semarang / $danadesa_update[21]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_semarang > $realisasi_semarang || $realisasi_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_semarang == $realisasi_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_semarang, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[21]['danadesa'] > $realisasi_semarang || $realisasi_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[21]['danadesa'] == $realisasi_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_semarang / $danadesa_update[21]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[21]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[21]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Temanggung</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[22]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[22]['danadesa'] == $salur_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[22]['danadesa'] < $salur_temanggung) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_temanggung, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[22]['danadesa'] == $salur_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[22]['danadesa'] < $salur_temanggung) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_temanggung / $danadesa_update[22]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_temanggung > $realisasi_temanggung || $realisasi_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_temanggung == $realisasi_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_temanggung, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[22]['danadesa'] > $realisasi_temanggung || $realisasi_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[22]['danadesa'] == $realisasi_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_temanggung / $danadesa_update[22]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[22]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[22]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Kendal</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[23]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[23]['danadesa'] == $salur_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[23]['danadesa'] < $salur_kendal) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_kendal, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[23]['danadesa'] == $salur_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[23]['danadesa'] < $salur_kendal) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_kendal / $danadesa_update[23]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_kendal > $realisasi_kendal || $realisasi_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_kendal == $realisasi_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kendal, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[23]['danadesa'] > $realisasi_kendal || $realisasi_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[23]['danadesa'] == $realisasi_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_kendal / $danadesa_update[23]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[23]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[23]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Batang</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[24]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[24]['danadesa'] == $salur_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[24]['danadesa'] < $salur_batang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_batang, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[24]['danadesa'] == $salur_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[24]['danadesa'] < $salur_batang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_batang / $danadesa_update[24]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_batang > $realisasi_batang || $realisasi_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_batang == $realisasi_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_batang, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[24]['danadesa'] > $realisasi_batang || $realisasi_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[24]['danadesa'] == $realisasi_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_batang / $danadesa_update[24]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[24]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[24]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pekalongan</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[25]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[25]['danadesa'] == $salur_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[25]['danadesa'] < $salur_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_pekalongan, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[25]['danadesa'] == $salur_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[25]['danadesa'] < $salur_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_pekalongan / $danadesa_update[25]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_pekalongan > $realisasi_pekalongan || $realisasi_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_pekalongan == $realisasi_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pekalongan, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[25]['danadesa'] > $realisasi_pekalongan || $realisasi_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[25]['danadesa'] == $realisasi_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_pekalongan / $danadesa_update[25]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[25]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[25]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Pemalang</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[26]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[26]['danadesa'] == $salur_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[26]['danadesa'] < $salur_pemalang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_pemalang, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[26]['danadesa'] == $salur_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[26]['danadesa'] < $salur_pemalang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_pemalang / $danadesa_update[26]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_pemalang > $realisasi_pemalang || $realisasi_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_pemalang == $realisasi_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pemalang, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[26]['danadesa'] > $realisasi_pemalang || $realisasi_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[26]['danadesa'] == $realisasi_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_pemalang / $danadesa_update[26]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[26]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[26]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Tegal</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[27]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[27]['danadesa'] == $salur_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[27]['danadesa'] < $salur_tegal) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_tegal, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[27]['danadesa'] == $salur_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[27]['danadesa'] < $salur_tegal) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_tegal / $danadesa_update[27]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_tegal > $realisasi_tegal || $realisasi_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_tegal == $realisasi_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_tegal, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[27]['danadesa'] > $realisasi_tegal || $realisasi_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[27]['danadesa'] == $realisasi_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_tegal / $danadesa_update[27]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- update laporan live -->
                            <?php if (isset($danadesa_update[27]['created'])) : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" /><?= date("d/m/Y", $danadesa_update[27]['created']); ?></td>
                            <?php else : ?>
                                <td scope="col" style="vertical-align: middle; text-align: center;" />-</td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <td scope="col" style="vertical-align: middle;">Brebes</td>

                            <!-- DIPA -->
                            <td scope="col" style="vertical-align: middle; text-align: center;"><?= $danadesa_update != null ? number_format($danadesa_update[28]['danadesa'], 0, '', '.') : 0; ?></td>
                            <!-- SALUR -->
                            <td scope="col" <?php if ($salur_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[28]['danadesa'] == $salur_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[28]['danadesa'] < $salur_brebes) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_brebes, 0, '', '.'); ?></td>
                            <!-- persentase salur -->
                            <td scope="col" <?php if ($salur_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[28]['danadesa'] == $salur_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[28]['danadesa'] < $salur_brebes) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= $danadesa_update != null ? number_format($salur_brebes / $danadesa_update[28]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
                            <!-- REALISASI -->
                            <td scope="col" <?php if ($salur_brebes > $realisasi_brebes || $realisasi_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_brebes == $realisasi_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_brebes, 0, '', '.'); ?></td>
                            <!-- PERSENTASE REALISASI -->
                            <td scope="col" <?php if ($danadesa_update[28]['danadesa'] > $realisasi_brebes || $realisasi_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[28]['danadesa'] == $realisasi_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= $danadesa_update != null ? number_format($realisasi_brebes / $danadesa_update[28]['danadesa'] * 100, 2, ',', '.') : 0; ?></td>
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
                            <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle;">Salur (Rp)</th>
                            <th scope="col" rowspan="2" style="text-align: center; vertical-align: middle;">Realisasi (Rp)</th>
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
                            <td scope="col" <?php if ($salur_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[0]['danadesa'] == $salur_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[0]['danadesa'] < $salur_cilacap) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_cilacap, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_cilacap > $realisasi_cilacap || $realisasi_cilacap == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_cilacap == $realisasi_cilacap) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_cilacap, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[1]['danadesa'] == $salur_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[1]['danadesa'] < $salur_banyumas) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_banyumas, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_banyumas > $realisasi_banyumas || $realisasi_banyumas == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_banyumas == $realisasi_banyumas) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_banyumas, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[2]['danadesa'] == $salur_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[2]['danadesa'] < $salur_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_purbalingga, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_purbalingga > $realisasi_purbalingga || $realisasi_purbalingga == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_purbalingga == $realisasi_purbalingga) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_purbalingga, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[3]['danadesa'] == $salur_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[3]['danadesa'] < $salur_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_banjarnegara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_banjarnegara > $realisasi_banjarnegara || $realisasi_banjarnegara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_banjarnegara == $realisasi_banjarnegara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_banjarnegara, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[4]['danadesa'] == $salur_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[4]['danadesa'] < $salur_kebumen) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_kebumen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_kebumen > $realisasi_kebumen || $realisasi_kebumen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_kebumen == $realisasi_kebumen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kebumen, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[5]['danadesa'] == $salur_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[5]['danadesa'] < $salur_purworejo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_purworejo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_purworejo > $realisasi_purworejo || $realisasi_purworejo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_purworejo == $realisasi_purworejo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_purworejo, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[6]['danadesa'] == $salur_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[6]['danadesa'] < $salur_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_wonosobo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_wonosobo > $realisasi_wonosobo || $realisasi_wonosobo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_wonosobo == $realisasi_wonosobo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_wonosobo, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[7]['danadesa'] == $salur_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[7]['danadesa'] < $salur_magelang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_magelang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_magelang > $realisasi_magelang || $realisasi_magelang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_magelang == $realisasi_magelang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_magelang, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[8]['danadesa'] == $salur_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[8]['danadesa'] < $salur_boyolali) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_boyolali, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_boyolali > $realisasi_boyolali || $realisasi_boyolali == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_boyolali == $realisasi_boyolali) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_boyolali, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[9]['danadesa'] == $salur_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[9]['danadesa'] < $salur_klaten) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_klaten, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_klaten > $realisasi_klaten || $realisasi_klaten == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_klaten == $realisasi_klaten) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_klaten, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[10]['danadesa'] == $salur_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[10]['danadesa'] < $salur_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_sukoharjo, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_sukoharjo > $realisasi_sukoharjo || $realisasi_sukoharjo == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_sukoharjo == $realisasi_sukoharjo) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_sukoharjo, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[11]['danadesa'] == $salur_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[11]['danadesa'] < $salur_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_wonogiri, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_wonogiri > $realisasi_wonogiri || $realisasi_wonogiri == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_wonogiri == $realisasi_wonogiri) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_wonogiri, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[12]['danadesa'] == $salur_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[12]['danadesa'] < $salur_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_karanganyar, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_karanganyar > $realisasi_karanganyar || $realisasi_karanganyar == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_karanganyar == $realisasi_karanganyar) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_karanganyar, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[13]['danadesa'] == $salur_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[13]['danadesa'] < $salur_sragen) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_sragen, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_sragen > $realisasi_sragen || $realisasi_sragen == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_sragen == $realisasi_sragen) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_sragen, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[14]['danadesa'] == $salur_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[14]['danadesa'] < $salur_grobogan) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_grobogan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_grobogan > $realisasi_grobogan || $realisasi_grobogan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_grobogan == $realisasi_grobogan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_grobogan, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[15]['danadesa'] == $salur_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[15]['danadesa'] < $salur_blora) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_blora, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_blora > $realisasi_blora || $realisasi_blora == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_blora == $realisasi_blora) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_blora, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[16]['danadesa'] == $salur_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[16]['danadesa'] < $salur_rembang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_rembang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_rembang > $realisasi_rembang || $realisasi_rembang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_rembang == $realisasi_rembang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_rembang, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[17]['danadesa'] == $salur_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[17]['danadesa'] < $salur_pati) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_pati, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_pati > $realisasi_pati || $realisasi_pati == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_pati == $realisasi_pati) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pati, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[18]['danadesa'] == $salur_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[18]['danadesa'] < $salur_kudus) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_kudus, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_kudus > $realisasi_kudus || $realisasi_kudus == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_kudus == $realisasi_kudus) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kudus, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[19]['danadesa'] == $salur_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[19]['danadesa'] < $salur_jepara) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_jepara, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_jepara > $realisasi_jepara || $realisasi_jepara == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_jepara == $realisasi_jepara) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_jepara, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[20]['danadesa'] == $salur_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[20]['danadesa'] < $salur_demak) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_demak, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_demak > $realisasi_demak || $realisasi_demak == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_demak == $realisasi_demak) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_demak, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[21]['danadesa'] == $salur_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[21]['danadesa'] < $salur_semarang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_semarang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_semarang > $realisasi_semarang || $realisasi_semarang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_semarang == $realisasi_semarang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_semarang, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[22]['danadesa'] == $salur_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[22]['danadesa'] < $salur_temanggung) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_temanggung, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_temanggung > $realisasi_temanggung || $realisasi_temanggung == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_temanggung == $realisasi_temanggung) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_temanggung, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[23]['danadesa'] == $salur_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[23]['danadesa'] < $salur_kendal) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_kendal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_kendal > $realisasi_kendal || $realisasi_kendal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_kendal == $realisasi_kendal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_kendal, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[24]['danadesa'] == $salur_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[24]['danadesa'] < $salur_batang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_batang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_batang > $realisasi_batang || $realisasi_batang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_batang == $realisasi_batang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_batang, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[25]['danadesa'] == $salur_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[25]['danadesa'] < $salur_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_pekalongan, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_pekalongan > $realisasi_pekalongan || $realisasi_pekalongan == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_pekalongan == $realisasi_pekalongan) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pekalongan, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[26]['danadesa'] == $salur_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[26]['danadesa'] < $salur_pemalang) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_pemalang, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_pemalang > $realisasi_pemalang || $realisasi_pemalang == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_pemalang == $realisasi_pemalang) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_pemalang, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[27]['danadesa'] == $salur_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[27]['danadesa'] < $salur_tegal) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_tegal, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_tegal > $realisasi_tegal || $realisasi_tegal == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_tegal == $realisasi_tegal) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_tegal, 0, '', '.'); ?></td>
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
                            <td scope="col" <?php if ($salur_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($danadesa_update[28]['danadesa'] == $salur_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php elseif ($danadesa_update[28]['danadesa'] < $salur_brebes) : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php else : ?> style="vertical-align: middle; text-align: center;" <?php endif; ?> /><?= number_format($salur_brebes, 0, '', '.'); ?></td>
                            <td scope="col" <?php if ($salur_brebes > $realisasi_brebes || $realisasi_brebes == 0) : ?> style="vertical-align: middle; text-align: center; color: crimson" <?php elseif ($salur_brebes == $realisasi_brebes) : ?> style="vertical-align: middle; text-align: center; color: green" <?php else : ?> style="vertical-align: middle; text-align: center; color: goldenrod" <?php endif; ?> /><?= number_format($realisasi_brebes, 0, '', '.'); ?></td>
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
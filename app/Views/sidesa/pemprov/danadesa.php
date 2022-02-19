<?= $this->extend('sidesa/layout/pemprov/danadesa'); ?>
<?= $this->section('content'); ?>

<div class="container">
    <style>
        body {
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
        <p>Rekapitulasi Realisasi - Salur terhadap DIPA dana desa Jawa Tengah</p>
    </div>
    <?php if ($grand_total_anggaran != 0) : ?>
        <table class="table table-hover table-sm mt-3 mb-5">
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
    <?php else : ?>
        <div class="text-center mt-4">
            <h3 style="color: crimson;">MOHON MAAF DATA DANA DESA SEDANG DALAM PERSIAPAN PUBLIKASI</h3>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>
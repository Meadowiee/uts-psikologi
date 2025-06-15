<div>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Riwayat Hasil</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= base_url('/test') ?>">Home</a></li>
                    <li class="current">Riwayat Hasil</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <!-- Starter Section Section -->
    <section id="starter-section" class="starter-section section">
        <div class="container" data-aos="fade-up">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Score Test</th>
                        <th class="text-center">Score SW</th>
                        <th class="text-center">Hasil Tes</th>
                        <th class="text-center">Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($results)): ?>
                        <?php $no = 1;
                        foreach ($results as $row): ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td class="text-center"><?= esc($row['score_test']) ?></td>
                                <td class="text-center"><?= esc($row['score_sw']) ?></td>
                                <td class="text-center"><?= esc($row['result']) ?></td>
                                <td class="text-center"><?= esc($row['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data hasil yang ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </section>
</div>
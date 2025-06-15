<div>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Hasil Test</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= base_url('/test') ?>">Home</a></li>
                    <li class="current">Hasil Test</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->
    <section id="starter-section" class="starter-section section">
        <div class="hasil-tes" v-if="soalSelesai && hewan">
            <div class="hasil-container text-center py-5 <?= $animalClass ?>">
                <img src="<?= base_url('/assets/img/tipe-hewan/' . $animalImg) ?>" alt="Gambar Hewan" class="gambar-hewan mb-4 object-fit-fill" />
                <h2 class="mb-1">Kamu adalah: <?= $animal ?></h2>
                <h4 class="label-lembut mb-4"><?= $quiz['result'] ?></h4>
                <p class="deskripsi-hewan mb-5"><?= $animalDesc ?></p>

                <div class="hasil-bar-wrapper">
                    <?php foreach ($bars as $category): ?>
                        <div class="hasil-bar">
                            <p class="mb-1"><?= $category['ikon'] ?> <?= $category['nama'] ?></p>
                            <div class="bar-background">
                                <div class="bar-isi" style="width: <?= $category['skor'] ?>%; background-color: <?= $barColor ?> !important;"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="hasil-actions mt-4 mb-5">
                <div class="d-flex justify-content-center flex-wrap gap-2">
                    <a href="<?= base_url('/test/create') ?>" class="neon-btn neon-biru">
                        🔄 Ulangi Tes
                    </a>
                    <a href="<?= base_url('/test') ?>" class="neon-btn neon-merah">
                        🏠 Kembali ke Home
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>
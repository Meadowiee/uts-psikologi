<div>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Profil Saya</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= base_url('/test') ?>">Home</a></li>
                    <li class="current">Profil Saya</li>
                </ol>
            </nav>
        </div>
    </div>
    <?php if (session()->getFlashdata('msg')) { ?>
        <div class="alert-md alert-warning d-flex align-items-center small p-4" style="height:40px;" role="alert">
            <?= session()->getFlashdata('msg') ?>
        </div>
    <?php } ?>
    <!-- End Page Title -->
    <!-- Profil Section -->

    <section id="features-2" class="features-2 section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center">
                <div class="col-lg-4">
                    <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-content text-center">
                                <?php if ($data['nama'] == null || $data['nama'] == '') { ?>
                                    <h2>Nama</h2>
                                <?php } else { ?>
                                    <h2 class="text-capitalize"><?= esc($data['nama']) ?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-content text-center">
                                <h2>
                                    <?php if ($data['tanggal_lahir'] == null || $data['tanggal_lahir'] == '') { ?>
                                        Tanggal Lahir
                                    <?php } else { ?>
                                        <?= esc($data['tanggal_lahir']); ?>
                                    <?php } ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-content text-center">
                                <?php if ($data['jenis_kelamin'] == null || $data['jenis_kelamin'] == '') { ?>
                                    <h2>Jenis Kelamin</h2>
                                <?php } else { ?>
                                    <h2 class="text-capitalize"><?= esc($data['jenis_kelamin']) ?></h2>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="phone-mockup text-center">
                        <img src="<?= base_url('assets/img/pohon1.jpg') ?>" alt="Phone Mockup" class="img-estetik">
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-content text-center">
                                <h2><?= esc($data['username']) ?></h2>
                            </div>
                        </div>
                    </div>
                    <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="feature-content text-center">
                                <a href="<?= base_url('/profile/edit') ?>" class="btn btn-gradient">Edit Profil</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div>
    <!-- Page Title -->
    <div class="page-title light-background">
        <div class="container">
            <h1>Edit Profil</h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="<?= base_url('/test') ?>">Home</a></li>
                    <li><a href="<?= base_url('/profile') ?>">Profil Saya</a></li>
                    <li class="current">Edit Profil</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- End Page Title -->
    <!-- Profil Section -->
    <section id="features-2" class="section">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="phone-mockup text-center">
                        <img src="<?= base_url('assets/img/pohon1.jpg') ?>" alt="Phone Mockup" class="img-estetik">
                    </div>
                </div>

                <div class="col-lg-8">
                    <?= csrf_field() ?>
                    <form method="post" action="<?= base_url('/profile/update') ?>">
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center col justify-content-start gap-4">
                                <h5 style="width: 200px;">Username</h5>
                                <input type="text" name="username" class="form-control mb-3" placeholder="Username" value="<?= esc($data['username']) ?>">
                            </div>
                        </div>
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center col justify-content-start gap-4">
                                <h5 style="width: 200px;">Nama</h5>
                                <input type="text" name="nama" class="form-control mb-3" placeholder="Nama" value="<?= esc($data['nama']) ?>">
                            </div>
                        </div>
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center col justify-content-start gap-4">
                                <h5 style="width: 200px;">Tanggal Lahir</h5>
                                <input type="date" name="tanggal_lahir" class="form-control mb-3" value="<?= esc($data['tanggal_lahir']) ?>">
                            </div>
                        </div>
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center col justify-content-start gap-4">
                                <h5 style="width: 200px;">Jenis Kelamin</h5>
                                <select name="jenis_kelamin" class="form-select mb-3">
                                    <option value="Laki-laki" <?= $data['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                                    <option value="Perempuan" <?= $data['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="feature-item text-end mb-5" data-aos="fade-right" data-aos-delay="200">
                            <div class="d-flex align-items-center justify-content-center gap-4">
                                <div class="feature-content text-center">
                                    <button type="submit" class="btn btn-gradient">Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
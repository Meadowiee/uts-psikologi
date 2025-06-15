<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IST-ZR</title>

    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap-grid.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">

    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        select, input {
            width: 100%;
            padding: 10px 22px !important;
            margin: 10px 0;
            border: 2px solid #ddd;
            border-radius: 50px !important;
            font-size: 14px;
            box-sizing: border-box;
        }
        
    </style>
</head>

<body>
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <div class="logo d-flex align-items-center">
                <div class="logo-circle me-2">
                    <img src="<?= base_url('assets/img/logopsikologi.jpeg') ?>" alt="Logo iLanding" />
                </div>
                <h1 class="sitename mb-0">IST-ZR</h1>
            </div>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="<?= base_url('/#hero') ?>" class="nav-link">Home</a></li>
                    <li><a href="<?= base_url('/#about') ?>" class="nav-link">About</a></li>
                    <li><a href="<?= base_url('/#features') ?>" class="nav-link">Features</a></li>
                    <li><a href="<?= base_url('/#services') ?>" class="nav-link">Services</a></li>
                    <li><a href="<?= base_url('/#faq') ?>" class="nav-link">FAQ</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>

            <?php if (esc(session()->get('logged_in'))): ?>
                <div class="d-flex justify-content-end align-items-center gap-4">
                    <a class="btn-getstarted" role="button" href="<?= base_url('/test') ?>">Mulai Tes</a>
                    <a href="<?= base_url('/logout') ?>">Logout</a>
                </div>
            <?php else: ?>
                <a class="btn-getstarted" role="button" href="<?= base_url('/signup') ?>">Daftar untuk Mulai</a>
            <?php endif; ?>
        </div>
    </header>

    <main class="main">
        <div class="section-title">
            <?php if (!empty($content)) echo view($content) ?>
        </div>
    </main>

    <a href="#header" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center">
        <i class="bi bi-arrow-up-short"></i>
    </a>
</body>

</html>
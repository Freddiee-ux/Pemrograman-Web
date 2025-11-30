<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold" href="/laundrycrafty/dashboard.php">
            <i class="bi bi-droplet-half"></i> LaundryCrafty
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                
                <li class="nav-item">
                    <a class="nav-link" href="/laundrycrafty/pages/pelanggan/index.php">
                        <i class="bi bi-people"></i> Pelanggan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/laundrycrafty/pages/layanan/index.php">
                        <i class="bi bi-list-check"></i> Layanan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/laundrycrafty/pages/transaksi/index.php">
                        <i class="bi bi-receipt"></i> Transaksi
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/laundrycrafty/pages/laporan/index.php">
                        <i class="bi bi-bar-chart"></i> Laporan
                    </a>
                </li>
            </ul>

            <!-- kanan -->
            <div class="d-flex">
                <span class="navbar-text text-white me-3">
                    <i class="bi bi-person-circle"></i> <?= $_SESSION['user']['username'] ?>
                </span>

                <a href="/laundrycrafty/logout.php" class="btn btn-outline-light btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </a>
            </div>

        </div>
    </div>
</nav>

<nav class="navbar navbar-expand navbar-light sticky-top px-4 py-2 dashboard-navbar" style="background-color: #0a6ea2;">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0">
            <i class="fa fa-hashtag"></i>
        </h2>
    </a>
    <div class="navbar-nav align-items-center ms-auto">
        <!-- User -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <i class="fa fa-user-circle fs-4 me-2" style="color:#0a6ea2"></i>
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                $nama_lengkap = $_SESSION['nama_lengkap'] ?? 'Guest';
                ?>
                <h6 class="mb-0" style="color: #fff;"><?= htmlspecialchars($nama_lengkap) ?></h6>
            </a> 
            <div class="dropdown-menu dropdown-menu-end dropdown-soft p-2" style="border: 2px solid #d6d6d6;">
                <a href="logout.php" class="dropdown-item rounded text-danger">Log Out</a>
            </div>
        </div>

    </div>
</nav>
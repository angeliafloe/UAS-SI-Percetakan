<?php
$current_menu = $_GET['menu'] ?? 'dashboard';
?>

<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-white navbar-light">
        <a href="index.php" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                <i class="fa fa-hashtag me-2"></i>Dashboard
            </h3>
        </a>

        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <i class="fas fa-user me-lg-2 fs-4"></i>
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Admin 1</h6>
                <span>Admin</span>
            </div>
        </div>

        <div class="navbar-nav w-100">
            <a href="index.php" class="nav-item nav-link <?= ($current_menu == 'dashboard') ? 'active' : '' ?>">
                <i class="fa fa-home me-2"></i>Dashboard
            </a>

            <a href="index.php?menu=admin" class="nav-item nav-link <?= ($current_menu == 'admin') ? 'active' : '' ?>">
                <i class="fa fa-user-shield me-2"></i>Data Admin
            </a>

            <a href="index.php?menu=users" class="nav-item nav-link <?= ($current_menu == 'users') ? 'active' : '' ?>">
                <i class="fa fa-users-cog me-2"></i>Data Customer
            </a>

            <hr class="mx-3 my-2 text-secondary">

            <a href="signin.php" class="nav-item nav-link text-danger" id="signout">
                <i class="fa fa-sign-out-alt me-2"></i>Sign Out
            </a>
        </div>
    </nav>
</div>
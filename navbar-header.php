<nav class="navbar navbar-expand navbar-light sticky-top px-4 py-2 dashboard-navbar">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0">
            <i class="fa fa-hashtag"></i>
        </h2>
    </a>

    <a href="#" class="sidebar-toggler flex-shrink-0 me-3">
        <i class="fa fa-bars"></i>
    </a>

    <form class="d-none d-md-flex">
        <input class="form-control navbar-search" type="search" placeholder="Search...">
    </form>

    <div class="navbar-nav align-items-center ms-auto">

        <!-- Messages -->
        <div class="nav-item dropdown me-3">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-envelope"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-soft p-2">
                <a href="#" class="dropdown-item rounded">
                    <div class="d-flex align-items-center">
                        <img src="https://i.pravatar.cc/40" class="rounded-circle" width="40">
                        <div class="ms-2">
                            <h6 class="mb-0 fw-semibold">Steven</h6>
                            <small class="text-muted">Sent you a message</small>
                        </div>
                    </div>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center text-primary fw-semibold">
                    See all messages
                </a>
            </div>
        </div>

        <!-- Notifications -->
        <div class="nav-item dropdown me-3">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-bell"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-soft p-2">
                <a href="#" class="dropdown-item rounded">
                    <h6 class="mb-0 fw-semibold">Profile updated</h6>
                    <small class="text-muted">15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center text-primary fw-semibold">
                    See all notifications
                </a>
            </div>
        </div>

        <!-- User -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown">
                <i class="fa fa-user-circle fs-4 me-2"></i>
                <span class="fw-semibold d-none d-lg-inline">angeliafloe</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-soft p-2">
                <a href="#" class="dropdown-item rounded">My Profile</a>
                <a href="#" class="dropdown-item rounded">Settings</a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item rounded text-danger">Log Out</a>
            </div>
        </div>

    </div>
</nav>

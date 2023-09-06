<?php
$page = isset($_GET['page']) ? $_GET['page'] : ''; // Get the 'page' parameter from the URL.
?>
<style>
    /* Style the icons */
    .navbar-menu .menu-title i,
    .navbar-menu .nav-link i {
        width: 20px;
        height: 20px;
        margin-right: 10px;
    }

    /* Style the links */
    .navbar-menu .nav-link {
        padding: 10px 15px;
        transition: transform 0.3s, box-shadow 0.3s, color 0.3s;
    }

    /* Hover effect */
    .navbar-menu .nav-link:hover {
        transform: scale(0.95);
        /* Scale down effect */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.php?page=Dashboard" class="logo logo-dark">
            <span class="logo-sm">
                <img src="../assets/images/logo_MAA.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo_MAAA.png" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index.php?page=Dashboard" class="logo logo-light">
            <span class="logo-sm">
                <img src="assets/images/logo_MAA.png" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="assets/images/logo_MAAA.png" alt="" height="39">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            <div id="two-column-menu">
            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'Dashboard') echo 'active'; ?>" href="dashboard-admin.php">
                        <i data-feather="bar-chart-2"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'job') echo 'active'; ?>" href="job-admin.php">
                        <i data-feather="list"></i>
                        <span class="menu-title">Job List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'job') echo 'active'; ?>" href="applicant-list.php">
                        <i data-feather="user"></i>
                        <span class="menu-title">Applicant List</span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<?php $page =  $_GET['page']; ?>
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
                    <a class="nav-link <?php if ($page == 'Dashboard') echo 'active'; ?>" href="index.php?page=Dashboard">
                        <i class="ri-dashboard-2-line"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($page == 'job') echo 'active'; ?>" href="job-admin.php">
                        <i class="ri-dashboard-2-line"></i> Job List
                    </a>
                </li>












            </ul>
            <?php    ?>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
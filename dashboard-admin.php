<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>EIP | Mineral Alam Abadi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />




    <!-- style for hover card -->
    <style>
        .card-shadow {
            transition: box-shadow 0.3s, transform 0.3s;
        }

        .card-shadow:hover {
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        /* Status badge styles */
        .badge {
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Review status */
        .badge-review {
            background-color: #add8e6;
            /* Light blue background */
            color: #00008b;
            /* Dark blue text */
        }

        /* Accept status */
        .badge-accept {
            background-color: #90ee90;
            /* Light green background */
            color: #006400;
            /* Dark green text */
        }

        /* Reject status */
        .badge-reject {
            background-color: #ffcccb;
            /* Light red background */
            color: #8b0000;
            /* Dark red text */
        }
    </style>
</head>

<body>

    <!-- Begin page -->
    <div id="layout-wrapper">

        <?php include "topbar.php" ?>
        <!-- ========== App Menu ========== -->
        <?php include "sidebar.php" ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-primary" role="alert" style="background-color: #af2a25; color:white; font-size:medium; ">
                                    Welcome Admin!
                                    <p style="font-size: small; padding-top: 20px;">This system will help you to insert the job vacancy and
                                        also help to manage, and tracking the applicant submission. <i>Sistem ini akan membantu Anda untuk memasukkan lowongan pekerjaan dan juga membantu mengelola serta melacak pengiriman aplikasi pelamar.</i>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- data card -->
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Job Vacancies</h5>
                                        <p class="card-text">50</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">New Applications Today</h5>
                                        <p class="card-text">5</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card card-shadow">
                                    <div class="card-body">
                                        <h5 class="card-title">Total Applications</h5>
                                        <p class="card-text">150</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- applicant status-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Job Applications</h5>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Date Applied</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Rajes</td>
                                                    <td>Software Developer</td>
                                                    <td>2023-09-05</td>
                                                    <td>
                                                        <span class="badge badge-review">Reviewing</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Alhambra</td>
                                                    <td>UX Designer</td>
                                                    <td>2023-09-04</td>
                                                    <td>
                                                        <span class="badge badge-accept">Accepted</span>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Andalusia</td>
                                                    <td>Data Analyst</td>
                                                    <td>2023-09-03</td>
                                                    <td>
                                                        <span class="badge badge-reject">Rejected</span>
                                                    </td>
                                                </tr>
                                                <!-- Add more rows as needed -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Job Views</h5>
                                        <canvas id="jobViewsChart" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Application Submissions</h5>
                                        <canvas id="appSubmissionsChart" width="400" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>


                    <!-- end page title -->

                    <?php include "menu.php" ?>

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->



    <!--start back-to-top-->
    <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
        <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->

    <!--preloader-->




    <!-- Theme Settings -->


    <!-- JAVASCRIPT -->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>
    <script src="assets/libs/feather-icons/feather.min.js"></script>
    <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
    <script src="assets/js/plugins.js"></script>

    <!-- apexcharts -->
    <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

    <!-- Vector map-->
    <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
    <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

    <!--Swiper slider js-->
    <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

    <!-- Dashboard init -->
    <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

    <script src="assets/libs/sweetalert2/sweetalert2.min.js"></script>

    <script src="assets/libs/prismjs/prism.js"></script>

    <!-- script for diagram -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

    <script>
        // Sample data for the Job Views chart
        var jobViewsData = {
            labels: ["January", "February", "March", "April", "May", "June"],
            datasets: [{
                label: "Job Views",
                data: [120, 150, 200, 180, 250, 300],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        var jobViewsCtx = document.getElementById("jobViewsChart").getContext('2d');
        var jobViewsChart = new Chart(jobViewsCtx, {
            type: 'line',
            data: jobViewsData,
        });

        // Sample data for the Application Submissions chart
        var appSubmissionsData = {
            labels: ["January", "February", "March", "April", "May", "June"],
            datasets: [{
                label: "Application Submissions",
                data: [50, 60, 70, 80, 90, 100],
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }]
        };

        var appSubmissionsCtx = document.getElementById("appSubmissionsChart").getContext('2d');
        var appSubmissionsChart = new Chart(appSubmissionsCtx, {
            type: 'bar',
            data: appSubmissionsData,
        });
    </script>
</body>

</html>
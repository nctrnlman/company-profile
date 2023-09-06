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

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS (from npm) -->
    <link rel="stylesheet" type="text/css" href="node_modules/datatables.net-dt/css/jquery.dataTables.css">

    <!-- Include DataTables JavaScript (from npm) -->
    <script type="text/javascript" src="node_modules/datatables.net/js/jquery.dataTables.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables CSS (from npm) -->
    <link rel="stylesheet" type="text/css" href="node_modules/datatables.net-dt/css/jquery.dataTables.css">

    <!-- Include DataTables JavaScript (from npm) -->
    <script type="text/javascript" src="node_modules/datatables.net/js/jquery.dataTables.js"></script>

</head>

<body>
    <div id="layout-wrapper">

        <?php include "topbar.php" ?>
        <!-- ========== App Menu ========== -->
        <?php include "sidebar.php" ?>
        <!-- Left Sidebar End -->
        <!-- Vertical Overlay-->
        <div class="vertical-overlay"></div>

        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Applicant List for Admin Job Vacancy</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="applicantTable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Resume</th>
                                            <th>Date of Submission</th>
                                            <th>Job Applied For</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>John Doe</td>
                                            <td>john@example.com</td>
                                            <td>123-456-7890</td>
                                            <td><a href="john_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-06</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>3</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>4</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>5</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>6</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>7</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>8</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr> 
                                        <tr>
                                        <td>9</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                        <tr>
                                        <td>10</td>
                                            <td>Jane Smith</td>
                                            <td>jane@example.com</td>
                                            <td>987-654-3210</td>
                                            <td><a href="jane_resume.pdf" target="_blank">View Resume</a></td>
                                            <td>2023-09-07</td>
                                            <td>Admin</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>

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
            $(document).ready(function() {
                // Initialize DataTable with custom settings
                $('#applicantTable').DataTable({
                    "lengthChange": false, // Disable the "Show X entries" select
                    "pageLength": 5 // Set the number of entries per page to 5
                });
            });
        </script>



</body>

</html>
<?php
session_start();
include 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: maa-admin.php");
    exit();
}

try {
    $query = "
        SELECT * FROM apply_job AS aj
        LEFT JOIN job_vacanacy AS jv ON aj.id_job_vacanacy = jv.id_job_vacanacy
    ";

    $results = $db->query($query);

    if (!$results) {
        throw new Exception("Error in SQL query: " . $db->errorInfo()[2]);
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>

<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Admin | MAA GROUP</title>

    <meta name="keywords" content="Company Profile" />
    <meta name="description" content="Maa Group" />
    <meta name="author" content="MAA" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/demos/business-consulting-3/favicon.png" type="image/x-icon" />

    <!-- jsvectormap css -->
    <link href="assets/libs/jsvectormap/css/jsvectormap.min.css" rel="stylesheet" type="text/css" />

    <!--Swiper slider css-->
    <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

    <!-- Layout config Js -->
    <script src="assets/js/layout.js"></script>
    <!-- Bootstrap Css -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
    <!-- <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
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
        <?php include "sidebar.php" ?>
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
                                        <?php $counter = 1; ?>
                                        <?php foreach ($results as $result) { ?>
                                            <tr>
                                                <td><?php echo $counter; ?></td>
                                                <td><?php echo $result['name']; ?></td>
                                                <td><?php echo $result['email']; ?></td>
                                                <td><?php echo $result['phone_number']; ?></td>
                                                <td><a href="file/resume/<?php echo $result['resume']; ?>.pdf" target="_blank">View Resume</a></td>
                                                <td><?php echo $result['create_date']; ?></td>
                                                <td><?php echo $result['position']; ?></td>
                                            </tr>
                                            <?php $counter++; ?>
                                        <?php } ?>
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
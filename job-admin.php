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



                    <!-- Existing Job Vacancies List (Static Example) -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Existing Job Vacancies</h4>
                                    <div class="table-responsive">
                                        <table id="jobListTable" class="table table-hover table-centered mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Job Title</th>
                                                    <th>Date</th>
                                                    <th>Division</th>
                                                    <th>Location</th>
                                                    <th>Company Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Static example job vacancies -->
                                                <tr>
                                                    <td>IT Programmer</td>
                                                    <td>2023-09-15</td>
                                                    <td>HR|GA</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>
                                                    <td>
                                                   
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Marketing Manager</td>
                                                    <td>2023-09-20</td>
                                                    <td>Marketing</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>
                                                    <td>
                                                   
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>
                                                    
                                                </tr>
                                                <tr>
                                                    <td>Environment Foreman</td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>
                                                    <td>
                                                   
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Danru Security </td>
                                                    <td>2023-09-20</td>
                                                    <td>HR|GA</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>
                                                    <td>
                                      
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                   
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mining Manager </td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Mining Manager </td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Mining Manager </td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>

                                                </tr> <tr>
                                                    <td>Mining Manager </td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Mining Manager </td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>Mining Manager </td>
                                                    <td>2023-09-20</td>
                                                    <td>Technical Team</td>
                                                    <td>Jakarta</td>
                                                    <td>PT Mineral Alam Abadi</td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit-job-button" data-job-id="1">Edit</button>
                                                        <button type="button" class="btn btn-danger btn-sm delete-job-button" data-job-id="1">Delete</button>
                                                    </td>

                                                </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                    <div id="showingEntries" class="text-left mt-2"></div>
                                </div>

                            </div>

                        </div>
                    </div>



                    <!-- Job Vacancy Form -->

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="header-title">Add Job Vacancy</h4>
                                    <form id="jobVacancyForm">
                                        <div class="mb-3">
                                            <label for="jobTitle" class="form-label">Job Title</label>
                                            <input type="text" class="form-control" id="jobTitle" name="jobTitle" required>
                                        </div>
                                        <!-- Job Poster or Flyer Upload -->
                                        <div class="mb-3">
                                            <label for="flyer" class="form-label">Flyer or Job Poster Upload (PNG, max 5MB)</label>
                                            <input type="file" class="form-control" id="flyer" name="flyer" accept=".png" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="date" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="date" name="date">
                                        </div>
                                        <div class="mb-3">
                                            <label for="dueDate" class="form-label">Due Date</label>
                                            <input type="date" class="form-control" id="dueDate" name="dueDate">
                                        </div>
                                        <div class="mb-3">
                                            <label for="division" class="form-label">Division</label>
                                            <input type="text" class="form-control" id="division" name="division">
                                        </div>
                                        <div class="mb-3">
                                            <label for="location" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="location" name="location">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyName" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companyName" name="companyName">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Job Vacancies Table -->

                    <!-- Edit Job Modal -->
                    <div class="modal fade" id="editJobModal" tabindex="-1" aria-labelledby="editJobModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editJobModalLabel">Edit Job Details</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="editJobForm">
                                        <div class="mb-3">
                                            <label for="jobTitleInput" class="form-label">Job Title</label>
                                            <input type="text" class="form-control" id="jobTitleInput" name="jobTitleInput" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="dateInput" class="form-label">Date</label>
                                            <input type="date" class="form-control" id="dateInput" name="dateInput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="divisionInput" class="form-label">Division</label>
                                            <input type="text" class="form-control" id="divisionInput" name="divisionInput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="locationInput" class="form-label">Location</label>
                                            <input type="text" class="form-control" id="locationInput" name="locationInput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="companyNameInput" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companyNameInput" name="companyNameInput">
                                        </div>
                                    </form>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this job?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                                </div>
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

        <!-- <script>
            // Function to handle job vacancy submission
            document.getElementById("jobVacancyForm").addEventListener("submit", function(e) {
                e.preventDefault();

                // Get form data
                const jobTitle = document.getElementById("jobTitle").value;
                const jobDescription = document.getElementById("jobDescription").value;

                // You can send this data to your server using AJAX or fetch

                // Example using fetch
                fetch("/api/addJobVacancy", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            jobTitle,
                            jobDescription,
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            // Job vacancy added successfully, you can show a success message or reload the page
                            alert("Job vacancy added successfully");
                            window.location.reload();
                        } else {
                            // Handle error, display an error message
                            alert("Error adding job vacancy");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("Error adding job vacancy");
                    });
            });
        </script>

        <script>
            // Event listener for form submission
            document.getElementById("jobVacancyForm").addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Get form data
                const jobTitleInput = document.getElementById("jobTitle");
                const jobDescriptionInput = document.getElementById("jobDescription");
                const flyerInput = document.getElementById("flyer"); // Updated for file upload

                const jobTitle = jobTitleInput.value;
                const jobDescription = jobDescriptionInput.value;
                const flyerFile = flyerInput.files[0]; // Get the selected file

                // Validate file type and size
                if (flyerFile) {
                    const allowedTypes = ["image/png"];
                    const maxFileSize = 5 * 1024 * 1024; // 5MB

                    if (allowedTypes.indexOf(flyerFile.type) === -1) {
                        alert("Please select a PNG image.");
                        return;
                    }

                    if (flyerFile.size > maxFileSize) {
                        alert("File size exceeds the limit (5MB).");
                        return;
                    }
                } else {
                    alert("Please select a PNG image.");
                    return;
                }

                // Add the new job vacancy to the list (you can implement this part)
                addJobVacancyToList(jobTitle, jobDescription);

                // Clear the form inputs
                jobTitleInput.value = "";
                jobDescriptionInput.value = "";
                flyerInput.value = "";

                // You can also upload the file to the server at this point using FormData and AJAX if needed.

            });
        </script>

        <script>
            $(document).ready(function() {
                // Initialize DataTable with options
                $('#jobListTable').DataTable({
                    "pageLength": 5, // Display 5 rows per page
                    "searching": true, // Enable search functionality
                    "ordering": true, // Enable sorting
                    "info": false, // Hide information about pagination
                    "lengthChange": false, // Remove "Show entries" dropdown
                    "language": {
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Custom info text
                        "columns": [
    { "data": 0 }, // First column (Job Title)
    { "data": 1 }, // Second column (Date)
    { "data": 2 }, // Third column (Division)
    { "data": 3 }, // Fourth column (Location)
    { "data": 4 }, // Fifth column (Company Name)
    { "data": 5 }, // Sixth column (Action buttons)
],

                    },
                });

                // Custom code to display "Showing X of Y entries" text
                $('#jobListTable').on('draw.dt', function() {
                    const pageInfo = $('#jobListTable').DataTable().page.info();
                    $('#showingEntries').html(`Showing ${pageInfo.start + 1} to ${pageInfo.end} of ${pageInfo.recordsTotal} entries`);
                });
            });
        </script>

        <script>
           
            // Edit Button Click Handler
            $('#jobListTable').on('click', '.edit-job-button', function() {
                // Get the data of the selected row (you can customize this part)
                const row = $(this).closest('tr');
                const jobTitle = row.find('td:eq(0)').text();
                const date = row.find('td:eq(1)').text();
                const division = row.find('td:eq(2)').text();
                const location = row.find('td:eq(3)').text();
                const companyName = row.find('td:eq(4)').text();

                // Fill the edit form fields with data
                $('#editJobForm #jobTitleInput').val(jobTitle);
                $('#editJobForm #dateInput').val(date);
                $('#editJobForm #divisionInput').val(division);
                $('#editJobForm #locationInput').val(location);
                $('#editJobForm #companyNameInput').val(companyName);

                // Show the edit modal
                $('#editJobModal').modal('show');
            });

            // Delete Button Click Handler
            $('#jobListTable').on('click', '.delete-job-button', function() {
                // Show the delete confirmation modal
                $('#deleteConfirmationModal').modal('show');
            });

            // Save Changes Button Click Handler (inside the edit modal)
            $('#saveChangesButton').click(function() {
                // Perform the update action here (you can customize this part)
                // After updating, close the modal
                $('#editJobModal').modal('hide');
            });

            // Confirm Delete Button Click Handler (inside the delete confirmation modal)
            $('#confirmDeleteButton').click(function() {
                // Perform the delete action here (you can customize this part)
                // After deleting, close the modal
                $('#deleteConfirmationModal').modal('hide');
            });
        </script>

        <script>
             // JavaScript to trigger the edit modal
             $(document).on("click", ".edit-job-button", function() {
                // You can populate the modal with data here if needed
                $("#editJobModal").modal("show");
            });

            // JavaScript to trigger the delete modal
            $(document).on("click", ".delete-job-button", function() {
                $("#deleteConfirmationModal").modal("show");
            });

            // JavaScript to close the modals
            $(document).on("click", ".close-modal-button", function() {
                $(".modal").modal("hide");
            });
        </script> -->

        <script>
            // Function to handle job vacancy submission
            document.getElementById("jobVacancyForm").addEventListener("submit", function(e) {
                e.preventDefault();

                // Get form data
                const jobTitle = document.getElementById("jobTitle").value;
                const jobDescription = document.getElementById("jobDescription").value;

                // You can send this data to your server using AJAX or fetch

                // Example using fetch
                fetch("/api/addJobVacancy", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                        },
                        body: JSON.stringify({
                            jobTitle,
                            jobDescription,
                        }),
                    })
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.success) {
                            // Job vacancy added successfully, you can show a success message or reload the page
                            alert("Job vacancy added successfully");
                            window.location.reload();
                        } else {
                            // Handle error, display an error message
                            alert("Error adding job vacancy");
                        }
                    })
                    .catch((error) => {
                        console.error("Error:", error);
                        alert("Error adding job vacancy");
                    });
            });

            // Event listener for form submission
            document.getElementById("jobVacancyForm").addEventListener("submit", function(e) {
                e.preventDefault(); // Prevent the default form submission

                // Get form data
                const jobTitleInput = document.getElementById("jobTitle");
                const jobDescriptionInput = document.getElementById("jobDescription");
                const flyerInput = document.getElementById("flyer"); // Updated for file upload

                const jobTitle = jobTitleInput.value;
                const jobDescription = jobDescriptionInput.value;
                const flyerFile = flyerInput.files[0]; // Get the selected file

                // Validate file type and size
                if (flyerFile) {
                    const allowedTypes = ["image/png"];
                    const maxFileSize = 5 * 1024 * 1024; // 5MB

                    if (allowedTypes.indexOf(flyerFile.type) === -1) {
                        alert("Please select a PNG image.");
                        return;
                    }

                    if (flyerFile.size > maxFileSize) {
                        alert("File size exceeds the limit (5MB).");
                        return;
                    }
                } else {
                    alert("Please select a PNG image.");
                    return;
                }

                // Add the new job vacancy to the list (you can implement this part)
                addJobVacancyToList(jobTitle, jobDescription);

                // Clear the form inputs
                jobTitleInput.value = "";
                jobDescriptionInput.value = "";
                flyerInput.value = "";

                // You can also upload the file to the server at this point using FormData and AJAX if needed.
            });

            // Initialize DataTable with options
            $(document).ready(function() {
                $('#jobListTable').DataTable({
                    "pageLength": 5, // Display 5 rows per page
                    "searching": true, // Enable search functionality
                    "ordering": true, // Enable sorting
                    "info": false, // Hide information about pagination
                    "lengthChange": false, // Remove "Show entries" dropdown
                    "columns": [{
                            "data": 0
                        }, // First column (Job Title)
                        {
                            "data": 1
                        }, // Second column (Date)
                        {
                            "data": 2
                        }, // Third column (Division)
                        {
                            "data": 3
                        }, // Fourth column (Location)
                        {
                            "data": 4
                        }, // Fifth column (Company Name)
                        {
                            "data": 5
                        }, // Sixth column (Action buttons)
                    ],
                    "language": {
                        "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Custom info text
                    },
                });

                // Custom code to display "Showing X of Y entries" text
                $('#jobListTable').on('draw.dt', function() {
                    const pageInfo = $('#jobListTable').DataTable().page.info();
                    $('#showingEntries').html(`Showing ${pageInfo.start + 1} to ${pageInfo.end} of ${pageInfo.recordsTotal} entries`);
                });

                // Edit Button Click Handler
                $('#jobListTable').on('click', '.edit-job-button', function() {
                    // Get the data of the selected row (you can customize this part)
                    const row = $(this).closest('tr');
                    const jobTitle = row.find('td:eq(0)').text();
                    const date = row.find('td:eq(1)').text();
                    const division = row.find('td:eq(2)').text();
                    const location = row.find('td:eq(3)').text();
                    const companyName = row.find('td:eq(4)').text();

                    // Fill the edit form fields with data
                    $('#editJobForm #jobTitleInput').val(jobTitle);
                    $('#editJobForm #dateInput').val(date);
                    $('#editJobForm #divisionInput').val(division);
                    $('#editJobForm #locationInput').val(location);
                    $('#editJobForm #companyNameInput').val(companyName);

                    // Show the edit modal
                    $('#editJobModal').modal('show');
                });

                // Delete Button Click Handler
                $('#jobListTable').on('click', '.delete-job-button', function() {
                    // Show the delete confirmation modal
                    $('#deleteConfirmationModal').modal('show');
                });

                // Save Changes Button Click Handler (inside the edit modal)
                $('#saveChangesButton').click(function() {
                    // Perform the update action here (you can customize this part)
                    // After updating, close the modal
                    $('#editJobModal').modal('hide');
                });

                // Confirm Delete Button Click Handler (inside the delete confirmation modal)
                $('#confirmDeleteButton').click(function() {
                    // Perform the delete action here (you can customize this part)
                    // After deleting, close the modal
                    $('#deleteConfirmationModal').modal('hide');
                });
            });

            // JavaScript to trigger the edit modal
            $(document).on("click", ".edit-job-button", function() {
                // You can populate the modal with data here if needed
                $("#editJobModal").modal("show");
            });

            // JavaScript to trigger the delete modal
            $(document).on("click", ".delete-job-button", function() {
                $("#deleteConfirmationModal").modal("show");
            });

            // JavaScript to close the modals
            $(document).on("click", ".close-modal-button", function() {
                $(".modal").modal("hide");
            });
        </script>



</body>

</html>
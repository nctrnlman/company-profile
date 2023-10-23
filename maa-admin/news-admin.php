    <?php
    session_start();
    include '../db.php';

    if (!isset($_SESSION['username'])) {
        header("Location: ./");
        exit();
    }

    $query = "SELECT * FROM news";


    $results = $db->query($query);

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
        <link rel="shortcut icon" href="../img/demos/business-consulting-3/favicon.png" type="image/x-icon" />

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

        <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>


        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Include DataTables CSS (from npm) -->
        <link rel="stylesheet" type="text/css" href="../node_modules/datatables.net-dt/css/jquery.dataTables.css">

        <!-- Include DataTables JavaScript (from npm) -->
        <script type="text/javascript" src="../node_modules/datatables.net/js/jquery.dataTables.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                <?php if (isset($_SESSION['success_message'])) { ?>
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Success',
                                        text: '<?php echo $_SESSION['success_message']; ?>',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });

                                    <?php unset($_SESSION['success_message']); ?>
                                <?php } ?>

                                <?php if (isset($_SESSION['error_message'])) { ?>
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: '<?php echo $_SESSION['error_message']; ?>',
                                        showConfirmButton: false,
                                        timer: 3000
                                    });
                                    <?php unset($_SESSION['error_message']); ?>
                                <?php } ?>
                            });
                        </script>

                        <!-- Existing Job Vacancies List (Static Example) -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">News list</h4>
                                        <div class="table-responsive">
                                            <table id="jobListTable" class="table table-hover table-centered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Highlights</th>
                                                        <th>Create Date</th>
                                                        <th>Image</th>
                                                        <th>Video</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $counter = 1; ?>
                                                    <?php foreach ($results as $result) { ?>
                                                        <tr>
                                                            <td><?php echo $counter; ?></td>
                                                            <td><?php echo $result['title']; ?></td>
                                                            <td><?php echo $result['category']; ?></td>
                                                            <td><?php echo $result['highlights']; ?></td>
                                                            <td><?php echo date('Y-m-d', strtotime($result['create_date'])); ?></td>
                                                            <td><?php
                                                                if ($result['image'] === null || strtoupper($result['image']) === 'NULL') {
                                                                    echo "No Image Available";
                                                                } else {
                                                                    echo '<a href="../file/news/' . $result['image'] . '" target="_blank">View Image</a>';
                                                                }
                                                                ?></td>
                                                            <td>
                                                                <?php
                                                                if ($result['video'] === null || strtoupper($result['video']) === 'NULL') {
                                                                    echo "No Video Available";
                                                                } else {
                                                                    echo '<a href="../file/news/videos/' . $result['video'] . '" target="_blank">View Video</a>';
                                                                }
                                                                ?>
                                                            </td>

                                                            <td>
                                                                <button type="button" class="btn btn-primary btn-sm edit-job-button" data-toggle="modal" data-target="#editJobModal" data-category="<?php echo $result['category']; ?>" data-highlights="<?php echo $result['highlights']; ?>" data-id="<?php echo $result['id_news']; ?>" data-title="<?php echo $result['title']; ?>" data-description="<?php echo $result['description']; ?>" data-image="<?php echo $result['image']; ?>">
                                                                    Edit
                                                                </button>
                                                                <button type="button" class="btn btn-danger btn-sm delete-job-button" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal" data-job-id="<?php echo $result['id_news']; ?>">Delete</button>
                                                            </td>

                                                        </tr>
                                                        <?php $counter++; ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>

                                        </div>
                                        <div id="showingEntries" class="text-left mt-2"></div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add News & Article</h4>
                                        <form method="POST" enctype="multipart/form-data" action="add-news.php">
                                            <div class="mb-3">
                                                <label for="jobTitle" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="jobTitle" name="title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="categoryTitle" class="form-label">Category</label>
                                                <select class="form-select" id="categoryTitle" name="category" required>
                                                    <option value="">Select One</option>
                                                    <option value="Mining">Mining</option>
                                                    <option value="Charity">Charity</option>
                                                    <option value="Events">Events</option>
                                                    <option value="National News">National News</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="post_type" class="form-label">Highlights Post</label>
                                                <select class="form-select" id="highlights" name="highlights" required>
                                                    <option value="">Yes or No?</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="flyer" class="form-label">Image Thumbnail (max 3MB)</label>
                                                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="video" class="form-label">Video (max 50MB)</label>
                                                <input type="file" class="form-control" id="video" name="video" accept=".mp4, .avi, .mov">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="ckeditor-classic" name="description"></textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary" name="submit">Add</button>
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
                                        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" enctype="multipart/form-data" id="editJobForm" action="update-news.php">
                                            <input type="hidden" id="jobIdInput" name="jobIdInput">
                                            <div class="mb-3">
                                                <label for="jobTitle" class="form-label">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="editCategory" class="form-label">Category</label>
                                                <select class="form-select" id="editCategory" name="editCategory" required>
                                                    <option value="">Select One</option>
                                                    <option value="Mining">Mining</option>
                                                    <option value="Charity">Charity</option>
                                                    <option value="Events">Events</option>
                                                    <option value="National News">National News</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="post_type" class="form-label">Highlights Post</label>
                                                <select class="form-select" id="highlights" name="highlights" required>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>


                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea class="form-control" id="description" name="description"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Image Tumbnail (max 3MB)</label>
                                                <input type="file" class="form-control" id="image" name="image" accept=".jpg, .jpeg, .png">
                                            </div>
                                            <div class="mb-3">
                                                <label for="video" class="form-label">Video (max 50MB)</label>
                                                <input type="file" class="form-control" id="video" name="video" accept=".mp4, .avi, .mov">
                                            </div>

                                            <div class="mb-3 flex row">
                                                <label for="currentFlyer" class="form-label">Current Flyer</label>
                                                <img id="currentFlyer" style="max-width: 50%;">
                                            </div>
                                            <div class="modal-footer">
                                                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                                                <button type="submit" class="btn btn-primary" id="saveChangesButton">Save Changes</button>
                                            </div>
                                        </form>
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
                                    <form method="POST" action="delete-news.php">
                                        <div class="modal-body">
                                            Are you sure you want to delete this job?
                                            <input type="hidden" id="deleteJobId" name="id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" id="confirmDeleteButton">Delete</button>
                                        </div>
                                    </form>
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
            <script src="sweetalert2.all.min.js"></script>

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
                    // Initialize DataTable with options
                    var dataTable = $('#jobListTable').DataTable({
                        "pageLength": 7,
                        "searching": true,
                        "ordering": true,
                        "info": false,
                        "lengthChange": false,
                        "columns": [{
                                "data": 0
                            }, // Kolom pertama (Job Title)
                            {
                                "data": 1
                            }, // Kolom kedua (Date)
                            {
                                "data": 2
                            }, // Kolom ketiga (Division)
                            {
                                "data": 3
                            }, // Kolom keempat (Location)
                            {
                                "data": 4
                            }, // Kolom kelima (Company Name)
                            {
                                "data": 5
                            }, // Kolom keenam (Company Name)
                            {
                                "data": 6
                            }, // Kolom ketujuh (Company Name)
                            {
                                "data": 7
                            } // Kolom kedelapan (Actions)
                        ],
                        "language": {
                            "info": "Showing _START_ to _END_ of _TOTAL_ entries"
                        }
                    });

                    // Custom code to display "Showing X of Y entries"
                    dataTable.on('draw.dt', function() {
                        const pageInfo = dataTable.page.info();
                        $('#showingEntries').html(`Showing ${pageInfo.start + 1} to ${pageInfo.end} of ${pageInfo.recordsTotal} entries`);
                    });

                    // JavaScript to trigger the edit modal
                    $(document).on('click', '.edit-job-button', function() {
                        var jobId = $(this).data('id');
                        var title = $(this).data('title');
                        var category = $(this).data('category');
                        var highlights = $(this).data('highlights');
                        var description = $(this).data('description');
                        var image = $(this).data('image');
                        var video = $(this).data('video');
                        console.log(jobId);

                        // Isi data ke dalam form modal
                        $('#jobIdInput').val(jobId);
                        $('#category').val(category);
                        $('#highlights').val(highlights);
                        $('#title').val(title);
                        $('#description').val(description);

                        // Tampilkan gambar saat ini, jika ada
                        if (image !== null) {
                            $('#currentFlyer').attr('src', '../file/news/' + image);
                        } else {
                            $('#currentFlyer').attr('src', ''); // Kosongkan gambar jika tidak ada
                        }

                        if (video !== null) {
                            $('#currentVideo').attr('src', '../file/videos/' + video);
                        } else {
                            $('#currentVideo').attr('src', ''); // Kosongkan video jika tidak ada
                        }

                        // Tampilkan modal
                        $('#editJobModal').modal('show');
                    });

                    // JavaScript to initialize CKEditor when the modal is shown
                    $('#editJobModal').on('shown.bs.modal', function() {
                        ClassicEditor
                            .create(document.querySelector('#ckeditor-classic'))
                            .catch(error => {
                                console.error(error);
                            });
                    });

                    // JavaScript to close the modals
                    $(document).on('click', '.close-modal-button', function() {
                        $('.modal').modal('hide');
                    });
                });
            </script>


            <!-- jQuery -->
            <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

            <!-- Bootstrap JS -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



    </body>

    </html>
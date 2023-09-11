<?php
session_start();
include 'db.php';

// Fungsi untuk mengambil data pekerjaan dari database dengan batasan
function getDefaultJobs($limit = 3)
{
  global $db;
  $query = "SELECT * FROM job_vacanacy LIMIT $limit";
  $stmt = $db->query($query);
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  header("Location: careers.php");
  exit();
}

// Fungsi untuk mengambil data pekerjaan dari database dengan filter, pencarian, dan pengurutan
function getFilteredJobs($searchTerm = '', $sortOption = '', $filterOption = '', $limitOption = 3)
{
  global $db;
  $query = "SELECT * FROM job_vacanacy WHERE 1";

  // Cek apakah ada pencarian yang dikirimkan
  if (!empty($searchTerm)) {
    $query .= " AND (position LIKE :searchTerm OR location LIKE :searchTerm)";
  }

  // Cek apakah ada filter yang dikirimkan
  if (!empty($filterOption)) {
    $query .= " AND division = :filterOption";
  }

  // Cek apakah ada pengurutan yang dikirimkan
  if (!empty($sortOption)) {
    $query .= " ORDER BY $sortOption";
  }

  // Tambahkan LIMIT sesuai dengan opsi yang diberikan
  $query .= " LIMIT :limitOption";

  $stmt = $db->prepare($query);

  // Bind parameter pencarian
  if (!empty($searchTerm)) {
    $searchTerm = '%' . $searchTerm . '%';
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
  }

  // Bind parameter filter
  if (!empty($filterOption)) {
    $stmt->bindParam(':filterOption', $filterOption, PDO::PARAM_STR);
  }

  // Bind parameter limit
  $stmt->bindParam(':limitOption', $limitOption, PDO::PARAM_INT);

  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
  header("Location: careers.php");
  exit();
}

// Mengambil data dari formulir
$searchTerm = isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '';
$sortOption = isset($_GET['sort']) ? htmlspecialchars($_GET['sort']) : '';
$filterOption = isset($_GET['filter']) ? htmlspecialchars($_GET['filter']) : '';
$limitOption = isset($_GET['limit']) ? intval($_GET['limit']) : 3;

// Jika tombol "Seemore" ditekan, tambahkan 3 ke limit
if (isset($_GET['seemore'])) {
  $limitOption += 3;
}

// Jika tidak ada permintaan khusus, gunakan fungsi getDefaultJobs() untuk mendapatkan data dengan limit awal
if (empty($searchTerm) && empty($sortOption) && empty($filterOption)) {
  $results = getDefaultJobs($limitOption);

  $numResults = count($results);

  // Tampilkan tombol "Seemore" hanya jika jumlah data lebih dari atau sama dengan limit
  $showSeemore = $numResults >= $limitOption;
} else {
  // Jika ada permintaan khusus, gunakan fungsi getFilteredJobs() untuk mengambil data sesuai permintaan
  $results = getFilteredJobs($searchTerm, $sortOption, $filterOption, $limitOption);

  $numResults = count($results);

  // Tampilkan tombol "Seemore" hanya jika jumlah data lebih dari atau sama dengan limit
  $showSeemore = $numResults >= $limitOption;
}
?>


<!DOCTYPE html>
<html lang="en" data-hash-offset="130">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Career | MAA GROUP</title>

  <meta name="keywords" content="Company Profile" />
  <meta name="description" content="Maa Group" />
  <meta name="author" content="MAA" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/demos/business-consulting-3/favicon.png" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

  <!-- Web Fonts  -->
  <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjO5ftz5z5F5u5pge5O8W5B2EpE" crossorigin="anonymous">
  <!-- Vendor CSS -->
  <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css" />
  <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css" />
  <link rel="stylesheet" href="vendor/animate/animate.compat.css" />
  <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css" />
  <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css" />
  <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css" />

  <!-- Theme CSS -->
  <link rel="stylesheet" href="css/theme.css" />
  <link rel="stylesheet" href="css/theme-elements.css" />
  <link rel="stylesheet" href="css/theme-blog.css" />
  <link rel="stylesheet" href="css/theme-shop.css" />

  <!-- Demo CSS -->
  <link rel="stylesheet" href="css/demos/demo-business-consulting-3.css" />

  <!-- Demo CSS -->
  <link rel="stylesheet" href="css/demos/demo-construction.css" />

  <!-- Skin CSS -->
  <link id="skinCSS" rel="stylesheet" href="css/skins/skin-business-consulting-3.css" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="css/custom.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="https://unpkg.com/feather-icons"></script>

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>



  <style>
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.7);
      /* Adjust the opacity to control darkness */
      display: none;
      z-index: 999;
      /* Ensure the overlay is above other content */
    }
  </style>


  <style>
    /* Add a CSS rule for the overlay */
    .modal-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Semi-transparent black background */
      z-index: 1050;
      /* Ensure the overlay is above the rest of the content */
      display: none;
      /* Initially hidden */
    }
  </style>

  <style>
    .seemore-container {
      display: flex;
      justify-content: center;
      /* box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2); */
      /* transition: transform 0.3s ease, box-shadow 0.3s ease; */
      /* margin: 0px; */
      /* padding: 0px; */
    }

    /* Style the button as needed */
    /* .seemore-container button:hover {
      transform: scale(0.95);
    } */
  </style>


  <style>
    .search-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: 1px solid #ccc;
      padding: 10px;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    .search-input {
      display: flex;
      align-items: center;
      flex: 1;

    }

    #searchInput {
      border: none;
      padding: 7px;
      flex: 1;
      width: 60%;
      max-width: 94%;
      /* Add this line */
    }

    #searchButton {
      background-color: #af2a25;
      color: #fff;
      border: none;
      padding: 8px 12px;
      border-radius: 0 5px 5px 0;
      cursor: pointer;
      transition: background-color 0.3s;
    }

    #searchButton:hover {
      background-color: #C6A265;
    }

    .sort-category {
      display: flex;
      gap: 10px;
    }

    .dropdown-toggle {
      background-color: #fff;
      /* border: 1px solid #ccc; */
      padding: 8px 12px;
      border-radius: 5px;
      cursor: pointer;
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #fff;
      border: 1px solid #ccc;
      border-radius: 5px;
      display: none;
    }

    .dropdown-menu select {
      width: 100%;
      border: none;
      outline: none;
      padding: 8px;
    }

    .dropdown:hover .dropdown-menu {
      display: block;
    }
  </style>





  <!-- Head Libs -->
  <script src="vendor/modernizr/modernizr.min.js"></script>
</head>




<body>
  <div class="body">
    <!-- Existing Modal -->
    <?php foreach ($results as $result) { ?>

      <div class="modal fade" id="myModal<?php echo $result['id_job_vacanacy']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.7);">

            <div class="modal-header">
              <h5 class="modal-title text-white">Flyer</h5>
              <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body text-white" style="max-width: auto; overflow-y: auto;">
              <?php
              if (!empty($result['image'])) {
                echo '<img src="file/flayer/' . $result['image'] . '" alt="Flyer" class="img-fluid">';
              } elseif (!empty($result['description'])) {

                echo '<p>' . $result['description'] . '</p>';
              } else {
                echo 'No content available.';
              }
              ?>
            </div>

          </div>
        </div>
      </div>
    <?php } ?>

    <!-- apply form -->
    <?php foreach ($results as $result) { ?>
      <div class="modal fade" id="thisModal<?php echo $result['id_job_vacanacy']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color: #fff">
            <div class="modal-header">
              <h5 class="modal-title text-black"><?php echo $result['position']; ?> | <?php echo $result['division']; ?> </h5>
            </div>

            <div class="modal-body text-black" style="max-width: auto; overflow-y: auto;">
              <form method="POST" enctype="multipart/form-data" action="applyCareer.php">
                <div class="modal-body">
                  <div class="mb-3">
                    <label for="name" class="form-label" style="font-weight: bold;">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" style="border: 1px solid #ccc; border-radius: 5px; padding: 0.5rem; margin-bottom: 1rem;" required>
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label" style="font-weight: bold;">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" name="phone" style="border: 1px solid #ccc; border-radius: 5px; padding: 0.5rem; margin-bottom: 1rem;" required>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label" style="font-weight: bold;">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" style="border: 1px solid #ccc; border-radius: 5px; padding: 0.5rem; margin-bottom: 1rem;">
                  </div>
                  <div class="mb-3">
                    <label for="resume" class="form-label" style="font-weight: bold;">Upload Resume (PDF, max 3MB)</label>
                    <input type="file" class="form-control" id="resume" name="resume" accept=".pdf" style="border: 1px solid #ccc; border-radius: 5px; padding: 0.5rem; margin-bottom: 1rem;" required>
                  </div>
                  <div class="mb-3">
                    <!-- <div class="g-recaptcha" data-sitekey="6LdnLwYoAAAAAM0oA32qzK-lSACMIOgd2S-qfyBL"></div> -->
                  </div>
                  <input type="hidden" name="job_id" value="<?php echo $result['id_job_vacanacy']; ?>">
                </div>

                <div class="modal-footer" style="border-top: none; padding-top: 0;">
                  <button type="submit" class="btn btn-primary" name="submit">Apply</button>
                </div>
              </form>
            </div>

          </div>
        </div>
      </div>
    <?php } ?>
    <!-- end apply form -->

    <?php include 'navbar.php'; ?>

    <div id="overlay">
      <div role="main" class="main">
        <!-- judul -->
        <section class="section section-with-shape-divider page-header page-header-modern page-header-lg border-0 my-0 lazyload" style="
            background-size: cover;
            background-position: center;
            background-color: #af2a25;
          ">
          <div class="container pb-5 my-3">
            <div class="row mb-4">
              <div class="col-md-12 align-self-center p-static order-2 text-center">
                <h1 class="font-weight-bold text-color-white text-12" style="text-shadow: 5px 5px 10px black;">
                  Careers
                </h1>
              </div>
            </div>
          </div>
          <div class="shape-divider shape-divider-bottom shape-divider-reverse-x" style="height: 123px">
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 123" preserveAspectRatio="xMinYMin">
              <polygon fill="#c6a265" points="0,90 221,60 563,88 931,35 1408,93 1920,41 1920,-1 0,-1 " />
              <polygon fill="#FFFFFF" points="0,75 219,44 563,72 930,19 1408,77 1920,25 1920,-1 0,-1 " />
            </svg>
          </div>
        </section>
        <div class="col-md-12">
          <script>
            document.addEventListener('DOMContentLoaded', function() {
              <?php if (isset($_SESSION['success_message'])) { ?>
                Swal.fire({
                  icon: 'success', // Ikonya bisa diganti dengan 'error', 'warning', dll.
                  text: '<?php echo $_SESSION['success_message']; ?>',

                  showConfirmButton: false,
                  timer: 3000
                });
                <?php unset($_SESSION['success_message']); ?>
              <?php } ?>

              <?php if (isset($_SESSION['error_message'])) { ?>
                Swal.fire({
                  icon: 'error',
                  text: '<?php echo $_SESSION['error_message']; ?>',

                  showConfirmButton: false,
                  timer: 3000
                });
                <?php unset($_SESSION['error_message']); ?>
              <?php } ?>
            });
          </script>
        </div>

        <section class="section section-default border-0 m-0 bg-light">
          <div class="container py-4">

            <!-- search sort filter -->
            <div class="container">
              <h1 style='font-weight: 600; text-align : center; color:black; '>Find Your Dream Job at PT Mineral Alam Abadi</h1><br />
            </div>


            <div class="search-bar">

              <form method="GET">
                <div class="search-input">
                  <input type="text" id="searchInput" name="search" placeholder="Search..." style="width: 770px;">
                  <button id="searchButton" type="submit"><i class="fas fa-search"></i></button>
                </div>
              </form>
              <div class="sort-category">
                <form method="GET">
                  <select id="sortSelect" name="sort">
                    <option value="">Sort by</option>
                    <option value="position">Sort by Position</option>
                    <option value="company">Sort by Company</option>
                    <option value="location">Sort by Location</option>
                    <option value="create_date">Sort by Date</option>
                  </select>
                </form>
                <div class="dropdown">
                  <form method="GET">
                    <select id="filterSelect" name="filter">
                      <option value="">Filter by Division</option>
                      <option value="IT">IT</option>
                      <option value="HRGA">HRGA</option>
                      <option value="Mining">Mining</option>
                    </select>
                  </form>
                </div>
              </div>

            </div>

            <!-- end search filter sort -->

            <!-- card -->
            <div class="card-container" id="jobList">

              <div class="row mt-5">

                <?php if (count($results) > 0) { ?>
                  <?php foreach ($results as $result) { ?>
                    <div class="col-md-4 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="mb-3">
                            <img src="img/demos/business-consulting-3/logo.png" alt="Company Logo" class="img-fluid" style="max-width: 150px; height: auto;">
                          </div>
                          <h5 class="font-weight-bold mb-2"><?php echo $result['position']; ?> - Division <?php echo $result['division']; ?></h5>
                          <p class="mb-1"><i class="far fa-calendar-alt me-1"></i><?php
                                                                                  $originalDate = $result['create_date'];
                                                                                  $newDate = date("d F Y", strtotime($originalDate));

                                                                                  echo $newDate;
                                                                                  ?> | <i class="fas fa-map-marker-alt ms-1 me-1"></i><?php echo $result['location']; ?></p>
                          <p class="mb-2"><?php echo $result['company']; ?></p>
                          <div class="card">

                            <div class="card-body" style="background-color:#af2a25; background-image: url('img/demos/business-consulting-3/texture-card.png'); background-blend-mode: overlay;">
                              <div class="text-center mt-2">
                                <?php if (!empty($result['image'])) { ?>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $result['id_job_vacanacy']; ?>" data-id="<?php echo $result['id_job_vacanacy']; ?>" onclick="openModal(<?php echo $result['id_job_vacanacy']; ?>)">
                                    Open Flyer
                                  </button>
                                <?php } else { ?>
                                  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal<?php echo $result['id_job_vacanacy']; ?>" data-id="<?php echo $result['id_job_vacanacy']; ?>" onclick="openModal(<?php echo $result['id_job_vacanacy']; ?>)">
                                    Open Description
                                  </button>
                                <?php } ?>
                              </div>
                            </div>
                          </div>

                          <div class="text-center mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#thisModal<?php echo $result['id_job_vacanacy']; ?>" data-id="<?php echo $result['id_job_vacanacy']; ?>" onclick="openApplyModal(<?php echo $result['id_job_vacanacy']; ?>)">
                              Apply Job
                            </button>

                          </div>
                        </div>
                      </div>
                    </div>



                  <?php } ?>
                <?php } else { ?>
                  <div class="col-md-12">
                    <h1>Tidak ada lowongan.</h1>
                  </div>
                <?php } ?>

              </div>
            </div>
            <!-- end card -->
          </div>
          <?php if ($showSeemore) : ?>
            <div class="seemore-container">
              <form method="GET" action="careers.php">
                <input type="hidden" name="search" value="<?= htmlspecialchars($searchTerm) ?>">
                <input type="hidden" name="sort" value="<?= htmlspecialchars($sortOption) ?>">
                <input type="hidden" name="filter" value="<?= htmlspecialchars($filterOption) ?>">
                <input type="hidden" name="limit" value="<?= $limitOption ?>">
                <button type="submit" name="seemore" class="btn text-color-white custom-btn-style-1 font-weight-semibold btn-px-4 btn-py-2 bg-color-dark"> <span>See More</span></button>
            </div>
          <?php endif; ?>
        </section>
        <!-- end section card -->







      </div>
    </div>
    <?php include 'footer.php'; ?>
  </div>



  <script src="sweetalert2.all.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="vendor/plugins/js/plugins.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <!-- Theme Base, Components and Settings -->
  <script src="js/theme.js"></script>

  <!-- Current Page Vendor and Views -->
  <script src="js/views/view.contact.js"></script>

  <!-- Theme Custom -->
  <script src="js/custom.js"></script>

  <!-- Theme Initialization Files -->
  <script src="js/theme.init.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>

  <script>
    // Mendapatkan elemen select
    const sortSelect = document.getElementById("sortSelect");

    // Mendengarkan perubahan pada select
    sortSelect.addEventListener("change", function() {
      // Mengirim formulir saat pilihan berubah
      this.form.submit();
    });

    const filterSelect = document.getElementById("filterSelect");

    // Mendengarkan perubahan pada select
    filterSelect.addEventListener("change", function() {
      // Mengirim formulir saat pilihan berubah
      this.form.submit();
    });
  </script>


  <script>
    function openModal(id) {
      // Show the overlay
      document.getElementById("overlay").style.display = "block";

      // Open the modal with the specified ID
      var modalId = "myModal" + id;
      var myModal = new bootstrap.Modal(document.getElementById(modalId));
      myModal.show();
    }
  </script>
  <script>
    // Fungsi untuk menangani klik pada tombol Apply
    function handleApplyButtonClick(event) {
      // Dapatkan ID dari atribut data-id
      const jobId = event.target.getAttribute('data-id');

      // Lakukan sesuatu dengan ID yang ditemukan, seperti mencetaknya
      console.log('Job ID:', jobId);
    }

    // Tambahkan event listener ke semua tombol Apply
    const applyButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    applyButtons.forEach(function(button) {
      button.addEventListener('click', handleApplyButtonClick);
    });
  </script>
  <script>
    function openApplyModal(id) {
      // Show the modal with the specified ID
      var modalId = "thisModal" + id;
      var myModal = new bootstrap.Modal(document.getElementById(modalId));
      myModal.show();
    }
  </script>

  <script>
    feather.replace();
  </script>

</body>

</html>
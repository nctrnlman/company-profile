<?php
session_start();
include 'db.php';

$itemsPerPage = 12;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $itemsPerPage;


$categoriesStmt = $db->prepare("SELECT DISTINCT category FROM gallery");
$categoriesStmt->execute();
$categories = $categoriesStmt->fetchAll(PDO::FETCH_COLUMN);


$filterCategory = isset($_GET['category']) ? $_GET['category'] : null;
$filterClause = $filterCategory ? "WHERE category = :category" : "";


$stmt = $db->prepare("SELECT image, category FROM gallery $filterClause ORDER BY category ASC LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
if ($filterCategory) {
  $stmt->bindParam(':category', $filterCategory, PDO::PARAM_STR);
}
$stmt->execute();
$results = $stmt->fetchAll();


$countStmt = $db->prepare("SELECT COUNT(*) FROM gallery $filterClause");
if ($filterCategory) {
  $countStmt->bindParam(':category', $filterCategory, PDO::PARAM_STR);
}
$countStmt->execute();
$totalItems = $countStmt->fetchColumn();


$totalPages = ceil($totalItems / $itemsPerPage);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Gallery | MAA GROUP</title>

  <meta name="keywords" content="Company Profile" />
  <meta name="description" content="Maa Group" />
  <meta name="author" content="MAA" />

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/demos/business-consulting-3/favicon.png" type="image/x-icon" />
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png" />

  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no" />

  <!-- Web Fonts -->
  <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css" />

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

  <!-- Custom CSS -->
  <link rel="stylesheet" href="css/custom.css" />

  <!-- Head Libs -->
  <script src="vendor/modernizr/modernizr.min.js"></script>

  <style>
    /* Gallery styles */
    .gallery-section {
      padding: 40px 0;
      text-align: center;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-bottom: 20px;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
    }

    .gallery-item img {
      max-width: 100%;
      height: auto;
      transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .pagination {
      display: flex;
      justify-content: center;
    }

    .page-btn {
      margin: 0 5px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      background-color: #f5f5f5;
      cursor: pointer;
    }

    .page-btn:hover {
      background-color: #e0e0e0;
    }
  </style>

  <style>
    /* Gallery styles */
    .gallery-section {
      padding: 40px 0;
      text-align: center;
    }

    .gallery-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-bottom: 20px;
    }

    .gallery-item {
      position: relative;
      overflow: hidden;
      max-width: 550px;
      /* Set the maximum width for each image */
      width: 100%;
      /* Ensure all images take up the full width */
    }

    .gallery-item img {
      max-width: 100%;
      max-height: 100%;
      width: 100%;
      height: 100%;
      /* Set the height to 100% to maintain aspect ratio */
      object-fit: cover;
      /* Ensure images cover the entire container */
      transition: transform 0.3s ease;
    }

    .gallery-item:hover img {
      transform: scale(1.1);
    }

    .pagination {
      display: flex;
      justify-content: center;
    }

    .page-btn {
      margin: 0 5px;
      padding: 5px 10px;
      border: 1px solid #ccc;
      background-color: #f5f5f5;
      cursor: pointer;
    }

    .page-btn:hover {
      background-color: #e0e0e0;
    }
  </style>
  <style>
    /* Center-align the tab navigation */
    .gallery-categories {
      display: flex;
      justify-content: center;
    }
  </style>

  <style>
    .slider {
      height: 200px;
      margin: auto;
      position: relative;
      width: 90%;
      overflow: hidden;
    }

    .slide-track {
      display: flex;
      animation: scroll 40s linear infinite;
    }

    .slide {
      height: 100%;
      width: 250px;
      display: flex;
      align-items: center;
      padding: 15px;
    }

    @keyframes scroll {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(calc(-250px * 6));
        /* Adjust the translation distance based on the number of images */
      }
    }

    /* 
img {
  width: 100%;
  height: auto; /* Ensure the aspect ratio is maintained */

    .slider::before,
    .slider::after {
      content: '';
      height: 100%;
      position: absolute;
      width: 15px;
      z-index: 2;
      background: linear-gradient(to right, rgba(255, 255, 255, 1) 0%, rgba(255, 255, 255, 0)100%);
    }

    .slider::before {
      left: 0;
      top: 0;
    }

    .slider::after {
      right: 0;
      top: 0;
      transform: rotateZ(180deg);
    }

    .slide:hover img {
      transform: scale(1.1);
      transition: transform 0.3s ease;
    }
  </style>
</head>

<body>
  <?php include 'navbar.php'; ?>
  <div class="body">

    <div role="main" class="main">
      <section class="section section-with-shape-divider page-header page-header-modern page-header-lg border-0 my-0 lazyload" style="background-size: cover; background-position: center;background-color: #af2a25;">
        <div class="container pb-5 my-3">
          <div class="row mb-4">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
              <h1 class="font-weight-bold text-color-white text-10" style="text-shadow: 5px 5px 10px black;">
                Gallery
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

      <!-- <div style="font-weight: 600; display: flex; justify-content: center;">
        <h1>Welcome to Mineral Alam Abadi Gallery</h1>
      </div> -->


      <div class="slider" style="margin-top: 100px;">
        <div class="slide-track">
          <?php
          $imagePaths = [
            "./img/demos/business-consulting-3/backgrounds/BCPM/DJI_0346.JPG",
            "./img/demos/business-consulting-3/backgrounds/BCPM/DJI_0347.JPG",
            "./img/demos/business-consulting-3/backgrounds/BCPM/DJI_0348.JPG",
            "./img/demos/business-consulting-3/backgrounds/BCPM/DJI_0349.JPG",
            "./img/demos/business-consulting-3/backgrounds/BCPM/DJI_0350.JPG",
            "./img/demos/business-consulting-3/backgrounds/BCPM/DJI_0351.JPG",
          ];

          // Duplicate the images to create a looping effect
          $imagePaths = array_merge($imagePaths, $imagePaths);

          foreach ($imagePaths as $imagePath) {
          ?>
            <div class="slide">
              <img src="<?php echo $imagePath; ?>" alt="Image" style="width: 100%; height: auto;">
            </div>
          <?php
          }
          ?>
        </div>
      </div>




    </div>

  </div>

  <section class="container gallery-section">

    <div class="gallery-categories text-center" style="margin-bottom: 20px;">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link <?php echo ($filterCategory === 'All') ? 'active' : ''; ?>" href="gallery.php">All</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($filterCategory === 'OBI') ? 'active' : ''; ?>" href="gallery.php?category=OBI">OBI</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($filterCategory === 'BCPM') ? 'active' : ''; ?>" href="gallery.php?category=BCPM">BCPM</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo ($filterCategory === 'Head Office') ? 'active' : ''; ?>" href="gallery.php?category=Head Office">Head Office</a>
        </li>

      </ul>
    </div>


    <div class="container" style="background-color: #af2a25; padding-top: 10px; padding-bottom: 10px;">
      <!-- Gallery Grid -->
      <div class="gallery-grid" style="margin-top: 40px;">
        <?php foreach ($results as $result) { ?>
          <div class="gallery-item <?php echo 'category-' . $result['category']; ?>">
            <img src="./file/gallery/<?php echo $result['image']; ?>" alt="Image" />
          </div>
        <?php } ?>
      </div>
    </div>


    <!-- Pagination -->
    <div class="pagination">
      <div class="">
        <div class="pagination-text">Showing <?php echo count($results); ?> images</div>
        <div class="mt-4">
          <?php if ($page > 1) { ?>
            <a class="page-btn prev-btn " href="?page=<?php echo $page - 1; ?>&category=<?php echo $filterCategory; ?>">◄</a>
          <?php } ?>

          <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <a class="page-btn <?php echo ($page == $i) ? 'active' : ''; ?>" href="?page=<?php echo $i; ?>&category=<?php echo $filterCategory; ?>"><?php echo $i; ?></a>
          <?php } ?>


          <?php if ($page < $totalPages) { ?>
            <a class="page-btn next-btn" href="?page=<?php echo $page + 1; ?>&category=<?php echo $filterCategory; ?>">►</a>
          <?php } ?>
        </div>
      </div>
    </div>
  </section>
  </div>
  </div>

  <?php include 'footer.php'; ?>
  </div>

  <!-- Vendor -->
  <script src="vendor/plugins/js/plugins.min.js"></script>

  <!-- Theme Base, Components, and Settings -->
  <script src="js/theme.js"></script>

  <!-- Custom Scripts -->
  <script src="js/custom.js"></script>

  <!-- Theme Initialization Files -->
  <script src="js/theme.init.js"></script>

  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
  <script>
    /* Google Maps settings and functions here */
  </script>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      const itemsPerPage = 12;
      const totalItems = $('.gallery-item').length;
      const $galleryItems = $('.gallery-item');
      const $paginationText = $('.pagination-text');
      const $prevBtn = $('.prev-btn');
      const $nextBtn = $('.next-btn');
      let currentPage = 1;

      // Show the first page by default
      showPage(currentPage);

      // Calculate the number of pages
      const totalPages = Math.ceil(totalItems / itemsPerPage);

      // Update pagination text
      updatePaginationText(currentPage);

      // Handle pagination text click
      $paginationText.click(function() {
        const nextPage = currentPage === totalPages ? 1 : currentPage + 1;
        showPage(nextPage);
      });

      // Handle previous button click
      $prevBtn.click(function() {
        const prevPage = currentPage === 1 ? totalPages : currentPage - 1;
        showPage(prevPage);
      });

      // Handle next button click
      $nextBtn.click(function() {
        const nextPage = currentPage === totalPages ? 1 : currentPage + 1;
        showPage(nextPage);
      });

      // Show items for a specific page
      function showPage(pageNumber) {
        const startIndex = (pageNumber - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Hide all gallery items and then show the ones for the selected page
        $galleryItems.hide();
        $galleryItems.slice(startIndex, endIndex).show();

        // Update pagination text and current page
        updatePaginationText(pageNumber);
        currentPage = pageNumber;
      }

      // Update pagination text with the current page number
      function updatePaginationText(pageNumber) {
        const startIndex = (pageNumber - 1) * itemsPerPage + 1;
        const endIndex = Math.min(startIndex + itemsPerPage - 1, totalItems);
        $paginationText.text(`Showing ${startIndex}-${endIndex} of ${totalItems} images`);
      }
    });
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const slider = document.querySelector(".slider");
      const slideTrack = document.querySelector(".slide-track");

      // Clone the first slide and append it to the end for looping
      const firstSlideClone = slideTrack.children[0].cloneNode(true);
      slideTrack.appendChild(firstSlideClone);

      // Set the width of slideTrack to accommodate all slides
      slideTrack.style.width = slideTrack.children.length * 100 + "%";

      // Animation function for looping
      function animateSlider() {
        let currentSlideIndex = 0;

        function nextSlide() {
          currentSlideIndex++;
          if (currentSlideIndex >= slideTrack.children.length) {
            currentSlideIndex = 1;
            slideTrack.style.transition = "none"; // Disable transition for instant jump
            slideTrack.style.transform = "translateX(0)";
            setTimeout(() => {
              slideTrack.style.transition = ""; // Re-enable transition
            }, 0);
          }
          slideTrack.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
        }

        setInterval(nextSlide, 4000); // Change slide every 4 seconds (adjust as needed)
      }

      animateSlider();
    });
  </script>



</body>

</html>
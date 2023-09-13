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
      <section class="container gallery-section">


        <div class="gallery-categories" style="text-align: center; margin-bottom: 20px;">
          <button class="category-btn" data-category="all" style="margin: 0 10px; padding: 8px 20px; border: 1px solid #ccc; background-color: #f5f5f5; color: #333; cursor: pointer; transition: background-color 0.3s ease;">All</button>
          <button class="category-btn" data-category="category1" style="margin: 0 10px; padding: 8px 20px; border: 1px solid #ccc; background-color: #f5f5f5; color: #333; cursor: pointer; transition: background-color 0.3s ease;">OBI</button>
          <button class="category-btn" data-category="category2" style="margin: 0 10px; padding: 8px 20px; border: 1px solid #ccc; background-color: #f5f5f5; color: #333; cursor: pointer; transition: background-color 0.3s ease;">BCPM</button>
          <button class="category-btn" data-category="category3" style="margin: 0 10px; padding: 8px 20px; border: 1px solid #ccc; background-color: #f5f5f5; color: #333; cursor: pointer; transition: background-color 0.3s ease;">Head Office</button>
          <button class="category-btn" data-category="category4" style="margin: 0 10px; padding: 8px 20px; border: 1px solid #ccc; background-color: #f5f5f5; color: #333; cursor: pointer; transition: background-color 0.3s ease;">MLDP</button>
        </div>


        <!-- Gallery Grid -->
        <div class="gallery-grid">
          <!-- Gallery Items (Change the image sources accordingly) -->
          <div class="gallery-item page-1"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 1" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 2" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 3" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 4" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 5" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 6" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 7" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 8" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 9" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 10" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 11" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <!-- page 2 -->
          <div class="gallery-item page-2"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 13" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <!-- page 3 -->
          <div class="gallery-item page-2"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 13" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>
          <div class="gallery-item"><img src="img/demos/business-consulting-3/backgrounds/BCPM/DJI_0861.JPG" alt="Image 12" /></div>


        </div>
        <!-- Pagination -->
        <div class="pagination">
          <div class="">
          <div class="pagination-text">Showing 12 of 36 images</div>
          <button class="page-btn prev-btn">◄</button>
          <button class="page-btn active">1</button>
          <button class="page-btn">2</button>
          <button class="page-btn">3</button>
          <button class="page-btn next-btn">►</button>
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


</body>

</html>
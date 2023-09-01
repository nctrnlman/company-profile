<?php
session_start();
include 'db.php';

try {
  $stmt = $db->query("SELECT * FROM job WHERE status_job = 'aktif'");
  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  echo "Query failed: " . $e->getMessage();
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


  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

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
    #applyModal {
      background: none;
    }

    /* CSS for the modal */
    .modal {
      z-index: 1051 !important;
      /* Higher value than the backdrop */
    }

    /* CSS for the backdrop overlay behind the modal */
    .modal-backdrop {
      z-index: 1040 !important;
      /* Lower value than the modal */
    }

    .modal-backdrop.show {
      display: none;
    }

    .accordion {
      z-index: 1030 !important;
      border-color: #af2a25 !important;
      /* Adjust the value as needed */
    }

    #accordion11 .card-header {
      border-color: #af2a25 !important;
    }

    #accordion11 .accordion-toggle {
      color: #af2a25;
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
      border: 1px solid #ccc;
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

    .modal-backdrop.show {
      opacity: 1;
      z-index: 1050;
      /* Adjust z-index to make it cover other elements */
    }
  </style>




  <!-- Head Libs -->
  <script src="vendor/modernizr/modernizr.min.js"></script>
</head>




<body>


  <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.7);">
        <div class="modal-header">
          <h5 class="modal-title text-white">Flyer</h5>
          <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body text-white" style="max-height: 400px; overflow-y: auto;">
          <img src="img/demos/business-consulting-3/flyer.png" alt="Flyer" class="img-fluid">
        </div>
      </div>
    </div>
  </div>

  
  
  <div id="overlay" class="overlay">
  <?php include 'navbar.php'; ?>
    
      <section class="section section-with-shape-divider page-header page-header-modern page-header-lg border-0 my-0 lazyload" style="background-size: cover; background-position: center ;background-color: #af2a25;">
        <div class="container pb-5 my-3">
          <div class="row mb-4">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
              <h1 class="font-weight-bold text-color-white text-10">Career</h1>
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



      <section class="section section-default border-0 m-0 bg-light">
        <div class="container py-4">
          <div class="col-md-12">
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
                  // Swal.fire({
                  //   icon: 'success', // Ikonya bisa diganti dengan 'error', 'warning', dll.
                  //   title: 'Success',
                  //   text: '<?php echo $_SESSION['success_message']; ?>',
                  //   toast: true,
                  //   position: 'top-end', // Atau 'bottom-end' untuk notifikasi di bawah
                  //   showConfirmButton: false,
                  //   timer: 3000
                  // });
                  <?php unset($_SESSION['success_message']); ?>
                <?php } ?>

                // <?php if (isset($_SESSION['error_message'])) { ?>
                //   Swal.fire({
                //     icon: 'error',
                //     title: 'Error',
                //     text: '<?php echo $_SESSION['error_message']; ?>',
                //     showConfirmButton: false,
                //     timer: 3000
                //   });
                //   <?php unset($_SESSION['error_message']); ?>
                // <?php } ?>
              });
            </script>
          </div>

          <div class="container">
            <h1 style='font-weight: 500; text-align : center; color:black; '>Unlock Your Potential with PT Mineral Alam Abadi</h1><br />
          </div>

          <div class="search-bar">
            <div class="search-input">
              <input type="text" id="searchInput" placeholder="Search...">
              <button id="searchButton"><i class="fas fa-search"></i></button>
            </div>
            <div class="sort-category">
              <div class="dropdown">
                <button id="sortButton" class="dropdown-toggle" type="button" id="sortDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-sort"></i> Sort
                </button>
                <div class="dropdown-menu" aria-labelledby="sortDropdown">
                  <select>
                    <option value="location">Sort by Location</option>
                    <option value="date">Sort by Date</option>
                    <option value="category">Sort by Category</option>
                  </select>
                </div>
              </div>
              <div class="dropdown">
                <button id="categoryButton" class="dropdown-toggle" type="button" id="categoryDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fas fa-filter"></i> Category
                </button>
                <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                  <select>
                    <option value="engineering">Engineering</option>
                    <option value="sales">Sales</option>
                    <option value="marketing">Marketing</option>
                  </select>
                </div>
              </div>
            </div>









          </div>
        </div>
        <div class="container">


          <div class="row mt-5">
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <img src="img/demos/business-consulting-3/logo.png" alt="Company Logo" class="img-fluid" style="max-width: 150px; height: auto;">
                  </div>
                  <h5 class="font-weight-bold mb-2">Job Position 1</h5>
                  <p class="mb-1"><i class="far fa-calendar-alt me-1"></i>2023-08-01 | <i class="fas fa-map-marker-alt ms-1 me-1"></i>City 1</p>
                  <p class="mb-2">Company A</p>

                  <!-- Nested card for description with "View Description" button -->
                  <div class="card">
                    <div class="card-body" style="background-color:#af2a25;">
                      <p class="text-muted" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;"></p>
                      <div class="text-center mt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#descriptionModal1" onclick="viewDescription(1)">
                          View Description
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="text-center mt-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal1">Apply Now</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <img src="img/demos/business-consulting-3/logo.png" alt="Company Logo" class="img-fluid" style="max-width: 150px; height: auto;">
                  </div>
                  <h5 class="font-weight-bold mb-2">Job Position 2</h5>
                  <p class="mb-1"><i class="far fa-calendar-alt me-1"></i>2023-08-02 | <i class="fas fa-map-marker-alt ms-1 me-1"></i>City 2</p>
                  <p class="mb-2">Company B</p>

                  <!-- Nested card for description with "View Description" button -->
                  <div class="card">
                    <div class="card-body" style="background-color:#af2a25;">
                      <p class="text-muted" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;"></p>
                      <div class="text-center mt-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#descriptionModal2" onclick="viewDescription(2)">
                          View Description
                        </button>
                      </div>
                    </div>
                  </div>

                  <div class="text-center mt-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal2">Apply Now</button>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <img src="img/demos/business-consulting-3/logo.png" alt="Company Logo" class="img-fluid" style="max-width: 150px; height: auto;">
                  </div>
                  <h5 class="font-weight-bold mb-2">Job Position 3</h5>
                  <p class="mb-1"><i class="far fa-calendar-alt me-1"></i>2023-08-03 | <i class="fas fa-map-marker-alt ms-1 me-1"></i>City 2</p>
                  <p class="mb-2">Company C</p>

                  <!-- Nested card for description with "View Description" button -->
                  <div class="card">
                    <div class="card-body" style="background-color:#af2a25;">
                      <p class="text-muted" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;"></p>
                      <div class="text-center mt-3">
                        <button type="button" class="btn btn-primary" onclick="openModal()">
                          Open Flyer
                        </button>

                      </div>
                    </div>
                  </div>

                  <div class="text-center mt-3">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal2">Apply Now</button>
                  </div>
                </div>
              </div>
            </div>

            <!-- Description Modals 
            <div class="modal fade" id="descriptionModal1" tabindex="-1" role="dialog">
              
            </div>

            <div class="modal fade" id="descriptionModal2" tabindex="-1" role="dialog">
             
            </div>

            button modal--
            <div class="modal fade" id="applyModal1" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
              
            </div>

            <div class="modal fade" id="applyModal2" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
             ... Modal content ... -->

            <!-- Add a new modal for the flyer image -->
            <div class="modal fade" id="flyerModal" tabindex="-1">
              <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.7);">
                  <div class="modal-header">
                    <h5 class="modal-title text-white">Flyer</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-white">
                    <img src="img/demos/business-consulting-3/flyer.png" alt="Flyer" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>

            <!-- Existing Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.7);">
                  <div class="modal-header">
                    <h5 class="modal-title text-white">Flyer</h5>
                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body text-white" style="max-height: 400px; overflow-y: auto;">
                    <img src="img/demos/business-consulting-3/flyer.png" alt="Flyer" class="img-fluid">
                  </div>
                </div>
              </div>
            </div>






          </div>
        </div>
    </div>




  </div>
  </div>
  </section>
  </div>

  <?php include 'footer.php'; ?>
  </div>
  <script>
    function openModal() {
      // Show the overlay
      document.getElementById("overlay").style.display = "block";

      // Open the modal
      var myModal = new bootstrap.Modal(document.getElementById("myModal"));
      myModal.show();
    }
  </script>
  <script src="sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <!-- Vendor -->
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
    /*
			Map Settings

				Find the Latitude and Longitude of your address:
					- https://www.latlong.net/
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/


    function initializeGoogleMaps() {
      // Map Initial Location
      var initLatitude = 40.75198;
      var initLongitude = -73.96978;

      // Map Markers
      var mapMarkers = [{
        latitude: initLatitude,
        longitude: initLongitude,
        html: "<strong>Porto Business Consulting 3</strong><br>New York, NY 10017<br><br><a href='#' onclick='mapCenterAt({latitude: 40.75198, longitude: -73.96978, zoom: 16}, event)'>[+] zoom here</a>",
        icon: {
          image: "img/demos/business-consulting-3/map-pin.png",
          iconsize: [26, 27],
          iconanchor: [12, 27],
        },
      }, ];

      // Map Extended Settings
      var mapSettings = {
        controls: {
          draggable: $.browser.mobile ? false : true,
          panControl: false,
          zoomControl: false,
          mapTypeControl: false,
          scaleControl: false,
          streetViewControl: false,
          overviewMapControl: false,
        },
        scrollwheel: false,
        markers: mapMarkers,
        latitude: initLatitude,
        longitude: initLongitude,
        zoom: 14,
      };

      var map = $("#googlemaps").gMap(mapSettings),
        mapRef = $("#googlemaps").data("gMap.reference");

      // Styles from https://snazzymaps.com/
      var styles = [{
          featureType: "water",
          elementType: "geometry",
          stylers: [{
            color: "#e9e9e9"
          }, {
            lightness: 17
          }],
        },
        {
          featureType: "landscape",
          elementType: "geometry",
          stylers: [{
            color: "#f5f5f5"
          }, {
            lightness: 20
          }],
        },
        {
          featureType: "road.highway",
          elementType: "geometry.fill",
          stylers: [{
            color: "#ffffff"
          }, {
            lightness: 17
          }],
        },
        {
          featureType: "road.highway",
          elementType: "geometry.stroke",
          stylers: [{
            color: "#ffffff"
          }, {
            lightness: 29
          }, {
            weight: 0.2
          }],
        },
        {
          featureType: "road.arterial",
          elementType: "geometry",
          stylers: [{
            color: "#ffffff"
          }, {
            lightness: 18
          }],
        },
        {
          featureType: "road.local",
          elementType: "geometry",
          stylers: [{
            color: "#ffffff"
          }, {
            lightness: 16
          }],
        },
        {
          featureType: "poi",
          elementType: "geometry",
          stylers: [{
            color: "#f5f5f5"
          }, {
            lightness: 21
          }],
        },
        {
          featureType: "poi.park",
          elementType: "geometry",
          stylers: [{
            color: "#dedede"
          }, {
            lightness: 21
          }],
        },
        {
          elementType: "labels.text.stroke",
          stylers: [{
              visibility: "on"
            },
            {
              color: "#ffffff"
            },
            {
              lightness: 16
            },
          ],
        },
        {
          elementType: "labels.text.fill",
          stylers: [{
              saturation: 36
            },
            {
              color: "#333333"
            },
            {
              lightness: 40
            },
          ],
        },
        {
          elementType: "labels.icon",
          stylers: [{
            visibility: "off"
          }]
        },
        {
          featureType: "transit",
          elementType: "geometry",
          stylers: [{
            color: "#f2f2f2"
          }, {
            lightness: 19
          }],
        },
        {
          featureType: "administrative",
          elementType: "geometry.fill",
          stylers: [{
            color: "#fefefe"
          }, {
            lightness: 20
          }],
        },
        {
          featureType: "administrative",
          elementType: "geometry.stroke",
          stylers: [{
            color: "#fefefe"
          }, {
            lightness: 17
          }, {
            weight: 1.2
          }],
        },
      ];

      var styledMap = new google.maps.StyledMapType(styles, {
        name: "Styled Map",
      });

      mapRef.mapTypes.set("map_style", styledMap);
      mapRef.setMapTypeId("map_style");
    }

    // Initialize Google Maps when element enter on browser view
    theme.fn.intObs("#googlemaps", "initializeGoogleMaps()", {});

    // Map text-center At
    var mapCenterAt = function(options, e) {
      e.preventDefault();
      $("#googlemaps").gMap("centerAt", options);
    };
  </script>



  <script>
    const jobDescriptions = {
      1: "Description for Job 1. Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
      2: "Description for Job 2. Vestibulum eget velit ac nisl efficitur pharetra.",
      // Add descriptions for other jobs as needed.
    };

    function viewDescription(id) {
      // Check if the description exists for the selected job ID.
      if (jobDescriptions[id]) {
        // Display the description in the description modal.
        $('#descriptionContent').text(jobDescriptions[id]);

        // Open the description modal when the button is clicked.
        $('#descriptionModal').modal('show');
      } else {
        // Handle the case when the description is not found.
        $('#descriptionContent').text("Description not available for this job.");
        $('#descriptionModal').modal('show');
      }
    }
  </script>



</body>

</html>
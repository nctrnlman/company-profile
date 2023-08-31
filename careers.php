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
  <link rel="shortcut icon" href="img/demos/business-consulting-3/logo-MAA-component.png" type="image/x-icon" />
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


  <!-- Head Libs -->
  <script src="vendor/modernizr/modernizr.min.js"></script>
</head>

<body>
  <div class="body">
    <?php include 'navbar.php'; ?>

    <div role="main" class="main">
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
            <h2 class="font-weight-bold text-5 mb-2" style="color: black;">Unlock Your Potential with Us</h2>
            <div class="overflow-hidden mb-4">
              <p class="lead mb-0">Discover Your Path at PT Mineral Alam Abadi</p>
            </div>
            <p class="text-muted mb-4">Embark on a journey to shape the future of our industry alongside PT Mineral Alam Abadi. Our diverse range of opportunities empowers you to unleash your potential. Dive into innovative projects, collaborate with a dynamic team, and create a meaningful impact. Your path to growth and success begins here.</p>

            <div class="row mt-5">
              <!-- Loop through your job openings -->
              <?php foreach ($results as $result) { ?>
                <div class="col-md-4 mb-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="mb-3">
                        <img src="img/demos/business-consulting-3/logo.png" alt="Company Logo" class="img-fluid" style="max-width: 150px; height: auto;">
                      </div>
                      <h5 class="font-weight-bold mb-2"><?php echo $result['posisi_job']; ?></h5>
                      <p class="mb-1"><i class="far fa-calendar-alt me-1"></i><?php echo $result['tgl_job']; ?> | <i class="fas fa-map-marker-alt ms-1 me-1"></i><?php echo $result['lokasi_job']; ?></p>
                      <p class="mb-2"><?php echo $result['namapt']; ?></p>

                      <!-- Nested card for description with "View Description" button -->
                      <div class="card">
                        <div class="card-body" style="background-color:#af2a25;">
                          <p class="text-muted" style="max-height: 100px; overflow: hidden; text-overflow: ellipsis;"></p>
                          <div class="text-center mt-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#descriptionModal<?php echo $result['idjob']; ?>">
                              View Description
                            </button>
                          </div>
                        </div>
                      </div>

                      <div class="text-center mt-3">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal<?php echo $result['idjob']; ?>">Apply Now</button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="descriptionModal<?php echo $result['idjob']; ?>" tabindex="-1" role="dialog">
                  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content" style="background-color: rgba(0, 0, 0, 0.7);">
                      <div class="modal-header">
                        <h5 class="modal-title text-white"><?php echo $result['posisi_job']; ?> Description</h5>
                        <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body text-white">
                        <p><?php echo $result['diskripsi']; ?></p>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="modal fade" id="applyModal<?php echo $result['idjob']; ?>" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel<?php echo $result['idjob']; ?>" aria-hidden="true" data-backdrop="static">

                      <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 500px;">
                        <div class="modal-content" style="border-radius: 10px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);">

                          <div class="modal-header" style="border-bottom: none;">
                            <h5 class="modal-title" id="applyModalLabel<?php echo $result['idjob']; ?>" style="font-size: 1.5rem; font-weight: bold; margin-bottom: 1rem;"><?php echo $result['posisi_job']; ?></h5>
                            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close" style="border: none; background: transparent;">
                              <span aria-hidden="true" style="font-size: 35px;">&times;</span>
                            </button>
                          </div>
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
                              <input type="hidden" name="job_id" value="<?php echo $result['idjob']; ?>">

                            </div>

                            <div class="modal-footer" style="border-top: none; padding-top: 0;">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="background-color: #6c757d; border: none;">Close</button>
                              <button type="submit" class="btn btn-primary" name="submit">Apply</button>
                            </div>
                          </form>


                        </div>
                      </div>

                    </div>

              <?php } ?>
            </div>
          </div>



          <!-- End Modal -->


        </div>
    </div>

  </div>
  </div>
  </section>
  </div>

  <?php include 'footer.php'; ?>
  </div>
  <script src="sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
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
    $(document).ready(function() {
      $('#descriptionModal').modal({
        backdrop: 'static', // Prevent clicking outside to close
        keyboard: false // Prevent using the escape key to close
      });
    });
  </script>

  <script>
    particlesJS("particles-js", {
      "particles": {
        "number": {
          "value": 4360,
          "density": {
            "enable": true,
            "value_area": 900
          }
        },
        "color": {
          "value": "#ffffff"
        },
        "shape": {
          "type": "circle",
          "stroke": {
            "width": 0,
            "color": "#000000"
          },
          "polygon": {
            "nb_sides": 5
          },
          "image": {
            "src": "img/github.svg",
            "width": 100,
            "height": 100
          }
        },
        "opacity": {
          "value": 1,
          "random": true,
          "anim": {
            "enable": true,
            "speed": 1,
            "opacity_min": 0,
            "sync": false
          }
        },
        "size": {
          "value": 3,
          "random": true,
          "anim": {
            "enable": false,
            "speed": 4,
            "size_min": 0.3,
            "sync": false
          }
        },
        "line_linked": {
          "enable": false,
          "distance": 150,
          "color": "#ffffff",
          "opacity": 0.4,
          "width": 1
        },
        "move": {
          "enable": true,
          "speed": 1,
          "direction": "none",
          "random": true,
          "straight": false,
          "out_mode": "out",
          "bounce": false,
          "attract": {
            "enable": false,
            "rotateX": 600,
            "rotateY": 600
          }
        }
      },
      "interactivity": {
        "detect_on": "canvas",
        "events": {
          "onhover": {
            "enable": false,
            "mode": "bubble"
          },
          "onclick": {
            "enable": false,
            "mode": "none"
          },
          "resize": false
        },
        "modes": {
          "grab": {
            "distance": 400,
            "line_linked": {
              "opacity": 1
            }
          },
          "bubble": {
            "distance": 250,
            "size": 0,
            "duration": 2,
            "opacity": 0,
            "speed": 3
          },
          "repulse": {
            "distance": 400,
            "duration": 0.4
          },
          "push": {
            "particles_nb": 4
          },
          "remove": {
            "particles_nb": 2
          }
        }
      },
      "retina_detect": true
    });
  </script>



</body>

</html>
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

  <style>
    #applyModal {
      background: none;
    }

    /* CSS for the modal */
    .modal {
      z-index: 1050 !important;
      /* Adjust the value as needed */
    }

    /* CSS for the backdrop overlay behind the modal */
    .modal-backdrop {
      z-index: 1040 !important;
      /* Adjust the value as needed */
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
          </div>
          <div class="row pb-4">
            <div class="row mt-4">
              <div class="col-md-12">
                <div class=" appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="400">
                  <div class="container py-5 mt-3">

                    <div class="row">
                      <div class="col-lg-8">
                        <div class="overflow-hidden mb-2">
                          <h2 class="font-weight-normal text-7 mb-2 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="200">Find Your <strong class="font-weight-extra-bold">Opportunity</strong></h2>
                        </div>
                        <div class="overflow-hidden mb-4">
                          <p class="lead mb-0 appear-animation" data-appear-animation="maskUp" data-appear-animation-delay="400">Discover Your Path at <strong class="font-weight-extra-bold">PT Mineral Alam Abadi</strong></p>
                        </div>
                        <p class="text-color-light-3 mb-4 appear-animation" data-appear-animation="fadeInUpShorter" data-appear-animation-delay="600">Join us in shaping the future of our industry. At PT Mineral Alam Abadi, we offer a range of opportunities that allow you to unleash your potential. Explore innovative projects, collaborate with a diverse team, and make a meaningful impact. Your journey towards growth starts here.</p>
                      </div>

                    </div>


                    <!-- <div class="owl-carousel owl-theme dots-inside mb-0 pb-0" data-plugin-options="{'items': 1, 'autoplay': true, 'autoplayTimeout': 4000, 'margin': 10, 'animateOut': 'fadeOut', 'dots': false}" style="z-index: 100;">
                    <div class="pb-5">
                      <img alt="" class="img-fluid rounded" src="img/demos/business-consulting-3/backgrounds/17-obi.jpeg" />
                    </div>
                    <div class="pb-5">
                      <img alt="" class="img-fluid rounded" src="img/demos/business-consulting-3/backgrounds/MMP OBI- 02.jpg" />
                    </div>
                  </div> -->

                    <div class="toggle toggle-primary toggle-simple " style="flex: auto;" data-plugin-toggle>
                      <section class="toggle active">
                        <a class="toggle-title">Our Benefits</a>
                        <div class="toggle-content">
                          <p>
                            Explore the advantages of being a part of Mineral Alam Abadi. We believe in providing exceptional benefits that enhance your experience and well-being. From growth opportunities to a supportive environment, we've got you covered.
                          </p>
                        </div>
                        
                      </section>
                      <section class="toggle">
                        <a class="toggle-title">Our Culture</a>
                        <div class="toggle-content">
                          <p>
                            Step into a culture that values collaboration, innovation, and individual growth. At Mineral Alam Abadi, our culture is the heartbeat of our success, fostering an environment where every team member thrives.
                          </p>
                        </div>
                      </section>
                      <section class="toggle">
                        <a class="toggle-title">Join Our Team</a>
                        <div class="toggle-content">
                          <p>
                            Are you ready to embark on a journey of growth, innovation, and impact? At Mineral Alam Abadi, we invite you to join our dynamic team and contribute to shaping the future of our industry.
                          </p>
                        </div>
                      </section>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="appear-animation" data-appear-animation="fadeIn" data-appear-animation-delay="200">
                <h4 class="mt-2 mb-2">Current <strong>Openings</strong></h4>

                <div class="accordion accordion-modern without-bg mt-4" id="accordion11">
                  <?php foreach ($results as $result) { ?>
                    <div class="card card-default mb-2">
                      <div class="card-header">
                        <h4 class="card-title m-0">
                          <a class="accordion-toggle text-3" data-bs-toggle="collapse" href="#collapse<?php echo $result['idjob']; ?>" data-bs-parent="#accordion11">
                            <?php echo $result['posisi_job']; ?>
                          </a>
                        </h4>
                      </div>
                      <div id="collapse<?php echo $result['idjob']; ?>" class="collapse">
                        <div class="card-body mt-3">
                          <p><?php echo $result['diskripsi']; ?></p>
                          <ul class="list list-inline mt-4 mb-3 text-2">
                            <li class="list-inline-item">
                              <strong>DATE:</strong>
                              <?php echo $result['tgl_job']; ?>
                            </li>
                            <li class="list-inline-item ms-md-3">
                              <strong>COMPANY:</strong>
                              <?php echo $result['namapt']; ?>
                            </li>
                            <li class="list-inline-item ms-md-3">
                              <strong>LOCATION:</strong>
                              <?php echo $result['lokasi_job']; ?>
                            </li>
                            <li class="list-inline-item ms-md-3">
                              <strong>STATUS:</strong>
                              <?php echo $result['status_job']; ?>
                            </li>
                          </ul>
                          <button class="btn btn-modern btn-dark" data-bs-toggle="modal" data-bs-target="#applyModal<?php echo $result['idjob']; ?>">
                            Apply
                          </button>
                        </div>
                      </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="applyModal<?php echo $result['idjob']; ?>" tabindex="-1" role="dialog" aria-labelledby="applyModalLabel<?php echo $result['idjob']; ?>" aria-hidden="true">

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


                    <!-- End Modal -->
                  <?php } ?>

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
</body>

</html>
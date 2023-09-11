<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Business | MAA GROUP</title>

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

  <!-- Skin CSS -->
  <link id="skinCSS" rel="stylesheet" href="css/skins/skin-business-consulting-3.css" />

  <!-- Theme Custom CSS -->
  <link rel="stylesheet" href="css/custom.css" />

  <!-- Head Libs -->
  <script src="vendor/modernizr/modernizr.min.js"></script>
</head>

<body>
  <div class="body">
    <?php include 'navbar.php'; ?>

    <div role="main" class="main">
      <section class="section section-with-shape-divider page-header page-header-modern page-header-lg border-0 my-0 lazyload" style="
            background-size: cover;
            background-position: center;
            background-color: #af2a25;
          ">
        <div class="container pb-5 my-3">
          <div class="row mb-4">
            <div class="col-md-12 align-self-center p-static order-2 text-center">
              <h1 class="font-weight-bold text-color-white text-10" style="text-shadow: 5px 5px 10px black;">
                Trading
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
      <div class="container pt-3 mt-4">
        <div class="row mb-5">
          <div class="col-lg-7">
            <p class="text-justify">
              Connecting global markets, PT Mineral Alam Abadi's trading division specializes in sourcing and supplying minerals and commodities. We prioritize integrity, seamless logistics, and sustainable partnerships.
            </p>
            <p class="text-justify">
              With strong global relationships, we ensure quality resources flow efficiently, benefitting industries and partners alike. Our market insights and ethical practices drive success.
            </p>
            <p class="text-justify">
              Through transparent and responsible trading, we contribute to growth while meeting industry demands and fostering prosperity for all stakeholders.
            </p>
          </div>
          <div class="col-10 col-lg-4 ms-auto pt-4 pt-5 pt-lg-4 pb-5">
            <div class="cascading-images-wrapper p-0 mt-5 mb-5">
              <div class="cascading-images position-relative">
                <img src="img/demos/business-consulting-3/backgrounds/home-project/bcpm1-360x360.jpg" class="box-shadow-4 appear-animation" alt="" data-appear-animation="expandIn" data-appear-animation-duration="600ms" />
                <div class="position-absolute w-100" style="top: 61%; left: -20%">
                  <img src="img/demos/business-consulting-3/backgrounds/home-project/bcpm1-blkjpg.jpg" class="box-shadow-4 appear-animation" width="285" alt="" data-appear-animation="expandIn" data-appear-animation-delay="300" data-appear-animation-duration="600ms" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      
    </div>
    <?php include 'footer.php'; ?>

    <!-- Vendor -->
    <script src="vendor/plugins/js/plugins.min.js"></script>

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
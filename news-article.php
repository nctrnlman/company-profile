<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News Article</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="img/demos/business-consulting-3/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

    <!-- Web Fonts -->
    <link id="googleFonts" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800%7CShadows+Into+Light&display=swap" rel="stylesheet" type="text/css">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="vendor/animate/animate.compat.css">
    <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="vendor/magnific-popup/magnific-popup.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="css/theme.css">
    <link rel="stylesheet" href="css/theme-elements.css">
    <link rel="stylesheet" href="css/theme-blog.css">
    <link rel="stylesheet" href="css/theme-shop.css">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="css/demos/demo-business-consulting-3.css">
    <link rel="stylesheet" href="css/demos/demo-construction.css">

    <!-- Skin CSS -->
    <link id="skinCSS" rel="stylesheet" href="css/skins/skin-business-consulting-3.css">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.min.js"></script>

    <!-- Custom CSS -->
    <style>
        /* Adjust text alignment to justify */
        .article-content {
            text-align: justify;
        }

        /* Style for the larger image */
        .large-article-image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="body">
        <div class="container mt-4">
            <div class="row justify-content-center">
                <div class="col-sm-9">
                    <?php
                    try {
                        include 'db.php';

                        // Check if the 'id' parameter is set in the URL
                        if (isset($_GET['id'])) {
                            // Get the 'id' parameter from the URL
                            $someId = $_GET['id'];

                            // Prepare the query to fetch the news article with the specified ID
                            $query = "SELECT * FROM news WHERE id_news = :id";

                            // Prepare and execute the query
                            $stmt = $db->prepare($query);
                            $stmt->bindParam(':id', $someId, PDO::PARAM_STR); // Assuming id_news is a string
                            $stmt->execute();

                            // Fetch the result as an associative array
                            $result = $stmt->fetch(PDO::FETCH_ASSOC);

                            // Check if a result was found
                            if ($result) {
                                // Display image
                                echo '<img src="file/news/' . $result['image'] . '" alt="Article Image" class="large-article-image">';

                                // Display the news article details
                                echo '<h1 style="padding-top: 20px;">' . $result['title'] . '</h1>';
                                echo '<div class="article-content">';
                                echo '<p class="font-weight-bold">Publication Date: ' . date('F j, Y', strtotime($result['create_date'])) . '</p>';
                                echo '<p>' . $result['description'] . '</p>';

                                if (!empty($result['video'])) {
                                    echo '<div class="video-container text-center">'; // Added 'text-center' class
                                    echo '<video width="520" height="320" controls>';
                                    echo '<source src="file/news/videos/' . $result['video'] . '" type="video/mp4">';
                                    echo 'Your browser does not support the video tag.';
                                    echo '</video>';
                                    echo '</div>';
                                }
                                // You can display other details here as needed
                                echo '</div>';
                            } else {
                                echo "No results found for ID $someId.";
                            }
                        } else {
                            echo "ID parameter is missing in the URL.";
                        }
                    } catch (PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    ?>
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
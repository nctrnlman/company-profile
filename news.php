<?php
session_start();
include 'db.php';

// Determine the category filter (all if not specified)
$categoryFilter = isset($_GET['category']) ? $_GET['category'] : 'all';

// Calculate the offset for pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$perPage = 5;
$offset = ($page - 1) * $perPage;

// Build the SQL query based on the category filter
$queryNews = "SELECT * FROM news";
if ($categoryFilter !== 'all') {
    $queryNews .= " WHERE category = '$categoryFilter'";
}
$queryNews .= " ORDER BY create_date DESC LIMIT $offset, $perPage";

$results = $db->query($queryNews);

// Count total news items for pagination
$queryTotal = "SELECT COUNT(*) FROM news";
if ($categoryFilter !== 'all') {
    $queryTotal .= " WHERE category = '$categoryFilter'";
}
$totalNews = $db->query($queryTotal)->fetchColumn();
$totalPages = ceil($totalNews / $perPage);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <title>Our Business | MAA GROUP</title>

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

    <!-- Head Libs -->
    <script src="vendor/modernizr/modernizr.min.js"></script>

    <style>
        .card {
            position: relative;
            overflow: hidden;
            background-color: #af2a25;
        }

        .card img {
            transition: opacity 0.3s, transform 0.3s;
        }

        .card:hover img {
            opacity: 0.5;
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            /* Adjust the background color and opacity */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .card:hover .image-overlay {
            opacity: 1;
        }

        .card-text {
            color: white;
        }
    </style>

    <style>
        .category-item {
            cursor: pointer;
            border-radius: 5px;
            padding: 5px;
            margin-bottom: 5px;
            color: white;
            transition: background-color 0.3s, color 0.3s;
        }

        .category-item:hover {
            background: rgba(0, 0, 0, 0.2);
        }

        .active-category {
            background: rgba(0, 0, 0, 0.2);
            color: #c6a265;
        }
    </style>

    <style>
        .pagination-box {
            display: inline-block;
            padding: 8px 12px;
            /* Adjust padding to increase size */
            margin: 0;
            /* Remove margin */
            border: 1px solid #ccc;
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
                            <h1 class="font-weight-bold text-color-white text-12" style="text-shadow: 5px 5px 10px black;">
                                News
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
                <div class="row">
                    <div class="col-md-9">
                        <div class="row justify-content-center">
                            <?php foreach ($results as $result) : ?>
                                <div class="col-md-12 mb-4" data-category="<?php echo $result['category']; ?>">
                                    <div style="background: white; border-radius: 2px; padding: 10px; transition: all 0.3s; border: 1px solid #ccc; max-width: 800px; margin-left: 5px; ">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img src="file/news/<?php echo $result['image']; ?>" class="card-img-top object-cover img-fluid" alt="Article Image">
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card-body">
                                                        <!-- Title -->
                                                        <h4 class="font-weight-semibold text-color-dark text-4 text-sm mb-0" style="letter-spacing: 1px; margin-bottom: 20px !important;"><?php echo $result['title']; ?></h4>

                                                        <!-- Publication Date -->
                                                        <p class="card-text" style="font-size: 12px; color: black;">Publication Date: <?php echo date('F j, Y', strtotime($result['create_date'])); ?></p>

                                                        <!-- Description -->
                                                        <?php
                                                        $description = $result['description'];
                                                        $maxCharacters = 100;
                                                        if (strlen($description) > $maxCharacters) {
                                                            $description = substr($description, 0, $maxCharacters);
                                                            $description .= '...';
                                                        }
                                                        ?>
                                                        <p class="card-text" style="font-size: 0.875rem; color: black;"><?php echo $description; ?></p>

                                                        <!-- Read More Button -->
                                                        <a href="news-article.php?id=<?php echo $result['id_news']; ?>" class="btn btn-primary">Read More</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row-md-12">
                                                <div class="card-footer" style="padding-top: 20px;"> <!-- Added padding-top -->
                                                    <div class="row justify-content-center">
                                                        <!-- Social Media Links -->
                                                        <div class="text-center"> <!-- Center align the content -->
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <a href="https://www.instagram.com/mineralalamabadi/" target="_blank" title="Instagram" style="color: gray; padding: 10px;"> <!-- Added padding -->
                                                                        <i class="fab fa-instagram" style="color: red;"></i> Mineral Alam Abadi Group
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="https://www.linkedin.com/company/pt-mineralalamabadi/" target="_blank" title="LinkedIn" style="color: gray; padding: 10px;"> <!-- Added padding -->
                                                                        <i class="fab fa-linkedin-in" style="color: blue;"></i> Mineral Alam Abadi Group LinkedIn
                                                                    </a>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <a href="https://www.instagram.com/maagroup_externalrelation/" target="_blank" title="Instagram" style="color: gray; padding: 10px;"> <!-- Added padding -->
                                                                        <i class="fab fa-instagram" style="color: blueviolet;"></i> MAA Group External Relations
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-md-3" style="background: rgba(255, 255, 255, 0.2); border-radius: 2px; padding: 10px;">
                        <div style="background: #af2a25; border-radius: 1px; padding: 10px; margin-bottom: 10px; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 4px solid #c6a265; box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.3);">
                            <h1 class="text-center font-weight-semibold" style="font-size: 24px; color: ghostwhite; letter-spacing: 2px;">Categories</h1>
                            <hr style="border-color: white; border-width: 2px;">
                            <div class="category-item" onclick="filterNews('all')">All</div>
                            <?php
                            $queryCategory = "SELECT DISTINCT category FROM news";
                            $resultCategory = $db->query($queryCategory);

                            if ($resultCategory) {
                                while ($rowCategory = $resultCategory->fetch(PDO::FETCH_ASSOC)) {
                                    $categoryName = $rowCategory['category'];
                                    $categoryStyle = $categoryFilter === $categoryName ? 'active-category' : '';
                                    echo '<div class="category-item ' . $categoryStyle . '" onclick="filterNews(\'' . $categoryName . '\')" style="border-radius: 5px; padding: 5px; margin-bottom: 5px; color: white;">' . $categoryName . '</div>';
                                }
                            }
                            ?>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php
                        $style = 'color: #c6a265;'; // Color style

                        // Display left arrow (if not on the first page)
                        if ($page > 1) {
                            $prevPage = $page - 1;
                            echo '<span class="pagination-box"><a href="news.php?page=' . $prevPage . '&category=' . $categoryFilter . '" style="' . $style . '">&larr; Previous</a></span>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            $activeClass = ($i === $page) ? 'font-weight-bold' : '';
                            echo '<span class="pagination-box"><a class="' . $activeClass . '" href="news.php?page=' . $i . '&category=' . $categoryFilter . '" style="' . $style . '">' . $i . '</a></span>';
                        }

                        // Display right arrow (if not on the last page)
                        if ($page < $totalPages) {
                            $nextPage = $page + 1;
                            echo '<span class="pagination-box"><a href="news.php?page=' . $nextPage . '&category=' . $categoryFilter . '" style="' . $style . '">Next &rarr;</a></span>';
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
            function filterNews(category) {
                const newsItems = document.querySelectorAll('.col-md-12');

                newsItems.forEach(newsItem => {
                    const itemCategory = newsItem.getAttribute('data-category');

                    if (category === 'all' || itemCategory === category) {
                        newsItem.style.display = 'block';
                    } else {
                        newsItem.style.display = 'none';
                    }
                });
            }
        </script>



</body>

</html>
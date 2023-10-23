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

// Query to fetch highlighted news (limit to 3)
$queryHighlighted = "SELECT * FROM news WHERE highlights = '1' ORDER BY create_date DESC LIMIT 3";

// Fetch the highlighted news
$highlightedResults = $db->query($queryHighlighted);

// Fetch the regular news results
$results = $db->query($queryNews);

// Count total news items for pagination
$queryTotal = "SELECT COUNT(*) FROM news";
if ($categoryFilter !== 'all') {
    $queryTotal .= " WHERE category = '$categoryFilter'";
}
$totalNews = $db->query($queryTotal)->fetchColumn();
$totalPages = ceil($totalNews / $perPage);

$startArticle = ($page - 1) * $perPage + 1;
$endArticle = min($page * $perPage, $totalNews);
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

    <style>
        /* CSS for Highlight Card */
        :root {
            --clr-neutral-900: hsl(207, 19%, 9%);
            --clr-neutral-100: hsl(0, 0%, 100%);
            --clr-accent-400: #af2a25;
        }

        .card {
            position: relative;
            overflow: hidden;
            transition: transform 500ms ease;
            background: var(--clr-neutral-900);
            /* Set the background color */
        }

        .card-content {
            --padding: 1.5rem;
            padding: var(--padding);
            transform: translateY(70%);
            transition: transform 500ms ease;
            filter: blur(10px);
        }

        .card-content>*:not(.card-title) {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 500ms ease, transform 500ms ease;
            transition-delay: 0.5s;
        }

        .card:hover .card-content {
            transform: translateY(0);
            transition-delay: 0.2s;
        }

        .card:hover .card-content>* {
            opacity: 1;
            transform: translateY(0);
        }

        .card-title {
            position: relative;
            width: max-content;
        }

        .card-title::after {
            content: "";
            position: absolute;
            height: 2.5px;
            left: 0;
            bottom: 0;
            width: 100%;
            background: var(--clr-accent-400);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 500ms ease;
        }

        .card:hover .card-title::after {
            transform: scaleX(1);
        }

        .card-body {
            color: rgba(255, 255, 255, 0.85);
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>


    <style>
        /* CSS for responsiveness */
        @media (max-width: 767px) {

            /* Reduce the font size of the title and description for smaller screens */
            .card-title {
                font-size: 14px;
            }

            .card-description {
                font-size: 12px;
            }

            /* Adjust the image size for smaller screens */
            .card-img-top {
                max-width: 100%;
                min-height: auto;
            }

            /* Ensure that the text doesn't overflow the card on small screens */
            .card-title,
            .card-description {
                max-width: 100%;
            }

            /* Add padding between each card on small screens */
            .col-md-4 {
                margin-bottom: 20px;
                /* Adjust the value to control the gap size */
            }
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

                    <!-- Highlights Section -->
                    <div class="col-md-12 mb-4">
                        <h1 style="font-size: 46px; font-weight: 600;  color:black;"> News Of the Day </h1>
                        <p class="card-text" style="font-size: 16px; color: black;">Publication Date: <?php echo date('F j, Y'); ?></p>
                        <div class="row justify-content-center">
                            <!-- Display highlighted news -->
                            <?php
                            $todayDate = date('Y-m-d');
                            $highlightedCount = 0;
                            $highlightedResultsArray = $highlightedResults->fetchAll();
                            foreach ($highlightedResultsArray as $highlighted) :
                            ?>
                                <div class="col-md-4" data-category="<?php echo $highlighted['category']; ?>">
                                    <!-- Display highlighted news content here -->
                                    <div class="card" style="position: relative;">
                                        <img src="file/news/<?php echo $highlighted['image']; ?>" class="card-img-top" alt="Highlighted News Image" style="max-width: 400px; min-height: 250px; position: relative; opacity: 0.4;">
                                        <div class="card-overlay"></div>
                                        <div class="card-img-overlay">
                                            <h4 class="card-title" style="font-size: 16px; position: absolute; bottom: 65px; left: 15px; color: white; z-index: 100; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 70%;"><?php echo $highlighted['title']; ?></h4>
                                            <p class="card-description" style="font-size: 13px; position: absolute; bottom: 30px; left: 15px; color: white; z-index: 100; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 70%;"><?php echo $highlighted['description']; ?></p>
                                        </div>
                                        <div class="card-body" style="position: absolute; bottom: 0; left: 4px; right: 0; text-align: left; padding: 10px; height: 22%;">
                                            <a href="news-article.php?id=<?php echo $highlighted['id_news']; ?>" class="btn btn-primary btn-sm">Read More</a>
                                        </div>

                                    </div>
                                </div>



                            <?php
                                $highlightedCount++;
                            endforeach;
                            ?>
                        </div>

                    </div>

                    <div class="col-md-9" style="padding-top: 70px;">
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
                                                        <h4 class="font-weight-semibold text-color-dark text-4 text-sm mb-0" style="letter-spacing: 1px; margin-bottom: 20px !important; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 100%;"><?php echo $result['title']; ?></h4>

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
                                                        <p class="card-text" style="font-size: 0.875rem; color: black; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 70%;"><?php echo $description; ?></p>
                                                        <div class="col" style="display: flex; justify-content: space-between; align-items: center;">

                                                            <!-- Read More Button -->
                                                            <a href="news-article.php?id=<?php echo $result['id_news']; ?>" class="btn btn-primary">Read More</a>

                                                            <!-- Social Media Links -->
                                                            <div class="row justify-content-end" style="margin-top: 20px;">
                                                                <div style="justify-content: right; padding-right: 2px;">
                                                                    <ul class="list-inline">
                                                                        <li class="list-inline-item">
                                                                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://news-article.php/<?= $result['id_news'] ?>&title=<?= $result['title']; ?>" target="_blank">
                                                                                <i class="fab fa-facebook-square fa-2x" aria-hidden="true" style="color: blue;"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="https://twitter.com/intent/tweet?&url=http://news-article.php/<?= $result['id_news'] ?>&title=<?= $result['title']; ?>" target="_blank">
                                                                                <i class="fab fa-twitter-square fa-2x" aria-hidden="true" style="color: #1DA1F2;"></i>
                                                                            </a>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <a href="https://wa.me/?text=<?= urlencode('http://news-article.php/' . $result['id_news'] . '&title=' . $result['title']) ?>" target="_blank">
                                                                                <i class="fab fa-whatsapp-square fa-2x" aria-hidden="true" style="color: #25D366;"></i>
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
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="col-md-3" style="background: rgba(255, 255, 255, 0.2); border-radius: 2px; padding: 10px; padding-top: 72px; position: relative;">
                        <div style="background: #af2a25; border-radius: 1px; padding: 10px; margin-bottom: 10px; backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); border: 4px solid #c6a265; box-shadow: 10px 5px 10px rgba(0, 0, 0, 0.3);">
                            <h1 class="text-center font-weight-semibold" style="font-family: 'Montserrat', sans-serif; font-size: 24px; color: ghostwhite; letter-spacing: 2px; margin: 0;">Categories</h1>
                            <hr style="border-color: white; border-width: 2px; margin-top: 5px; margin-bottom: 10px;">
                            <div class="category-item" onclick="selectCategory('all')" style="border-radius: 5px; padding: 5px; margin-bottom: 10px; color: white; cursor: pointer;">
                                <i class="fas fa-globe" style="margin-right: 5px;"></i> All
                            </div>
                            <?php
                            $queryCategory = "SELECT DISTINCT category FROM news";
                            $resultCategory = $db->query($queryCategory);

                            if ($resultCategory) {
                                while ($rowCategory = $resultCategory->fetch(PDO::FETCH_ASSOC)) {
                                    $categoryName = $rowCategory['category'];
                                    $categoryStyle = $categoryFilter === $categoryName ? 'active-category' : '';
                                    echo '<div class="category-item ' . $categoryStyle . '" onclick="selectCategory(\'' . $categoryName . '\')" data-category="' . $categoryName . '" style="border-radius: 5px; padding: 5px; margin-bottom: 5px; color: white; cursor: pointer; position: relative; font-family: \'Montserrat\', sans-serif;">
                                    <i class="fas fa-chevron-right" style="margin-right: 5px;"></i>' . $categoryName . '
                                    <hr style="border-color: white; border-width: 1px; margin: -5px 0; position: absolute; top: 100%; left: 0; right: 0; border-style: dashed;">
                                    </div>';
                                }
                            }
                            ?>
                        </div>
                    </div>







                </div>

                <div class="row">
                    <div class="col-md-12 text-center">
                        <?php
                        echo '<p>Showing ' . $startArticle . ' - ' . $endArticle . ' news out of ' . $totalNews . '</p>';
                        ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 text-center ">
                        <?php
                        $style = 'color: #c6a265; font-size: 16px; ';


                        if ($page > 1) {
                            $prevPage = $page - 1;
                            echo '<span class="pagination-box"><a href="news.php?page=' . $prevPage . '&category=' . $categoryFilter . '" style="' . $style . '">&larr; Previous</a></span>';
                        }

                        for ($i = 1; $i <= $totalPages; $i++) {
                            $activeClass = ($i === $page) ? 'font-weight-bold' : '';
                            echo '<span class="pagination-box"><a class="' . $activeClass . '" href="news.php?page=' . $i . '&category=' . $categoryFilter . '" style="' . $style . '">' . $i . '</a></span>';
                        }

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
            // Define a variable to store the currently selected category
            let selectedCategory = 'all';

            // Function to update the selected category and apply styling
            function selectCategory(category) {
                // Remove the 'active-category' class from all category items
                const categoryItems = document.querySelectorAll('.category-item');
                categoryItems.forEach(item => {
                    item.classList.remove('active-category');
                });

                // Add the 'active-category' class to the clicked category item
                const clickedCategory = document.querySelector('.category-item[data-category="' + category + '"]');
                if (clickedCategory) {
                    clickedCategory.classList.add('active-category');
                }

                // Update the selected category
                selectedCategory = category;

                // Call your filterNews function here with the selected category
                filterNews(selectedCategory);
            }

            // Your filterNews function (replace this with your actual filtering logic)
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

            // Initial call to display all news items
            filterNews(selectedCategory);
        </script>






</body>

</html>
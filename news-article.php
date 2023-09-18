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
                            // Display the larger image
                            echo '<img src="file/news/' . $result['image'] . '" alt="Article Image" class="large-article-image">';

                            // Display the news article details
                            echo '<h1>' . $result['title'] . '</h1>';
                            echo '<div class="article-content">';
                            echo '<p class="font-weight-bold">Publication Date: ' . date('F j, Y', strtotime($result['create_date'])) . '</p>';
                            echo '<p>' . $result['description'] . '</p>';
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

    <?php include 'footer.php'; ?>
</body>
</html>

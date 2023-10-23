<?php
session_start();
include '../db.php';

if (!isset($_SESSION['username'])) {
    header("Location: ./");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $imagePath = uploadImage($_FILES['image']);
    $videoPath = uploadVideo($_FILES['video']); 

    $title = $_POST['title'];
    $category = $_POST['category'];
    $highlights = $_POST['highlights']; 
    $description = $_POST['description'];
    

    if ($imagePath) {
        $currentDate = date("Y-m-d H:i:s");
        $unique_id = generateUniqueId();

        try {
            $stmt = $db->prepare("INSERT INTO news (id_news, title, create_date, image, description, category, highlights, video) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$unique_id, $title, $currentDate, $imagePath, $description, $category, $highlights, $videoPath]); // Store video path

            $successMessage = "News added successfully!";
            $_SESSION['success_message'] = $successMessage;
        } catch (PDOException $e) {
            $errorMessage = "Error: " . $e->getMessage();
            $_SESSION['error_message'] = $errorMessage;
        }
    }
}

function generateUniqueId()
{
    return "NWS" . str_pad(mt_rand(1, 999), 3, "0", STR_PAD_LEFT);
}

function uploadImage($file)
{
    $uploadDirectory = "../file/news/";
    $fileName = generateUniqueId() . "_" . basename($file['name']);
    $targetFilePath = $uploadDirectory . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return $fileName;
    } else {
        return false;
    }
}

function uploadVideo($file)
{
    $uploadDirectory = "../file/news/videos/";
    $fileName = generateUniqueId() . "_" . basename($file['name']);
    $targetFilePath = $uploadDirectory . $fileName;

    // Maximum allowed video size in bytes (50 MB)
    $maxFileSize = 50 * 1024 * 1024; // 50 MB in bytes

    // Check if the uploaded file size exceeds the maximum allowed size
    if ($file['size'] > $maxFileSize) {
        // Video size is too large
        return "Video size is too large. Maximum allowed size is 50 MB.";
    }

    // Check if the file was successfully uploaded
    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return $fileName;
    } else {
        return false;
    }
}

header("Location: news-admin.php");
exit();
?>

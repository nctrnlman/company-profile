<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $imagePath = uploadImage($_FILES['image']);
    $title = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    if ($imagePath) {
        $currentDate = date("Y-m-d H:i:s");
        $unique_id = generateUniqueId();

        try {
            $stmt = $db->prepare("INSERT INTO news (id_news,title, create_date,image, description,category ) VALUES (?, ?, ?, ?,?,?)");
            $stmt->execute([$unique_id, $title, $currentDate, $imagePath, $description, $category]);

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

header("Location: news-admin.php");
exit();

<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $imagePath = uploadImage($_FILES['image']);
    $category = $_POST['category'];

    if ($imagePath) {
        $currentDate = date("Y-m-d H:i:s");
        $unique_id = generateUniqueId();

        try {
            $stmt = $db->prepare("INSERT INTO gallery (id_gallery, image, category, create_date) VALUES (?, ?, ?, ?)");
            $stmt->execute([$unique_id, $imagePath, $category, $currentDate]);

            $successMessage = "Image added successfully!";
            $_SESSION['success_message'] = $successMessage;
        } catch (PDOException $e) {
            $errorMessage = "Error: " . $e->getMessage();
            $_SESSION['error_message'] = $errorMessage;
        }
    }
}

function generateUniqueId()
{
    return "GLR" . str_pad(mt_rand(1, 999), 3, "0", STR_PAD_LEFT);
}

function uploadImage($file)
{
    $uploadDirectory = "../file/gallery/";
    $fileName = generateUniqueId() . "_" . basename($file['name']);
    $targetFilePath = $uploadDirectory . $fileName;

    if (move_uploaded_file($file['tmp_name'], $targetFilePath)) {
        return $fileName;
    } else {
        return false;
    }
}

header("Location: gallery-admin.php");
exit();

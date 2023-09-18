<?php
session_start();

include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $galleryId = $_POST['id'];
    $stmt = $db->prepare("SELECT image FROM gallery WHERE id_gallery = ?");
    $stmt->execute([$galleryId]);
    $result = $stmt->fetch();

    if ($result && !empty($result['image'])) {
        $filePath = "../file/gallery/" . $result['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    try {
        $stmt = $db->prepare("DELETE FROM gallery WHERE id_gallery = ?");
        $stmt->execute([$galleryId]);

        $successMessage = "image deleted successfully!";
        $_SESSION['success_message'] = $successMessage;
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
    }

    header("Location: gallery-admin.php");
    exit();
} else {
    header("Location: gallery-admin.php");
    exit();
}

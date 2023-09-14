<?php
session_start();

include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $newsId = $_POST['id'];
    $stmt = $db->prepare("SELECT image FROM news WHERE id_news = ?");
    $stmt->execute([$newsId]);
    $result = $stmt->fetch();

    if ($result && !empty($result['image'])) {
        $filePath = "../file/news/" . $result['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    try {
        $stmt = $db->prepare("DELETE FROM news WHERE id_news = ?");
        $stmt->execute([$newsId]);

        $successMessage = "image deleted successfully!";
        $_SESSION['success_message'] = $successMessage;
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
    }

    header("Location: news-admin.php");
    exit();
} else {
    header("Location: news-admin.php");
    exit();
}

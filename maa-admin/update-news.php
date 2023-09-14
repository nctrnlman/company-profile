<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jobId = $_POST['jobIdInput'];
    $jobTitle = $_POST['title'];
    $category = $_POST['category'];
    $description = $_POST['description'];

    $sql = "SELECT * FROM news WHERE id_news = '$jobId'";
    $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        $sql = "UPDATE news SET ";
        $updates = array();

        if ($jobTitle != $result['title']) {
            $updates[] = "title = '$jobTitle'";
        }



        if ($description != $result['description']) {
            $updates[] = "description = '$description'";
        }

        if ($category != $result['category']) {
            $updates[] = "category = '$category'";
        }

        // Handle file upload
        if (!empty($_FILES['image']['name'])) {
            $maxFileSize = 3 * 1024 * 1024; // 3MB

            if ($_FILES['image']['size'] > $maxFileSize) {
                $_SESSION['error_message'] = "File is too large. Maximum file size allowed is 3MB.";
            } else {
                $newFileName = $_FILES['image']['name'];
                $newFileTmpName = $_FILES['image']['tmp_name'];

                $uploadDirectory = '../file/news';
                $newFilePath = $uploadDirectory . '/' . $newFileName;

                if (move_uploaded_file($newFileTmpName, $newFilePath)) {
                    $updates[] = "image = '$newFileName'";
                } else {
                    $_SESSION['error_message'] = "Error uploading file.";
                    header("Location: news-admin.php");
                    exit();
                }
            }
        }

        if (!empty($updates)) {
            $sql .= implode(', ', $updates);
            $sql .= " WHERE id_news = '$jobId'";

            if ($db->query($sql)) {
                $_SESSION['success_message'] = "News updated successfully!";
                header("Location: news-admin.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error: Update failed.";
            }
        }
    } else {
        $_SESSION['error_message'] = "News data not found.";
    }
}

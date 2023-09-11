<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $position = $_POST['position'];
    $dueDate = $_POST['dueDate'];
    $division = $_POST['division'];
    $location = $_POST['location'];
    $company = $_POST['companyName'];

    $unique_id = generateUniqueId();

    while (checkUniqueIdExists($unique_id)) {
        $unique_id = generateUniqueId();
    }

    if (!empty($_FILES['flyer']['name'])) {
        $uploadedFlyer = $_FILES['flyer'];
        if ($uploadedFlyer['size'] <= 5 * 1024 * 1024 && $uploadedFlyer['type'] == 'image/png') {
            $flyerPath = moveUploadedFile($uploadedFlyer, $unique_id);
        } else {
            $errorMessage = "File size exceeds the maximum limit of 5MB or the file is not a PNG image.";
            $_SESSION['error_message'] = $errorMessage;
            header("Location: job-admin.php");
            exit();
        }
    } else {
        $flyerPath = "NULL";
    }

    $currentDate = date("Y-m-d H:i:s");

    try {
        $stmt = $db->prepare("INSERT INTO job_vacanacy (id_job_vacanacy, position, division, company, location, create_date, due_date, description, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$unique_id, $position, $division, $company, $location, $currentDate, $dueDate, 'NULL', $flyerPath]);

        $successMessage = "Job vacancy added successfully!";
        $_SESSION['success_message'] = $successMessage;
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
    }

    header("Location: job-admin.php");
    exit();
}

function generateUniqueId()
{
    return "JOB" . str_pad(mt_rand(1, 999), 3, "0", STR_PAD_LEFT);
}

function checkUniqueIdExists($id)
{
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM job_vacanacy WHERE id_job_vacanacy = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn() > 0;
}

function moveUploadedFile($file, $unique_id)
{
    $uploadDirectory = "../file/flayer/";
    $fileName = $unique_id . "_" . basename($file['name']);
    $targetFilePath = $uploadDirectory . $fileName;
    move_uploaded_file($file['tmp_name'], $targetFilePath);
    return $fileName;
}

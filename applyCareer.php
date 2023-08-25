<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $job_id = $_POST['job_id'];

    $unique_id = generateUniqueId();

    while (checkUniqueIdExists($unique_id)) {
        $unique_id = generateUniqueId();
    }

    if (!empty($_FILES['resume']['name'])) {
        $uploadedResume = $_FILES['resume'];
        if ($uploadedResume['size'] <= 3 * 1024 * 1024) {
            $resumePath = moveUploadedFile($uploadedResume, $unique_id);
        } else {
            $errorMessage = "File size exceeds the maximum limit of 3 MB.";
            $_SESSION['error_message'] = $errorMessage;
            header("Location: careers.php");
            exit();
        }
    } else {
        $resumePath = "NULL";
    }

    $currentDate = date("Y-m-d H:i:s");

    try {
        $stmt = $db->prepare("INSERT INTO apply (idapply, idjob, tgl_apply, name, phone_number, email, resume) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$unique_id, $job_id, $currentDate, $name, $phone, $email, $resumePath]);

        $successMessage = "Application submitted successfully!";
        $_SESSION['success_message'] = $successMessage;
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
    }

    header("Location: careers.php");
    exit();
}


function generateUniqueId()
{
    return "APPLY" . str_pad(mt_rand(1, 999), 3, "0", STR_PAD_LEFT);
}

function checkUniqueIdExists($id)
{
    global $db;
    $stmt = $db->prepare("SELECT COUNT(*) FROM apply WHERE idapply = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn() > 0;
}

function moveUploadedFile($file, $unique_id)
{
    $uploadDirectory = "resume/";
    $fileName = $unique_id . "_" . basename($file['name']);
    $targetFilePath = $uploadDirectory . $fileName;
    move_uploaded_file($file['tmp_name'], $targetFilePath);
    return $fileName;
}

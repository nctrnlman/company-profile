<?php
session_start();

include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    $jobId = $_POST['id'];
    $stmt = $db->prepare("SELECT image FROM job_vacanacy WHERE id_job_vacanacy = ?");
    $stmt->execute([$jobId]);
    $result = $stmt->fetch();

    if ($result && !empty($result['flyer'])) {
        $filePath = "file/flayer/" . $result['image'];
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    try {
        $stmt = $db->prepare("DELETE FROM job_vacanacy WHERE id_job_vacanacy = ?");
        $stmt->execute([$jobId]);

        $successMessage = "Job vacancy deleted successfully!";
        $_SESSION['success_message'] = $successMessage;
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
    }

    header("Location: job-admin.php");
    exit();
} else {
    header("Location: job-admin.php");
    exit();
}

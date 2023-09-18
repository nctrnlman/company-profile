<?php
session_start();
include '../db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jobId = $_POST['jobIdInput'];
    $jobTitle = $_POST['jobTitleInput'];
    $status = $_POST['status'];
    $division = $_POST['divisionInput'];
    $location = $_POST['locationInput'];
    $companyName = $_POST['companyNameInput'];


    $sql = "SELECT * FROM job_vacanacy WHERE id_job_vacanacy = '$jobId' ;";

    $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($result) {

        $sql = "UPDATE job_vacanacy SET ";
        $updates = array();


        if ($jobTitle != $result['position']) {
            $updates[] = "position = '$jobTitle'";
        }

        if ($status != $result['status']) {

            $updates[] = "status = '$status'";
        }

        if ($division != $result['division']) {
            $updates[] = "division = '$division'";
        }

        if ($location != $result['location']) {
            $updates[] = "location = '$location'";
        }

        if ($companyName != $result['company']) {
            $updates[] = "company = '$companyName'";
        }

        if (!empty($_FILES['flyer']['name'])) {
            $maxFileSize = 5 * 1024 * 1024;


            if ($_FILES['flyer']['size'] > $maxFileSize) {
                $_SESSION['error_message'] = "File is too large. Maximum file size allowed is 5MB.";
            } else {
                $newFileName = $_FILES['flayer']['name'];
                $newFileTmpName = $_FILES['flayer']['tmp_name'];


                $uploadDirectory = '../file/flayer';
                $newFilePath = $uploadDirectory . $newFileName;
                move_uploaded_file($newFileTmpName, $newFilePath);


                $updates[] = "resume = '$newFilePath'";
            }
        }


        if (!empty($updates)) {
            $sql .= implode(', ', $updates);
            $sql .= " WHERE id_job_vacanacy = '$jobId'";

            if ($db->query($sql)) {

                $_SESSION['success_message'] = "Job details updated successfully!";
                header("Location: job-admin.php");
                exit();
            } else {

                $_SESSION['error_message'] = "Error: Update failed.";
                header("Location: job-admin.php");
                exit();
            }
        }
    } else {

        $_SESSION['error_message'] = "Job data not found.";
    }
}

<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include 'db.php';

    $jobId = $_POST['jobIdInput'];
    $jobTitle = $_POST['jobTitleInput'];
    $dueDate = $_POST['dateInput'];
    $division = $_POST['divisionInput'];
    $location = $_POST['locationInput'];
    $companyName = $_POST['companyNameInput'];


    $sql = "SELECT * FROM job_vacanacy WHERE id_job_vacanacy = $jobId";
    $result = $db->query($sql)->fetch(PDO::FETCH_ASSOC);

    if ($result) {

        $sql = "UPDATE job_vacanacy SET ";
        $updates = array();


        if ($jobTitle != $result['position']) {
            $updates[] = "position = '$jobTitle'";
        }

        if ($dueDate != $result['due_date']) {
            $updates[] = "due_date = '$dueDate'";
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
                $newFileName = $_FILES['flyer']['name'];
                $newFileTmpName = $_FILES['flyer']['tmp_name'];


                $uploadDirectory = 'flyer/';
                $newFilePath = $uploadDirectory . $newFileName;
                move_uploaded_file($newFileTmpName, $newFilePath);


                $updates[] = "resume = '$newFilePath'";
            }
        }


        if (!empty($updates)) {
            $sql .= implode(', ', $updates);
            $sql .= " WHERE id_job_vacanacy = $jobId";


            if ($db->query($sql)) {

                $_SESSION['success_message'] = "Job details updated successfully!";
                header("Location: job-admin.php");
                exit();
            } else {

                $_SESSION['error_message'] = "Error: Update failed.";
            }
        }
    } else {

        $_SESSION['error_message'] = "Job data not found.";
    }
}
<?php
session_start();
include 'db.php';
require 'php/PHPMailer/src/PHPMailer.php';
require 'php/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $job_id = $_POST['job_id'];

    $query = "SELECT position FROM job_vacanacy WHERE id_job_vacanacy = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$job_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

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
        $stmt = $db->prepare("INSERT INTO apply_job (id_apply_job, id_job_vacanacy, apply_date, name, phone_number, email, resume) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$unique_id, $job_id, $currentDate, $name, $phone, $email, $resumePath]);



        $mailApplicant = new PHPMailer(true);
        $mailApplicant->isSMTP();
        $mailApplicant->SMTPAuth = true;
        $mailApplicant->SMTPSecure = 'tls';
        $mailApplicant->Host = 'mail.ptmaagroup.com';
        $mailApplicant->Port = 587;
        $mailApplicant->Username = 'info@ptmaagroup.com';
        $mailApplicant->Password = 'emailMaaGroup';

        $mailApplicant->setFrom('info@ptmaagroup.com', 'Web MAA');
        $mailApplicant->addAddress($email, $name);

        $mailApplicant->Subject = 'Thank You for Applying with Us';
        $mailApplicant->Body = "
        Dear $name,

        We want to express our sincere gratitude for your application. We deeply appreciate the time and effort you invested in considering a role with us.
        
        Our dedicated HR team will carefully evaluate your application. If we find that your qualifications align with our requirements, we will reach out to you to discuss the next steps in our selection process.
        
        In the meantime, please keep an eye on your email for any further updates and notifications. Once again, thank you for your keen interest in a career opportunity.
        
        Warm regards,
        
        Sincerely,
        
        PT Mineral Alam Abadi";

        if ($mailApplicant->send()) {
            $successMessage = "Application submitted successfully!";
            $_SESSION['success_message'] = $successMessage;
        } else {
            $errorMessage = "Error sending confirmation email. Please try again later.";
            $_SESSION['error_message'] = $errorMessage;
        }

        $mailCompany = new PHPMailer(true);
        $mailCompany->isSMTP();
        $mailCompany->SMTPAuth = true;
        $mailCompany->SMTPSecure = 'tls';
        $mailCompany->Host = 'mail.ptmaagroup.com';
        $mailCompany->Port = 587;
        $mailCompany->Username = 'info@ptmaagroup.com';
        $mailCompany->Password = 'emailMaaGroup';

        $mailCompany->setFrom('info@ptmaagroup.com', 'MAA Group');
        $mailCompany->addAddress('recruitment@maagroup.co.id', 'Company Recipient');
        $mailCompany->Subject = 'Application Received - ' . $result['position'];
        $mailCompany->Body = "
    Hello,

    A new job application has been received. Please find the applicant's details below:

    Name: $name
    Phone: $phone
    Email: $email

    Please find the applicant's CV attached.

    Thank you.

    Sincerely,

    PT Mineral Alam Abadi";

        if (!empty($resumePath) && $resumePath != "NULL") {
            $mailCompany->addAttachment('file/resume/' . $resumePath);
        }

        if ($mailCompany->send()) {
            $successMessage = "Application submitted successfully!";
            $_SESSION['success_message'] = $successMessage;
        } else {
            $errorMessage = "Error sending notification email to the company. Please try again later.";
            $_SESSION['error_message'] = $errorMessage;
        }
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
    $stmt = $db->prepare("SELECT COUNT(*) FROM apply_job WHERE id_apply_job = ?");
    $stmt->execute([$id]);
    return $stmt->fetchColumn() > 0;
}

function moveUploadedFile($file, $unique_id)
{
    $uploadDirectory = "file/resume/";
    $fileName = $unique_id . "_" . basename($file['name']);
    $targetFilePath = $uploadDirectory . $fileName;
    move_uploaded_file($file['tmp_name'], $targetFilePath);
    return $fileName;
}

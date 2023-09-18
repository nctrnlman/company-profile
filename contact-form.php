<?php
session_start();

require 'php/PHPMailer/src/PHPMailer.php';
require 'php/PHPMailer/src/SMTP.php';
require 'php/PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $mailApplicant = new PHPMailer(true);
    $mailApplicant->isSMTP();
    $mailApplicant->SMTPAuth = true;
    $mailApplicant->SMTPSecure = 'tls';
    $mailApplicant->Host = 'mail.ptmaagroup.com';
    $mailApplicant->Port = 587;
    $mailApplicant->Username = 'info@ptmaagroup.com';
    $mailApplicant->Password = 'emailMaaGroup';

    try {
        $mailApplicant->setFrom('info@ptmaagroup.com', 'MAA Group');
        $mailApplicant->addAddress('wali@maagroup.co.id');
        $mailApplicant->Subject = 'Thank You for Your Message';
        $mailApplicant->Body = "Dear Team,\n\n" .
            "You have received a new message from a website visitor. Here are the details:\n\n" .
            "Name: $name\n" .
            "Email: $email\n" .
            "Message:\n$message\n\n" .
            "Please respond to this inquiry as soon as possible.\n\n" .
            "Sincerely,\nPT Mineral Alam Abadi";

        if ($mailApplicant->send()) {
            $successMessage = "Email sent successfully!";
            $_SESSION['success_message'] = $successMessage;
        } else {
            $errorMessage = "Error sending confirmation email. Please try again later.";
            $_SESSION['error_message'] = $errorMessage;
        }
    } catch (Exception $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
    }

    header("Location: contact.php");
    exit();
}

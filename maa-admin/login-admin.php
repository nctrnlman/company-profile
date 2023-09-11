<?php
session_start();
include '../db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) && empty($password)) {
        $_SESSION['error_message'] = "Username and password are required.";
        header("Location: maa-admin.php");
        exit();
    }

    $query = "SELECT * FROM users WHERE username = :username";

    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $stored_password = $user["password"];

            if ($password == $stored_password) {
                $_SESSION['success_message'] = 'Success Login';
                $_SESSION['username'] = $username;
                header("Location: dashboard-admin.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Password is incorrect.";
                header("Location: maa-admin.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Username not found.";
            header("Location: maa-admin.php");
            exit();
        }
    } catch (PDOException $e) {
        $errorMessage = "Error: " . $e->getMessage();
        $_SESSION['error_message'] = $errorMessage;
        header("Location: maa-admin.php");
        exit();
    }
}

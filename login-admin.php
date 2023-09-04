<?php
session_start();
include 'db.php';
// Cek apakah metode HTTP adalah POST (form telah disubmit)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (empty($username) && empty($password)) {
        $_SESSION['error_message'] = "Username and password are required.";
        header("Location: maa-admin.php");
        exit();
    }

    // Query SQL untuk mencari pengguna berdasarkan username
    $query = "SELECT * FROM users WHERE username = :username";

    // Persiapkan dan eksekusi pernyataan SQL
    try {
        $stmt = $db->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        // Ambil hasil query
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Pengguna ditemukan
            $stored_password = $user["password"];

            if ($password == $stored_password) {
                // Kata sandi cocok, beri akses ke halaman yang sesuai
                // Misalnya, Anda bisa mengarahkan pengguna ke halaman dashboard.
                $_SESSION['success_message'] = 'Success Login';
                header("Location: dashboard-admin.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Password is incorrect.";
                header("Location: maa-admin.php");
                exit();
            }
        } else {
            // Pengguna tidak ditemukan
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

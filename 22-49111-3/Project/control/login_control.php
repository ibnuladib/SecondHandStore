<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Dummy credentials for now (replace with DB logic)
    $valid_username = 'admin';
    $valid_password = '123';

    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // redirect on success
        exit();
    } else {
        $error = "Invalid username or password";
    }
}
?>

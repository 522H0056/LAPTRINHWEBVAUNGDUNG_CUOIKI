<?php
session_start();
include('db/db.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT token, email, isActive FROM students WHERE token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if ($verify_query_run && mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        if ($row['isActive'] == 1) {
            // Redirect to reset password page with email appended to the URL
            $email = rawurlencode($row['email']); // Use rawurlencode to keep '@' intact
            header("Location: resetpass.php?email=$email");
            exit();
        } else {
            $_SESSION['status'] = "Failed to update verification status";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['status'] = "Invalid or expired token";
        header("Location: login.php");
        exit();
    }
} else {
    $_SESSION['status'] = "Token not provided";
    header("Location: login.php");
    exit();
}
?>

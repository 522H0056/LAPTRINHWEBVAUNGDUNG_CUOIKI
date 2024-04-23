<?php
session_start();
include('db/db.php');

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $verify_query = "SELECT token,isActive FROM students WHERE token = '$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn,$verify_query);

    if ($verify_query_run && mysqli_num_rows($verify_query_run) > 0) {
        $row = mysqli_fetch_array($verify_query_run);
        if ($row['isActive'] == NULL) {
            $click = $row['token'];
            $update = "UPDATE students SET isActive='1' WHERE token ='$click' LIMIT 1";
            $update_run = mysqli_query($conn, $update);

            if ($update_run) {
                $_SESSION['status'] ="Verification success!";
                header("Location: login.php");
                exit(0);
            } else {
                $_SESSION['status'] = "Failed to update verification status";
                header("Location: login.php");
                exit(0);
            }
        } else {
            $_SESSION['status'] = "Email already verified, please login";
            header("Location: login.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "Invalid token";
        header("Location: login.php");
        exit(0);
    }
} else {
    $_SESSION['status'] = "Token not provided";
    header("Location: login.php");
    exit(0);
}
?>

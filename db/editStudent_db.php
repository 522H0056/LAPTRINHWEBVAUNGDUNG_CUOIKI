<?php
require_once('db.php');
session_start(); // Bắt đầu phiên

// Kiểm tra nếu nút "save_btn" được nhấn
if(isset($_POST['save_btn'])) {
    // Lấy dữ liệu từ form
    $first_name = $_POST['first'];
    $last_name = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $isAdmin = $_POST['isAdmin'];
    $isActive = $_POST['isActive'];
    
    // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
    $check_email_query = "SELECT email FROM students WHERE email ='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn,$check_email_query);

    if (mysqli_num_rows($check_email_query_run) == 1 ) {
        $update_query = "UPDATE students SET 
                         FirstName = '$first_name', 
                         LastName = '$last_name', 
                         password = '$password', 
                         isAdmin = '$isAdmin', 
                         isActive = '$isActive' 
                         WHERE email = '$email'";
        
        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run) {
            $_SESSION['status'] = "Data saved.";
            header("Location: editStudent.php?email=$email");
            exit();
        } else {
            $_SESSION['status'] = "Failed";
            header("Location: editStudent.php?email=$email");
            exit();
        }
    } else {
        
        
    }
}
?>

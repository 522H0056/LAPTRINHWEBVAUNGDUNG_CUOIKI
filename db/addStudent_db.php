<?php
require_once('db.php');

if (isset($_POST['addStudent_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $isActive = isset($_POST['isActive']) ? 1 : 0;
    $token = $_POST['token'];
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>';
        echo 'alert("email is in the wrong format");';
        echo 'window.location.href = "addStudent.php";'; 
        echo '</script>';
        exit();
    }

    $check_email_query = "SELECT * FROM students WHERE email = '$email'";
    $check_email_query_run = mysqli_query($conn, $check_email_query);
    if (mysqli_num_rows($check_email_query_run) > 0) {
        echo '<script>';
        echo 'alert("Email exists");';
        echo 'window.location.href = "addStudent.php";'; 
        echo '</script>';
        exit();
    }

    $query = "INSERT INTO students (email, password, FirstName, LastName,  isActive, Token) VALUES ('$email', '$password', '$firstName', '$lastName', '$isActive', '$token')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        echo '<script>';
        echo 'alert("Student added successfully.");';
        echo 'window.location.href = "manageStudent.php";'; 
        echo '</script>';
        exit();
    } else {
        // Xử lý trường hợp không thể thêm sinh viên
        $_SESSION['status'] = "Failed to add student";
        header("Location: add_student.php");
        exit();
    }
}
?>

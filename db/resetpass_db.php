<?php
require_once('db/db.php');

// Lấy địa chỉ email từ dữ liệu POST
$email = $_GET['email'];

// Chuyển đổi ký tự '%40' thành '@'
$email = str_replace('%40', '@', $email);

if (isset($_POST['newpass_btn'])) {
    $pass = $_POST['password'];
    $token = md5(rand());

    $check_email_query = "SELECT email FROM students WHERE email ='$email' LIMIT 1";
    $check_email_query_run = mysqli_query($conn, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {
        // Thực hiện câu lệnh SQL để cập nhật mật khẩu cho email đã được xác minh
        $query = "UPDATE students SET password='$pass', token='$token' WHERE email='$email'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo '<script>';
            echo 'alert("Reset password successfully.");';
            echo 'window.location.href = "login.php";'; // Chuyển hướng người dùng đến trang login.php
            echo '</script>';
            exit();
        } else {
            // Xử lý trường hợp không thể cập nhật mật khẩu
        }
    } else {
        // Xử lý trường hợp email không tồn tại
        $_SESSION['status'] = "Failed";
        header("Location: resetpass.php");
        exit();
    }
}
?>

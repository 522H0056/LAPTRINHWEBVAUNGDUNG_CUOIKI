<?php
require_once('db.php'); // Sửa đường dẫn đến file db.php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Kiểm tra xem đã có email và id khóa học từ phiên đăng nhập và URL không
if (!isset($_SESSION['email']) ) {
    header('Location: login.php'); // Chuyển hướng người dùng đến trang đăng nhập nếu chưa đăng nhập hoặc không có id khóa học
    exit();
}

// Lấy email người dùng từ phiên đăng nhập
$user_email = $_SESSION['email'];

// Lấy id khóa học từ URL
$id_course = $_GET['id_course'];

// Kiểm tra xem người dùng đã đưa ra phản hồi cho khóa học này chưa
$check_feedback_query = "SELECT * FROM feedbacks WHERE email='$user_email' AND course_id='$id_course'";
$check_feedback_query_run = mysqli_query($conn, $check_feedback_query);

// Nếu đã tồn tại phản hồi từ người dùng cho khóa học này, không cần thực hiện thêm
if (mysqli_num_rows($check_feedback_query_run) > 0) {
    // Đã tồn tại phản hồi từ người dùng cho khóa học này
    // Có thể thông báo cho người dùng nếu muốn
} else if (isset($_POST['submit-btn'])) {
    // Nếu người dùng đã nhấn nút gửi phản hồi

    // Lấy dữ liệu từ biểu mẫu
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Thêm phản hồi vào cơ sở dữ liệu
    $insert_feedback_query = "INSERT INTO feedbacks (email, course_id, rating, comment) VALUES ('$user_email', '$id_course', '$rating', '$comment')";
    $insert_feedback_query_run = mysqli_query($conn, $insert_feedback_query);

    if ($insert_feedback_query_run) {
            // Hiển thị thông báo pop-up
        echo '<script>';
        echo 'alert("Thank you for your feedback!");';
        echo '</script>';

        // Chuyển hướng người dùng đến trang chính sau khi gửi phản hồi thành công
        echo '<script>';
        echo 'window.location.href = "home.php";';
        echo '</script>';
    exit();
    } else {
        // Nếu có lỗi xảy ra khi thêm phản hồi vào cơ sở dữ liệu
        // Có thể xử lý lỗi ở đây hoặc chuyển hướng người dùng đến trang khác
        $_SESSION['status'] = "Failed";
        header("Location: register.php");
        exit();
    }
}
?>

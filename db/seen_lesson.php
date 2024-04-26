<?php
require_once('db.php');
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lesson_id = $_POST['lesson_id'];
    $user_email = $_SESSION['email'];

    $sql_check = "SELECT * FROM completed_lesson WHERE email = '$user_email' AND lesson_id = '$lesson_id'";
    $result_check = mysqli_query($conn, $sql_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Nếu đã có dữ liệu, hiển thị cảnh báo bằng mã JavaScript
        echo "<script>alert('Bạn đã xem bài học này rồi.');</script>";
    } else {
        // Nếu chưa có dữ liệu, thực hiện thêm vào cơ sở dữ liệu
        $sql_insert = "INSERT INTO completed_lesson (email, lesson_id, isComplete) VALUES ('$user_email', '$lesson_id', 1)";

        if (mysqli_query($conn, $sql_insert)) {
            echo "Lesson ID: $lesson_id has been marked as completed for user with email: $user_email";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
} else {
    echo "Error: No data received!";
}
?>

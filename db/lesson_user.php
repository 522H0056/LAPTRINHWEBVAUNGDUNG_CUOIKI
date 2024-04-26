<?php
include('db.php');

session_start();

if (!isset($_SESSION['email'])) {
    // Nếu chưa đăng nhập, chuyển hướng người dùng đến trang đăng nhập
    header('Location: login.php');
    exit;
}

// Lấy email của người dùng từ session
$userEmail = $_SESSION['email'];

// Kiểm tra xem người dùng đã chọn khóa học nào để đăng ký không
if (isset($_GET['id_course'])) {
    $courseId = $_GET['id_course'];

    // Kiểm tra xem người dùng đã hoàn thành bài học này chưa
    $checkSql = "SELECT * FROM completed_lesson WHERE email = ? AND lesson_id = ? AND status = 'Please watch the video'";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("si", $userEmail, $courseId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        // Bạn có thể thực hiện các hành động khác ở đây nếu cần
    } else {
        // Nếu chưa hoàn thành, tiến hành chèn dữ liệu vào bảng `completed_lesson`
        $insertSql = "INSERT INTO completed_lesson (email, course_id, status) VALUES (?, ?, 'You have completed the lesson')";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("si", $userEmail, $courseId);
        
        if ($insertStmt->execute()) {
            // Bạn có thể thực hiện các hành động khác ở đây nếu cần
        } else {
            echo "Có lỗi xảy ra khi đăng ký khóa học.";
        }
        $insertStmt->close();
    }

    $checkStmt->close();
} else {
    // Nếu không có ID khóa học, có thể hiển thị thông báo lỗi hoặc thực hiện các hành động khác
    echo "Không tìm thấy ID khóa học.";
}
?>

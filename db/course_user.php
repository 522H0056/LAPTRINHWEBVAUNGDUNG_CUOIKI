<?php
include('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

    // Kiểm tra xem người dùng đã đăng ký khóa học này chưa
    $checkSql = "SELECT * FROM enrollment WHERE email = ? AND course_id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("si", $userEmail, $courseId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        
    } else {
        // Nếu chưa đăng ký, tiến hành chèn dữ liệu vào bảng `enrollment`
        $insertSql = "INSERT INTO enrollment (email, course_id) VALUES (?, ?)";
        $insertStmt = $conn->prepare($insertSql);
        $insertStmt->bind_param("si", $userEmail, $courseId);
        
        if ($insertStmt->execute()) {

        } else {
            echo "Có lỗi xảy ra khi đăng ký khóa học.";
        }
        $checkStmt->close();
        $insertStmt->close();
    }

    // Đóng statement
    
} else {
    // Nếu không có ID khóa học, có thể hiển thị thông báo lỗi hoặc thực hiện các hành động khác
    echo "Không tìm thấy ID khóa học.";
}
?>

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
if (isset($_GET['id_lesson'])) {
    $lesson_id = $_GET['id_lesson'];

    // Kiểm tra xem người dùng đã hoàn thành bài học này chưa
    $checkSql = "SELECT * FROM completed_lesson WHERE email = ? AND lesson_id = ?";
    $checkStmt = $conn->prepare($checkSql);
    $checkStmt->bind_param("si", $userEmail, $lesson_id);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();


    if ($checkResult->num_rows > 0) {
        // Bạn có thể thực hiện các hành động khác ở đây nếu cần
    } else {
        // Nếu chưa hoàn thành, tiến hành chèn dữ liệu vào bảng `completed_lesson`
        $insertSql = "INSERT INTO completed_lesson (email, lesson_id, status) VALUES (?, ?, 'Please watch the video')";
        $insertStmt = $conn->prepare($insertSql);
        // Bind các tham số vào câu lệnh SQL
        $insertStmt->bind_param("si", $userEmail, $lesson_id, );
        
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

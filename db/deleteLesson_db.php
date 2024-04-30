<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['lesson_id'])) {
    // Lấy lesson_id từ biến POST
    $lesson_id = $_POST['lesson_id'];
    
    // Tạo kết nối đến cơ sở dữ liệu
    $conn = create_connection();
    
    // Xóa dữ liệu từ bảng completed_lesson liên kết với bài học
    $delete_completed_lesson_query = "DELETE FROM completed_lesson WHERE lesson_id = ?";
    $stmt_completed_lesson = $conn->prepare($delete_completed_lesson_query);
    
    if ($stmt_completed_lesson) {
        $stmt_completed_lesson->bind_param("i", $lesson_id);
        $stmt_completed_lesson->execute();
        $stmt_completed_lesson->close();
        
        // Sau khi xóa dữ liệu từ bảng completed_lesson, tiếp tục xóa dữ liệu từ bảng lesson
        $delete_lesson_query = "DELETE FROM lesson WHERE lesson_id = ?";
        $stmt_lesson = $conn->prepare($delete_lesson_query);
        
        if ($stmt_lesson) {
            $stmt_lesson->bind_param("i", $lesson_id);
            $stmt_lesson->execute();
            $stmt_lesson->close();
            
            // Đóng kết nối sau khi hoàn thành
            $conn->close();
            
            // Chuyển hướng người dùng đến trang quản lý bài học sau khi xóa
            header("Location: ../manageLesson.php");
            exit();
        } else {
            echo "Error deleting lesson.";
        }
    } else {
        echo "Error deleting completed lessons.";
    }
}
?>

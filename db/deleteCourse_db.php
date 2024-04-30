<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_course'])) {
    // Lấy id_course từ biến POST
    $id_course = $_POST['id_course'];
    
    // Tạo kết nối đến cơ sở dữ liệu
    $conn = create_connection();
    
    // Tắt chế độ ràng buộc khóa ngoại để có thể xóa dữ liệu từ bảng lesson mà không gặp lỗi
    $conn->query('SET FOREIGN_KEY_CHECKS=0');
    
    // Xóa dữ liệu từ bảng lesson liên kết với khóa học
    $delete_lesson_query = "DELETE FROM lesson WHERE course_id = ?";
    $stmt_lesson = $conn->prepare($delete_lesson_query);
    
    if ($stmt_lesson) {
        $stmt_lesson->bind_param("i", $id_course);
        $stmt_lesson->execute();
        $stmt_lesson->close();
        
        // Sau khi xóa dữ liệu từ bảng lesson, tiếp tục xóa dữ liệu từ bảng courses
        $delete_course_query = "DELETE FROM courses WHERE course_id = ?";
        $stmt_course = $conn->prepare($delete_course_query);
        
        if ($stmt_course) {
            $stmt_course->bind_param("i", $id_course);
            $stmt_course->execute();
            $stmt_course->close();
            
            // Bật lại chế độ ràng buộc khóa ngoại
            $conn->query('SET FOREIGN_KEY_CHECKS=1');
            
            // Đóng kết nối sau khi hoàn thành
            $conn->close();
            
            // Chuyển hướng người dùng đến trang manageCourse.php sau khi xóa
            header("Location: ../manageCourse.php");
            exit();
        } else {
            echo "Error deleting course.";
        }
    } else {
        echo "Error deleting lessons.";
    }
}
?>

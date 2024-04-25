<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_course'])) {
    // Lấy id_course từ biến POST
    $id_course = $_POST['id_course'];
    
    // Tạo kết nối đến cơ sở dữ liệu
    $conn = create_connection();
    
    // Xóa dữ liệu từ bảng enrollment liên kết với khóa học
    $delete_enrollment_query = "DELETE FROM enrollment WHERE course_id = ?";
    $stmt_enrollment = $conn->prepare($delete_enrollment_query);
    
    if ($stmt_enrollment) {
        $stmt_enrollment->bind_param("i", $id_course);
        $stmt_enrollment->execute();
        $stmt_enrollment->close();
        
        // Sau khi xóa dữ liệu từ bảng enrollment, xóa dữ liệu từ bảng lesson
        $delete_lesson_query = "DELETE FROM lesson WHERE course_id = ?";
        $stmt_lesson = $conn->prepare($delete_lesson_query);
        
        if ($stmt_lesson) {
            $stmt_lesson->bind_param("i", $id_course);
            $stmt_lesson->execute();
            $stmt_lesson->close();
            
            // Sau khi xóa dữ liệu từ bảng lesson, xóa dữ liệu từ bảng courses
            $delete_course_query = "DELETE FROM courses WHERE course_id = ?";
            $stmt_course = $conn->prepare($delete_course_query);
            
            if ($stmt_course) {
                $stmt_course->bind_param("i", $id_course);
                $stmt_course->execute();
                $stmt_course->close();
                
                // Đóng kết nối sau khi hoàn thành
                $conn->close();
                
                // Chuyển hướng người dùng đến trang manageCourse.php sau khi xóa
                header("Location: ../manageCourse.php");
                exit();
            } else {
                echo "Error deleting course.";
            }
        } else {
            echo "Error deleting lesson.";
        }
    } else {
        echo "Error deleting enrollment.";
    }
}
?>

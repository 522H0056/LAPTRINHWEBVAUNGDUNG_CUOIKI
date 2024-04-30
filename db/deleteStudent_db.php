<?php
require_once('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    // Lấy email của sinh viên từ biến POST
    $email = $_POST['email'];
    
    // Tạo kết nối đến cơ sở dữ liệu
    $conn = create_connection();
    
    // Xóa dữ liệu từ bảng feedbacks liên kết với sinh viên
    $delete_feedbacks_query = "DELETE FROM feedbacks WHERE email = ?";
    $stmt_feedbacks = $conn->prepare($delete_feedbacks_query);
    
    if ($stmt_feedbacks) {
        $stmt_feedbacks->bind_param("s", $email);
        $stmt_feedbacks->execute();
        $stmt_feedbacks->close();
        
        // Sau khi xóa dữ liệu từ bảng feedbacks, tiếp tục xóa dữ liệu từ bảng students
        $delete_student_query = "DELETE FROM students WHERE email = ?";
        $stmt_student = $conn->prepare($delete_student_query);
        
        if ($stmt_student) {
            $stmt_student->bind_param("s", $email);
            $stmt_student->execute();
            $stmt_student->close();
            
            // Đóng kết nối sau khi hoàn thành
            $conn->close();
            
            // Chuyển hướng người dùng đến trang quản lý sinh viên sau khi xóa
            header("Location: ../manageStudent.php");
            exit();
        } else {
            echo "Error deleting student.";
        }
    } else {
        echo "Error deleting feedbacks.";
    }
}
?>

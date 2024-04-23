<?php
require_once('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_course'])) {
    $id_course = $_POST['id_course'];

    // Tạo kết nối đến cơ sở dữ liệu
    $conn = create_connection();

    // Xóa các dòng trong bảng enrollment liên kết với khóa học
    $delete_enrollment_query = "DELETE FROM enrollment WHERE course_id = ?";
    $stmt_enrollment = $conn->prepare($delete_enrollment_query);
    $stmt_enrollment->bind_param("i", $id_course);
    $stmt_enrollment->execute();

    // Chuyển hướng người dùng đến trang mycourse.php sau khi xóa
    header("Location: ../mycourse.php"); // Đường dẫn sẽ là ../mycourse.php
    exit();
} else {
    // Nếu không có phương thức POST hoặc không có id_course, chuyển hướng người dùng đến trang mycourse.php
    header("Location: ../mycourse.php"); // Đường dẫn sẽ là ../mycourse.php
    exit();
}
?>

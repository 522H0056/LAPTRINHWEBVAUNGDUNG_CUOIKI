<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once('db.php');

if(isset($_GET['id_course'])) {
    $id_course = $_GET['id_course'];
} else {
    // Xử lý khi 'id_course' không được cung cấp trong URL
    echo false;
    exit;
}

$userEmail = $_SESSION['email'];

// Kết nối đến cơ sở dữ liệu


function isComplete ($id_course, $userEmail) {
    $conn = create_connection();
    $sql = "SELECT cl.*
        FROM completed_lesson cl
        INNER JOIN lesson l ON cl.lesson_id = l.lesson_id
        WHERE cl.email = '$userEmail' AND l.course_id = '$id_course'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $allCompleted = true;
        while($row = $result->fetch_assoc()) {
            if ($row["status"] != "You have seen the video") {
                $allCompleted = false;
                break;
            }
        }
    } else {
        // Trả về false nếu không có bản ghi nào
        echo false;
    }
    return $allCompleted;
}

?>

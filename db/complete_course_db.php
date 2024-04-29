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
        return false;
    }
    return $allCompleted;
}

function isButtonWork ($id_course, $userEmail) {
    $conn = create_connection();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['complete_course'])) {
        $email = $_SESSION['email'];
        $course_id = $_GET['id_course'];

        // Kiểm tra xem đã tồn tại dòng trong bảng feedbacks với email và course_id tương ứng hay không
        $check_query = "SELECT * FROM feedbacks WHERE email = '$email' AND course_id = '$course_id'";
        $check_result = mysqli_query($conn, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            return 'have_feedbacked';
        } else {
            return true;
        }       
    }
}
?>

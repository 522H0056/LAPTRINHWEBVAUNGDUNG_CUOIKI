<?php
    require_once('db.php');

    // Lấy thông tin từ URL
    $id_course = $_GET['id_course'];

    // Kiểm tra xem phiên đăng nhập đã được khởi tạo chưa
    $userEmail = isset($_SESSION['email']) ? $_SESSION['email'] : "";

    // Hàm để lấy danh sách các bài học đã hoàn thành
    function get_completed_lessons()
    {
        global $id_course, $userEmail; 

        // Kết nối đến cơ sở dữ liệu
        $conn = create_connection();

        // Câu truy vấn để lấy thông tin từ bảng completed_lesson và lesson
        $sql = "SELECT cl.*
                FROM completed_lesson cl
                INNER JOIN lesson l ON cl.lesson_id = l.lesson_id
                WHERE cl.email = '$userEmail' AND l.course_id = '$id_course'";
        
        // Thực thi câu truy vấn
        $result = $conn->query($sql);
        
        // Kiểm tra kết quả và xử lý
        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        
        // Đóng kết nối
        $conn->close();
        
        return $data;
    }
?>

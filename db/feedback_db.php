<?php
    require_once('db.php');

    // Kiểm tra xem phương thức request là POST và có dữ liệu trong trường comment không
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment'])) {
        $comment = $_POST['comment'];

        // Kiểm tra xem độ dài của comment có vượt quá 255 ký tự hay không
        if (strlen($comment) > 255) {
            // Nếu có, báo lỗi
            echo "Error: Comment should not exceed 255 characters.";
        } else {
            // Nếu không, thực hiện thêm dữ liệu vào cơ sở dữ liệu
            // Lưu ý: Bạn cần cung cấp các thông tin khác như email, course_id, rating tương tự như đã làm trong đoạn mã của bạn
            $email = $_SESSION['email'];
            $course_id = $_GET['id_course'];
            $rating = $_POST['rating'];

            // Thêm dữ liệu vào cơ sở dữ liệu
            $query = "INSERT INTO feedbacks (email, course_id, rating, comment) VALUES ('$email', '$course_id', '$rating', '$comment')";
            $query_run = mysqli_query($conn, $query);
            
            if ($query_run) {
                echo "Feedback submitted successfully.";
            } else {
                echo "Error: Feedback submission failed.";
            }
        }
    } else {
        // Nếu không có dữ liệu trong trường comment, báo lỗi
        echo "Error: Comment field is empty.";
    }
?>
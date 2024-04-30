<?php
require_once('db/db.php');

if (isset($_POST['addCourse_btn'])) {
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $type = $_POST['Type'];
    $releaseDate = $_POST['release']; 
    $img = $_POST['img'];

    // Thực hiện câu lệnh SQL để lấy ra course_id cao nhất
    $max_id_query = "SELECT MAX(course_id) AS max_id FROM courses";
    $max_id_query_run = mysqli_query($conn, $max_id_query);
    $row = mysqli_fetch_assoc($max_id_query_run);
    $max_id = $row['max_id'];

    // Tăng course_id cao nhất lên 1 để gán vào khóa học mới
    $new_course_id = $max_id + 1;

    // Thực hiện câu lệnh SQL để thêm dữ liệu vào bảng courses
    $query = "INSERT INTO courses (course_id, Title, Description, Type, ReleaseDate, images) VALUES ('$new_course_id', '$title', '$description', '$type', '$releaseDate', '$img')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Hiển thị thông báo alert khi thêm khóa học thành công
        echo '<script>';
        echo 'alert("Course added successfully.");';
        echo 'window.location.href = "manageCourse.php";'; // Chuyển hướng người dùng đến trang dashboard.php
        echo '</script>';
        exit();
    } else {
        // Xử lý trường hợp không thể thêm khóa học
        $_SESSION['status'] = "Failed to add course";
        header("Location: addcourse.php");
        exit();
    }
}
?>

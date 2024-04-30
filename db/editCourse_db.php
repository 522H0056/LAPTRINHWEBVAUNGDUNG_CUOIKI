<?php
require_once('db.php');
session_start(); // Bắt đầu phiên

// Kiểm tra nếu nút "save_btn" được nhấn
if(isset($_POST['save_btn'])) {
    // Lấy dữ liệu từ form
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $course_id = $_POST['course_id'];
    $type = $_POST['Type'];
    $release_year = $_POST['ReleaseYear'];
    $images = $_POST['images'];
    
    // Kiểm tra xem course_id đã tồn tại trong cơ sở dữ liệu chưa
    $check_course_query = "SELECT course_id FROM courses WHERE course_id ='$course_id' LIMIT 1";
    $check_course_query_run = mysqli_query($conn,$check_course_query);

    if (mysqli_num_rows($check_course_query_run) == 1 ) {
        $update_query = "UPDATE courses SET 
                         Title = '$title', 
                         Description = '$description', 
                         Type = '$type', 
                         ReleaseDate = '$release_year', 
                         images = '$images' 
                         WHERE course_id = '$course_id'";
        
        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run) {
            $_SESSION['status'] = "Data saved.";
            header("Location: editCourse.php?id_course=$course_id");
            exit();
        } else {
            $_SESSION['status'] = "Failed";
            header("Location: editCourse.php?id_course=$course_id");
            exit();
        }
    } else {
        
    }
}
?>

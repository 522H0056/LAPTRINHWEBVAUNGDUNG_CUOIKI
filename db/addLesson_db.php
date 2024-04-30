<?php
require_once('db.php');

if (isset($_POST['addLesson_btn'])) {
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $video = $_POST['video'];
    $course_id = $_POST['course_id'];


    $check_course_query = "SELECT * FROM courses WHERE course_id = '$course_id'";
    $check_course_query_run = mysqli_query($conn, $check_course_query);
    if (mysqli_num_rows($check_course_query_run) == 0) {
        echo '<script>';
        echo 'alert("Course_id does not exist");';
        echo 'window.location.href = "addlesson.php";'; 
        echo '</script>';
        exit();;
    }
    $max_lesson_query = "SELECT MAX(lesson_id) AS max_id FROM lesson";
    $max_lesson_query_run = mysqli_query($conn, $max_lesson_query);
    $row = mysqli_fetch_assoc($max_lesson_query_run);
    $max_lesson_id = $row['max_id'];

    
    $new_lesson_id = $max_lesson_id + 1;

    
    $query = "INSERT INTO lesson (lesson_id, title, description, video, course_id) VALUES ('$new_lesson_id', '$title', '$description', '$video', '$course_id')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        
        echo '<script>';
        echo 'alert("Lesson added successfully.");';
        echo 'window.location.href = "manageLesson.php";'; 
        echo '</script>';
        exit();
    } else {
        
        $_SESSION['status'] = "Failed to add lesson";
        header("Location: addlesson.php");
        exit();
    }
}
?>

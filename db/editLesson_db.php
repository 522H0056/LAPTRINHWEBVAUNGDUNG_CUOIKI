<?php
require_once('db.php');
session_start(); 

if(isset($_POST['save1_btn'])) {
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $lesson_id = $_POST['lesson_id'];
    $video = $_POST['video'];
    
    $check_lesson_query = "SELECT lesson_id FROM lesson WHERE lesson_id ='$lesson_id' LIMIT 1";
    $check_lesson_query_run = mysqli_query($conn,$check_lesson_query);

    if (mysqli_num_rows($check_lesson_query_run) == 1 ) {
        $update_query = "UPDATE lesson SET 
                         Title = '$title', 
                         Description = '$description',  
                         video = '$video'
                         WHERE lesson_id = '$lesson_id'";
        
        $update_query_run = mysqli_query($conn, $update_query);

        if ($update_query_run) {
            $_SESSION['status'] = "Data saved.";
            header("Location: editLesson.php?lesson_id=$lesson_id");
            exit();
        } else {
            $_SESSION['status'] = "Failed";
            header("Location: editLesson.php?lesson_id=$lesson_id");
            exit();
        }
    } else {
        
    }
}
?>
